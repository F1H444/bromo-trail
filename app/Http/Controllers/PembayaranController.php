<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Penyewaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    public function create($id)
    {
        $penyewaan = Penyewaan::with('motor')->findOrFail($id);

        // Prevent payment if already paid or in verification
        if (in_array($penyewaan->status_sewa, ['Proses Verifikasi', 'Aktif', 'Selesai'])) {
            return redirect()->route('booking.success', $penyewaan->id)
                ->with('error', 'Pesanan ini sedang dalam verifikasi atau sudah selesai.');
        }

        return view('pembayaran.create', compact('penyewaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_penyewaan' => 'required|exists:penyewaan,id',
            'metode_bayar' => 'required|string',
            'jumlah_bayar' => 'required|numeric|min:0',
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'tgl_bayar' => 'required|date',
        ]);

        $penyewaan = Penyewaan::findOrFail($request->id_penyewaan);

        // Verify that payment matches booking total exactly
        if ((float) $request->jumlah_bayar !== (float) $penyewaan->total_biaya) {
            return back()->withErrors(['jumlah_bayar' => 'Jumlah bayar tidak sesuai dengan tagihan booking.'])->withInput();
        }

        // Handle File Upload
        $path = null;
        if ($request->hasFile('bukti_bayar')) {
            // Define unique filename
            $filename = 'bukti_' . time() . '_' . $penyewaan->id . '.' . $request->bukti_bayar->extension();

            // Move file to public/bukti_bayar
            $request->bukti_bayar->move(public_path('bukti_bayar'), $filename);

            // Set URL path
            $path = 'bukti_bayar/' . $filename;
        }

        // Create Pembayaran Record
        Pembayaran::create([
            'id_penyewaan' => $penyewaan->id,
            'tgl_bayar' => $request->tgl_bayar,
            'jumlah_bayar' => $request->jumlah_bayar,
            'metode_bayar' => $request->metode_bayar,
            'bukti_bayar_url' => $path,
            'status_pembayaran' => 'Menunggu Verifikasi',
            // Catatan removed from UI as per user request
        ]);

        // Update Penyewaan Status
        $penyewaan->update([
            'status_sewa' => 'Proses Verifikasi',
        ]);

        return redirect()->route('pembayaran.success', $penyewaan->id)
            ->with('success', 'Bukti pembayaran berhasil dikirim! Menunggu verifikasi admin.');
    }

    public function success($id)
    {
        $penyewaan = Penyewaan::with(['motor', 'pembayaran'])->findOrFail($id);
        return view('pembayaran.success', compact('penyewaan'));
    }
}
