@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Transaksi</h2>

    <form action="{{ route('transaksi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Pilih Produk</label>
            <select name="produk_id" class="form-control" id="" required>
                <option value="">-- Pilih produk --</option>
                @foreach($produks as $produk)
                    <option value="{{ $produk->id }}">{{ $produk->name }} - Rp {{ number_format($produk->harga,0,',','.') }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection