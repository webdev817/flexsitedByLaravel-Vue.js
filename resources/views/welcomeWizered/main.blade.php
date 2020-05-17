@extends('layouts.welcomeWizered')
@section('js')
<script src="{{ asset('js/welcomeWizered.js') . "?ver=" . date('ymdhis') }}" charset="utf-8"></script>

@if ($currentStep == 4)
  @include('common.stripe')
@endif
<script type="text/javascript">
$(function () {
$('[data-toggle="popover"]').popover()
})
</script>
@endsection

@section('head')
  <link rel="stylesheet" href="{{ asset('mawaisnow/chat/chat.css') }}">
  <script src="{!! asset('mawaisnow/anchorm/anchorme.js') !!}" charset="utf-8"></script>
  <link rel="stylesheet" href="{!! asset('mawaisnow/able/assets/fonts/fontawesome/css/fontawesome-all.min.css') !!}">
  <script src="{{ asset('mawaisnow/vue/vue.js') }}" charset="utf-8"></script>
  <script src="{{ asset('mawaisnow/axios/axios.min.js') }}" charset="utf-8"></script>

  <script type="text/javascript">
  function planSelected(d) {
    $("#hiddenPlanDurration").val(d);
  }
  function fileChanged(dis,selector) {
    var files = $(dis)[0].files;
    if (files.length > 5) {
      $(selector).val('');
      alert('You can choose maximum 5 Files' + "\n\n" + "You have choosed " + files.length + " Files.");
      return 0;
    }
    for (var i = 0; i < files.length; i++) {
      var file = files[i];
      console.log(file);
      var sizeOfFile = (file.size / 1024) / 1024;
      if (sizeOfFile > 15) {
        alert('File can not be large then 15 mb \n\n' + file.name + " \n\nis larger than given size");
        $(selector).val('');
        return 0;
      }
    }
    if (files.length > 1) {
      fileName = files.length + " Files";
    }else {
      fileName = $(dis).val().split('\\').pop();
    }
    $(selector).val(fileName);
  }


  </script>
  @if ($currentStep == 4)
  <script src="https://js.stripe.com/v3/"></script>

  @endif

  @if ($currentStep == 1 || $currentStep == 5)
  <link rel="stylesheet" href="{{ asset('css/fontawesome-free-5.12.1-web/css/all.min.css') }}">
  @endif
  <style media="screen">
      .progressBar {
          @if($currentStep==2) width: 40%;
          @elseif($currentStep==3) width: 60%;
          @elseif($currentStep==4) width: 80%;
          @elseif($currentStep==5) width: 100%;
          @endif
      }
      .headingCommonHaiYeWali{
        font-size: 18px;
      }
      .BTNcommonCls{
        color: white;
        border-color: #65c4b4;
      }
      .BTNcommonCls:hover,.BTNcommonCls:active{
        background: #65c4b4 !important;
        color: white !important;
        border-color: #65c4b4 !important;
      }



  </style>
@endsection






@section('body')
<div class="container-fluid p-0 mb-5">
    <div class="row m-0">
        <div class="d-none d-md-block col-md-6 text-left p-0 " style="background-color:black;">
            <img src="{{ asset('mawaisnow/logo/FLEXSITED-2.jpg') }}" alt="" class="navLogo noselect">
        </div>
        <div class="col-12 d-block d-md-none text-center p-0 " style="background-color:black;">
            <img src="{{ asset('mawaisnow/logo/FLEXSITED-2.jpg') }}" alt="" class="navLogo noselect">
        </div>
        <div class="d-none d-md-block pb-5 pb-md-0 col-md-6 paddingBtnswali text-center" style="background-color:black;">
          <button type="button" data-toggle="modal" data-target="#chatModal"  class="btnChatModel  btn BTNcommonCls shadow-none mt-4 mr-3 self-align-center btn-outline-primary" name="button">Chat</button>

          <div class=" d-inline">
            <a class="btn mt-4 maillink BTNcommonCls shadow-none self-align-center  btn-outline-primary"  href="mailto:support@flexsited.com">support@flexsited.com</a>
          </div>
        </div>
        <div class="d-block d-md-none  pb-5 pb-md-0 col-md-6 paddingBtnswali text-center" style="background-color:black;">
          <button type="button" data-toggle="modal" data-target="#chatModal"  class="btnChatModel  btn BTNcommonCls shadow-none  mr-3 self-align-center btn-outline-primary" name="button">Chat</button>

          <a class="btn  maillink BTNcommonCls shadow-none self-align-center  btn-outline-primary"  href="mailto:support@flexsited.com">support@flexsited.com</a>


        </div>
    </div>
    <div class="row m-4">
        <div class="col-12 p-0 wTopNav1">
            <h1 class="favColor fontTopNav paddingCurrentStepText headingCommonHaiYeWali text-uppercase">
                @if ($currentStep == 1)
                Website Domain
                @endif
                @if ($currentStep == 2)
                WEBSITE DESIGN INSPIRATION
                @endif
                @if ($currentStep == 3)
                Website Package
                @endif
                @if ($currentStep == 4)
                Subscription Plan and Billing
                @endif
                @if ($currentStep == 5)
                BUSINESS INFORMATION
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
    @include('welcomeWizered.websitePackege')
    @endif
    @if ($currentStep == 4)
    @include('welcomeWizered.planAndBilling')
    @endif
    @if ($currentStep == 5)
    @include('welcomeWizered.businessInformation')
    @endif


</div>

@include('welcomeWizered.chat.main', [
  'sessionId'=> getOnBoardingSessionId()
])

@endsection


@section('jsend')
  <script type="text/javascript">
  $(".planSwithers").click(function () {

    $(".planSwithers").removeClass('active');
    $(this).addClass('active');
    var btnNo = $(this).attr('data-btn');
    if (btnNo == 1) {
      $(".monthlyPlanContainer").show();
      $(".yearlyPlanContainer").hide();
    }else {
      $(".monthlyPlanContainer").hide();
      $(".yearlyPlanContainer").show();
    }
  });

  $(".yearlyPlanContainer").hide();

  $(".btnChatModel").click(function () {
    setTimeout(function () {
      var container = document.querySelector("#supportChatBody");
      container.scrollTop = container.scrollHeight;
    }, 10);
  });

  </script>
@endsection
