@if (!superAdmin())
@php
$obj = getNotifcations(200);
@endphp
@if ($obj->hasNotification)
<li>
    <div class="dropdown" id="noti1">

        <a class="dropdown-toggle d-none d-md-block" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i>
            @if ($obj->hasNew)
            <span class="badge badge-danger">New</span>
            @endif
        </a>
        <a class="dropdown-toggle d-block d-md-none" id="noticlick" href="#"><i class="icon feather icon-bell"></i>
            @if ($obj->hasNew)
            <span class="badge badge-danger">New</span>
            @endif
        </a>

        <div class="dropdown-menu dropdown-menu-right notification" id="notisub">
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
                        <a class="p-0 mr-2" href="{{ $noti->redirectURL }}"><i class="fas fa-eye text-primary hand img-radius"></i></a>

                        <div class="media-body">

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

                            <p>{{ $noti->description }}</p>
                        </div>
                    </div>
                </li>
                @endforeach
                @endif


            </ul>

        </div>
    </div>
</li>

@endif



@endif





@if (superAdmin())
@php
$obj = getNotifcations(200, true);

@endphp
@if ($obj->hasNotification)
<li>
    <div class="dropdown" id="noti1">

        <a class="dropdown-toggle d-none d-md-block" href="#" data-toggle="dropdown"><i class="icon feather icon-bell"></i>
            @if ($obj->hasNew)
            <span class="badge badge-danger">New</span>
            @endif
        </a>
        <a class="dropdown-toggle d-block d-md-none" id="noticlick" href="#"><i class="icon feather icon-bell"></i>
            @if ($obj->hasNew)
            <span class="badge badge-danger">New</span>
            @endif
        </a>

        <div class="dropdown-menu dropdown-menu-right notification" id="notisub">
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
                        <a class="p-0 mr-2" href="{{ $noti->redirectURL }}"><i class="fas fa-eye text-primary hand img-radius"></i></a>

                        <div class="media-body">

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

                            <p>{{ $noti->description }}</p>
                        </div>
                    </div>
                </li>
                @endforeach
                @endif


            </ul>

        </div>
    </div>
</li>

@endif



@endif
