<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use App\Models\Penyewaan;
use App\Models\Pembayaran;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistics
        $totalMotor = Motor::count();
        $motorTersedia = Motor::where('status_motor', 'Tersedia')->count();

        $penyewaanAktif = Penyewaan::whereIn('status_sewa', ['Booking', 'Proses Verifikasi', 'Aktif'])->count();

        $pendingPembayaran = Pembayaran::where('status_pembayaran', 'Pending')->count();

        $pendapatanBulanIni = Pembayaran::where('status_pembayaran', 'Lunas')
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('jumlah_bayar');

        // Recent bookings
        $recentBookings = Penyewaan::with(['motor', 'pelanggan'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalMotor',
            'motorTersedia',
            'penyewaanAktif',
            'pendingPembayaran',
            'pendapatanBulanIni',
            'recentBookings'
        ));
    }
}
