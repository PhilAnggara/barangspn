<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function store(Request $request, $id)
    {
        $transaksi = Transaksi::create([
            'id_user' => Auth::user()->id,
            'id_barang' => $id,
        ]);
        
        return redirect()->back();
    }

    public function permintaan()
    {
        $items = Transaksi::where('approve', false)->get();
        // dd($items);
        return view('layouts.permintaan', [
            'items' => $items,
        ]);
    }

    public function approve($id)
    {
        $item = Transaksi::find($id);
        $item->approve = true;
        $item->save();

        $barang = Barang::find($id);
        $barang->tersedia = false;
        $barang->save();
        
        return redirect()->back();
    }
}
