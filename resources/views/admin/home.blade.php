@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->

                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">

                            <div class="col-md-12 col-xl-4">
                                <div class="card user-card">
                                    <div class="card-block">
                                        <h5 class="m-b-15">Total Users</h5>
                                        <h4 class="f-w-300 mb-3">{{ $totalUsers }}</h4>
                                        {{-- <span class="text-muted"><label class="label theme-bg text-white f-12 f-w-400">20%</label>Monthly Increase</span> --}}
                                    </div>
                                </div>
                            </div>
                            <!-- [Register-user section] end -->

                            <!-- [Daily-user section] start -->

                            <div class="col-md-6 col-xl-4">
                                <div class="card user-card">
                                    <div class="card-block">
                                        <h5 class="f-w-400 m-b-15">Total Client Tasks</h5>
                                        <h4 class="f-w-300 mb-3">{{ $totalClientTask }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card user-card">
                                    <div class="card-block">
                                        <h5 class="f-w-400 m-b-15">Client Tasks Completed</h5>
                                        <h4 class="f-w-300 mb-3">{{ $totalClientTaskCompleted }}</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="card user-card">
                                    <div class="card-block">
                                        <h5 class="f-w-400 m-b-15">Total Projects </h5>
                                        <h4 class="f-w-300 mb-3">{{ $totalProjects }}</h4>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card user-card">
                                    <div class="card-block">
                                        <h5 class="f-w-400 m-b-15">Projects Due This Month</h5>
                                        <h4 class="f-w-300 mb-3">{{ $orderDueThisMonth }}</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="card user-card">
                                    <div class="card-block">
                                        <h5 class="f-w-400 m-b-15">Projects InProgress</h5>
                                        <h4 class="f-w-300 mb-3">{{ $totalProjectsInProgress }}</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-4">
                                <div class="card user-card">
                                    <div class="card-block">
                                        <h5 class="f-w-400 m-b-15">Projects Completed</h5>
                                        <h4 class="f-w-300 mb-3">{{ $totalProjectsCompleted }}</h4>
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
