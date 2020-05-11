<!DOCTYPE html>
<html lang="en">

<head>

    <title>{{ myconf('title') }}</title>

    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="{{ myconf('description') }}" />
    <meta name="keywords" content="{{ myconf('keywords') }}">
    <meta name="author" content="{{ myconf('author') }}" />


    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('mawaisnow/able/assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('mawaisnow/able/assets/plugins/animation/css/animate.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('mawaisnow/able/assets/css/style.css') . "?ver=". date('ymdihs') }}">
    <link rel="stylesheet" href="{{ asset('mawaisnow/able/assets/css/supportPortal.css') . "?ver=". date('ymdihs') }}">

    <script src="{{ asset( 'mawaisnow/able/assets/js/vendor-all.min.js' ) }}"></script>
    <script src="{{ asset( 'mawaisnow/able/assets/js/common.js' ) }}"></script>

    <script type="text/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}
    </script>
    @yield('head')
    @yield('head1')
    @yield('head2')
    @yield('head3')

    @yield('head4')
    @yield('head5')

    @yield('headForLoadJs')

</head>

<body>
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->

    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar navbar-image-1">
        <div class="navbar-wrapper">
            <div class="navbar-brand header-logo">
              <a href="{{ route('root') }}" class="b-brand">
                <img class="img-fluid" style="" src="{{ asset('mawaisnow\logo\FLEXSITED.png') }}" alt="">
                  {{-- <div class="b-bg">
                      <i class="feather icon-trending-up"></i>
                  </div>
                  <span class="b-title">{{ myconf('logoText') }}</span> --}}
              </a>
                {{-- <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a> --}}
            </div>
            <div class="navbar-content scroll-div">
                <ul class="nav pcoded-inner-navbar">

                    @if (superAdmin())
                      <li  class="nav-item {{ requestIsFromArray(['adminHome']) }}">
                          <a href="{{ route('adminHome') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                      </li>

                    @else
                      <li  class="nav-item {{ requestIsFromArray(['root']) }}">
                          <a href="{{ route('root') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                      </li>
                    @endif


                    <li class="nav-item {{ requestIsFromArray(['projects.index', 'projects.edit', 'projects.show' ]) }}">
                        <a href="{{ route('projects.index') }}" class="nav-link "><span class="pcoded-micon">
                          <i class="fas fa-braille"></i></span><span class="pcoded-mtext">Projects</span></a>
                    </li>

                    @if (!superAdmin())
                      <li class="nav-item {{ requestIsFromArray(['orders.index' , 'orders.edit']) }}">
                          <a href="{{ route('orders.index') }}" class="nav-link "><span class="pcoded-micon">
                            <i class="fas fa-receipt"></i></span><span class="pcoded-mtext">Orders</span></a>
                      </li>
                    @endif



                    @if (!superAdmin())
                      <li class="nav-item {{ requestIsFromArray(['marketingServiceIndex']) }}">
                          <a href="{{ route('marketingServiceIndex') }}" class="nav-link "><span class="pcoded-micon">
                            <i class="fas fa-bullhorn"></i></span><span class="pcoded-mtext">Marketing</span></a>
                      </li>
                    @endif
                    @if (!superAdmin())
                      <li class="nav-item {{ requestIsFromArray(['supportSp', 'myRequests'], 'active pcoded-trigger') }}  pcoded-hasmenu">
                          <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i class="fas fa-hands-helping" aria-hidden="true"></i></span><span class="pcoded-mtext">Support</span></a>
                          <ul class="pcoded-submenu">
                              <li class="{{ requestIsFromArray(['supportSp']) }}"><a href="{{ route('supportSp') }}" class="">Support and FAQ</a></li>
                              <li class="{{ requestIsFromArray(['myRequests']) }}"><a href="{{ route('myRequests') }}" class="">My Ticket Requests</a></li>

                          </ul>
                      </li>
                    @endif
                    @if (!superAdmin())
                      <li class="nav-item {{ requestIsFromArray(['contactUsIndex']) }}">
                          <a href="{{ route('contactUsIndex') }}" class="nav-link "><span class="pcoded-micon">

                            <i class="feather icon-phone-call"></i></span><span class="pcoded-mtext">Contact Us</span></a>
                      </li>
                      {{-- <li class="nav-item {{ requestIsFromArray(['profile']) }}">
                          <a href="{{ route('profile') }}" class="nav-link "><span class="pcoded-micon">

                            <i class="feather icon-user"></i></span><span class="pcoded-mtext">Profile</span></a>
                      </li> --}}

                    @endif


                    @if (!superAdmin())
                      <li class="nav-item {{ requestIsFromArray(['referal']) }}">
                          <a href="{{ route('referal') }}" class="nav-link "><span class="pcoded-micon">
                            <i class="fa fa-gift"></i></span><span class="pcoded-mtext">Referral Program</span></a>
                      </li>
                    @endif

                    @if (superAdmin())
                      <li class="nav-item {{ requestIsFromArray(['users.index', 'users.edit', 'clientOnBoarding']) }}">
                          <a href="{{ route('users.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Users</span></a>
                      </li>
                      <li class="nav-item {{ requestIsFromArray(['allSubscriptions', 'subscriptionHistory']) }}">
                          <a href="{{ route('allSubscriptions') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Subscriptions</span></a>
                      </li>
                      <li class="nav-item {{ requestIsFromArray(['marketingServices']) }}">
                          <a href="{{ route('marketingServices') }}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-bullhorn"></i></span><span class="pcoded-mtext">Marketing Requests</span></a>
                      </li>
                      <li class="nav-item {{ requestIsFromArray(['coupons.index', 'coupons.edit']) }}">
                          <a href="{{ route('coupons.index') }}" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file-minus"></i></span><span class="pcoded-mtext">Coupons</span></a>
                      </li>
                      <li class="nav-item {{ requestIsFromArray(['clientTasks.index', 'clientTasks.edit']) }}">
                          <a href="{{ route('clientTasks.index') }}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-tasks"></i></span><span class="pcoded-mtext">Client Tasks</span></a>
                      </li>
                      <li class="nav-item {{ requestIsFromArray(['referals']) }}">
                          <a href="{{ route('referals') }}" class="nav-link "><span class="pcoded-micon"><i class="fas fa-tasks"></i></span><span class="pcoded-mtext">Referals</span></a>
                      </li>
                      <li class="nav-item {{ requestIsFromArray(['contactUsRequests']) }}">
                          <a href="{{ route('contactUsRequests') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-inbox"></i></span><span class="pcoded-mtext">Contact Messsags</span></a>
                      </li>

                      <li class="nav-item {{ requestIsFromArray(['supportFAQ.index', 'supportFAQ.edit', 'supportChatsRequests', 'ticketRequests'], 'active pcoded-trigger') }}  pcoded-hasmenu">
                          <a href="javascript:void(0)" class="nav-link"><span class="pcoded-micon"><i class="fa fa-gift" aria-hidden="true"></i></span><span class="pcoded-mtext">Support</span></a>
                          <ul class="pcoded-submenu">
                              <li class="{{ requestIsFromArray(['supportFAQ.index']) }}"><a href="{{ route('supportFAQ.index') }}" class="">Faqs</a></li>
                              <li class="{{ requestIsFromArray(['ticketRequests']) }}"><a href="{{ route('ticketRequests') }}" class="">Ticket Requests</a></li>
                              <li class="{{ requestIsFromArray(['supportChatsRequests']) }}"><a href="{{ route('supportChatsRequests') }}" class="">Chat Requests</a></li>
                          </ul>
                      </li>
                      <li class="nav-item {{ requestIsFromArray(['plans.index']) }}">
                        <a href="{{ route('plans.index') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-inbox"></i></span><span class="pcoded-mtext">Plans</span></a>
                      </li>
                      <li class="nav-item {{ requestIsFromArray(['ordersList']) }}">
                        <a href="{{ route('ordersList') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-inbox"></i></span><span class="pcoded-mtext">Orders</span></a>
                      </li>
                      <li class="nav-item {{ requestIsFromArray(['suggestions']) }}">
                        <a href="{{ route('suggestions') }}" class="nav-link "><span class="pcoded-micon"><i class="fa fa-inbox"></i></span><span class="pcoded-mtext">Suggestions</span></a>
                      </li>
                    @endif



                </ul>
            </div>
        </div>
    </nav>
    <!-- [ navigation menu ] end -->

    <!-- [ Header ] start -->
    <header class="navbar pcoded-header navbar-expand-lg navbar-light">
        <div class="m-header">
            <a class="mobile-menu" id="mobile-collapse1" href="#!"><span></span></a>
            <a href="{{ route('root') }}" class="b-brand">
                   <img class="img-fluid" style="width: 150px" src="{{ asset('mawaisnow\logo\FLEXSITED.png') }}" alt="">

               </a>
        </div>
        <a class="mobile-menu" id="mobile-header" href="#!">
            <i class="feather icon-more-horizontal"></i>
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">


            </ul>
            <ul class="navbar-nav ml-auto">
                {{-- <li>
                  <div class="main-search">
                      <div class="input-group">
                          <input type="text" id="m-search" class="form-control" placeholder="Search . . .">
                          <a href="#!" class="input-group-append search-close">
                              <i class="feather icon-x input-group-text"></i>
                          </a>
                          <span class="input-group-append search-btn btn btn-primary">
                              <i class="feather icon-search input-group-text"></i>
                          </span>
                      </div>
                  </div>
                </li> --}}


                @if (!superAdmin())


                  @php
                    $obj = getNotifcations(200);
                  @endphp
                  @if ($obj->hasNotification)
                    <li>
                        <div class="dropdown">

                            <a class="dropdown-toggle" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i>
                              @if ($obj->hasNew)
                              <span class="badge badge-danger">New</span>
                              @endif
                            </a>

                            <div class="dropdown-menu dropdown-menu-right notification">
                                <div class="noti-head">
                                    <h6 class="d-inline-block m-b-0">Notifications</h6>
                                    @if ($obj->hasNew)
                                      <div class="float-right">
                                          <a href="{{ route('markNotificationRead') }}" class="m-r-10">mark as read</a>
                                          {{-- <a href="#!">clear all</a> --}}
                                      </div>
                                    @endif

                                </div>
                                <ul class="noti-body">
                                    @if ($obj->hasNew)
                                    <li class="n-title">
                                        <p class="m-b-0">NEW</p>
                                    </li>
                                    @endif
                                    @if ($obj->hasNew)
                                        @foreach ($obj->new as $noti)
                                          <li class="notification">
                                              <div class="media">
                                                <a href="{{ $noti->redirectURL }}"><i class="fas fa-eye text-primary hand img-radius p-2"></i></a>

                                                  <div class="media-body">
                                                      <p><strong>{{ $noti->title }}</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>{{ $noti->created_at->diffForhumans() }}</span></p>
                                                      <p>{{ $noti->description }}</p>
                                                  </div>
                                              </div>
                                          </li>
                                        @endforeach
                                    @endif


                                    @if ($obj->hasOld)
                                      <li class="n-title">
                                          <p class="m-b-0">EARLIER</p>
                                      </li>
                                    @endif

                                    @if ($obj->hasOld)
                                        @foreach ($obj->old as $noti)
                                          <li class="notification">
                                              <div class="media">
                                                <a href="{{ $noti->redirectURL }}"><i class="fas fa-eye text-primary hand img-radius p-2"></i></a>
                                                  <div class="media-body">
                                                      <p><strong>{{ $noti->title }}</strong><span class="n-time text-muted"><i class="icon feather icon-clock m-r-10"></i>{{ $noti->created_at->diffForhumans() }}</span></p>
                                                      <p>{{ $noti->description }}</p>
                                                  </div>
                                              </div>
                                          </li>
                                        @endforeach
                                    @endif


                                </ul>
                                {{-- <div class="noti-footer">
                                    <a href="{{ route() }}">show all</a>
                                </div> --}}
                            </div>
                        </div>
                    </li>

                  @endif



                @endif





                <li>
                    <div class="dropdown drp-user">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon feather icon-settings"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right profile-notification">
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

                                <li><a href="{!! route('profile') !!}" class="dropdown-item"><i class="feather icon-user"></i> Profile</a></li>

                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </header>
    <!-- [ Header ] end -->

    <!-- [ chat user list ] start -->
    <section class="header-user-list">
        <div class="h-list-header">
            <div class="input-group">
                <input type="text" id="search-friends" class="form-control" placeholder="Search Friend . . .">
            </div>
        </div>
        <div class="h-list-body">
            <a href="#!" class="h-close-text"><i class="feather icon-chevrons-right"></i></a>
            <div class="main-friend-cont scroll-div">

            </div>
        </div>
    </section>
    <!-- [ chat user list ] end -->

    <!-- [ chat message ] start -->
    <section class="header-chat">
        <div class="h-list-header">
            <h6></h6>
            <a href="#!" class="h-back-user-list"><i class="feather icon-chevron-left"></i></a>
        </div>
        <div class="h-list-body">
            <div class="main-chat-cont scroll-div">
                <div class="main-friend-chat">

                </div>
            </div>
        </div>
        <div class="h-list-footer">
            <div class="input-group">
                <input type="file" class="chat-attach" style="display:none">
                <a href="#!" class="input-group-prepend btn btn-success btn-attach">
                    <i class="feather icon-paperclip"></i>
                </a>
                <input type="text" name="h-chat-text" class="form-control h-send-chat" placeholder="Write hear . . ">
                <button type="submit" class="input-group-append btn-send btn btn-primary">
                    <i class="feather icon-message-circle"></i>
                </button>
            </div>
        </div>
    </section>
    <!-- [ chat message ] end -->

    <!-- [ Main Content ] start -->
    @yield('body')
    <!-- [ Main Content ] end -->

    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
    <!--[if lt IE 11]>
        <div class="ie-warning">
            <h1>Warning!!</h1>
            <p>You are using an outdated version of Internet Explorer, please upgrade
               <br/>to any of the following web browsers to access this website.
            </p>
            <div class="iew-container">
                <ul class="iew-download">
                    <li>
                        <a href="http://www.google.com/chrome/">
                            <img src="{{ asset( 'mawaisnow/able/assets/images/browser/chrome.png' ) }}" alt="Chrome">
                            <div>Chrome</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.mozilla.org/en-US/firefox/new/">
                            <img src="{{ asset( 'mawaisnow/able/assets/images/browser/firefox.png' ) }}" alt="Firefox">
                            <div>Firefox</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://www.opera.com">
                            <img src="{{ asset( 'mawaisnow/able/assets/images/browser/opera.png' ) }}" alt="Opera">
                            <div>Opera</div>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.apple.com/safari/">
                            <img src="{{ asset( 'mawaisnow/able/assets/images/browser/safari.png' ) }}" alt="Safari">
                            <div>Safari</div>
                        </a>
                    </li>
                    <li>
                        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                            <img src="{{ asset( 'mawaisnow/able/assets/images/browser/ie.png' ) }}" alt="">
                            <div>IE (11 & above)</div>
                        </a>
                    </li>
                </ul>
            </div>
            <p>Sorry for the inconvenience!</p>
        </div>
    <![endif]-->
    <!-- Warning Section Ends -->

    <!-- Required Js -->
    <script src="{{ asset( 'mawaisnow/able/assets/plugins/bootstrap/js/bootstrap.min.js' ) }}"></script>
    <script src="{{ asset( 'mawaisnow/able/assets/js/pcoded.min.js' ) }}"></script>
    @yield('footerForLoadJs')


    @yield('js')
    @yield('js1')
    @yield('js2')
    @yield('js3')
    @yield('jsEnd')
    @yield('jsCommon')



        <div id="deleteConfirmModel" class="modal fade">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content tx-size-sm">
                        <div class="modal-body text-center py-5">

                            <p class="mg-b-20   mg-x-20" id="error_message">Are you sure you want to delete?</p>
                            <a href="#" id="submitForm" class="btn btn-danger btn-sm pd-x-25">Yes</a>
                            <input type="hidden" id="formToSubmit" value="0">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal" aria-label="Close">No</button>
                        </div><!-- modal-body -->
                    </div><!-- modal-content -->
                </div><!-- modal-dialog -->
            </div>


            <script type="text/javascript">
            $(".confirmDelete").click(function(){
              var formId = 0;
              if($(this)[0].hasAttribute('formId')){
                formId = jQuery.trim($(this).attr('formId'));
              }
              $("#formToSubmit").val(formId);


              $('#deleteConfirmModel').modal('show');
              return false;
            });

            $("#submitForm").click(function(event) {
                var formToSubmit = $("#formToSubmit").val();
                $("#"+formToSubmit).submit();
              });
            </script>

</body>
</html>
