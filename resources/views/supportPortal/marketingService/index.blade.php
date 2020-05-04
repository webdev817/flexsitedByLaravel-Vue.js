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
                                <div class="card-header cardHeader">
                                    <i class="fas fa-bullhorn"></i></span> &nbsp;
                                    Marketing Services
                                </div>


                                <form action="{{ route('marketingServiceStore') }}" method="post">

                                <div class="card-body row">
                                    @csrf



                                    <div class="form-group col-md-6 col-12">
                                      <select name="marketingService" class="form-control bg-transparent" required   id="marketingService">
                                        <option value="Brand Strategy">Brand Strategy</option>
                                        <option value="Email marketing">Email Marketing</option>
                                        <option value="Social Media Marketing">Social Media Marketing</option>
                                        <option value="Search Engine Optimization">Search Engine Optimization</option>
                                        <option value="Video Marketing">Video Marketing</option>
                                        <option value="Content Marketing">Content Marketing</option>
                                      </select>
                                    </div>


                                    <div class="form-group col-md-6 col-12">
                                      <button type="submit" name="button" class="btn btn-primary">Lets Go!</button>
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

@include('common.loadJS', ['select2'=>true])

@section('js')
  <script type="text/javascript">
    $("#marketingService").select2({
      minimumResultsForSearch: -1,
      placeholder: "Which Service are you interested in?"
  }).val(null).change();
  </script>
@endsection
