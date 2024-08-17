@extends('admin.layouts.app')
@push('title')
    <title>EKAS | All Feedbacks </title>
@endpush
@section('head-scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">

    <style>
        .dt-buttons,
        .dt-search {
            margin-top: 10px;
        }
    </style>
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
                        <h4 class="card-title">All Feedbacks</h4>
                        <div class="card-title-desc" style="display:inline;">
                            <div class="table-responsive">
                                <table class="table" id="blogs_table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Review</th>
                                            <th scope="col">Name</th>
                                            <th scope="col" style="width: 270px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($feedbacks as $key => $feedback)
                                            <tr>
                                                <td>{{$key += 1}}</td>
                                                <td><img src="{{Storage::url($feedback->image)}}" alt="Image" width="30px"></td>
                                                <td>{{ $feedback->title }}</td>
                                                <td>{{ Str::limit($feedback->review , 20) }}</td>
                                                <td>{{ $feedback->name }}</td>
                                                <td>
                                                    <a href="admin/delete/feedback/{{ $feedback->id }}"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                                                    <a href="admin/view/feedback/{{ $feedback->id }}"
                                                        class="btn btn-sm btn-primary">View</a>
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