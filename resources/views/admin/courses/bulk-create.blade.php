@extends('admin.layouts.app')
@push('title')
    <title>EKAS | All Courses </title>
@endpush
@section('head-scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">
@endsection
@section('content')
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success : </strong> {{ session('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Import Data</h4>
                        <div class="card-title-desc" style="display:inline;">
                            <form method="POST" enctype="multipart/form-data" action="{{ route('import.excel.data') }}">
                                @csrf
                                <div class="my-3">
                                    <input type="file" class="form-control" name="file" accept=".xlsx , .csv">
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-success">Submit</button>
                                    <a href="{{asset('courses.xlsx')}}" class="btn btn-sm btn-primary" download="sample file">Sample File</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
