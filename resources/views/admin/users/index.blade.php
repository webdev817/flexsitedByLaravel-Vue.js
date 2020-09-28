@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->

                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                      
                        <div class="row">



                            <div class="col-md-12">
                            
                                <div class="card user-list">
                                    <div class="card-header">
                                        <h5>Users</h5>

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
                                                        <th>Status</th>
                                                        <th>Last Login</th>
                                                        <th>Sign Up</th>
                                                        <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($users as $user)

                                                    <tr>
                                                        <td>
                                                          <img class="rounded-circle" style="width:40px;"
                                                          @if ($user->image != null)
                                                            src="{{ asset( Storage::url($user->image)) }}"
                                                          @else
                                                          src="{{ asset( 'mawaisnow/able/assets/images/user/avatar-1.jpg' ) }}"
                                                          @endif


                                                           alt="activity-user">
                                                        </td>
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
                                                            <a href="javascript:void(0)" class="label theme-bg f-12 text-white">Active</a>
                                                          @elseif($user->status == 2)
                                                            <a href="javascript:void(0)" class="label theme-bg2 f-12 text-white">Closed</a>
                                                          @else
                                                            <a href="javascript:void(0)" class="label theme-bg2 f-12 text-white">Not Active</a>
                                                          @endif
                                                        </td>
                                                        <td>
                                                          @if ($user->lastLogin != null)
                                                            @php
                                                            $str = '';
                                                              try {
                                                                $str = \Carbon\Carbon::parse($user->lastLogin)->diffforhumans();
                                                              } catch (\Exception $e) {

                                                              }

                                                            @endphp
                                                             {{ $str }}

                                                          @endif
                                                        </td>
                                                        <td>
                                                          {{ $user->created_at->diffforhumans() }}
                                                        </td>
                                                        <td>
                                                          <a href="{{ route('clientOnBoarding',$user->id) }}" class="label theme-bg text-white f-12"><i class="fas fa-eye text-white"></i> View</a>
                                                          <a href="{{ route('users.edit', $user->id) }}" class="label theme-bg text-white f-12"><i class="fa-pencil-alt fas text-white"></i> Edit</a>
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
<style media="screen">

/* !important is needed sometimes */
::-webkit-scrollbar {
    -webkit-appearance: none;
    width: 7px;
    height: 7px;
}
::-webkit-scrollbar {
   width: 12px !important;
   -webkit-overflow-scrolling: touch;
}

/* Track */
::-webkit-scrollbar-track {
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3) !important;
  -webkit-border-radius: 10px !important;
  border-radius: 10px !important;
}

/* Handle */
::-webkit-scrollbar-thumb {
  -webkit-border-radius: 10px !important;
  border-radius: 10px !important;
  background: #41617D !important;
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5) !important;

}
::-webkit-scrollbar-thumb:window-inactive {
  background: #41617D !important;
}
</style>

@endsection


@section('jsCommon')

  @include('common.js')
@endsection
