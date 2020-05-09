<div class="container mt-5 pt-3">

    <div class="row">

      <div class="col-12 mb-4 pl-0">
        <div class="row  justify-content-center">
          <button type="button" data-btn="1" class="btn btn-outline-primary planSwithers active rounded-0 shadow-none" name="button">Monthly</button>
          <button type="button" data-btn="2" class="btn btn-outline-primary planSwithers rounded-0 shadow-none" name="button">Yearly</button>
        </div>

      </div>

        <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3 monthlyPlanContainer">
            <div class="w-100 planHead active pb-0">
                basic plan
                <div class="w-100 mt-2 pt-3 planPrice "> ${{$plans[0]->price}} </div>
                <div class="w-100 planDurration mt-2 "> Per Month </div>
            </div>
              <div class="w-100 planOfferBox description">{{ $plans[0]->description }} </div>
            @foreach ($plans[0]->offers as $offer)
              <div class="w-100 planOfferBox ">{{ $offer->title }} </div>
            @endforeach


            <div class="w-100 planOfferBox  hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox  hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox  hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox  hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox active"> <a href="{{ route('selectedWebsitePackege',1) }}">Sign Up</a> </div>
        </div>





        <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3 monthlyPlanContainer">
            <div class="w-100 planHead active pb-0">
              ESSENTIAL Plan

              <div class="w-100  mt-2 pt-3 planPrice ">${{$plans[1]->price}} </div>
              <div class="w-100  planDurration mt-2 "> Per Month</div>
            </div>
            <div class="w-100 planOfferBox description">{{ $plans[1]->description }} </div>
            @foreach ($plans[1]->offers as $offer)
              <div class="w-100 planOfferBox ">{{ $offer->title }} </div>
            @endforeach

            <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>

            <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox active"> <a href="{{ route('selectedWebsitePackege',2) }}">Sign Up</a> </div>


        </div>





        <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3 monthlyPlanContainer">
            <div class="w-100 planHead active pb-0">
              Active Plan
              <div class="w-100 mt-2 pt-3 planPrice "> ${{$plans[2]->price}} </div>
              <div class="w-100 planDurration mt-2 "> Per Month </div>
            </div>
            <div class="w-100 planOfferBox description">{{ $plans[2]->description }} </div>
            @foreach ($plans[2]->offers as $offer)
              <div class="w-100 planOfferBox ">{{ $offer->title }} </div>
            @endforeach

            <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
            <div class="w-100 planOfferBox active"> <a href="{{ route('selectedWebsitePackege', 3) }}">Sign Up</a> </div>

        </div>




        <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3 monthlyPlanContainer">
            <div class="w-100 planHead active pb-0">
              Complete Plan

              <div class="w-100 mt-2 pt-3 planPrice  "> ${{$plans[3]->price}} </div>
              <div class="w-100 planDurration mt-2 ">Per Month </div>
            </div>
            <div class="w-100 planOfferBox description">{{ $plans[3]->description }} </div>
            @foreach ($plans[3]->offers as $offer)
              <div class="w-100 planOfferBox ">{{ $offer->title }} </div>
            @endforeach


            <div class="w-100 planOfferBox active"> <a href="{{ route('selectedWebsitePackege',4) }}">Sign Up</a> </div>

        </div>















                <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3 yearlyPlanContainer">
                    <div class="w-100 planHead active pb-0">
                        basic plan
                        <div class="w-100 mt-2 pt-3 planPrice "> ${{$plans[0]->priceYearlyMonthly}} </div>
                        <div class="w-100 planDurration mt-2 "> Per Month </div>
                    </div>
                      <div class="w-100 planOfferBox description">{{ $plans[0]->description }} </div>
                    @foreach ($plans[0]->offers as $offer)
                      <div class="w-100 planOfferBox ">{{ $offer->title }} </div>
                    @endforeach


                    <div class="w-100 planOfferBox  hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox  hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox  hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox  hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox active"> <a href="{{ route('selectedWebsitePackege',[1,'y'=>'1']) }}">Sign Up</a> </div>
                </div>





                <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3 yearlyPlanContainer">
                    <div class="w-100 planHead active pb-0">
                      ESSENTIAL Plan

                      <div class="w-100  mt-2 pt-3 planPrice "> ${{$plans[1]->priceYearlyMonthly}} </div>
                      <div class="w-100  planDurration mt-2 "> Per Month</div>
                    </div>
                    <div class="w-100 planOfferBox description">{{ $plans[1]->description }} </div>
                    @foreach ($plans[1]->offers as $offer)
                      <div class="w-100 planOfferBox ">{{ $offer->title }} </div>
                    @endforeach

                    <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>

                    <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox active"> <a href="{{ route('selectedWebsitePackege',[2,'y'=>'1']) }}">Sign Up</a> </div>


                </div>





                <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3 yearlyPlanContainer">
                    <div class="w-100 planHead active pb-0">
                      Active Plan
                      <div class="w-100 mt-2 pt-3 planPrice "> ${{$plans[2]->priceYearlyMonthly}} </div>
                      <div class="w-100 planDurration mt-2 "> Per Month </div>
                    </div>
                    <div class="w-100 planOfferBox description">{{ $plans[2]->description }} </div>
                    @foreach ($plans[2]->offers as $offer)
                      <div class="w-100 planOfferBox ">{{ $offer->title }} </div>
                    @endforeach

                    <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox hideonMobileAndSM"> &nbsp; </div>
                    <div class="w-100 planOfferBox active"> <a href="{{ route('selectedWebsitePackege', [3,'y'=>'1']) }}">Sign Up</a> </div>

                </div>




                <div class="col-12 p-1 col-sm-6 col-md-6 col-lg-3 col-xl-3 yearlyPlanContainer">
                    <div class="w-100 planHead active pb-0">
                      Complete Plan

                      <div class="w-100 mt-2 pt-3 planPrice  "> ${{$plans[3]->priceYearlyMonthly}} </div>
                      <div class="w-100 planDurration mt-2 ">Per Month </div>
                    </div>
                    <div class="w-100 planOfferBox description">{{ $plans[3]->description }} </div>
                    @foreach ($plans[3]->offers as $offer)
                      <div class="w-100 planOfferBox ">{{ $offer->title }} </div>
                    @endforeach


                    <div class="w-100 planOfferBox active"> <a href="{{ route('selectedWebsitePackege',[4,'y'=>'1']) }}">Sign Up</a> </div>

                </div>









    </div>




</div>



<div class="container ">
    <div class="row m-0 py-3">
        <div class="col-12 text-center">
            <button onclick="window.location = '{{ route('select-design',['back'=>1]) }}'" class=" float-left btn btn-cstm rounded-0 shadow-none backBtn" type="button">Back</button>
        </div>
    </div>
</div>


<style media="screen">
  .planOfferBox.description{
    color: white;
    background: #65c5b4;
  }
  .btn-outline-primary{
    color: #64c5b4;
    border-color: #64c5b4;
  }
  .btn-outline-primary:hover {
    color: #fff;
    background-color: #64c5b4;
    border-color: #64c5b4;
}
.btn-outline-primary:not(:disabled):not(.disabled):active, .btn-outline-primary:not(:disabled):not(.disabled).active, .show > .btn-outline-primary.dropdown-toggle {
    color: #fff;
    background-color: #64c5b4;
    border-color: #64c5b4;
}
@media (max-width: 1027px) and (min-width: 992px) {
  .planOfferBox {
      font-size: 12px;
  }
}
</style>
