<form class="" action="{{ route('storeBilling') }}" id="payment-form" method="post">
@csrf
<input type="hidden" name="hiddenPlanNumber" value="{{ $planNumber }}">
<input type="hidden" id="hiddenPlanDurration" name="hiddenPlanDurration" value="m">


    <div class="container mt-5 pt-3 mb-5">

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

        <div class="row justify-content-center">



            @if ($planNumber == 1)


            <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3 monthlyOrYearlyPlan">
                <div class="w-100 planHead hand  active" onclick="planSelected('m')">
                    basic plan
                    <div class="w-100 mt-2 pt-3 planPrice "> $39.95 </div>
                    <div class="w-100 planDurration mt-2 "> Monthly Plan </div>
                </div>

                <div class="w-100 planOfferBox ">1 page custom website </div>
                <div class="w-100 planOfferBox "> SOCIAL MEDIA LINKS ICONS</div>
                <div class="w-100 planOfferBox "> booking link </div>
                <div class="w-100 planOfferBox "> Stock Images </div>

            </div>

            <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3 monthlyOrYearlyPlan">
                <div class="w-100 planHead hand "  onclick="planSelected('y')">
                    basic plan
                    <div class="w-100 mt-2 pt-3 planPrice "> $360 </div>
                    <div class="w-100 planDurration mt-2 "> Yearly Billing </div>
                </div>

                <div class="w-100 planOfferBox ">1 page custom website </div>
                <div class="w-100 planOfferBox "> SOCIAL MEDIA LINKS ICONS</div>
                <div class="w-100 planOfferBox "> booking link </div>
                <div class="w-100 planOfferBox "> Stock Images </div>

            </div>

            @endif



            @if ($planNumber == 2)

            <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="w-100 planHead hand active "  onclick="planSelected('m')">
                    ESSENTIAL Plan
                    <div class="w-100  mt-2 pt-3 planPrice "> $59.95 </div>
                    <div class="w-100  planDurration mt-2 "> Monthly Plan </div>
                </div>
                <div class="w-100  planOfferBox"> 3 page custom website </div>
                <div class="w-100  planOfferBox"> HOME PAGE SLIDER </div>
                <div class="w-100  planOfferBox"> SOCIAL MEDIA LINKS INTEGRATION </div>
                <div class="w-100  planOfferBox"> booking link </div>
                <div class="w-100  planOfferBox"> 1 business email </div>
                <div class="w-100  planOfferBox"> stock images </div>

            </div>
            <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="w-100 planHead hand  "  onclick="planSelected('y')">
                    ESSENTIAL Plan
                    <div class="w-100  mt-2 pt-3 planPrice "> $600 </div>
                    <div class="w-100  planDurration mt-2 "> Yearly Plan </div>
                </div>
                <div class="w-100  planOfferBox"> 3 page custom website </div>
                <div class="w-100  planOfferBox"> HOME PAGE SLIDER </div>
                <div class="w-100  planOfferBox"> SOCIAL MEDIA LINKS INTEGRATION </div>
                <div class="w-100  planOfferBox"> booking link </div>
                <div class="w-100  planOfferBox"> 1 business email </div>
                <div class="w-100  planOfferBox"> stock images </div>

            </div>
            @endif




            @if ($planNumber == 3)

            <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="w-100 planHead hand active"  onclick="planSelected('m')">
                    Active Plan
                    <div class="w-100 mt-2 pt-3 planPrice "> $79.95 </div>
                    <div class="w-100 planDurration mt-2 "> Monthly Plan </div>
                </div>

                <div class="w-100 planOfferBox"> 5 page custom website </div>
                <div class="w-100 planOfferBox"> HOME PAGE SLIDER </div>
                <div class="w-100 planOfferBox"> SOCIAL MEDIA LINKS INTEGRATION </div>
                <div class="w-100 planOfferBox"> booking integration </div>
                <div class="w-100 planOfferBox"> 5 business emails </div>
                <div class="w-100 planOfferBox"> logo design </div>
                <div class="w-100 planOfferBox"> stock images </div>
                <div class="w-100 planOfferBox"> blog </div>
                <div class="w-100 planOfferBox"> photo gallery </div>
                <div class="w-100 planOfferBox"> instagram feed </div>
                <div class="w-100 planOfferBox"> newsletter setup </div>
                <div class="w-100 planOfferBox"> GOOLGE BUSINESS SETUP </div>

            </div>

            <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="w-100 planHead hand "   onclick="planSelected('y')" >
                    Active Plan
                    <div class="w-100 mt-2 pt-3 planPrice "> $850 </div>
                    <div class="w-100 planDurration mt-2 "> Yearly Plan </div>
                </div>

                <div class="w-100 planOfferBox"> 5 page custom website </div>
                <div class="w-100 planOfferBox"> HOME PAGE SLIDER </div>
                <div class="w-100 planOfferBox"> SOCIAL MEDIA LINKS INTEGRATION </div>
                <div class="w-100 planOfferBox"> booking integration </div>
                <div class="w-100 planOfferBox"> 5 business emails </div>
                <div class="w-100 planOfferBox"> logo design </div>
                <div class="w-100 planOfferBox"> stock images </div>
                <div class="w-100 planOfferBox"> blog </div>
                <div class="w-100 planOfferBox"> photo gallery </div>
                <div class="w-100 planOfferBox"> instagram feed </div>
                <div class="w-100 planOfferBox"> newsletter setup </div>
                <div class="w-100 planOfferBox"> GOOLGE BUSINESS SETUP </div>

            </div>
            @endif



            @if ($planNumber == 4)

            <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="w-100 planHead hand active"  onclick="planSelected('m')">
                    Complete Plan

                    <div class="w-100 mt-2 pt-3 planPrice  "> $129.95 </div>
                    <div class="w-100 planDurration mt-2 "> Monthly Plan </div>
                </div>

                <div class="w-100  planOfferBox"> 10 page custom website </div>
                <div class="w-100  planOfferBox"> HOME PAGE SLIDER </div>
                <div class="w-100  planOfferBox"> SOCIAL MEDIA LINKS INTEGRATION </div>
                <div class="w-100  planOfferBox"> booking integration </div>
                <div class="w-100  planOfferBox"> unlimited BUSINESS </div>
                <div class="w-100  planOfferBox"> emails </div>
                <div class="w-100  planOfferBox"> logo design </div>
                <div class="w-100  planOfferBox"> stock images </div>
                <div class="w-100  planOfferBox"> blog </div>
                <div class="w-100  planOfferBox"> photo gallery </div>
                <div class="w-100  planOfferBox"> instagram feed </div>
                <div class="w-100  planOfferBox"> Newsletter setup</div>
                <div class="w-100  planOfferBox"> Google Analytics</div>
                <div class="w-100  planOfferBox"> Google Map </div>
                <div class="w-100  planOfferBox"> SEO ON PAGE SETUP </div>
                <div class="w-100  planOfferBox"> SHOPPING CART </div>
                <div class="w-100  planOfferBox"> Payment Gateway setup </div>


            </div>
            <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3">
                <div class="w-100 planHead hand "  onclick="planSelected('y')">
                    Complete Plan

                    <div class="w-100 mt-2 pt-3 planPrice  "> $1450 </div>
                    <div class="w-100 planDurration mt-2 "> Yearly Plan </div>
                </div>

                <div class="w-100  planOfferBox"> 10 page custom website </div>
                <div class="w-100  planOfferBox"> HOME PAGE SLIDER </div>
                <div class="w-100  planOfferBox"> SOCIAL MEDIA LINKS INTEGRATION </div>
                <div class="w-100  planOfferBox"> booking integration </div>
                <div class="w-100  planOfferBox"> unlimited BUSINESS </div>
                <div class="w-100  planOfferBox"> emails </div>
                <div class="w-100  planOfferBox"> logo design </div>
                <div class="w-100  planOfferBox"> stock images </div>
                <div class="w-100  planOfferBox"> blog </div>
                <div class="w-100  planOfferBox"> photo gallery </div>
                <div class="w-100  planOfferBox"> instagram feed </div>
                <div class="w-100  planOfferBox"> Newsletter setup</div>
                <div class="w-100  planOfferBox"> Google Analytics</div>
                <div class="w-100  planOfferBox"> Google Map </div>
                <div class="w-100  planOfferBox"> SEO ON PAGE SETUP </div>
                <div class="w-100  planOfferBox"> SHOPPING CART </div>
                <div class="w-100  planOfferBox"> Payment Gateway setup </div>


            </div>
            @endif

        </div>

        <div class="row justify-content-center">
            <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3 mt-5 grayColor">
                <h4>ADD ONS:</h4>
            </div>
            <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3"></div>
        </div>

        <div class="row justify-content-center mb-2">
            <div class="col-12 col-md-12 col-lg-6 col-xl-6 ">


                <div class="row mb-3 border">
                    <div class="col-lg-2  col-md-2 col-sm-2 col-4 addonsp1 logoDesign">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="logoDesign" class="custom-control-input" id="logoDesign">
                            <label class="custom-control-label" for="logoDesign">$100</label>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-8 p-3">
                        <div class="float-left addonsHead"> Logo Design </div>
                        <div class="float-right"> <a data-container="body" data-toggle="popover" data-placement="left"
                          data-content="You will receive three design concepts and allowed three revisions." href="javascript:void(0)">Learn More</a> </div>
                    </div>
                </div>
                <div class="row mb-3 border">
                    <div class=" col-lg-2  col-md-2 col-sm-2 col-4   addonsp1 businessCardDesign">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="businessCardDesign" class="custom-control-input" id="businessCardDesign">
                            <label class="custom-control-label" for="businessCardDesign">$150</label>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-8 p-3">
                        <div class="float-left addonsHead"> Business Card Design </div>
                        <div class="float-right"> <a data-container="body" data-toggle="popover" data-placement="left"
                          data-content="You receive three design concepts and allowed three revisions." href="javascript:void(0)">Learn More</a> </div>
                    </div>
                </div>
                <div class="row mb-3 border">
                    <div class=" col-lg-2  col-md-2 col-sm-2 col-4   addonsp1 flayerDesign">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="flayerDesign" class="custom-control-input" id="flayerDesign">
                            <label class="custom-control-label" for="flayerDesign">$200</label>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-8 p-3">
                        <div class="float-left addonsHead"> Flyer Design </div>
                        <div class="float-right"> <a  data-container="body" data-toggle="popover" data-placement="left"
                          data-content="You will receive one design concept and allowed three revisions.  " href="javascript:void(0)">Learn More</a> </div>
                    </div>

                </div>


            </div>
        </div>

        {{-- promo code section --}}
        <div class="row justify-content-center">
            <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3 mt-5 grayColor">
                <h4>PROMO CODE:</h4>
            </div>
            <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3"></div>
        </div>

        <div class="row justify-content-center mb-2">
            <div class="col-12 col-md-12 col-lg-6 col-xl-6 p-0">
              <div class="borderFav input-group mb-3 p-1">
                  <input type="text" class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput" id="applayPromoCode" placeholder="Ex: 123456AB">
                  <div class="input-group-append">
                      <button class="btn btn-cstm rounded-0 shadow-none" type="button" id="applayPromoCode">Apply</button>
                  </div>
              </div>
            </div>
        </div>
        <div class="row justify-content-center mb-2">
            <div class="col-12 col-md-12 col-lg-6 col-xl-6 p-0">

                      <h4 class="d-inline grayColor">Total:</h4>
                      <h4 class="favColor d-inline" id="amount"></h4>

                  <div class="col-12"></div>

                      <h6 class="d-inline grayColor">RECURRING AMOUNT:</h6>
                      <h6 class="favColor d-inline" id="recurringAmount">$0</h6>

            </div>
        </div>






        <div class="row justify-content-center">

          <div class="col-12 col-md-12 col-lg-6 col-xl-6 p-0">

                <label for="card-element" class="grayColor">
                    Credit or debit card
                </label>
                <div id="card-element" class="form-control">
                    <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
            </div>




        </div>

        <div class="row justify-content-center mt-3">
          <div class="col-12 col-md-12 col-lg-6 col-xl-6 ">
            <div class="row">
              <div class="col-xl-4 col-sm-5 col-12">
                <button type="submit" id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-block btn-cstm rounded-0 shadow-none" name="button">Pay Now</button>

              </div>
            </div>
          </div>
        </div>


    </div>
</form>



<div class="container ">
    <div class="row m-0 py-3">
        <div class="col-12 text-center">
            <button onclick="window.location = '{{ route('websitePackege') }}'" class=" float-left btn btn-cstm rounded-0 shadow-none backBtn" type="button">Back</button>
        </div>
    </div>
</div>

<style media="screen">


.form-control::-webkit-input-placeholder {
  color: #979797;
  opacity: 1;
}

.form-control::-moz-placeholder {
  color: #979797;
  opacity: 1;
}

.form-control:-ms-input-placeholder {
  color: #979797;
  opacity: 1;
}

.form-control::-ms-input-placeholder {
  color: #979797;
  opacity: 1;
}

.form-control::placeholder {
  color: #979797;
  opacity: 1;
}

</style>
