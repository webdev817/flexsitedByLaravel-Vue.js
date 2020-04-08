@extends('layouts.welcomeWizered')
@section('js')
<script src="{{ asset('js/welcomeWizered.js') . "?ver=" . date('ymdhis') }}" charset="utf-8"></script>

<script type="text/javascript">
    $(function() {
        $('[data-toggle="popover"]').popover()
    })
    $("#Website").change(function () {
        var result = $(this).is(':checked');

        if (result) {
          $(".Website").removeClass('active').addClass('active');
        } else {
          $(".Website").removeClass('active');
        }
      });
    $("#marketing").change(function () {
        var result = $(this).is(':checked');

        if (result) {
          $(".marketing").removeClass('active').addClass('active');
        } else {
          $(".marketing").removeClass('active');
        }
      });
</script>
@endsection


@section('body')
<div class="container-fluid p-0 mb-5">
    <div class="row m-0">
        <div class="col-12 text-center p-0 " style="background-color:black;">
            <img src="{{ asset('mawaisnow/logo/FLEXSITED-2.jpg') }}" alt="" class="navLogo noselect">
        </div>
    </div>



    <link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
    <script src="{{ asset('css\select2.min.js') }}" charset="utf-8"></script>


    <div class="container pt-3 mb-5">
        <form action="{{  route('saveReferal') }}" onsubmit="return dosomeActionRelatedToBusinessInformation()" enctype="multipart/form-data" method="post">
          <input type="hidden" value="{{ $id }}" name="userInvitedBy">
            @csrf





            <div class="row justify-content-center">
                <div class="col-10 col-sm-10 col-md-8 col-lg-8 col-xl-6">

                  @include('common.messagesSupport')

                    <div class="row justify-content-center ">
                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 grayColor mt-3 p-0">
                            <h4 class="d-inline favColor">CONTACT INFORMATION</h4>
                        </div>
                        <div class="col-12"></div>
                    </div>

                    <div class="row">

                        <div class="col-12 p-0 mt-3">
                            <div class="input-group mb-3 border">
                                <input value="{{ old('name') }}" name="name" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="Name" required>
                            </div>
                        </div>

                        <div class="col-12 p-0">
                            <div class="input-group mb-3 border">
                                <input value="{{ old('businessPhoneNumber') }}" name="businessPhoneNumber" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="Phone Number" required>
                            </div>
                        </div>

                        <div class="col-12 p-0">
                            <div class="input-group mb-3 border">
                                <input value="{{ old('email') }}" name="email" type="email" class="border-0 form-control shadow-none cstmFormControl" placeholder="Email" required>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="row justify-content-center ">
                                <div class="col-12 col-md-6 col-lg-6 col-xl-6 grayColor mt-3 p-0">
                                    <h4 class="d-inline favColor">SERVICES REQUIRED</h4>
                                </div>
                                <div class="col-12"></div>
                            </div>
                        </div>

                        <div class="col-12 mt-3">
                            <div class="row mb-3 border">
                                <div class="col-lg-1  col-md-1 col-sm-1 col-4 addonsp1 logoDesign">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="logoDesign" class="custom-control-input" id="logoDesign"><label class="custom-control-label" for="logoDesign"></label>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-8 p-3">
                                    <div class="float-left addonsHead"> Logo Design </div>
                                    {{-- <div class="float-right"> <a data-container="body" data-toggle="popover" data-placement="left"
                            data-content="You will receive three design concepts and allowed three revisions." href="javascript:void(0)">Learn More</a> </div>
                          </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row mb-3 border">
                                <div class="col-lg-1  col-md-1 col-sm-1 col-4 addonsp1 businessCardDesign">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="businessCardDesign" class="custom-control-input" id="businessCardDesign"><label class="custom-control-label" for="businessCardDesign"></label>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-8 p-3">
                                    <div class="float-left addonsHead">Business Card Design </div>
                                    {{-- <div class="float-right"> <a data-container="body" data-toggle="popover" data-placement="left"
                          data-content="You will receive three design concepts and allowed three revisions." href="javascript:void(0)">Learn More</a> </div>
                        </div> --}}
                                </div>
                            </div>
                        </div>




                        <div class="col-12">
                            <div class="row mb-3 border">
                                <div class="col-lg-1  col-md-1 col-sm-1 col-4 addonsp1 flayerDesign">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="flayerDesign" class="custom-control-input" id="flayerDesign"><label class="custom-control-label" for="flayerDesign"></label>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-8 p-3">
                                    <div class="float-left addonsHead">Flyer Design</div>
                                    {{-- <div class="float-right"> <a data-container="body" data-toggle="popover" data-placement="left"
                          data-content="You will receive three design concepts and allowed three revisions." href="javascript:void(0)">Learn More</a> </div>
                        </div> --}}
                                </div>
                            </div>
                        </div>




                        <div class="col-12">
                            <div class="row mb-3 border">
                                <div class="col-lg-1  col-md-1 col-sm-1 col-4 addonsp1 Website">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="Website" class="custom-control-input" id="Website"><label class="custom-control-label" for="Website"></label>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-8 p-3">
                                    <div class="float-left addonsHead">Website</div>
                                    {{-- <div class="float-right"> <a data-container="body" data-toggle="popover" data-placement="left"
                          data-content="You will receive three design concepts and allowed three revisions." href="javascript:void(0)">Learn More</a> </div>
                        </div> --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row mb-3 border">
                                <div class="col-lg-1  col-md-1 col-sm-1 col-4 addonsp1 marketing">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="marketing" class="custom-control-input" id="marketing"><label class="custom-control-label" for="marketing"></label>
                                    </div>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-10 col-8 p-3">
                                    <div class="float-left addonsHead">Marketing</div>
                                    <div class="float-right"> <a data-container="body" data-toggle="popover" data-placement="left"
                          data-content="Marketing Service can be brand strategy, email marketing, social media marketing, search engine optimization, video marketing, content marketing" href="javascript:void(0)">Learn More</a> </div>
                        </div>
                                </div>
                            </div>
                        </div>





                    </div>
                </div>
            </div>









            <div class="row justify-content-center m-0">
                <div class="col-10 col-md-8 col-lg-8 col-xl-6  p-xl-3">
                    <button type="submit" class="btn btn-block col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 btn-cstm rounded-0 shadow-none" name="button">Submit</button>
                </div>
            </div>

        </form>

    </div>



    {{-- <div class="container ">
        <div class="row m-0 py-3">
            <div class="col-12 text-center">
                <button onclick="window.location = '{{ route('root') }}'" class=" float-left btn btn-cstm rounded-0 shadow-none backBtn" type="button">Back</button>
</div>
</div>
</div> --}}


<script type="text/javascript">
    $("#providingContent").select2({
        minimumResultsForSearch: -1,
        placeholder: "Are you providing content?"
    }).val(null).change();
    $("#howfindus").select2({
        minimumResultsForSearch: -1,
        placeholder: "How did you find us?"
    }).val(null).change();
</script>




</div>

@endsection
