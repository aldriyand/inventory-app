@extends('template')
@section('content')
<div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>User</strong> Management</h1>
    <div class="row">
        <div class="col-12 col-lg-12 d-flex">
            <div class="card flex-fill">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">User List</h5>
                    <div>
                        <a href="#" class="btn btn-info"><i class="align-middle" data-feather="plus"></i> New</a>
                    </div>
                </div>
                <table class="table table-hover table-striped my-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $i)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $i->username }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection