@extends('layouts.admin')

@section('body')

<div class="slim-pageheader">
    <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
    <h6 class="slim-pagetitle">Welcome back, {{ Auth::user()->name }}</h6>
</div>

<div class="row row-xs">
    <div class="col-sm-6 col-lg-3">
        <div class="card card-status">
            <div class="media">
                <i class="icon ion-ios-people-outline tx-purple"></i>
                <div class="media-body">
                    <h1>
                      <a href="{{ route('users.index') }}">{{ $usersCount }}</a>
                    </h1>
                    <p>Total Users</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3 mg-t-10 mg-sm-t-0">
        <div class="card card-status">
            <div class="media">
                <i class="icon ion-ios-bookmarks-outline tx-teal"></i>
                <div class="media-body">
                    <h1>17,583</h1>
                    <p>Total bookmarks</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
        <div class="card card-status">
            <div class="media">
                <i class="icon ion-ios-cloud-upload-outline tx-primary"></i>
                <div class="media-body">
                    <h1>61,119</h1>
                    <p>Total uploads</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3 mg-t-10 mg-lg-t-0">
        <div class="card card-status">
            <div class="media">
                <i class="icon ion-ios-analytics-outline tx-pink"></i>
                <div class="media-body">
                    <h1>2,942</h1>
                    <p>Total analytics</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
