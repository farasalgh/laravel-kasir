@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Produk</h2>

    <form action="{{ route('produk.update', $produk->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>Nama Produk</label>
            <input type="text" name="name" value="{{ $produk->name }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" value="{{ $produk->harga }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" value="{{ $produk->stok }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection