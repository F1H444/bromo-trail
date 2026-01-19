<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with(['penyewaan.pelanggan', 'penyewaan.motor'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.pembayaran.index', compact('pembayarans'));
    }

    public function show($id)
    {
        $pembayaran = Pembayaran::with(['penyewaan.pelanggan', 'penyewaan.motor'])->findOrFail($id);
        return view('admin.pembayaran.show', compact('pembayaran'));
    }

    public function verify(Request $request, $id)
    {
        $request->validate([
            'status_pembayaran' => 'required|in:Lunas,Ditolak',
        ]);

        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->status_pembayaran = $request->status_pembayaran;
        $pembayaran->save();

        // Optional: Update status_sewa if payment is valid
        if ($request->status_pembayaran == 'Lunas') {
            $pembayaran->penyewaan->status_sewa = 'Aktif'; // Or 'Menunggu Diambil'
            $pembayaran->penyewaan->save();
        }

        return redirect()->route('pembayaran.index')->with('success', 'Status pembayaran diperbarui');
    }
}
