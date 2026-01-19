<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CekKondisi;
use App\Models\Penyewaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CekKondisiController extends Controller
{
    public function index()
    {
        $checks = CekKondisi::with(['penyewaan.pelanggan', 'penyewaan.motor', 'admin'])
            ->orderBy('id', 'desc')
            ->get();

        return view('admin.cek_kondisi.index', compact('checks'));
    }

    public function create(Request $request)
    {
        $penyewaan = null;
        if ($request->has('id_penyewaan')) {
            $penyewaan = Penyewaan::with(['pelanggan', 'motor'])->find($request->id_penyewaan);
        }

        return view('admin.cek_kondisi.create', compact('penyewaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_penyewaan' => 'required|exists:penyewaan,id',
            'tipe_cek' => 'required|in:Ambil,Kembali',
            'kondisi_fisik' => 'required',
            'foto_bukti_url' => 'nullable|url',
        ]);

        CekKondisi::create([
            'id_penyewaan' => $request->id_penyewaan,
            'id_admin' => Auth::guard('admin')->id() ?? 1, // Fallback to 1 for testing if not fully authed
            'waktu_cek' => $request->tipe_cek,
            'catatan_kondisi_fisik' => $request->kondisi_fisik,
            'foto_kondisi' => $request->foto_bukti_url,
        ]);

        return redirect()->route('cek-kondisi.index')->with('success', 'Data cek kondisi berhasil disimpan');
    }
}
