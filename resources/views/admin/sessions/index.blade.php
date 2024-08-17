@extends('admin.layouts.app')
@push('title')
    <title>EKAS | All Sessions </title>
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
                        <h4 class="card-title">All Sessions</h4>
                        <div class="card-title-desc" style="display:inline;">
                            <div class="table-responsive">
                                <table class="table" id="blogs_table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Minutes</th>
                                            <th scope="col">Session</th>
                                            <th scope="col">1st</th>
                                            <th scope="col">2nd</th>
                                            <th scope="col">3rd</th>
                                            <th scope="col">4th</th>
                                            <th scope="col">5th</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sessions as $key => $session)
                                            <tr>
                                                <td>{{ $key += 1 }}</td>
                                                <td>{{ $session['price'] }}</td>
                                                <td>{{ $session['minutes'] }}</td>
                                                <td>{{ $session["session"] }}</td>
                                                <td>{{ $session["ist"] }}</td>
                                                <td>{{ $session['second'] }}</td>
                                                <td>{{ $session['third'] }}</td>
                                                <td>{{ $session['fourth'] }}</td>
                                                <td>{{ $session['five'] }}</td>
                                                <td>
                                                    <a href="admin/delete/session/{{ $session['id'] }}/{{ $session['source']}}"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this?')"><i class="fa fa-trash"></i></a>
                                                    <a href="admin/edit/session/{{ $session['id'] }}/{{ $session['source']}}"
                                                        class="btn btn-sm btn-primary"
                                                        ><i class="fa fa-edit"></i></a>
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
