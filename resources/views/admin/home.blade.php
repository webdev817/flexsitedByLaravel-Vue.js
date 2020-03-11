@extends('layouts.admin')

@section('body')

<div class="slim-pageheader">
    <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
    <h6 class="slim-pagetitle">Welcome back, {{ Auth::user()->name }}</h6>
</div><!-- slim-pageheader -->

<div class="row row-xs">
    <div class="col-sm-6 col-lg-3">
        <div class="card card-status">
            <div class="media">
                <i class="icon ion-ios-people-outline tx-purple"></i>
                <div class="media-body">
                    <h1>{{ $usersCount }}</h1>
                    <p>Total Users</p>
                </div><!-- media-body -->
            </div><!-- media -->
        </div><!-- card -->
    </div><!-- col-3 -->
    <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
        <div class="card card-status">
            <div class="media">
                <i class="icon ion-ios-bookmarks-outline tx-teal"></i>
                <div class="media-body">
                    <h1>17,583</h1>
                    <p>Total bookmarks</p>
                </div><!-- media-body -->
            </div><!-- media -->
        </div><!-- card -->
    </div><!-- col-3 -->
    <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
        <div class="card card-status">
            <div class="media">
                <i class="icon ion-ios-cloud-upload-outline tx-primary"></i>
                <div class="media-body">
                    <h1>61,119</h1>
                    <p>Total uploads</p>
                </div><!-- media-body -->
            </div><!-- media -->
        </div><!-- card -->
    </div><!-- col-3 -->
    <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
        <div class="card card-status">
            <div class="media">
                <i class="icon ion-ios-analytics-outline tx-pink"></i>
                <div class="media-body">
                    <h1>2,942</h1>
                    <p>Total analytics</p>
                </div><!-- media-body -->
            </div><!-- media -->
        </div><!-- card -->
    </div><!-- col-3 -->
</div><!-- row -->

@endsection
