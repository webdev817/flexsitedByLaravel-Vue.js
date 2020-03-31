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



                                    <div class="form-group col-md-6">
                                        <input type="text" name="subject" class="form-control bg-transparent" required placeholder="Please Enter Subject" >
                                    </div>
                                     
                                    <div class="form-group col-md-12 text-center mt-3">
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
