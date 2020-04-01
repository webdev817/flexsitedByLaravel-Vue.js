@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper">

                      @include('common.messagesSupport')

                        <div class="col-12">
                          <h4 class="headingColor">Invite Friends and win free Month of Service</h4>

                            <div class="row mt-3">
                              <div class="col-12 col-md-8">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of
                              </div>
                            </div>

                        </div>

                        <div class="col-12">
                          <div class="row mt-4">

                            <div class="col-12 col-sm-6 col-md-4">
                              <div class="card">
                                  <div class="card-header border-0 text-center">
                                    <img class="img-fluid" src="{{ asset('mawaisnow\sp\referal\Group 414.png') }}" alt="">
                                  </div>
                                  <div class="card-body minHeight1 justify-content-center row">
                                    <div class="col-12  text-center">
                                      <h5 class="headingColor">Spread the world</h5>
                                    </div>
                                    <div class="col-12 mt-3">
                                      Invite friend by sending them Referral Link directly, Post it on your website or share it on social media and other communication channel to use
                                    </div>
                                  </div>
                              </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                              <div class="card">
                                  <div class="card-header border-0 text-center">
                                    <img class="img-fluid" src="{{ asset('mawaisnow\sp\referal\Group 415.png') }}" alt="">
                                  </div>
                                  <div class="card-body minHeight1 justify-content-center row">
                                    <div class="col-12  text-center">
                                      <h5 class="headingColor">A Friend Signup</h5>
                                    </div>
                                    <div class="col-12 mt-3">
                                      Invite friend by sending them Referral Link directly, Post it on your website or share it on social media and other communication channel to use
                                    </div>
                                  </div>
                              </div>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                              <div class="card">
                                  <div class="card-header border-0 text-center">
                                    <img class="img-fluid" src="{{ asset('mawaisnow\sp\referal\Group 416.png') }}" alt="">
                                  </div>
                                  <div class="card-body minHeight1 justify-content-center row">
                                    <div class="col-12  text-center">
                                      <h5 class="headingColor">You win free month of service</h5>
                                    </div>
                                    <div class="col-12 mt-3">
                                      Invite friend by sending them Referral Link directly, Post it on your website or share it on social media and other communication channel to use
                                    </div>
                                  </div>
                              </div>
                            </div>



                          </div>
                        </div>



                        <div class="col-12 mt-4"></div>



                        <div class="col-12">
                          <div class="row">
                            <div class="col-7">
                              <div class="row">
                                <div class="col-12">
                                  <h5>Your Invite Link</h5>
                                </div>
                                <div class="col-12 mt-3">
                                  <div class="input-group mb-3">
                                      <input type="text" class="form-control bg-white" value="" >
                                      <div class="input-group-append">
                                          <button class="btn btn-primary" type="button">Button</button>
                                      </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-4">
                              <div class="row">
                                <div class="col-12">
                                  <h5>Share via Social</h5>
                                </div>

                                <div class="col-3 mt-1">
                                  <a href="#">
                                    <div class="col-auto rounded-circle bg-white socialIconForReferral text-center">
                                        <i class="fab fa-facebook-f text-primary"></i>
                                    </div>
                                  </a>

                                </div>
                                <div class="col-3 mt-1">
                                  <a href="#">
                                    <div class="col-auto rounded-circle bg-white socialIconForReferral text-center">
                                        <i class="fab fa-twitter text-c-blue "></i>
                                    </div>
                                  </a>
                                </div>

                              </div>
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

@include('common.loadJS', ['select2'=>true])

@section('js')
  <script type="text/javascript">
    $("#marketingService").select2({
      minimumResultsForSearch: -1,
      placeholder: "Which Service are you interested in?"
  }).val(null).change();
  </script>
@endsection
