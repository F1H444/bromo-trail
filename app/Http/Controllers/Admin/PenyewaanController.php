<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penyewaan;
use Illuminate\Http\Request;

class PenyewaanController extends Controller
{
    public function index()
    {
        $penyewaans = Penyewaan::with(['pelanggan', 'motor', 'pembayaran'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.penyewaan.index', compact('penyewaans'));
    }

    public function show($id)
    {
        $penyewaan = Penyewaan::with(['pelanggan', 'motor', 'details', 'pembayaran'])->findOrFail($id);
        return view('admin.penyewaan.show', compact('penyewaan'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_sewa' => 'required',
        ]);

        $penyewaan = Penyewaan::findOrFail($id);
        $penyewaan->status_sewa = $request->status_sewa;
        $penyewaan->save();

        return redirect()->back()->with('success', 'Status penyewaan diperbarui');
    }
}
