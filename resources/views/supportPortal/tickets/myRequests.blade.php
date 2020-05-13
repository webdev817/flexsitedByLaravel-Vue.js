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
                            @if (!superAdmin())
                              <h4>My Ticket Requests</h4>
                            @else
                              <h4>Ticket Requests</h4>
                            @endif
                          </div>



                            <div class="col-md-12">
                                <div class="card user-list">

                                    <div class="card-block pb-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                      <th>Subject</th>
                                                        <th>Issue</th>
                                                        <th>Date</th>
                                                        {{-- <th>Last Activty</th> --}}

                                                        <th>Status</th>
                                                        @if (!superAdmin())
                                                          <th>Response</th>
                                                        @endif

                                                        @if (superAdmin())
                                                          <th>Action</th>
                                                        @endif
                                                </thead>
                                                <tbody>
                                                    @foreach ($tickets as $ticket)

                                                    <tr>
                                                        <td>
                                                          {{ $ticket->ticketDepartment }}
                                                        </td>
                                                        <td>
                                                            {{ $ticket->message }}
                                                        </td>
                                                        <td>
                                                          {{ $ticket->created_at->format('d M, Y') }}
                                                        </td>

                                                        {{-- <td>
                                                          {{ $ticket->updated_at->format('d M, Y') }}
                                                        </td> --}}
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
                                                        @if (!superAdmin())
                                                          <td>
                                                            @if ($ticket->response1 != null)
                                                              {{ $ticket->response1 }}
                                                            @endif
                                                          </td>
                                                        @endif

                                                        @if (superAdmin())
                                                          <td>
                                                            @if ($ticket->status == 2)
                                                              {{ $ticket->response1 }}
                                                            @else

                                                            <form  action="{{ route('changeTicketStatus',$ticket->id) }}" method="post">
                                                              @csrf
                                                              @if ($ticket->status == 0)
                                                                  <button type="submit" class="btn btn-sm btn-primary" name="button">Activate</button>
                                                              @elseif ($ticket->status == 1)

                                                                @include('supportPortal.tickets.closeTicketmodal',[
                                                                  'ticket'=>$ticket
                                                                ])
                                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#ticekt{{$ticket->id}}" name="button">Close</button>
                                                              @endif

                                                            </form>
                                                          @endif

                                                          </td>
                                                        @endif


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
