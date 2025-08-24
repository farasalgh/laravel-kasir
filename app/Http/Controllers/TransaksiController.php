<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //kasir bisa lihat semua transaksi dia sendiri
        if(Auth::user()->role === 'kasir') {
            $transaksis = Transaksi::where('user_id', Auth::id())->get();
        } else {
            //admin bisa lihat semua transaksi
            $transaksis =Transaksi::all();
        }

        return view('transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // form tambah transaksi
        $produks = Produk::all();
        return view('transaksi.create', compact('produks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        $produk = Produk::findOrFail($request->produk_id);

        $total = $produk->harga * $request->jumlah;

        Transaksi::create([
            'user_id' => Auth::id(),
            'produk_id' => $produk->id,
            'jumlah' => $request->jumlah,
            'total_harga' => $total,
        ]);

        return redirect()->route('transaksi.index')->with('success','Transaksi berhasil dicatat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
