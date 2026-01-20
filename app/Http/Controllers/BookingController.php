<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Models\Tambahan;
use App\Models\Pelanggan;
use App\Models\Penyewaan;
use App\Models\DetailSewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function create(Motor $motor)
    {
        $tambahan = Tambahan::all();
        return view('booking.create', compact('motor', 'tambahan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_motor' => 'required|exists:motor,id',
            'tgl_mulai' => 'required|date|after_or_equal:today',
            'tgl_kembali' => 'required|date|after:tgl_mulai',
            'items' => 'array',
            'items.*.id' => 'exists:tambahan,id',
            'items.*.jumlah' => 'integer|min:0',
        ]);

        DB::beginTransaction();

        try {
            // 1. Calculate Total Days (Inclusive: e.g., 17 to 18 is 2 days)
            $start = Carbon::parse($request->tgl_mulai)->startOfDay();
            $end = Carbon::parse($request->tgl_kembali)->startOfDay();

            if ($end->lt($start)) {
                Log::warning('Booking Failure: Invalid date range', ['start' => $start, 'end' => $end, 'id_motor' => $request->id_motor]);
                return redirect()->route('booking.failed')->with([
                    'reason' => 'Kesalahan logika tanggal: Tanggal kembali tidak boleh sebelum tanggal mulai.',
                    'id_motor' => $request->id_motor
                ]);
            }

            // Check Availability
            $conflictingBooking = Penyewaan::where('id_motor', $request->id_motor)
                ->where(function ($query) use ($start, $end) {
                    $query->whereBetween('tgl_mulai', [$start, $end])
                        ->orWhereBetween('tgl_kembali', [$start, $end])
                        ->orWhere(function ($q) use ($start, $end) {
                            $q->where('tgl_mulai', '<=', $start)
                                ->where('tgl_kembali', '>=', $end);
                        });
                })
                ->whereNotIn('status_sewa', ['Batal', 'Selesai'])
                ->first();

            if ($conflictingBooking) {
                $collisionMsg = "Motor sudah dipesan pada tanggal " .
                    $conflictingBooking->tgl_mulai->format('d M Y') . " sampai " .
                    $conflictingBooking->tgl_kembali->format('d M Y') . ".";

                Log::warning('Booking Failure: Collision detected', ['id_motor' => $request->id_motor, 'msg' => $collisionMsg]);
                return redirect()->route('booking.failed')->with([
                    'reason' => $collisionMsg,
                    'id_motor' => $request->id_motor
                ]);
            }

            $days = $start->diffInDays($end) + 1;

            // 2. Use Authenticated Pelanggan
            $pelanggan = Auth::guard('pelanggan')->user();

            // 3. Calculate Motor Cost
            $motor = Motor::find($request->id_motor);
            if (!$motor) {
                throw new \Exception("Motor tidak ditemukan.");
            }
            $motorCost = $motor->harga_sewa_per_hari * $days;

            // 4. Calculate Additional Items Cost
            $itemsCost = 0;
            $itemsData = [];

            if ($request->items) {
                foreach ($request->items as $item) {
                    if (isset($item['jumlah']) && $item['jumlah'] > 0) {
                        $tambahan = Tambahan::find($item['id']);
                        if ($tambahan) {
                            $subtotal = $tambahan->harga_satuan * $item['jumlah'] * $days;

                            $itemsCost += $subtotal;
                            $itemsData[] = [
                                'id_tambahan' => $tambahan->id,
                                'jumlah' => $item['jumlah'],
                                'subtotal_harga' => $subtotal,
                            ];
                        }
                    }
                }
            }

            $totalBiaya = $motorCost + $itemsCost;

            // 5. Create Penyewaan
            $penyewaan = Penyewaan::create([
                'id_pelanggan' => $pelanggan->id,
                'id_motor' => $motor->id,
                'tgl_mulai' => $start, // Use Carbon object for consistency
                'tgl_kembali' => $end, // Use Carbon object for consistency
                'total_biaya' => $totalBiaya,
                'status_sewa' => 'Booking',
            ]);

            // 6. Create Detail Sewa
            foreach ($itemsData as $data) {
                DetailSewa::create([
                    'id_penyewaan' => $penyewaan->id,
                    'id_tambahan' => $data['id_tambahan'],
                    'jumlah' => $data['jumlah'],
                    'subtotal_harga' => $data['subtotal_harga'],
                ]);
            }

            DB::commit();

            return redirect()->route('booking.success', $penyewaan->id);
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();
            throw $e;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Booking Failure: Exception', ['msg' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return redirect()->route('booking.failed')->with([
                'reason' => 'Gagal memproses data: ' . $e->getMessage(),
                'id_motor' => $request->id_motor
            ]);
        }
    }

    public function success($id)
    {
        $penyewaan = Penyewaan::with(['motor', 'pelanggan', 'details.tambahan'])->findOrFail($id);
        return view('booking.success', compact('penyewaan'));
    }

    public function failed()
    {
        return view('booking.failed');
    }
}
