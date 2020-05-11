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
                      @include('common.messagesSupport')

                        <!-- [ Main Content ] start -->
                        <div class="row">
                          <div class="col-12 text-right  p-3">
                              <a href="{{ route('clientTasks.create') }}" class="btn btn-primary btn-sm">Add Client Task</a>
                          </div>
                            <div class="col-12">

                                <div class="bg-white mg-t-20 mg-sm-t-30">

                                    <div class="table-responsive">
                                        <table class="table mg-b-0 tx-13">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    @if (superAdmin())
                                                      <th>User</th>
                                                    @endif
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($clientTasks as $clientTask)
                                                <tr>

                                                    <td>
                                                        @if (!superAdmin())
                                                          <a href="{{ route('clientTasks.show', $clientTask->id) }}">
                                                              {{ $clientTask->title }}
                                                          </a>
                                                        @else
                                                          <a href="{{ route('clientTasks.edit', $clientTask->id) }}">
                                                              {{ $clientTask->title }}
                                                          </a>
                                                        @endif

                                                    </td>

                                                      <td>
                                                        <a href="{{ route('clientOnBoarding', $clientTask->user->id) }}">
                                                          {{ $clientTask->user->name }}
                                                        </a>
                                                      </td>








                                                    <td>
                                                        @if ($clientTask->status == 1)
                                                          InComplete
                                                        @else
                                                          Completed
                                                        @endif
                                                    </td>

                                                    <td>


                                                        <form class="d-none" id="{{$clientTask->id}}" action="{{ route('clientTasks.destroy',$clientTask->id) }}" method="post">
                                                            @csrf
                                                            {{ method_field('DELETE') }}
                                                        </form>

                                                        <a title="Delete" href="javascript:void(0)" formId="{{$clientTask->id}}" class="fa-2x ml-1 text-danger confirmDelete"><i class="fa fa-trash"></i></a>


                                                    </td>



                                                </tr>
                                                @endforeach

                                                @if ($clientTasks->count() < 1) <tr>
                                                    <td colspan="6" class="text-center">
                                                        <h1>No Records</h1>
                                                    </td>
                                                    </tr>
                                                    @endif



                                            </tbody>
                                        </table>
                                    </div>

                                    @if ($clientTasks->total() > $clientTasks->perPage())

                                    <div class="card-footer tx-12 pd-y-15 bg-transparent">
                                        <div class="d-flex form-layout-footer justify-content-center submitSection">

                                            {!! $clientTasks->links() !!}

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

@section('head')
<script src="{{ asset('mawaisnow/slim/lib/select2/js/select2.full.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('mawaisnow/slim/lib/select2/css/select2.min.css') }}">

@endsection
@section('js')

@endsection
