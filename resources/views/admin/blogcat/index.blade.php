@extends('admin.layouts.app')
@push('title')
    <title>EKAS | All Blog Categories </title>
@endpush
@section('head-scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">
@endsection
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Success : </strong> {{ session('message') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('blog.category.store') }}">
                            @csrf
                            <h4 class="card-title">{{ $heading }}</h4>
                            <p class="card-title-desc">{{ $sub_heading }}</p>
                            <div class="mb-3 row">
                                <label for="example-text-input" class="col-md-2 col-form-label">Enter Title</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="text" name="blogcategory"
                                        placeholder="Enter Name...." value="{{ $blog->blogcategory ?? '' }}">
                                    @error('blogcategory')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                                </div>
                            </div>
                        </form>
                        @if(!empty($blogs))
                        <h4 class="card-title">All Blog Categories</h4>
                        <div class="card-title-desc" style="display:inline;">
                            <div class="table-responsive">
                                <table class="table" id="blogs_table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $key => $blog)
                                            <tr>
                                                <td>{{ $key += 1 }}</td>
                                                <td>{{ $blog->blogcategory }}</td>
                                                <td>
                                                    <a href="admin/delete/blog/category/{{ $blog->id }}"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure you want to delete this?')">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @else
                        <h3 class="text-center mt-5">Blog categories not found.They'll listed here if found.</h3>
                        @endif
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
        $(document).on('click', '.auth-btn', function() {
            window.location.href = $(this).attr('href');
        })
    </script>
@endsection
