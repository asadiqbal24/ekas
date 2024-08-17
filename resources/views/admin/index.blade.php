@extends('admin.layouts.app')

@push('title')
    <title>EKAS | Dashboard </title>
@endpush

@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4>Dashboard</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">EKAS</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="state-information d-none d-sm-block">

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-6 col-sm-6">
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-briefcase-check float-end"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3 font-size-16 text-white">Courses</h6>
                            <h2 class="mb-4 text-white">{{$courses}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6">
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-briefcase-check float-end"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3 font-size-16 text-white">Feedbacks</h6>
                            <h2 class="mb-4 text-white">{{$feedbacks}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6">
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-briefcase-check float-end"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3 font-size-16 text-white">Blogs</h6>
                            <h2 class="mb-4 text-white">{{$blogs}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6">
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-briefcase-check float-end"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3 font-size-16 text-white">Subscribers</h6>
                            <h2 class="mb-4 text-white">{{$subscribers}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6">
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="mdi mdi-briefcase-check float-end"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3 font-size-16 text-white">Users</h6>
                            <h2 class="mb-4 text-white">{{$users}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
