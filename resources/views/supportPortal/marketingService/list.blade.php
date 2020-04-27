@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper">

                        @include('common.messagesSupport')

                        <div class="col-sm-12">
                            <div class="card bg-light">


                                <div class="card user-list">
                                    <div class="card-header">
                                        <h5>Requests</h5>
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
                                                        <th>Service</th>
                                                        <th>User Name</th>
                                                        <th>Business Name</th>
                                                        <th>User Email</th>
                                                        <th>Requested on</th>
                                                        <th>Action</th>
                                                </thead>
                                                <tbody>
                                                    @foreach ($marketingServices as $marketingService)

                                                    <tr>

                                                        <td>
                                                            {{ $marketingService->marketingService }}
                                                        </td>

                                                        <td>
                                                            {{ $marketingService->user->name }}
                                                        </td>
                                                        <td>
                                                            {{ $marketingService->user->businessName }}
                                                        </td>
                                                        <td>
                                                            {{ $marketingService->user->email }}
                                                        </td>

                                                        <td>
                                                            {{ $marketingService->created_at->diffForHumans() }}
                                                        </td>
                                                        <td>

                                                            <a href="javascript:void(0)" data-obj='{
                                                                                          "userId": "{{$marketingService->id}}",
                                                                                          "url": "{{ route('users.destroy', $marketingService->id) }}",
                                                                                          "method": "delete"
                                                                                        }' data-html="Are you sure you want to delete?"
                                                              class="label theme-bg2 text-white f-12 deleteConfirm"><i class="fas fa-trash text-white"></i> Delete</a>

                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    @if ($marketingServices->count() < 1) <tr>
                                                        <td colspan="7" class="text-center">
                                                            <h3>No Records</h3>
                                                        </td>
                                                        </tr>
                                                        @endif

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @if ($marketingServices->total() > $marketingServices->perPage())

                                    <div class="card-footer tx-12 pd-y-15 bg-transparent">
                                        <div class="d-flex form-layout-footer justify-content-center submitSection">

                                            {!! $marketingServices->links() !!}

                                        </div>
                                    </div>
                                    @endif


                                </div>


                            </div>
                        </div>


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
