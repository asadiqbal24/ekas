@extends('admin.layouts.app')

@push('title')
    <title>EKAS | User Settings </title>
@endpush
@section('content')
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                <strong>Success:</strong> {{ session('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger" role="alert">
                <strong>Success:</strong> {{ session('error') }}
            </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Add logo</h4>
                <form enctype="multipart/form-data" action="{{ route('settings.update') }}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Email</label>
                        <div class="col-md-10">
                            <input class="form-control" type="email" name="email"
                                placeholder="Email" value="{{Auth::user()->email}}">
                        </div>
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Current Password</label>
                        <div class="col-md-10">
                            <input class="form-control" type="password" name="current_password"
                                placeholder="Current Password">
                        </div>
                        @error('current_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">New Password</label>
                        <div class="col-md-10">
                            <input class="form-control" type="password" name="password" placeholder="New Password">
                        </div>
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label for="example-text-input" class="col-md-2 col-form-label">Confirm Password</label>
                        <div class="col-md-10">
                            <input class="form-control" type="password" name="password_confirmation"
                                placeholder="Confirm Password">
                        </div>
                        @error('password_confirmatiom')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-primary w-md">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
