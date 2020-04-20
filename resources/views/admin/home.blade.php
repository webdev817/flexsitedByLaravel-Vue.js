@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                {{-- <div class="page-header-title">
                                      <h5 class="m-b-10">Sample Page</h5>
                                  </div> --}}
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('adminHome') }}"><i class="feather icon-home"></i></a></li>
                                    {{-- <li class="breadcrumb-item"><a href="{{ route('adminHome') }}">Home</a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">

                            <div class="col-md-12 col-xl-4">
                                <div class="card user-card">
                                    <div class="card-block">
                                        <h5 class="m-b-15">Register User</h5>
                                        <h4 class="f-w-300 mb-3">1205</h4>
                                        <span class="text-muted"><label class="label theme-bg text-white f-12 f-w-400">20%</label>Monthly Increase</span>
                                    </div>
                                </div>
                            </div>
                            <!-- [Register-user section] end -->

                            <!-- [Daily-user section] start -->
                            <div class="col-md-6 col-xl-4">
                                <div class="card user-card">
                                    <div class="card-block">
                                        <h5 class="f-w-400 m-b-15">Daily User</h5>
                                        <h4 class="f-w-300 mb-3">467</h4>
                                        <span class="text-muted"><label class="label theme-bg text-white f-12 f-w-400">10%</label>Weekly Increase</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card user-card">
                                    <div class="card-block">
                                        <h5 class="f-w-400 m-b-15">Premium User</h5>
                                        <h4 class="f-w-300 mb-3">346</h4>
                                        <span class="text-muted"><label class="label theme-bg text-white f-12 f-w-400">50%</label>Yearly Increase</span>
                                    </div>
                                </div>
                            </div>
                            <!-- [Premium-user section] end -->

                            <!-- [Active-visitor section] start -->
                            <div class="col-md-6 col-xl-4">
                                <div class="card Active-visitor">
                                    <div class="card-block text-center">
                                        <h5 class="mb-3">Active Visitor</h5>
                                        <i class="fas fa-user-friends f-30 text-c-green"></i>
                                        <h2 class="f-w-300 mt-3">1,285</h2>
                                        <span class="text-muted">Active Visit On Sites</span>
                                        <div class="progress mt-4 m-b-40">
                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width: 75%; height:7px;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="row card-active">
                                            <div class="col-md-4 col-6">
                                                <h4>52%</h4>
                                                <span class="text-muted">Desktop</span>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <h4>80%</h4>
                                                <span class="text-muted">Mobile</span>
                                            </div>
                                            <div class="col-md-4 col-12">
                                                <h4>68%</h4>
                                                <span class="text-muted">Tablet</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-xl-4">
                                  <div class="card theme-bg visitor">
                                      <div class="card-block text-center">
                                          <img class="img-female" src="{{ asset('mawaisnow/able/assets/images/user/user-1.png') }}" alt="visitor-user">
                                          <h5 class="text-white m-0">TOTAL VISITORS</h5>
                                          <h3 class="text-white m-t-20 f-w-300">235</h3>
                                          <span class="text-white">20% More than last Month</span>
                                          <img class="img-men" src="{{ asset('mawaisnow/able/assets/images/user/user-2.png') }}" alt="visitor-user">
                                      </div>
                                  </div>
                                  <div class="card">
                                      <div class="card-block">
                                          <div class="row">
                                              <div class="col">
                                                  <i class="feather icon-shopping-cart f-30 text-c-green"></i>
                                                  <h6 class="m-t-50 m-b-0">Last week’s orders</h6>
                                              </div>
                                              <div class="col text-right">
                                                  <h3 class="text-c-green f-w-300">589</h3>
                                                  <span class="text-muted d-block">New Order</span>
                                                  <span class="badge theme-bg text-white m-t-20">1434</span>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-md-6 col-xl-4">
                                    <div class="card project-task">
                                        <div class="card-block">
                                            <div class="row align-items-center justify-content-center">
                                                <div class="col">
                                                    <h5 class="m-0"><i class="far fa-edit m-r-10"></i>Project Task</h5>
                                                </div>
                                                <div class="col-auto">
                                                    <label class="label theme-bg text-white f-14 f-w-400 float-right">23% Done</label>
                                                </div>
                                            </div>
                                            <h6 class="text-muted mt-4 mb-3">Complete Task : 6/10</h6>
                                            <div class="progress">
                                                <div class="progress-bar progress-c-theme" role="progressbar" style="width:60%;height:6px;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <h6 class="mt-3 mb-0 text-center text-muted">Project Team : 28 Persons</h6>
                                        </div>
                                    </div>
                                </div>



                        </div>
                        <!-- [ Main Content ] end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
