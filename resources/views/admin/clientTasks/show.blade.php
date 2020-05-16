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
                        <div class="row bg-white">

                            <div class="col-12 pt-3">
                                  <div class="float-left">

                                        <h5>{{ $clientTask->title }}</h5>

                                  </div>
                                  <div class="float-right">
                                      Due On: {{ $clientTask->dueOn }}
                                  </div>
                            </div>

                            <div class="col-12 mt-2">
                              Description
                              <br>
                          {!! $clientTask->description !!}

                            </div>

                            <div class="col-12 pb-4">

                              <div class="float-right">
                                <a class="btn btn-primary btn-sm" href="{{ route('root') }}">Back Dashboard</a>
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

@endsection
@section('js')

@endsection
