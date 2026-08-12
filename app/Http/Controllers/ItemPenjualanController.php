<?php

namespace App\Http\Controllers;

use App\Models\ItemPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ItemPenjualanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:produk,id',
            'quantity'   => 'required|integer|min:1'
        ]);

        $sale = Penjualan::where('user_id', Auth::id())
            ->where('status', 'OPEN')
            ->firstOrFail();

        DB::transaction(function () use ($request, $sale) {

            $product = Produk::lockForUpdate()->findOrFail($request->product_id);

            // cek stok
            if ($product->stok < $request->quantity) {
                abort(400, 'Stok tidak mencukupi');
            }

            // kurangi stok
            $product->decrement('stok', $request->quantity);

            // cari item
            $item = ItemPenjualan::where('penjualan_id', $sale->id)
                ->where('produk_id', $product->id)
                ->lockForUpdate()
                ->first();

            if ($item) {
                $item->kuantitas += $request->quantity;
            } else {
                $item = new ItemPenjualan([
                    'penjualan_id' => $sale->id,
                    'produk_id'    => $product->id,
                    'kuantitas'    => $request->quantity,
                    'harga_satuan' => $product->harga_jual,
                ]);
            }

            $item->subtotal = $item->kuantitas * $item->harga_satuan;
            $item->save();

            $sale->update([
                'total_pembayaran' => $sale->itemPenjualan()->sum('subtotal')
            ]);
        });

        return back();
    }

    public function update(Request $request, ItemPenjualan $itempenjualan)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        DB::transaction(function () use ($request, $itempenjualan) {

            $produk = $itempenjualan->produk()->lockForUpdate()->first();

            $selisih = $request->quantity - $itempenjualan->kuantitas;

            if ($selisih > 0) {
                if ($produk->stok < $selisih) {
                    abort(400, 'Stok tidak mencukupi');
                }
                $produk->decrement('stok', $selisih);
            }

            if ($selisih < 0) {
                $produk->increment('stok', abs($selisih));
            }

            $itempenjualan->update([
                'kuantitas' => $request->quantity,
                'subtotal'  => $request->quantity * $itempenjualan->harga_satuan
            ]);

            $itempenjualan->penjualan->update([
                'total_pembayaran' =>
                    $itempenjualan->penjualan->itemPenjualan()->sum('subtotal')
            ]);
        });

        return back();
    }

    public function destroy(ItemPenjualan $itempenjualan)
    {
        $this->authorize('delete', $itempenjualan);
        
        DB::transaction(function () use ($itempenjualan) {

            $produk = $itempenjualan->produk;
            $sale   = $itempenjualan->penjualan;

            // kembalikan stok
            $produk->increment('stok', $itempenjualan->kuantitas);

            // hapus item
            $itempenjualan->delete();

            // update total
            $sale->update([
                'total_pembayaran' => $sale->itemPenjualan()->sum('subtotal')
            ]);
        });

        return back();
    }
}