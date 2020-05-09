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
                            <div class="card ">
                                <div class="card-header cardHeader">
                                    <i class="feather icon-phone-call"></i></span> &nbsp;
                                    Contact Us
                                </div>


                                <form action="{{ route('contactUsStore') }}" method="post">

                                <div class="card-body row">
                                    @csrf

                                    {{-- <div class="form-group col-md-6">
                                        <input type="email" name="email" class="form-control bg-transparent" required placeholder="Please Enter Email" >
                                    </div> --}}

                                    <div class="form-group col-md-6">
                                        <input type="text" name="subject" class="form-control bg-transparent" required placeholder="Please Enter Subject" >
                                    </div>
                                    <div class="form-group col-md-12 mt-2">
                                      <textarea name="message" placeholder="Please Type your Message" required class="form-control bg-transparent" rows="8" cols="80"></textarea>
                                    </div>
                                    <div class="form-group col-md-12 text-center mt-3">
                                      <button type="submit" name="button" class="btn btn-primary">Send Message</button>
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
