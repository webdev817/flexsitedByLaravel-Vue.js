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
                            <div class="col-12 card bg-white p-3">


                                @include('common.messages')

                                <form @isset($clientTask)
                                action="{{ route('clientTasks.update',$clientTask->id) }}"
                                @else
                                action="{{ route('clientTasks.store') }}"
                                @endisset
                                method="post" id="payment-form">
                                @csrf
                                @isset($clientTask)

                                {{ method_field('PUT') }}
                                @endisset

                                <div class="section-wrapper">

                                    <div class="form-layout">

                                        <div class="row mb-4">

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label w-100" for="title">Title: <span class="tx-danger">*</span> </label>
                                                    <input class="form-control" type="text" id="title" name="title" @isset($clientTask)
                                                    value="{{$clientTask->title }}"
                                                    @else
                                                    value="{{ old('title') }}"
                                                    @endisset
                                                    required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label w-100" for="dueOn">Due On: <span class="tx-danger">*</span> </label>
                                                    <input class="form-control" type="text" id="dueOn" name="dueOn" @isset($clientTask)
                                                    value="{{$clientTask->dueOn }}"
                                                    @else
                                                    value="{{ old('dueOn') }}"
                                                    @endisset
                                                    required>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                              <div class="form-group">
                                                <label class="form-control-label  w-100" for="status">User: <span class="tx-danger">*</span> </label>
                                                <select class="form-control"

                                                @if (isset($clientTask))
                                                  readonly disabled
                                                @endif
                                                  id="user" name="users[]">
                                                  @foreach ($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>

                                                  @endforeach
                                                </select>
                                              </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label  w-100" for="status">Status: <span class="tx-danger">*</span> </label>
                                                    @isset($clientTask)
                                                    <select class="form-control" name="status" id="status">
                                                      <option @if($clientTask->status == 1) selected
                                                      @endif value="1">InComplete</option>
                                                        <option @if($clientTask->status == 2) selected
                                                        @endif value="2">Completed</option>

                                                    </select>
                                                    @else
                                                    <select class="form-control" name="status" id="status">
                                                      <option selected value="1">InComplete</option>
                                                        <option  value="2">Completed</option>

                                                    </select>
                                                    @endisset

                                                </div>
                                            </div>
                                            <div class="col-12">

                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">

                                                    <label class="form-control-label  w-100" for="description">Description: <span class="tx-danger">*</span> </label>
                                                    <textarea name="description" rows="8" class="form-control" cols="80">@if(isset($clientTask)){{ $clientTask->description }}@endif</textarea>


                                                </div>
                                            </div>





                                        </div>







                                        <div class="form-layout-footer submitSection">

                                            <button type="submit" id="submitButton" class="btn btn-primary " name="button">Submit</button>


                                        </div>
                                    </div>
                                </div>
                                </form>
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
@include('common.loadJS', ['flatpicker'=> true])


@section('js')
  <script type="text/javascript">
    $("#user").select2({
    });

    dueOn
    @if (isset($clientTask))
      var s = flatpickr("#dueOn", {
          defaultDate: "{{ $clientTask->dueOn }}"
      });
    @else
      var s = flatpickr("#dueOn");
    @endif

  </script>


@endsection
