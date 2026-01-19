<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MotorController extends Controller
{
    public function index()
    {
        $motors = Motor::all();
        return view('admin.motor.index', compact('motors'));
    }

    public function create()
    {
        return view('admin.motor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_motor' => 'required',
            'harga_sewa' => 'required|numeric',
            'status_ketersediaan' => 'required',
            'deskripsi' => 'nullable|string|max:5000',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Changed to file validation
        ]);

        $gambarUrl = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('motor-images', 'public');
            $gambarUrl = Storage::url($path);
        }

        Motor::create([
            'merk_tipe' => $request->nama_motor,
            'slug' => \Illuminate\Support\Str::slug($request->nama_motor . '-' . rand(1000, 9999)),
            'plat_nomor' => 'N ' . rand(1000, 9999) . ' XYZ',
            'harga_sewa_per_hari' => $request->harga_sewa,
            'status_motor' => $request->status_ketersediaan,
            'gambar_url' => $gambarUrl,
            'deskripsi_singkat' => $request->deskripsi,
        ]);

        return redirect()->route('motor.index')->with('success', 'Motor berhasil ditambahkan');
    }

    public function edit(Motor $motor)
    {
        return view('admin.motor.edit', compact('motor'));
    }

    public function update(Request $request, Motor $motor)
    {
        $request->validate([
            'nama_motor' => 'required',
            'harga_sewa' => 'required|numeric',
            'status_ketersediaan' => 'required',
            'deskripsi' => 'nullable|string|max:5000',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'merk_tipe' => $request->nama_motor,
            'harga_sewa_per_hari' => $request->harga_sewa,
            'status_motor' => $request->status_ketersediaan,
            'deskripsi_singkat' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            // Delete old image if exists and not a dummy/external URL
            if ($motor->gambar_url && \Illuminate\Support\Str::startsWith($motor->gambar_url, '/storage')) {
                $oldPath = str_replace('/storage/', 'public/', $motor->gambar_url);
                Storage::delete($oldPath);
            }

            $path = $request->file('gambar')->store('motor-images', 'public');
            $data['gambar_url'] = Storage::url($path);
        }

        $motor->update($data);

        return redirect()->route('motor.index')->with('success', 'Data motor diperbarui');
    }

    public function destroy(Motor $motor)
    {
        try {
            $motor->delete();
            return redirect()->route('motor.index')->with('success', 'Motor dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == "23000") {
                return redirect()->route('motor.index')->with('error', 'Gagal menghapus! Motor ini tercatat dalam riwayat penyewaan.');
            }
            return redirect()->route('motor.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
