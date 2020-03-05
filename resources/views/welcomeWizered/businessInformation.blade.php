<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
<script src="{{ asset('css\select2.min.js') }}" charset="utf-8"></script>
<style media="screen">
  .cstmFontForDomainInput{
  color: #6c757d !important;
  }

  .select2-container--default .select2-selection--single {

      border: 0px !important;
      /* border-radius: 4px */
  }
  .select2-container--default .select2-selection--single .select2-selection__rendered {
      color: #6c757d;
      line-height: 48px;
      font-size: 1rem;
      font-weight: 600;
  }
  .select2-container--classic .select2-selection--single:focus {
    border: 0px !important;
  }
  .select2-selection__arrow{
    display: none;
  }
  .select2-selection__rendered{
    border: 0px !important ;
  }
  .select2-selection__rendered:focus{
    border: 0px !important;
     box-shadow:none !important;
  }
  .select2-container *:focus {
        outline: none;
 }
 .select2-container {
   position: relative;
       flex: 1 1 0%;
       min-width: 0;
}
</style>
<div class="container mt-5 pt-3 mb-5">
<form  action="{{  route('businessInformationStore') }}" onsubmit="return dosomeActionRelatedToBusinessInformation()" enctype="multipart/form-data" method="post">

<input type="hidden" name="hiddenPageSelected" id="hiddenPageSelected" value="">

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
                        <textarea name="socialMediaHandles" rows="8" placeholder="Social Media Handles: Facebook, Instagram, Youtube, Other.
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

            <select class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput" required id="providingContent" name="providingContent">
              <option value="" selected disabled>Are you providing content?</option>
              <option value="yes">Yes</option>
              <option value="no">No</option>
            </select>
            {{-- <input type="text" class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput"  placeholder="Are you providing content?" > --}}
             <div class="input-group-append">
              <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" onclick="$('#providingContent').select2('open');" type="button" >
                <i class="fa fa-angle-down" style="font-size:30px"></i>
              </button>
            </div>
          </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
          <div class="borderFav input-group mb-3 p-1">

            <input type="file" onchange="fileChanged(this,'.logoUploadInputDisplay')" multiple  accept=".zip,.rar,.7zip,image/*"  class="d-none" id="logoUpload" name="logoUpload[]" value="">

            <input type="text" onclick="$('#logoUpload').trigger('click')" class="logoUploadInputDisplay border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput"  placeholder="Logo Upload( If applicable)" >
            <div class="input-group-append" onclick="$('#logoUpload').trigger('click')">
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

            <input type="file" onchange="fileChanged(this,'.contentUploadInput')" accept="application/pdf,application/msword,
  application/vnd.openxmlformats-officedocument.wordprocessingml.document,.txt" class="d-none" id="contentUpload" name="contentUpload" value="">


            <input type="text"  onclick="$('#contentUpload').trigger('click')"  class="contentUploadInput border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput"  placeholder="Content Upload( If applicable)" >
            <div class="input-group-append" onclick="$('#contentUpload').trigger('click')">
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


            <input type="file" onchange="fileChanged(this,'.galleryImagesInput')" multiple class="d-none" id="galleryImages" name="galleryImages[]" value="">


            <input type="text"  onclick="$('#galleryImages').trigger('click')"   class="galleryImagesInput border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput"  placeholder="Gallery Images ( If applicable)" >
            <div class="input-group-append"  onclick="$('#galleryImages').trigger('click')"  >
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
            <select class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput" required id="howfindus" name="howfindus">
              <option value="" selected disabled>How did you find us?</option>
              <option value="Google">Google</option>
              <option value="Flyer">Flyer</option>
              <option value="Social Media">Social Media</option>
              <option value="Friend">Friend</option>
              <option value="Conference">Conference</option>
              <option value="Other">Other</option>

            </select>
            {{-- <input type="text" class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput"  placeholder="How did you find us?" > --}}
            <div class="input-group-append">
              <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" onclick="$('#howfindus').select2('open')" type="button" >
                <i class="fa fa-angle-down" style="font-size:30px"></i>


              </button>
            </div>
          </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
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
    minimumResultsForSearch: -1
  });
  $("#howfindus").select2({
    minimumResultsForSearch: -1
  });
</script>
