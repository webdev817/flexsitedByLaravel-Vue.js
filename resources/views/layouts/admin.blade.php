<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="{{ myConf('title') }} Dashboard">

    <title>@yield('title', myConf('title'))</title>

    <link href="{{ asset('mawaisnow/slim/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('mawaisnow/slim/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
    <link href="{{ asset('mawaisnow/slim/lib/rickshaw/css/rickshaw.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mawaisnow/slim/css/slim.css') }}">
    <script src="{{ asset('mawaisnow/slim/lib/jquery/js/jquery.js' )}}"></script>

    @yield('head')
    <script type="text/javascript">
    function doAjax(obj){
      $.ajax({
          url: obj.url,
          method: ((obj.method == undefined) ? 'post' : obj.method ),
          data: obj.data
      })
      .done(obj.done)
      .fail(obj.fail);
    }

    </script>
    @include('common.css')
</head>

<body class="{{ setting('pageWidth',null) }}">
    <div class="slim-header">
        <div class="container">
            <div class="slim-header-left">
                <h2 class="slim-logo"><a href="{{ route('root') }}">{{ myConf('title') }}<span></span></a></h2>

                <div class="search-box">
                    <input type="text" class="form-control" placeholder="Search">
                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div><!-- search-box -->

            </div><!-- slim-header-left -->
            <div class="slim-header-right">
                <a href="{{ route('switchPageWidth') }}" class="header-notification">
                    @if (setting('pageWidth',null) == null)
                    <i class="icon ion-ios-monitor-outline"></i>
                    @else
                    <i class="icon ion-ios-monitor"></i>
                    @endif
                </a>

                <div class="dropdown dropdown-c">
                    <a href="#" class="logged-user" data-toggle="dropdown">
                        <img src="{{ asset('mawaisnow\slim\img\avatar_11.png') }}" alt="">
                        <span>{{ Auth::user()->name }}</span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <nav class="nav">
                            <a href="javascript:void(0)" class="nav-link"><i class="icon ion-person"></i> View Profile</a>
                            <a href="javascript:void(0)" class="nav-link"><i class="icon ion-compose"></i> Edit Profile</a>
                            @if (Auth::user()->email == "mawaisnow
                            @gmail.com")
                            <a target="_blank" href="{{ url('mawaisnow/slim/documentation.html') }}" class="nav-link"><i class="icon ion-ios-bolt"></i>Doc..</a>
                            @endif

                            <a href="javascript:void(0)" class="nav-link"><i class="icon ion-ios-gear"></i> Account Settings</a>
                            <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();" class="nav-link"><i class="icon ion-forward"></i> Sign Out</a>
                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                   @csrf
                               </form>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="slim-navbar">
        <div class="container">
            <ul class="nav">
                <li class="nav-item   {{ requestIs('root') }}">
                    <a class="nav-link" href="{{ route('root') }}">
                        <i class="icon ion-ios-home-outline"></i>
                        <span>Dashboard</span>
                    </a>

                </li>
                <li class="nav-item {{ requestIs('users.index') }}">
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <i class="icon ion-ios-people-outline "></i>
                        <span>Users</span>
                    </a>
                </li>

                <li class="nav-item {{ requestIs('coupons') }}">
                    <a class="nav-link" href="{{ route('coupons.index') }}">
                        <i class="icon ion-ios-chatboxes-outline"></i>
                        <span>Coupons</span>

                    </a>
                </li>
                {{-- <li class="nav-item with-sub">
                  <a class="nav-link" href="javascript:void(0)" data-toggle="dropdown">
                    <i class="icon ion-ios-cart-outline"></i>
                    <span>Subscriptions</span>
                  </a>
                  <div class="sub-item">
                    <ul>
                      <li><a href="{{ route('coupons.index') }}">Coupon</a></li>
                    </ul>
                  </div><!-- dropdown-menu -->
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="page-messages.html">
                        <i class="icon ion-ios-chatboxes-outline"></i>
                        <span>Coupons</span>
                        <span class="square-8"></span>
                    </a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="widgets.html">
                        <i class="icon ion-ios-analytics-outline"></i>
                        <span>Widgets</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
    <div class="slim-mainpanel">
        <div class="container">
            @yield('body')


        </div>
    </div>


    <div id="confirmBox" class="modal fade">
        <div class="modal-dialog modal-dialog-vertical-center" role="document">
            <div class="modal-content bd-0 tx-14">
                <div class="modal-header border-0 bg-white pd-y-20 pd-x-25">
                    <h6 class="d-none tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Are you sure?</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body pd-50">
                    <h5 class="lh-3 mg-b-20 tx-inverse" id="confirmBoxBody">Are you sure you want to continue?</h5>
                    <p class="mg-b-5"> </p>
                </div>

                <form id="confirmForm" action="" method="post">
                    @csrf
                    <input type="hidden" name="_method" id="_methodConfirmForm" value="">
                    <div id="confirmFormInputs" style="display:none">

                    </div>
                </form>

                <div class="modal-footer bg-white">
                    <button type="button" onclick="$('#confirmForm').submit()" class="btn btn-primary pl-4 pr-4">Yes</button>
                    <button type="button" class="btn btn-secondary pl-4 pr-4" data-dismiss="modal">No </button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('mawaisnow/slim/lib/popper.js/js/popper.js' )}}"></script>
    <script src="{{ asset('mawaisnow/slim/lib/bootstrap/js/bootstrap.js' )}}"></script>
    <script src="{{ asset('mawaisnow/slim/lib/jquery.cookie/js/jquery.cookie.js' )}}"></script>

    <script src="{{ asset('mawaisnow/slim/js/slim.js' )}}"></script>


    <script>
        function showConfirm(obj) {
            var route = obj.route;
            var method = obj.method;
            var params = obj.params;
            var message = obj.message;

            $("#confirmFormInputs").empty();

            $("#confirmForm").attr('action', route);
            if (method.toLowerCase() != "get" || method.toLowerCase() != "post") {
                $("#confirmForm").attr('method', 'post');
                $("#_methodConfirmForm").val(method);
            } else {
                $("#confirmForm").attr('method', method);
            }

            for (var key in params) {
                if (params.hasOwnProperty(key)) {
                    var elm = "<input name='" + key + "' value='" + params[key] + "'  />";
                    $("#confirmFormInputs").append(elm);
                }
            }

            if (message) {
                $("#confirmBoxBody").html(message);
            } else {
                $("#confirmBoxBody").html('Are you sure you want to continue?');
            }

            $("#confirmBox").modal('show');
        }


        function showthefilename(ths, showid) {
            f = ths.value
            f = f.replace(/.*[\/\\]/, '');
            if (f != '') {
                $("#" + showid).html(f);
            } else {
                $("#" + showid).html('Choose file');
            }
        }




    </script>
    @yield('js')
    @yield('cJS')


    <div id="deleteConfirmModel" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-body tx-center pd-y-20 pd-x-20">

                        <p class="mg-b-20   mg-x-20" id="error_message">Are you sure you want to delete?</p>
                        <a href="#" id="submitForm" class="btn btn-danger btn-sm pd-x-25">Yes</a>
                        <input type="hidden" id="formToSubmit" value="0">
                        <button type="button" class="btn btn-secondary btn-sm  pd-x-25" data-dismiss="modal" aria-label="Close">No</button>
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
