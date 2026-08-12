<?php

namespace App\Http\Controllers;

use App\Http\Requests\Jenis\StoreRequest;
use App\Http\Requests\Jenis\UpdateRequest;
use App\Http\Requests\SearchRequest;
use App\Models\Jenis;

class JenisController extends Controller
{
    public function index(SearchRequest $request)
    {
        $keyword = $request->input('search');

        $jenis = Jenis::query()
            ->withCount('produk')
            ->when($keyword, function ($q) use ($keyword) {
                $q->where('nama_jenis', 'like', "%{$keyword}%");
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('jenis.index', compact('jenis'));
    }

    public function create()
    {
        return view('jenis.create');
    }

    public function store(StoreRequest $request)
    {
        Jenis::create($request->validated());

        return redirect()
            ->route('admin.jenis.index')
            ->with('success', 'Jenis produk berhasil ditambahkan');
    }

    public function edit(Jenis $jenis)
    {
        return view('jenis.edit', compact('jenis'));
    }

    public function update(UpdateRequest $request, Jenis $jenis)
    {
        $jenis->update($request->validated());

        return redirect()
            ->route('admin.jenis.index')
            ->with('success', 'Jenis produk berhasil diupdate');
    }

    public function destroy(Jenis $jenis)
    {
        if ($jenis->produk()->exists()) {
            return redirect()
                ->route('admin.jenis.index')
                ->with('errors', 'Jenis tidak bisa dihapus karena masih dipakai produk');
        }

        $jenis->delete();

        return redirect()
            ->route('admin.jenis.index')
            ->with('success', 'Jenis produk berhasil dihapus');
    }
}