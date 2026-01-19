<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tambahan;
use Illuminate\Http\Request;

class TambahanController extends Controller
{
    public function index()
    {
        $items = Tambahan::all();
        return view('admin.tambahan.index', compact('items'));
    }

    public function create()
    {
        return view('admin.tambahan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_item' => 'required',
            'harga_satuan' => 'required|numeric',
            'stok_total' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarUrl = null;
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('tambahan-images', 'public');
            $gambarUrl = \Illuminate\Support\Facades\Storage::url($path);
        }

        Tambahan::create([
            'nama_item' => $request->nama_item,
            'harga_satuan' => $request->harga_satuan,
            'stok_total' => $request->stok_total,
            'gambar_url' => $gambarUrl,
        ]);

        return redirect()->route('tambahan.index')->with('success', 'Item berhasil ditambahkan');
    }

    public function edit(Tambahan $tambahan)
    {
        return view('admin.tambahan.edit', compact('tambahan'));
    }

    public function update(Request $request, Tambahan $tambahan)
    {
        $request->validate([
            'nama_item' => 'required',
            'harga_satuan' => 'required|numeric',
            'stok_total' => 'required|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['nama_item', 'harga_satuan', 'stok_total']);

        if ($request->hasFile('gambar')) {
            // Delete old image if exists and not a dummy/external URL
            if ($tambahan->gambar_url && \Illuminate\Support\Str::startsWith($tambahan->gambar_url, '/storage')) {
                $oldPath = str_replace('/storage/', 'public/', $tambahan->gambar_url);
                \Illuminate\Support\Facades\Storage::delete($oldPath);
            }

            $path = $request->file('gambar')->store('tambahan-images', 'public');
            $data['gambar_url'] = \Illuminate\Support\Facades\Storage::url($path);
        }

        $tambahan->update($data);

        return redirect()->route('tambahan.index')->with('success', 'Item diperbarui');
    }

    public function destroy(Tambahan $tambahan)
    {
        try {
            $tambahan->delete();
            return redirect()->route('tambahan.index')->with('success', 'Item dihapus');
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == "23000") {
                return redirect()->route('tambahan.index')->with('error', 'Gagal menghapus! Item ini sudah pernah disewa dan tercatat dalam riwayat transaksi.');
            }
            return redirect()->route('tambahan.index')->with('error', 'Terjadi kesalahan saat menghapus data.');
        }
    }
}
