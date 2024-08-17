@extends('admin.layouts.app')
@push('title')
    <title>EKAS | Add Course Detail </title>
@endpush
<style>
    .admin-pass-eye {
        position: absolute;
        right: 16px !important;
        top: 36%;
        cursor: pointer;
    }
</style>
@section('content')
<div class="card">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>Success : </strong> {{ session('message') }}
            </div>
        @endif
        <div class="card-body">
            <h4 class="card-title">{{ $heading }}</h4>
            <p class="card-title-desc">{{ $sub_heading }}</p>
            <form action="admin/store/user" method="post">
                @csrf
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Enter Email</label>
                    <div class="col-md-10">
                        <input class="form-control" type="email" name="email" placeholder="Enter Email....">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Enter Username</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="username" placeholder="Enter username...."
                            value="">
                        @error('username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Enter Password</label>
                    <div class="col-md-10" style="position: relative">
                        <input class="form-control" type="password" name="password" placeholder="Enter Password...."
                            value="" id="password">
                        <i class="fa fa-eye admin-pass-eye"></i>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary w-md">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('page-scripts')
    <script>
        $('.admin-pass-eye').on('click', function() {
            if($(this).hasClass('fa fa-eye')){
                $('#password').attr('type', 'text');
                $(this).removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }else{
                $('#password').attr('type', 'password');
                $(this).removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            }
        })
    </script>
@endsection
