@extends('layouts.supportPortal.master')
@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">

                                {{-- <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('adminHome') }}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('supportFAQ.index') }}">My Requests</a></li>
                                    <li class="breadcrumb-item">
                                      @isset($supportFaq)
                                        Submit Ticket
                                      @else
                                        Submit Ticket
                                      @endisset
                                    </li>
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-body">
                    <div class="page-wrapper">

                        @include('common.messages')

                        <div class="row">

                            <div class="col-12">



                                <div class="card user-list">
                                    <div class="card-header">
                                        <h5>@isset($supportFaq)
                                          Submit Ticket
                                        @else
                                          Submit Ticket
                                        @endisset</h5>
                                        
                                    </div>
                                    <form class=""
                                    @isset($supportFaq)
                                      action="{{ route('tickets.update', $supportFaq->id) }}"
                                    @else
                                      action="{{ route('tickets.store') }}"
                                    @endisset
                                      method="post" enctype="multipart/form-data">
                                        <div class="card-block row m-0 pl-0 pr-0">

                                            @csrf

                                            @isset($supportFaq)
                                              {{ method_field('put') }}
                                            @endisset

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <select class="form-control" name="issueTopic" id="issueTopic" required>
                                                        @foreach ($issueRelatedTo as $issueTopic)
                                                          <option value="{{ $issueTopic }}">{{ $issueTopic }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>




                                            <div class="col-lg-12">
                                              <div class="form-group">

                                                  <textarea name="message" id="message" class="form-control" required placeholder="Please explain the issue in detail." rows="5" cols="80">{{ old('message') }}</textarea>
                                              </div>
                                            </div>
                                            <div class="col-lg-12">
                                              <input type="text" onclick="$('#fileInput').click()" class="form-control" placeholder="Please Attach File (Optional)" name="fileName" id="filechoosed" value="">
                                              <input onchange="showthefilename(this, 'filechoosed','Please Attach File (Optional)')" type="file" class="d-none" id="fileInput" name="file" value="">
                                            </div>

                                            <div class="col-12 mt-4">
                                                <button type="submit" class="btn btn-primary" name="button">
                                                @isset($supportFaq)
                                                  Update
                                                @else
                                                  Submit
                                                @endisset
                                                </button>
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
</div>
@include('common.copyBtn')

@endsection

@include('common.loadJS', ['select2'=>true])

@section('js')
  <script type="text/javascript">
    $("#issueTopic").select2({
      minimumResultsForSearch: -1,
      placeholder: "Select the issue you are experiencing"
  }).val(null).change();
  </script>
@endsection
