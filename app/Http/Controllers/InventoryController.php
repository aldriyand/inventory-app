<?php

namespace App\Http\Controllers;

use App\Models\Inventory as Inven;
use App\Models\Transaction;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index(Request $request)
    {
        $items = Inven::all();

        return view('inventory', [
            'items' => $items
        ]);
    }

    public function create()
    {
        return view('inventory-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
        ]);

        Inven::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
        ]);

        return redirect()->intended('inventory')->withSuccess('Item has been added successfully.');
    }

    public function edit($mode)
    {
        $items = Inven::all();

        return view('inventory-edit', ['mode' => $mode, 'items' => $items]);
    }

    public function update(Request $request, $mode)
    {
        $request->validate([
            'id' => 'required',
            'jumlah' => 'required',
        ]);

        $item = Inven::findOrFail($request->id);

        $stok = $item->stok;
        if ($mode == 'purchase') {
            $stok += $request->jumlah;
        } elseif ($mode == 'sale') {
            $stok -= $request->jumlah;
        }

        $trans = Transaction::create([
            'kode_transaksi' => $this->generateKode(),
            'inventory_id' => $item->id,
            'tipe' => $mode,
            'jumlah' => $request->jumlah,
            'harga' => $request->jumlah * $item->harga,
            'created_at' => now()
        ]);

        $item->update([
            'stok' => $stok,
            'updated_at' => now()
        ]);

        return redirect()->route('inventory.slip', ['mode' => $mode, 'id' => $trans->id]);
    }

    function generateKode()
    {
        $count = Transaction::all()->count();

        $kode = "0000" . ($count + 1);
        return substr($kode, strlen($kode) - 4, 5);
    }

    public function delete($id)
    {
        Inven::find($id)->delete();

        return redirect()->intended('inventory')->withSuccess('Item has been deleted successfully.');
    }

    public function slip($mode, $id)
    {
        $trans = Transaction::findOrFail($id);
        $item = Inven::findOrFail($trans->inventory_id);

        return view('slip', [
            'mode' => $mode,
            'trans' => $trans,
            'item' => $item
        ]);
    }
}
