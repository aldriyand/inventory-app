@extends('template')
@section('content')
<div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>Inventory</strong> Management</h1>
    <div class="row">
        <div class="col-12 col-lg-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Item List</h5>
                    <div>
                        <a href="{{ route('inventory.create') }}" class="btn btn-info"><i class="align-middle"
                                data-feather="plus"></i> New</a>
                    </div>
                </div>
                <table class="table table-hover table-striped my-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $key => $i)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $i->id }}</td>
                            <td>{{ $i->nama }}</td>
                            <td>{{ $i->harga }}</td>
                            <td>{{ $i->stok }}</td>
                            <td>
                                <form action="{{ route('inventory.delete', ['id' => $i->id]) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit"
                                        onclick="return confirm('Are you sure want to delete this record?')"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-trash align-middle">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection