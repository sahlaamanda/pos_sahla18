<?php

namespace App\Http\Controllers;

use App\Http\Requests\Produk\StoreRequest;
use App\Http\Requests\Produk\UpdateRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Jenis;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index(SearchRequest $request)
    {
        $keyword = $request->input('search');

        $produk = Produk::query()
            ->with('jenis')
            ->when($keyword, function ($q) use ($keyword) {
                $q->where('nama', 'like', "%{$keyword}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        $jenis = Jenis::orderBy('nama_jenis', 'asc')->get();

        $produk = null;

        return view('produk.create', compact('jenis', 'produk'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $produkData = [
            'user_id'    => auth()->id(),
            'nama'       => $data['nama'],
            'jenis_id'   => $data['jenis_id'],
            'harga_beli' => $data['harga_beli'],
            'harga_jual' => $data['harga_jual'],
            'stok'       => $data['stok'],
            'foto'       => null,
        ];

        if ($request->hasFile('foto')) {
            $produkData['foto'] = $request
                ->file('foto')
                ->store('products', 'public');
        }

        Produk::create($produkData);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit(Produk $produk)
    {
        $jenis = Jenis::orderBy('nama_jenis', 'asc')->get();

        return view('produk.edit', compact('produk', 'jenis'));
    }

    public function update(UpdateRequest $request, Produk $produk)
    {
        $data = $request->validated();

        $updateData = [
            'nama'       => $data['nama'],
            'jenis_id'   => $data['jenis_id'],
            'harga_beli' => $data['harga_beli'],
            'harga_jual' => $data['harga_jual'],
            'stok'       => $data['stok'],
        ];

        if ($request->hasFile('foto')) {

            if (
                $produk->foto &&
                Storage::disk('public')->exists($produk->foto)
            ) {
                Storage::disk('public')->delete($produk->foto);
            }

            $updateData['foto'] = $request
                ->file('foto')
                ->store('products', 'public');
        }

        $produk->update($updateData);

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil diupdate');
    }

    public function destroy(Produk $produk)
    {
        if (
            $produk->foto &&
            Storage::disk('public')->exists($produk->foto)
        ) {
            Storage::disk('public')->delete($produk->foto);
        }

        $produk->delete();

        return redirect()
            ->route('admin.produk.index')
            ->with('success', 'Produk berhasil dihapus');
    }
}