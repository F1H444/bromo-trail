<?php

namespace App\Http\Controllers;

use App\Models\Penyewaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $pelanggan = Auth::guard('pelanggan')->user();

        $bookings = Penyewaan::with(['motor', 'pembayaran'])
            ->where('id_pelanggan', $pelanggan->id)
            ->orderBy('created_at', 'desc')
            ->get();

        $activeBookings = $bookings->whereIn('status_sewa', ['Booking', 'Proses Verifikasi', 'Aktif'])->count();
        $completedBookings = $bookings->where('status_sewa', 'Selesai')->count();

        return view('dashboard.index', compact('pelanggan', 'bookings', 'activeBookings', 'completedBookings'));
    }

    public function bookings()
    {
        $pelanggan = Auth::guard('pelanggan')->user();

        $bookings = Penyewaan::with(['motor', 'pembayaran'])
            ->where('id_pelanggan', $pelanggan->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.bookings', compact('bookings'));
    }

    public function showBooking($id)
    {
        $pelanggan = Auth::guard('pelanggan')->user();

        $booking = Penyewaan::with(['motor', 'pembayaran', 'details.tambahan', 'cekKondisi'])
            ->where('id_pelanggan', $pelanggan->id)
            ->findOrFail($id);

        return view('dashboard.bookings-show', compact('booking'));
    }

    public function profile()
    {
        $pelanggan = Auth::guard('pelanggan')->user();
        return view('dashboard.profile', compact('pelanggan'));
    }

    public function updateProfile(Request $request)
    {
        $pelanggan = Auth::guard('pelanggan')->user();

        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'no_wa' => ['required', 'string', 'max:20', 'regex:/^08[0-9]{8,13}$/'],
            'no_ktp_sim' => 'required|string|max:50',
            'alamat_asal' => 'nullable|string',
        ]);

        $pelanggan->update($request->only(['nama_lengkap', 'no_wa', 'no_ktp_sim', 'alamat_asal']));

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
