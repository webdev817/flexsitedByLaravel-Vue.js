<input type="hidden" id="planSelected" name="planSelected" value="">
<input type="hidden" id="planDurration" name="planDurration" value="">
<div class="row bg-white">

  @foreach (flexsitedPlans() as $key => $plan)

    <div class="col-xl-6 col-md-6 col-12 commonPlanCommon  text-center p-3">

        <div class=" mt-3 pb-3 bg-white  borerRadius ">
          <div class="w-100 pb-4 pt-5">
              <img src="{{ asset($plan->image) }}" class="imgPlanHead img-fluid">
          </div>
          <div class="w-100 mb-4">
              <h3 class="planHead">{{ strToCapitalize($plan->name) }}</h3>
          </div>
          <div class="planBoxlist">
              @foreach ($plan->offers as $offer)
                <div class="d-flex justify-content-center planOfferBox   mb-2">
                    <div class=" d-inline-block minWidthForPlan">
                      <div class="">
                        <i class="fas fa-check bg1 p-1  rounded text-white"></i> &nbsp;
                        {{ strToCapitalize($offer) }}
                      </div>
                    </div>
                </div>

              @endforeach
              @if ($key == 0)
                <div class="d-none d-md-block">
                  <br>
                  <br>
                </div>
              @endif
              @if ($key == 2)
                <div class="d-none d-md-block">
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                </div>
              @endif
              <div class="w-100 mt-5">
                <div class="priceBoxes monthlyPrice">$<div class="priceItself">{{ $plan->price }}</div> / Month</div>
              </div>
              <div class="w-100">
                <div class="priceBoxes yearlyPrice hide">
                                  $<div class="priceItself">{{ $plan->priceYearly }}</div> / Year
                </div>
              </div>
              <div class="w-100 mt-5 mb-3">
                  <button type="button"  onclick="viewPlan({{ $plan->id }})" class="btn btn-primary btn-block" name="button">View Detail</button>
              </div>

          </div>
        </div>


    </div>
  @endforeach


  @foreach (flexsitedPlans() as $plan)

    <div data-price="{{ $plan->price }}"  class="planHai{{$plan->id}}_monthly hide commonPlanDetails col-xl-6 col-md-6 col-12  text-center p-3">

        <div class=" mt-3 pb-3 bg-white  borerRadius ">

          <div class="w-100 pb-4 pt-5">
              <img src="{{ asset($plan->image) }}" class="imgPlanHead img-fluid">
          </div>
          <div class="w-100 mb-4">
              <h3 class="planHead">{{ strToCapitalize($plan->name) }}</h3>
          </div>
          <div class="planBoxlist">
              @foreach ($plan->offers as $offer)
                <div class="d-flex justify-content-center planOfferBox   mb-2">
                    <div class=" d-inline-block minWidthForPlan">
                      <div class="">
                        <i class="fas fa-check bg1 p-1  rounded text-white"></i> &nbsp;
                        {{ strToCapitalize($offer) }}
                      </div>
                    </div>
                </div>
              @endforeach

              <div class="w-100 mt-5">
                <div class="priceBoxes monthlyPrice">$<div class="priceItself">{{ $plan->price }}</div> / Month</div>
              </div>

              <div class="w-100 mt-5 mb-3">
                  <button type="button" data-year="1" data-planNo="{{$plan->id}}" onclick="selectedPlan('planHai{{$plan->id}}_monthly',{{ $plan->price }}, this)" class="btn btn-primary btn-block btnPlans" name="button">Select</button>
              </div>

          </div>
        </div>

    </div>

    <div data-price="{{ $plan->priceYearly }}" class="planHai{{$plan->id}}_yearly hide commonPlanDetails col-xl-6 col-md-6 col-12  text-center p-3">

        <div class=" mt-3 pb-3 bg-white  borerRadius ">
          <div class="w-100 pb-4 pt-5">
              <img src="{{ asset($plan->image) }}" class="imgPlanHead img-fluid">
          </div>
          <div class="w-100 mb-4">
              <h3 class="planHead">{{ strToCapitalize($plan->name) }}</h3>
          </div>
          <div class="planBoxlist">
              @foreach ($plan->offers as $offer)
                <div class="d-flex justify-content-center planOfferBox   mb-2">
                    <div class=" d-inline-block minWidthForPlan">
                      <div class="">
                        <i class="fas fa-check bg1 p-1  rounded text-white"></i> &nbsp;
                        {{ strToCapitalize($offer) }}
                      </div>
                    </div>
                </div>
              @endforeach


              <div class="w-100 mt-5">
                <div class="priceBoxes yearlyPrice">
                                  $<div class="priceItself">{{ $plan->priceYearly }}</div> / Year
                </div>
              </div>
              <div class="w-100 mt-5 mb-3">
                  <button type="button"  data-year="2" data-planNo="{{$plan->id}}" onclick="selectedPlan('planHai{{$plan->id}}_yearly',{{ $plan->priceYearly }}, this)"  class="btn btn-primary btn-block btnPlans" name="button">Select</button>
              </div>

          </div>
        </div>

    </div>

  @endforeach



</div>
<script type="text/javascript">
  function viewPlan(planNumber) {
    $(".commonPlanCommon").removeClass('hide').addClass('hide');
    $(".commonPlanDetails").removeClass('hide').addClass('hide');
    $(".planHai"+planNumber+"_yearly").removeClass('hide');
    $(".planHai"+planNumber+"_monthly").removeClass('hide');
  }
  function selectedPlan(clss, price, ths) {
    console.log(clss, price, ths);
    $(".commonPlanDetails").removeClass('selectedPlan');
    $("." + clss).addClass('selectedPlan');
    $(".btnPlans").text('Select');
    $("#totalDuePrice").html("$"+price);

    $(ths).text('Selected');

    var planNo = $(ths).attr('data-planNo');
    var planDurration = $(ths).attr('data-year');

    $("#planSelected").val(planNo);
    $("#planDurration").val(planDurration);



  }
</script>


<style media="screen">
    .hide{
      display: none;
    }
    .selectedPlan{
      border: 1px solid #59baa5;

    }
    .borerRadius {
        border-radius: 35px;
    }

    .imgPlanHead {
        width: 70px;
    }

    .planHead {
        color: #808080;
    }
    .priceBoxes{
      color: #212529c2;
      font-size: 15px;
    }
    .planOfferBox {
        text-transform: capitalize;
        text-align: left;
    }
    .planBoxlist{

      padding: 0px 40px;
      text-align: center;
    }
    .priceItself{
      display: inline-block;
      font-size: 24px;
    }
    .minWidthForPlan{
      min-width: 250px
    }
</style>
