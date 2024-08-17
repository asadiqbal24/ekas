@extends('admin.layouts.app')
@push('title')
    <title>
        EKAS | All Users </title>
@endpush
@section('head-scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">
@endsection
@section('content')
<div class="container-fluid">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success : </strong> {{ session('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">All Userse</h4>
                        <div class="card-title-desc" style="display:inline;">
                            <div class="table-responsive">
                                <table class="table" id="blogs_table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Date & Time</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <td>{{ $key += 1 }}</td>
                                                <td>
                                                    @if (empty($user->username))
                                                        {{ $user->fname }} {{ $user->lname }}
                                                    @else
                                                        {{ $user->username }}
                                                    @endif
                                                </td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->datetime }}</td>
                                                <td>
                                                    <a href="admin/delete/user/{{ $user->id }}"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                                                    @if ($user->is_admin == 0)
                                                        <a href="admin/make/admin/{{ $user->id }}"
                                                            class="btn btn-sm btn-success"
                                                            onclick="return confirm('Are you sure you want to do this?')">Make
                                                            Admin</a>
                                                    @else
                                                        <a href="admin/make/admin/{{ $user->id }}"
                                                            class="btn btn-sm btn-secondary"
                                                            onclick="return confirm('Are you sure you want to do this?')">Remove
                                                            Admin</a>
                                                    @endif
                                                    @if(empty($user->email_verified_at))
                                                    <a href="admin/verify/user/{{ $user->id }}"
                                                        class="btn btn-sm btn-primary"
                                                        onclick="return confirm('Are you sure you want to do this?')">Verify</a>
                                                    @else
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-sm btn-primary" disabled>Verified</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#blogs_table');
    </script>
@endsection
