@extends('layouts.dashboard.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                {{-- <div class="page-header-title">
                                      <h5 class="m-b-10">Sample Page</h5>
                                  </div> --}}
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('adminHome') }}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">



                            <div class="col-md-12">
                                <div class="card user-list">
                                    <div class="card-header">
                                        <h5>Users</h5>
                                        <div class="card-header-right">
                                            <div class="btn-group card-option">
                                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-more-horizontal"></i>
                                                </button>
                                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                                    {{-- <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li> --}}
                                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                                </ul>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-block pb-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Business Name</th>
                                                        <th>Satus</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $user)

                                                    <tr>
                                                        <td><img class="rounded-circle" style="width:40px;" src="{{ asset( 'mawaisnow/able/assets/images/user/avatar-1.jpg' ) }}" alt="activity-user"></td>
                                                        <td>
                                                            {{ $user->name }}
                                                        </td>
                                                        <td>
                                                            {{ $user->email }}
                                                        </td>
                                                        <td>
                                                            {{ $user->businessName }}
                                                        </td>
                                                        <td>
                                                          @if ($user->status == 1)
                                                            <a href="#" class="label theme-bg f-12 text-white">Active</a>
                                                          @else
                                                            <a href="#!" class="label theme-bg2 f-12 text-white">Not Active</a>
                                                          @endif
                                                        </td>
                                                        <td>
                                                           {{ $user->created_at->diffForHumans() }}
                                                        </td>
                                                        <td>
                                                          <a href="{{ route('clientOnBoarding',$user->id) }}" class="label theme-bg text-white f-12"><i class="fas fa-eye text-white"></i> View</a>
                                                          <a href="#!" class="label theme-bg text-white f-12"><i class="fa-pencil-alt fas text-white"></i> Edit</a>
                                                          <a href="javascript:void(0)" data-obj='{
                                                            "userId": "{{$user->id}}",
                                                            "url": "{{ route('users.destroy', $user->id) }}",
                                                            "method": "delete"
                                                          }' data-html="Once you delete this user, all of it's related Data will be deleted, including subscription." class="label theme-bg2 text-white f-12 deleteConfirm"><i class="fas fa-trash text-white"></i> Delete</a>

                                                        </td>
                                                    </tr>
                                                  @endforeach
                                                  @if ($users->count() < 1)
                                                  <tr>
                                                  <td colspan="7" class="text-center">
                                                      <h3>No Records</h3>
                                                  </td>
                                                  </tr>
                                                  @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @if ($users->total() > $users->perPage())

                                    <div class="card-footer tx-12 pd-y-15 bg-transparent">
                                        <div class="d-flex form-layout-footer justify-content-center submitSection">

                                            {!! $users->links() !!}

                                        </div>
                                    </div>
                                    @endif


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


@section('jsCommon')
  @include('common.js')
@endsection
