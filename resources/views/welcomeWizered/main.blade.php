@extends('layouts.welcomeWizered')
@section('js')
  <script src="{{ asset('js/welcomeWizered.js') . "?ver=" . date('ymdhis') }}" charset="utf-8"></script>
@endsection
@section('head')
  <link rel="stylesheet" href="{{ asset('css/fontawesome-free-5.12.1-web/css/all.min.css') }}">
  <style media="screen">
    .progressBar{
    @if ($currentStep == 2)
      width: 40%;
    @elseif ($currentStep == 3)
      width: 60%;
    @elseif ($currentStep == 4)
      width: 80%;
    @elseif ($currentStep == 5)
      width: 100%;
    @endif
    }
  </style>
@endsection
@section('body')
<div class="container-fluid p-0 mb-5">
  <div class="row m-0">
    <div class="col-12 text-center p-0 " style="background-color:black;">
      <img src="{{ asset('mawaisnow/logo/FLEXSITED-2.jpg') }}" alt="" class="navLogo noselect">
    </div>
  </div>
  <div class="row m-4">
    <div class="col-12 p-0 wTopNav1">
      <h1 class="favColor fontTopNav paddingCurrentStepText text-uppercase">
        @if ($currentStep == 1)
          Website Domain
        @endif
        @if ($currentStep == 2)
          WEBSITE DESIGN INSPIRATION
        @endif
        @if ($currentStep == 3)
          Website Package
        @endif
        <span class=" d-inline fontTopNav d-xl-none wTopNav1steps">{{ $currentStep }}/5</span>
      </h1>
    </div>
    <div class="col-12  p-0 d-block d-xl-none progressBarBG">
      <div class="progressBar">

      </div>
    </div>
  </div>



  <div class="container d-none d-xl-block">
    <div class="row m-0">

      <div class="col p-0">
        <div class="wizeredHeadingItem active">
          Website Domain
        </div>
        <div class="wizeredBullet prelative d-flex justify-content-center active">
          <div class="bRound">1</div>
          <div class="leftLine"></div>
          <div class="rightLine"></div>
        </div>

      </div>

      <div class="col p-0">
        <div class="wizeredHeadingItem @if($currentStep > 1) active @endif">
          Website Design Inspiration
        </div>
        <div class="wizeredBullet prelative d-flex justify-content-center @if($currentStep > 1) active @endif">
          <div class="bRound">2</div>
          <div class="leftLine"></div>
          <div class="rightLine"></div>
        </div>


      </div>
      <div class="col p-0">
        <div class="wizeredHeadingItem @if($currentStep > 2) active @endif">
          Website Package
        </div>

        <div class="wizeredBullet prelative d-flex justify-content-center @if($currentStep > 2) active @endif">
          <div class="bRound">3</div>
          <div class="leftLine"></div>
          <div class="rightLine"></div>
        </div>


      </div>
      <div class="col p-0">
        <div class="wizeredHeadingItem @if($currentStep > 3) active @endif">
          Subscription Plan and Billing
        </div>
        <div class="wizeredBullet prelative d-flex justify-content-center @if($currentStep > 3) active @endif">
          <div class="bRound">4</div>
          <div class="leftLine"></div>
          <div class="rightLine"></div>
        </div>


      </div>
      <div class="col p-0">
        <div class="wizeredHeadingItem @if($currentStep > 4) active @endif">
          Website Information
        </div>
        <div class="wizeredBullet prelative d-flex justify-content-center @if($currentStep > 4) active @endif">
          <div class="bRound">5</div>
          <div class="leftLine"></div>
          <div class="rightLine"></div>
        </div>
      </div>

    </div>
  </div>

  @if ($currentStep == 1)
    @include('welcomeWizered.websiteDomain')
  @endif

  @if ($currentStep == 2)
    @include('welcomeWizered.selectDesign')
  @endif
  @if ($currentStep == 3)
    <div class="container">
      <div class="col-12 text-center favColor h4 my-5 pt-5">
        Work in progress
      </div>
    </div>
  @endif


</div>

@endsection
