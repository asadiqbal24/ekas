@extends('admin.layouts.app')
@push('title')
    <title>EKAS | View Feedback</title>
@endpush
@section('head-scripts')
@endsection
@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">View Feedbacks</h4> <br>
                        <div class="card-title-desc" >
                           <span>Author : </span> {{$feedback->name}}
                        </div>
                        <div class="card-title-desc">
                           <span>Ttile : </span> {{$feedback->title}}
                        </div>
                        <div class="card-title-desc">
                            <p>Iamge</p>
                           <img src="{{Storage::url($feedback->image)}}" alt="Image" width="300px">
                        </div>
                        <div class="card-title-desc">
                           <p>Review </p> {{$feedback->review}}
                        </div>
                        <div class="card-title-desc">
                           <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary">back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
