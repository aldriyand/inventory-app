@extends('template')
@section('content')
<div class="container-fluid p-0">
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">{{ ucfirst($mode) }} Slip</h1>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-sm table-borderless table-striped">
                        <tr>
                            <td>Kode Transaksi</td>
                            <td>{{ $trans->kode_transaksi }}</td>
                        </tr>
                        <tr>
                            <td>Nama Barang</td>
                            <td>{{ $item->nama }}</td>
                        </tr>
                        <tr>
                            <td>Jumlah {{ $mode == 'purchase' ? 'Pembelian' : 'Penjualan' }}</td>
                            <td>{{ $trans->jumlah }}</td>
                        </tr>
                        <tr>
                            <td>Harga Satuan</td>
                            <td>Rp. {{ number_format($item->harga,0,'.',',') }}</td>
                        </tr>
                        <tr>
                            <td>Total {{ $mode == 'purchase' ? 'Pembelian' : 'Penjualan' }}</td>
                            <td>Rp. {{ number_format($trans->harga,0,'.',',') }}</td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <a href="{{ route('inventory') }}" class="btn btn-success">OK</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection