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
                                    <li class="breadcrumb-item"><a href="{{ route('clientOnBoarding', $user->id) }}">Client On Boarding</a></li>
                                    <li class="breadcrumb-item">Edit</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-body">
                    <div class="page-wrapper">

                        @include('common.messages')




                        <form action="{{ route('clientOnBoardingStore') }}" method="post">
                          @csrf

                          <input type="hidden" name="userId" value="{{ $user->id }}">

                        <div class="row">

                            <div class="col-12">

                              @include('admin.users.clientOnBoardingEdit.progress')
                              @php
                              $wizeredObj->currentStep = (int)$wizeredObj->currentStep;
                              @endphp
                              @if ($wizeredObj->currentStep == null)
                              @elseif ($wizeredObj->currentStep == 2)
                                <div class="card mb-0">
                                  @include('admin.users.clientOnBoardingEdit.domain')
                                </div>

                              @elseif ($wizeredObj->currentStep == 3)
                                <div class="card">
                                @include('admin.users.clientOnBoardingEdit.domain')
                                @include('admin.users.clientOnBoardingEdit.design')
                                </div>
                              @elseif ($wizeredObj->currentStep == 4)
                                <div class="card">

                                @include('admin.users.clientOnBoardingEdit.domain')
                                @include('admin.users.clientOnBoardingEdit.design')

                                </div>
                              @elseif ($wizeredObj->currentStep == 5 && $wizeredObj->wizered != "allDone")
                                <div class="card">

                                @include('admin.users.clientOnBoardingEdit.domain')
                                @include('admin.users.clientOnBoardingEdit.design')
                                @include('admin.users.clientOnBoardingEdit.plan')
                                @include('admin.users.clientOnBoardingEdit.addons')

                                </div>
                              @elseif ($wizeredObj->currentStep == 5  && $wizeredObj->wizered == "allDone" )
                                <div class="card mb-0">
                                    @include('admin.users.clientOnBoardingEdit.businessInformation')
                                  @include('admin.users.clientOnBoardingEdit.domain')
                                  @include('admin.users.clientOnBoardingEdit.design')
                                  @include('admin.users.clientOnBoardingEdit.plan')
                                  @include('admin.users.clientOnBoardingEdit.addons')
                                </div>
                                @include('admin.users.clientOnBoardingEdit.files')

                              @endif



                              <div class="card shadow-none">

                                <div class="card-block">
                                  @if ($wizeredObj->currentStep > 1)
                                    <button type="submit" class="btn btn-outline-primary" name="button">Submit</button>
                                  @endif
                                </div>

                              </div>

                            </div>

                        </div>

                      </form>



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('jsCommon')
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script type="text/javascript">

  $(".pagesSelected").select2({
    multiple: true
  });

  @if ($wizeredObj->pageSelected != null)
  @php
  $pages = explode(",", $wizeredObj->pageSelected);
  @endphp

  $(".pagesSelected").val({!! json_encode($pages) !!}).change();

  @endif

</script>
@include('common.js')
@endsection
