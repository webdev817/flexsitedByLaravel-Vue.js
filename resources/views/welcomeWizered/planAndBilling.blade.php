<form class="" action="{{ route('storeBilling') }}" id="payment-form" method="post">

    <div class="container mt-5 pt-3 mb-5">

        <div class="row justify-content-center">



            @if ($planNumber == 1)


            <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3 monthlyOrYearlyPlan">
                <div class="w-100 planHead active">
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
                <div class="w-100 planHead ">
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
                <div class="w-100 planHead active ">
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
                <div class="w-100 planHead  ">
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
                <div class="w-100 planHead active">
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
                <div class="w-100 planHead ">
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
                <div class="w-100 planHead active">
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
                <div class="w-100 planHead ">
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
            <div class="col-6 border ">
                <div class="row">
                    <div class="col-2 p-3 addonsp1 logoDesign">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="logoDesign" class="custom-control-input" id="logoDesign">
                            <label class="custom-control-label" for="logoDesign">$100</label>
                        </div>
                    </div>
                    <div class="col-10 p-3">
                        <div class="float-left addonsHead"> Logo Design </div>
                        <div class="float-right"> <a href="#">Learn More</a> </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-2">
            <div class="col-6 border ">
                <div class="row">
                    <div class="col-2 p-3 addonsp1 businessCardDesign">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="businessCardDesign" class="custom-control-input" id="businessCardDesign">
                            <label class="custom-control-label" for="businessCardDesign">$150</label>
                        </div>
                    </div>
                    <div class="col-10 p-3">
                        <div class="float-left addonsHead"> Business Card Design </div>
                        <div class="float-right"> <a href="#">Learn More</a> </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-6 border ">
                <div class="row">
                    <div class="col-2 p-3 addonsp1 flayerDesign">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="flayerDesign" class="custom-control-input" id="flayerDesign">
                            <label class="custom-control-label" for="flayerDesign">$200</label>
                        </div>
                    </div>
                    <div class="col-10 p-3">
                        <div class="float-left addonsHead"> Flyer Design </div>
                        <div class="float-right"> <a href="#">Learn More</a> </div>
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
        <div class="row justify-content-center">
            <div class="col-6 p-0 ">
                <div class="borderFav input-group mb-3 p-1">
                    <input type="text" class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput" id="applayPromoCode" placeholder="Ex: 123456AB">
                    <div class="input-group-append">
                        <button class="btn btn-cstm rounded-0 shadow-none" type="button" id="applayPromoCode">Apply</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center ">
            <div class="col-6 grayColor mt-3 p-0">
                <h4 class="d-inline">Total:</h4>
                <h4 class="favColor d-inline" id="amount"></h4>
            </div>
            <div class="col-12"></div>
            <div class="col-6 grayColor mt-2 p-0">
                <h6 class="d-inline">RECURRING AMOUNT:</h6>
                <h6 class="favColor d-inline" id="recurringAmount">$0</h6>
            </div>
        </div>


        <div class="row justify-content-center">

            <div class="col-12 p-0 col-sm-12 col-lg-6 col-md-6 col-xl-6">
                <label for="card-element">
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
          <div class="col-12 p-0 col-sm-12 col-lg-6 col-md-6 col-xl-6">
            <div class="row">
              <div class="col-4">
                <button type="button" class="btn btn-block btn-cstm btn-lg rounded-0 shadow-none" name="button">Pay Now</button>

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
