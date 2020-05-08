<link rel="stylesheet" href="{{ asset('css/select2.min.css') }}">
<script src="{{ asset('css\select2.min.js') }}" charset="utf-8"></script>

<style media="screen">
.select2-container--default .select2-selection--single .select2-selection__placeholder {
    color: #6c757d;
}
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
<input type="hidden" id="maxPagesToBeSelected" value="{{ $pages }}">
<div class="container pl-4 mt-5 pt-3 mb-5">
<form  action="{{  route('businessInformationStore') }}" autocomplete="off" onsubmit="return dosomeActionRelatedToBusinessInformation()" enctype="multipart/form-data" method="post">

<input type="hidden" name="hiddenPageSelected" id="hiddenPageSelected" value="">

@csrf





    <div class="row justify-content-center ">
        <div class="col-12 col-md-6 col-lg-6 col-xl-6 grayColor mt-3 p-0">
            <h4 class="d-inline favColor">BUSINESS INFORMATION</h4>
        </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-12 col-md-6 col-lg-6 col-xl-6 grayColor mt-3 p-0">
        <h6 class="d-inline text-dark">
          Complete the items that you can and skip those that you don’t know . Feel free to log back in at any time to complete this step. Upon completion, your project manager will contact you within 24 business hours to go over the details with you</h6>
      </div>
    </div>

    @if (isset($errors) && $errors->any())
      <div class="row justify-content-center">
        <div class="col-12 col-md-12 col-lg-6 col-xl-6 p-0">
          <div class="">
            @foreach ($errors->all() as $key => $error)
            <div class="alert alert-solid alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{ $error }}
            </div>
            @endforeach
          </div>
      </div>
    </div>
    @endif

    @include('welcomeWizered.businessinformation.businessInformation')



    @include('welcomeWizered.businessinformation.websiteStruture')



    @include('welcomeWizered.businessinformation.websiteDesign')





    @include('welcomeWizered.businessinformation.logoDesign')


    @include('welcomeWizered.businessinformation.flyerDesign')


    @include('welcomeWizered.businessinformation.businessCardDesign')




















    <div class="row justify-content-center mt-5 mb-5 pb-5">
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
    minimumResultsForSearch: -1,
    placeholder: "Are you providing content?"
  }).val(null).change();
  $("#howfindus").select2({
    minimumResultsForSearch: -1,
    placeholder: "How did you find us?"
  }).val(null).change();

  $("#textandImageOrText").select2({
    minimumResultsForSearch: -1,
    placeholder: "Would you like text and image or just text?"
  }).val(null).change();
  $("#frontandbackdesign").select2({
    minimumResultsForSearch: -1,
    placeholder: "Would you like front and back design?"
  }).val(null).change();

</script>
