@extends('admin.layouts.app')
@push('title')
    <title>
        EKAS | Payments </title>
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
                        <h4 class="card-title">All Payments</h4>
                        <div class="card-title-desc" style="display:inline;">
                            <div class="table-responsive">
                                <table class="table" id="blogs_table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Currencry</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Service</th>
                                            <th scope="col">Selected date by user</th>
                                            <th scope="col">Guidence Package</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($details as $key => $detail)
                                            <tr>
                                                <td>{{ $key += 1 }}</td>
                                                <td>
                                                   {{ $detail->name}}
                                                </td>
                                                <td>{{ $detail->email }}</td>
                                                <td>{{ $detail->amount }}</td>
                                                <td>{{ $detail->currency }}</td>
                                                <td>{{ $detail->status }}</td>
                                                <td>{{ $detail->phone }}</td>
                                                <td>{{ $detail->service }}</td>
                                                <td>{{ Carbon\Carbon::parse($detail->selected_date)->format('d, M, Y') }}</td>
                                                <td>{{ $detail->guidance_package }}</td>
                                                <td>
                                                    <a href="{{route('delete.payments' , $detail->id)}}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
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
