@extends('layouts.welcomeWizered')
@section('js')
  <script src="{{ asset('js/welcomeWizered.js') . "?ver=" . date('ymdhis') }}" charset="utf-8"></script>
@endsection
@section('body')
<div class="container-fluid p-0 shadow-sm mb-5">
  <div class="row m-0">
    <div class="col-12 text-center " style="background-color:black;">
      <img src="{{ asset('mawaisnow/logo/FLEXSITED-2.jpg') }}" alt="" class="navLogo noselect">
    </div>
  </div>
  <div class="row m-4">
    <div class="col-12 p-0 wTopNav1">
      <h1 class="favColor paddingCurrentStepText fontTopNav">Website Domain <span class=" d-inline fontTopNav d-xl-none wTopNav1steps">1/5</span></h1>
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
        <div class="wizeredHeadingItem">
          Website Design Inspiration
        </div>
        <div class="wizeredBullet prelative d-flex justify-content-center">
          <div class="bRound">2</div>
          <div class="leftLine"></div>
          <div class="rightLine"></div>
        </div>


      </div>
      <div class="col p-0">
        <div class="wizeredHeadingItem">
          Website Package
        </div>

        <div class="wizeredBullet prelative d-flex justify-content-center">
          <div class="bRound">3</div>
          <div class="leftLine"></div>
          <div class="rightLine"></div>
        </div>


      </div>
      <div class="col p-0">
        <div class="wizeredHeadingItem">
          Subscription Plan and Billing
        </div>
        <div class="wizeredBullet prelative d-flex justify-content-center">
          <div class="bRound">4</div>
          <div class="leftLine"></div>
          <div class="rightLine"></div>
        </div>


      </div>
      <div class="col p-0">
        <div class="wizeredHeadingItem">
          Website Information
        </div>
        <div class="wizeredBullet prelative d-flex justify-content-center">
          <div class="bRound">5</div>
          <div class="leftLine"></div>
          <div class="rightLine"></div>
        </div>
      </div>

    </div>
  </div>

  @include('welcomeWizered.websiteDomain')

</div>

@endsection
