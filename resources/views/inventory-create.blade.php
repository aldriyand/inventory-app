@extends('template')
@section('content')
<div class="container-fluid p-0">
    <div class="mb-3">
        <h1 class="h3 d-inline align-middle">Add Item</h1>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form enctype="multipart/form-data" action="{{ route('inventory.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="jnama" class="form-label">Nama</label>
                            <input type="text" maxlength="200" class="form-control" name="nama" id="nama"
                                placeholder="Nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga" placeholder="Harga"
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