<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // kirim data ke dashboard
    public function admin()
    {
        $jumlahProduk = Produk::count();
        $jumlahTransaksi = Transaksi::count();
        $totalUang = 'Rp ' . number_format(Transaksi::sum('total_harga'), 0, ',', '.');
        $totalUser = User::count();

        return view('admin.dashboard', compact('jumlahProduk', 'jumlahTransaksi', 'totalUang', 'totalUser'));
    }

    public function kasir()
    {
        $jumlahProduk = Produk::count();
        $jumlahTransaksi = Transaksi::count();
        $totalUang = 'Rp ' . number_format(Transaksi::sum('total_harga'), 0, ',', '.');
        $totalUser = User::count();

        return view('kasir.dashboard', compact('jumlahProduk', 'jumlahTransaksi', 'totalUang', 'totalUser'));
    }
}
