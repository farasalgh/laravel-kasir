@extends('layouts.app')


@section('content')
<div class="col-12">
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-dark shadow-dark border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Transaction table</h6>
            </div>
        </div>
        <div class="m-3 mb-2">
            <a href="{{ route('transaksi.create') }}" class="btn btn-primary mb-3">Tambah Transaksi</a>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible text-white">{{ session('success') }}
                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Produk</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total Harga</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kasir</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaksis as $trx)
                        <tr>
                            <td class="align-middle text-sm">{{ $loop->iteration }}</td>
                            <td class="align-middle text-sm">{{ optional($trx->produk)->name ?? '-' }}</td>
                            <td class="align-middle text-sm">{{ $trx->jumlah }}</td>
                            <td class="align-middle text-center text-sm">{{ number_format($trx->total_harga, 0, ',', '.') }}</td>
                            <td class="align-middle text-center">{{ $trx->kasir->name }}</td>
                            <td class="align-middle text-center">{{ $trx->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Tidak ada transaksi.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection