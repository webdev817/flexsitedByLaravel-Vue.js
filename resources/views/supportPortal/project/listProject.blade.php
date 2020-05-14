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




                          @if (Session::has('OrderPlaced'))

                            <div class="modal fade" id="orderPlaced" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">



                                  <div class="modal-body p-0">
                                    <div class="container-fluid p-0">
                                      <div class="col-12 p-0">
                                        <img class="img-fluid" src="{{ asset('mawaisnow/sp/order/orderPlaced.png') }}" alt="">
                                      </div>
                                    </div>
                                    <div class="container">
                                        <div class="row mt-4">
                                          <div class="col-12 text-center">
                                            <h4>Thank you!  Your Order has been successfully submitted.</h4>
                                            <br>
                                             Please allow 1-3 business days to process your order.
                                          </div>
                                        </div>


                                    </div>

                                  </div>
                                  <div class="modal-footer bg-transparent mt-3 border-0">
                                    <div class="container">
                                      <div class="col-12">
                                        <button type="button" data-dismiss="modal" class="btn btn-block btn-primary">Ok</button>

                                      </div>
                                    </div>
                                  </div>



                                </div>
                              </div>
                            </div>
                            <script type="text/javascript">
                            $(document).ready(function () {
                              $("#orderPlaced").modal('show');
                            });
                            </script>
                          @endif







                            <div class="col-md-12">
                                <div class="card user-list">

                                    <div class="card-block p-0">
                                        <div class="table-responsive">
                                            <table class="table table-hover" >
                                                <thead>
                                                    <tr>
                                                        <th>Project Name</th>
                                                        <th>Due Date</th>


                                                        @if (superAdmin())
                                                          <th>Client</th>
                                                        @endif

                                                        <th>Status</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($projects as $project)

                                                    <tr>
                                                        <td>
                                                            <a href="{{ route('projects.show', $project->id) }}">
                                                              {{ $project->title }}
                                                            </a>
                                                        </td>
                                                        <td>
                                                          @if ( $project->dueOn == null)
                                                            TBD
                                                          @else
                                                            {{ Carbon\Carbon::parse($project->dueOn)->format('Y-m-d') }}
                                                          @endif
                                                        </td>



                                                        @if (superAdmin())
                                                          <td title="{{ $project->user->email }}">
                                                            {{ $project->user->name }}
                                                          </td>
                                                        @endif

                                                        <td>
                                                          @include('supportPortal.common.projectStatus', ['status' => $project->status])
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
                                                  @if ($projects->count() < 1)
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
                                    @if ($projects->total() > $projects->perPage())

                                    <div class="card-footer tx-12 pd-y-15 bg-transparent">
                                        <div class="d-flex form-layout-footer justify-content-center submitSection">

                                            {!! $projects->links() !!}

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
