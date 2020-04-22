@extends('layouts.supportPortal.master')

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
                                {{-- <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('adminHome') }}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">

                      @include('common.messagesSupport')

                        <!-- [ Main Content ] start -->
                        <div class="row">








                          <div class="col-12">
                            <h4>My Requests</h4>
                          </div>



                            <div class="col-md-12">
                                <div class="card user-list">

                                    <div class="card-block pb-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Subject</th>
                                                        <th>Activty</th>
                                                        <th>Last Activty</th>
                                                        <th>Satus</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($tickets as $ticket)

                                                    <tr>
                                                        <td>
                                                            {{ $ticket->message }}
                                                        </td>
                                                        <td>
                                                          {{ $ticket->created_at->format('d M, Y') }}
                                                        </td>

                                                        <td>
                                                          {{ $ticket->updated_at->format('d M, Y') }}
                                                        </td>
                                                        <td>
                                                          @if ($ticket->status == 0)
                                                            <div class="statusInitlizing">
                                                                Pending
                                                            </div>
                                                          @elseif ($ticket->status == 1)
                                                            <div class="statusInProgress">
                                                              Active
                                                            </div>
                                                          @elseif ($ticket->status == 2)
                                                            <div class="statusCompleted">
                                                              Solved
                                                            </div>
                                                          @endif
                                                        </td>

                                                        {{-- <td>
                                                          <a href="{{ route('clientOnBoarding',$user->id) }}" class="label theme-bg text-white f-12"><i class="fas fa-eye text-white"></i> View</a>
                                                          <a href="{{ route('users.edit', $user->id) }}" class="label theme-bg text-white f-12"><i class="fa-pencil-alt fas text-white"></i> Edit</a>
                                                          <a href="javascript:void(0)" data-obj='{
                                                            "userId": "{{$user->id}}",
                                                            "url": "{{ route('users.destroy', $user->id) }}",
                                                            "method": "delete"
                                                          }' data-html="Once you delete this user, all of it's related Data will be deleted, including subscription." class="label theme-bg2 text-white f-12 deleteConfirm"><i class="fas fa-trash text-white"></i> Delete</a>

                                                        </td> --}}
                                                    </tr>
                                                  @endforeach
                                                  @if ($tickets->count() < 1)
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
                                    @if ($tickets->total() > $tickets->perPage())

                                    <div class="card-footer tx-12 pd-y-15 bg-transparent">
                                        <div class="d-flex form-layout-footer justify-content-center submitSection">

                                            {!! $tickets->links() !!}

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
