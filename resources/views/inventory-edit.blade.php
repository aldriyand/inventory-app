@extends('template')
@section('content')
<div class="container-fluid p-0">
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">{{ ucfirst($mode) }} Item</h1>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('inventory.update', ['mode' => $mode]) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Barang</label>
                            <select class="form-select" name="id" id="id" required>
                                <option value="">Pilih Barang</option>
                                @foreach ($items as $i)
                                <option value="{{ $i->id }}">{{ $i->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah Item</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah"
                                required>
                        </div>
                        <input class="btn btn-success" type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection