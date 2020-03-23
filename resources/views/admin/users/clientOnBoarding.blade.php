@extends('layouts.dashboard.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">

                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('adminHome') }}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                                    <li class="breadcrumb-item">Client On Boarding</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="row">




                            <div class="col-xl-8 col-lg-12">
                                @include('admin.users.clientOnBoarding.progress')
                                @php
                                $wizeredObj->currentStep = (int)$wizeredObj->currentStep;

                                @endphp
                                @if ($wizeredObj->currentStep == null)
                                @elseif ($wizeredObj->currentStep == 2)
                                  <div class="card">
                                    @include('admin.users.clientOnBoarding.domain')
                                  </div>
                                @elseif ($wizeredObj->currentStep == 3)
                                  <div class="card">
                                  @include('admin.users.clientOnBoarding.domain')
                                  @include('admin.users.clientOnBoarding.design')
                                  </div>
                                @elseif ($wizeredObj->currentStep == 4)
                                  <div class="card">

                                  @include('admin.users.clientOnBoarding.domain')
                                  @include('admin.users.clientOnBoarding.design')

                                  </div>
                                @elseif ($wizeredObj->currentStep == 5 && $wizeredObj->wizered != "allDone")
                                  <div class="card">

                                  @include('admin.users.clientOnBoarding.domain')
                                  @include('admin.users.clientOnBoarding.design')
                                  @include('admin.users.clientOnBoarding.plan')
                                  @include('admin.users.clientOnBoarding.addons')
                                  @include('admin.users.billing')
                                  </div>
                                @elseif ($wizeredObj->currentStep == 5  && $wizeredObj->wizered == "allDone" )
                                  <div class="card">
                                      @include('admin.users.clientOnBoarding.businessInformation')
                                    @include('admin.users.clientOnBoarding.domain')
                                    @include('admin.users.clientOnBoarding.design')
                                    @include('admin.users.clientOnBoarding.plan')
                                    @include('admin.users.clientOnBoarding.addons')
                                    @include('admin.users.billing')
                                  </div>
                                  @include('admin.users.clientOnBoarding.files')

                                @endif





                            </div>



                            <div class="col-xl-4 col-lg-12">
                              @include('admin.users.clientOnBoarding.user')
                            </div>




                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('jsCommon')
  @include('common.js')
@endsection
