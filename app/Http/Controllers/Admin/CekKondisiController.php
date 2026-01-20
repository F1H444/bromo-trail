<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CekKondisi;
use App\Models\Penyewaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            'foto_bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // Max 10MB
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto_bukti')) {
            $path = $request->file('foto_bukti')->store('cek_kondisi', 'public');
            $fotoPath = Storage::url($path);
        }

        CekKondisi::create([
            'id_penyewaan' => $request->id_penyewaan,
            'id_admin' => Auth::guard('admin')->id() ?? 1,
            'waktu_cek' => $request->tipe_cek,
            'catatan_kondisi_fisik' => $request->kondisi_fisik,
            'foto_kondisi' => $fotoPath,
        ]);

        return redirect()->route('cek-kondisi.index')->with('success', 'Data cek kondisi berhasil disimpan');
    }
}
