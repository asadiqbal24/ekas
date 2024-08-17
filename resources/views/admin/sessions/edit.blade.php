@extends('admin.layouts.app')
@push('title')
    <title>EKAS | Edit Blog </title>
@endpush
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong>Success : </strong> {{ session('message') }}
        </div>
    @endif
    <form method="post" action="{{ route('session.update' , ['id' => $session->id  , 'source' => $itemSource]) }}" enctype="multipart/form-data">
        @csrf
        @include('admin.sessions.fields')
    </form>
@endsection
