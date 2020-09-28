@extends('layouts.welcomeWizered')
@section('js')
<script src="{{ asset('js/welcomeWizered.js') . "?ver=" . date('ymdhis') }}" charset="utf-8"></script>

@if ($currentStep == 4  || $currentStep == 6)
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
  <link rel="stylesheet" href="{{ asset('mawaisnow/able/assets/css/onboarding.css')}}">
  <script src="{{ asset('mawaisnow/vue/vue.js') }}" charset="utf-8"></script>
  <script src="{{ asset('mawaisnow/axios/axios.min.js') }}" charset="utf-8"></script>

  <script type="text/javascript">
   var temp = $('#renewalDateM').text();
    $('#renewalDate').text(temp);
  function planSelected(d) {
    $("#hiddenPlanDurration").val(d);
    if(d == 'm'){
      $('.space').css('color','#65c5b4');
      temp = $('#renewalDateM').text();
    }
    else{
      $('.space').css('color','#adadad');
      temp = $('#renewalDateY').text();
    }
    $('#renewalDate').text(temp);
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
  @if ($currentStep == 4 ||$currentStep == 6)
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
      .logoutbar{
        width: 100% !important;
      }
      .progressStep{
          @if($currentStep == 0 || $currentStep == 6 || $currentStep == 7 || $pages == 0)
            display: none;  
          @else
            display:block;
          @endif
      }
    @media (max-width: 1024px){
      .progressStep{
        display:none;
      }
    }
    @media only screen and (max-width: 991px){
     .logoutbar, .mobile-logout{
      background-color:black!important;
      min-height:0px!important;
      }
    }
    .mobile-logout .dropdown .dropdown-toggle::after{
        
        top:11px !important;
    }
    .mobile-logout{
      margin-left:0px!important;
      margin-top: 11px!important;
    }
    .mobile-logout .dropdown .dropdown-toggle{
      line-height:0px!important;
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
        <div class="d-none d-md-block pb-5 pb-md-0 col-md-5 paddingBtnswali text-center" style="background-color:black;">
          <button type="button" data-toggle="modal" data-target="#chatModal"  class="btnChatModel  btn BTNcommonCls shadow-none mt-4 mr-3 self-align-center btn-outline-primary" name="button">Chat</button>

          <div class=" d-inline">
            <a class="btn mt-4 maillink BTNcommonCls shadow-none self-align-center  btn-outline-primary"  href="mailto:support@flexsited.com">support@flexsited.com</a>
          </div>
        </div>
        <div class="d-block d-md-none d-flex pb-5 pb-md-0 col-md-5 paddingBtnswali text-center" style="background-color:black;">
          <button type="button" data-toggle="modal" data-target="#chatModal"  class="btnChatModel  btn BTNcommonCls shadow-none  mr-3 self-align-center btn-outline-primary" name="button">Chat</button>
          <a class="btn  maillink BTNcommonCls shadow-none self-align-center  btn-outline-primary"  href="mailto:support@flexsited.com">support@flexsited.com</a>
          <ul class="navbar-nav ml-auto pcoded-header mobile-logout ">
            <li>
              <div class="dropdown " id="profileHai">
                  <a href="#" class="dropdown-toggle dropdownlink" data-toggle="dropdown">
                      <i class="icon feather icon-settings dropicon"></i>
                  </a>
                  {{-- <a href="#" id="openmobilepy" class="dropdown-togglef ">
                      <i class="icon feather icon-settings"></i>
                  </a> --}}
                  <div class="dropdown-menu dropdown-menu-right profile-notification" id="profileSubHai">
                      <div class="pro-head">
                      <img
                        @if (Auth::user()->image != null)
                            src="{{ asset(Storage::url(Auth::user()->image)) }}"
                        @else
                            src="{{ asset( 'mawaisnow/able/assets/images/user/avatar-1.jpg' ) }}"
                        @endif
                        class="img-radius" alt="User-Profile-Image">
                        <span>{{ Auth::user()->name }}</span>
                        <a href="{{ route('logout') }}" class="dud-logout" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" title="Logout">
                            <i class="feather icon-log-out"></i>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                  @csrf
                                                              </form>
                      </div>
                      <ul class="pro-body">

                      <li><a href="" data-toggle="modal" data-target="#profile" class="dropdown-item" ><i class="feather icon-user"></i> Profile</a></li>

                      </ul>
                  </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="d-none d-md-block pb-5 pb-md-0 col-md-1 paddingBtnswali text-center" style="background-color: black;">
     
            <ul class="navbar-nav ml-auto pcoded-header navbar-expand-lg logoutbar">
                <li>
                    <div class="dropdown drp-user" id="profileHai">
                        <a href="#" class="dropdown-toggle " data-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <a href="#" id="openmobilepy" class="dropdown-togglef d-block d-md-none">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification" id="profileSubHai">
                            <div class="pro-head">
                                <img
                                @if (Auth::user()->image != null)
                                    src="{{ asset(Storage::url(Auth::user()->image)) }}"
                                @else
                                    src="{{ asset( 'mawaisnow/able/assets/images/user/avatar-1.jpg' ) }}"
                                @endif

                                class="img-radius" alt="User-Profile-Image">
                                <span>{{ Auth::user()->name }}</span>
                                <a href="{{ route('logout') }}" class="dud-logout" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();" title="Logout">
                                    <i class="feather icon-log-out"></i>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                  @csrf
                                                              </form>
                            </div>
                            <ul class="pro-body">

                                <li><a href="" data-toggle="modal" data-target="#profile" class="dropdown-item" ><i class="feather icon-user"></i> Profile</a></li>

                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
       
    </div>
    <div class="row m-4" style="@if($currentStep == 0 || $currentStep == 6 || $currentStep == 7 || $pages == 0) display: none;@else display: block;@endif">
        <div class="col-12 p-0 wTopNav1 text-center">
            <h1 class="favColor fontTopNav paddingCurrentStepText headingCommonHaiYeWali text-uppercase">
                @if ($currentStep == 1)
                Website Domain
                @endif
                @if ($currentStep == 2)
                WEBSITE DESIGN INSPIRATION
                <p style="font-size: 13px;margin-top: 13px;">PICK A DESIGN THAT INSPIRES YOU</p> 
                @endif
                @if ($currentStep == 3)
                Website Package
                @endif
                @if ($currentStep == 4)
                Subscription Plan and Billing
                @endif
                @if ($currentStep == 5)
                PROJECT INFORMATION
                @endif
                <span class=" d-inline fontTopNav d-xl-none wTopNav1steps">{{ $currentStep }}/5</span>
            </h1>
        </div>
        <div class="col-12  p-0 d-block d-xl-none progressBarBG">
            <div class="progressBar">

            </div>
        </div>
    </div>



    <div class="container progressStep" >
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
                    Project  Information
                </div>
                <div class="wizeredBullet prelative d-flex justify-content-center @if($currentStep > 4) active @endif">
                    <div class="bRound">5</div>
                    <div class="leftLine"></div>
                    <div class="rightLine"></div>
                </div>
            </div>

        </div>
    </div>

    @if ($currentStep == 0)
    @include('welcomeWizered.home')
    @endif
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
    @if ($currentStep == 6)
    @include('welcomeWizered.graphicDesignBilling')
    @endif
    @if ($currentStep == 7)
    @include('welcomeWizered.marketing')
    @endif


</div>

<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="profile" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-body">
        <div class="col-xl-12 col-lg-12 col-md-12 col-12 bg-white orderBoxes">
          <div class="text-center project-main pb-0">
              {{-- <a href="{{ route('profileEditSp') }}">--}}
                  <img
                 {{-- @if ($user->image != null)
                    src="{{ asset(Storage::url($user->image)) }}"
                   class="img-fluid "
                  @else --}}
                   class="img-radius img-fluid rounded-circle"
                    src="{{ asset('mawaisnow\slim\img\avatar_11.png') }}"
                  {{-- @endif--}}
                  alt="User-Profile-Image">
              </a>

              <h6 class="mt-4">{{ $user->name }}</h6>

              <div class="row mt-3">
                  <div class="col-12 pl-0 pr-0 profileSPBusinessName">
                      Business Name
                      <br>
                      @if ($user->businessName != null)
                        {{ $user->businessName }}
                      @endif
                  </div>
              </div>

          </div>
          <div class="w-100 mt-4" style="text-align:center;">
              <h5 class="float-left text-dark bold">Personal Information</h5>
              {{-- <a href="{{ route('profileEditSp') }}" class="float-right ">Edit Info.</a>--}}
          </div>
          <div class="w-100 row mt-2">
            <table class="table">

                <tr>
                    <td align="center">
                        <div class="roundForIcon">
                            <i class="fa fa-phone"></i>
                        </div>
                    </td>
                    <td class="fontSize14px">
                        {{ $user->phone }}
                        <br>
                        Phone No
                    </td>
                </tr>

                <tr>
                    <td align="center">
                        <div class="roundForIcon">
                            <i class="fa fa-envelope"></i>
                        </div>
                    </td>
                    <td class="fontSize14px">
                        {{ $user->email }}
                        <br>
                        Email Address
                    </td>
                </tr>

                @if (!superAdmin())
                  <tr>
                      <td align="center">
                          <div class="roundForIcon">
                              <i class="fa fa-credit-card"></i>
                          </div>
                      </td>
                      <td class="fontSize14px">
                          <a href="javascript:void(0)" data-toggle="modal" data-target="#updateBilling">Update Billing</a>
                      </td>
                  </tr>
                @endif
            </table>
          </div>
        </div>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
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
