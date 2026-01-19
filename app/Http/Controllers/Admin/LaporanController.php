<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Penyewaan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->input('start_date', Carbon::now()->startOfMonth()->toDateString());
        $endDate = $request->input('end_date', Carbon::now()->endOfMonth()->toDateString());

        // Pendapatan logic (sum pembayaran lunas)
        $pendapatan = Pembayaran::where('status_pembayaran', 'Lunas')
            ->whereBetween('tgl_bayar', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->sum('jumlah_bayar');

        // Total Transaksi (jumlah penyewaan)
        $totalSewa = Penyewaan::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->count();

        // Breakdown status
        $statusStats = Penyewaan::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->selectRaw('status_sewa, count(*) as total')
            ->groupBy('status_sewa')
            ->pluck('total', 'status_sewa');

        // Detail Transaksi
        $transaksi = Penyewaan::with(['pelanggan', 'motor', 'pembayaran'])
            ->whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.laporan.index', compact('startDate', 'endDate', 'pendapatan', 'totalSewa', 'statusStats', 'transaksi'));
    }
}
