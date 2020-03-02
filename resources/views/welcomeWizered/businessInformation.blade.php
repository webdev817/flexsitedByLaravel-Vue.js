<div class="container mt-5 pt-3 mb-5">
<form  action="{{  route('businessInformationStore') }}" method="post">


@csrf
    <div class="row justify-content-center ">
        <div class="col-12 col-md-6 col-lg-6 col-xl-6 grayColor mt-3 p-0">
            <h4 class="d-inline favColor">BUSINESS INFORMATION</h4>
        </div>
        <div class="col-12"></div>
    </div>


    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-6 col-xl-6">


            <div class="row">

                <div class="col-12 p-0 mt-3">
                    <div class="input-group mb-3 border">
                        <input value="{{ old('businessName') }}" name="businessName" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="Business Name" aria-label="Business Name" required>
                    </div>
                </div>

                <div class="col-12 p-0">
                    <div class="input-group mb-3 border">
                        <input value="{{ old('businessPhoneNumber') }}" name="businessPhoneNumber" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="Business Phone Number" aria-label="Business Phone Number" required>
                    </div>
                </div>

                <div class="col-12 p-0">
                    <div class="input-group mb-3 border">
                        <input value="{{ old('businessAddress') }}" name="businessAddress" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="Business Address" aria-label="Business Address" required>
                    </div>
                </div>
                <div class="col-12 p-0">
                    <div class="input-group mb-3 border">
                        <input value="{{ old('hoursOfOperation') }}" name="hoursOfOperation" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="Hours of Operation" aria-label="Hours of Operation" required>
                    </div>
                </div>
                <div class="col-12 p-0">
                    <div class="input-group mb-3 border">
                        <input value="{{ old('whatBeautyServicesDoYouOffer') }}" name="whatBeautyServicesDoYouOffer" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="What beauty services do you offer?"
                          aria-label="What beauty services do you offer?" required>
                    </div>
                </div>
                <div class="col-12 p-0">
                    <div class="input-group mb-3 border">
                        <input value="{{ old('appointment') }}" name="appointment" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="Appointment Booking Provider: (If applicable)"
                          aria-label="Appointment Booking Provider: (If applicable)" required>
                    </div>
                </div>

                <div class="col-12 p-0">
                    <div class="input-group mb-3 border">
                        <textarea name="name" rows="8" placeholder="Social Media Handles: Facebook, Instagram, Youtube, Other.
Type Social Media Links" cols="80" class="border-0 form-control shadow-none cstmFormControl"></textarea>
                    </div>
                </div>

            </div>
        </div>
    </div>




    <div class="row justify-content-center ">

        <div class="col-12 col-md-6 col-lg-6 col-xl-6">


            <div class="row mb-3">

                <div class="col-12 grayColor mt-3 p-0">
                    <h4 class="d-inline favColor">WEBSITE STRUCTURE</h4>
                </div>
                <div class="col-12 grayColor mt-2 p-0">
                    <h6 class="d-inline">Please choose the pages you would like based on your purchased package:</h6>
                </div>
            </div>


            <div class="row">

              <div class="col-xl-5 commonSelectPages mb-3  border">
                <div class="row">
                  <div class="  boxRadioContainer">
                    <div class="roundRound">
                    </div>
                  </div>
                  <div class="resetOfSiteStructor">
                    Home
                  </div>
                </div>
              </div>
              <div class="col-xl-5 commonSelectPages mb-3 offset-xl-2  border">
                <div class="row">
                  <div class=" boxRadioContainer">
                    <div class="roundRound">
                    </div>
                  </div>
                  <div class="  resetOfSiteStructor">
                    Booking
                  </div>
                </div>
              </div>


              <div class="col-xl-5 commonSelectPages mb-3  border">
                <div class="row">
                  <div class="  boxRadioContainer">
                    <div class="roundRound">
                    </div>
                  </div>
                  <div class="resetOfSiteStructor">
                    About
                  </div>
                </div>
              </div>
              <div class="col-xl-5 commonSelectPages mb-3 offset-xl-2  border">
                <div class="row">
                  <div class="  boxRadioContainer">
                    <div class="roundRound">
                    </div>
                  </div>
                  <div class=" resetOfSiteStructor">
                    Classes
                  </div>
                </div>
              </div>

              <div class="col-xl-5 commonSelectPages mb-3  border">
                <div class="row">
                  <div class="  boxRadioContainer">
                    <div class="roundRound">
                    </div>
                  </div>
                  <div class="resetOfSiteStructor">
                    Services
                  </div>
                </div>
              </div>
              <div class="col-xl-5 commonSelectPages mb-3 offset-xl-2  border">
                <div class="row">
                  <div class="  boxRadioContainer">
                    <div class="roundRound">
                    </div>
                  </div>
                  <div class="  resetOfSiteStructor">
                    Testimonial
                  </div>
                </div>
              </div>



              <div class="col-xl-5 commonSelectPages mb-3  border">
                <div class="row">
                  <div class="  boxRadioContainer">
                    <div class="roundRound">
                    </div>
                  </div>
                  <div class="resetOfSiteStructor">
                    FAQS
                  </div>
                </div>
              </div>
              <div class="col-xl-5 commonSelectPages mb-3 offset-xl-2  border">
                <div class="row">
                  <div class="  boxRadioContainer">
                    <div class="roundRound">
                    </div>
                  </div>
                  <div class="  resetOfSiteStructor">
                    Specials
                  </div>
                </div>
              </div>


              <div class="col-xl-5 commonSelectPages mb-3  border">
                <div class="row">
                  <div class="  boxRadioContainer">
                    <div class="roundRound">
                    </div>
                  </div>
                  <div class="resetOfSiteStructor">
                    Pricing
                  </div>
                </div>
              </div>
              <div class="col-xl-5 commonSelectPages mb-3 offset-xl-2  border">
                <div class="row">
                  <div class="  boxRadioContainer">
                    <div class="roundRound">
                    </div>
                  </div>
                  <div class="  resetOfSiteStructor">
                    Privacy Policy
                  </div>
                </div>
              </div>



              <div class="col-xl-5 commonSelectPages mb-3  border">
                <div class="row">
                  <div class="  boxRadioContainer">
                    <div class="roundRound">
                    </div>
                  </div>
                  <div class="resetOfSiteStructor">
                    Portfolio
                  </div>
                </div>
              </div>
              <div class="col-xl-5 commonSelectPages mb-3 offset-xl-2  border">
                <div class="row">
                  <div class="  boxRadioContainer">
                    <div class="roundRound">
                    </div>
                  </div>
                  <div class=" resetOfSiteStructor">
                    Terms & Conditions
                  </div>
                </div>
              </div>


              <div class="col-xl-5 commonSelectPages mb-3  border">
                <div class="row">
                  <div class=" boxRadioContainer">
                    <div class="roundRound">
                    </div>
                  </div>
                  <div class="resetOfSiteStructor">
                    Shop
                  </div>
                </div>
              </div>


            </div>



        </div>


    </div>


    <div class="row justify-content-center mb-2">
        <div class="col-12 col-md-6 col-lg-6 col-xl-6 grayColor mt-3 p-0">
            <h4 class="d-inline favColor">WEBSITE DESIGN</h4>
        </div>
        <div class="col-12"></div>
    </div>

    <div class="row justify-content-center">
      <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
          <div class="borderFav input-group mb-3 p-1">
            <input type="text" class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput"  placeholder="Are you providing content?" >
            <div class="input-group-append">
              <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" type="button" >
                <i class="fa fa-angle-down" style="font-size:30px"></i>
              </button>
            </div>
          </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
          <div class="borderFav input-group mb-3 p-1">
            <input type="text" class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput"  placeholder="Logo Upload( If applicable)" >
            <div class="input-group-append">
              <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" type="button" >
                <i class="fas fa-paperclip" style="font-size:22px"></i>


              </button>
            </div>
          </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
          <div class="borderFav input-group mb-3 p-1">
            <input type="text" class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput"  placeholder="Content Upload( If applicable)" >
            <div class="input-group-append">
              <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" type="button" >
                <i class="fas fa-paperclip" style="font-size:22px"></i>


              </button>
            </div>
          </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
          <div class="borderFav input-group mb-3 p-1">
            <input type="text" class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput"  placeholder="Gallery Images ( If applicable)" >
            <div class="input-group-append">
              <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" type="button" >
                <i class="fas fa-paperclip" style="font-size:22px"></i>


              </button>
            </div>
          </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
          <div class="borderFav input-group mb-3 p-1">
            <input type="text" class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput"  placeholder="How did you find us?" >
            <div class="input-group-append">
              <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" type="button" >
                <i class="fa fa-angle-down" style="font-size:30px"></i>


              </button>
            </div>
          </div>
      </div>
    </div>


  </form>

</div>



<div class="container ">
    <div class="row m-0 py-3">
        <div class="col-12 text-center">
            <button onclick="window.location = '{{ route('root') }}'" class=" float-left btn btn-cstm rounded-0 shadow-none backBtn" type="button">Back</button>
        </div>
    </div>
</div>
