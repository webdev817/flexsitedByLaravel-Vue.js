<form method="POST" action="{{route('storeGraphicDesignBilling')}}" id="payment-form">
@csrf
<div class="container mt-5 ">
	<div class="text-center mt-4">
		<h5></h5>
		<h3>Let's Get Started With Your Graphic Design Project!</h3>	
	</div>
	
	<div class="row">
		<div class="col-md-1 col-sm-1 col-12"></div>
		<div class="col-md-5 col-sm-5 col-12">
			<div class="designSelect mt-5 ml-1 border pt-2">
				<div class=" mt-4 ml-4 float-left">
	                <input type="checkbox" name="logoDesign" id="logoDesign">
					<label for = "logoDesign" ></label>
            	</div>
            	<div class="float-left mt-3">
					<div class=" ml-4 addonsHead title"> <b> Logo Design </b>
		        	</div>
		        	<a class="ml-4" data-container="body" data-toggle="popover" data-placement="left"
		              data-content="You will receive three design concepts and allowed three revisions." href="javascript:void(0)">Learn More</a>
            	</div>
	        	<div class="float-right mt-3 mr-4"><span>$<span class="price">{{$addon->logoDesignPrice}}</span></span></div>	
			</div>
		</div>
		<div class="col-md-5 col-sm-5 col-12">
			<div class="designSelect mt-5 ml-1 border pt-2">
				<div class=" mt-4 ml-4 float-left">
	                <input type="checkbox" name="flayerDesign" id="flayerDesign">
					<label for = "flayerDesign" ></label>
            	</div>
            	<div class="float-left mt-3">
					<div class="title  ml-4 addonsHead"><b>Flyer Design</b> 
		        	</div>
		        	<a class="ml-4" data-container="body" data-toggle="popover" data-placement="left"
		              data-content="You will receive one design concept and allowed three revisions." href="javascript:void(0)">Learn More</a>
            	</div>
	        	<div class="float-right mt-3 mr-4"><span>$<span class="price">{{$addon->flyerDesignPrice}}</span></span></div>	
			</div>
		</div>
		<div class="col-md-1 col-sm-1 col-12">
		</div>
	</div>
	<div class="row">
		<div class="col-md-1 col-sm-1 col-12"></div>
		<div class="col-md-5 col-sm-5 col-12">
			<div class="designSelect mt-5 ml-1 border pt-2">
				<div class=" mt-4 ml-4 float-left">
	                <input type="checkbox" name="businessCardDesign" id="businessCardDesign">
					<label for = "businessCardDesign" ></label>
            	</div>
            	<div class="float-left mt-3">
					<div class="title  ml-4 addonsHead"><b>Business Card Design</b>
		        	</div>
		        	<a class="ml-4" data-container="body" data-toggle="popover" data-placement="left"
		              data-content="You will receive three design concepts and allowed three revisions." href="javascript:void(0)">Learn More</a>
            	</div>
	        	<div class="float-right mt-3 mr-4"><span>$<span class="price">{{$addon->cardDesignPrice}}</span></span></div>	
			</div>
		</div>
		<div class="col-md-5 col-sm-5 col-12">
			<div class="designSelect mt-5 ml-1 border pt-2">
				<div class=" mt-4 ml-4 float-left">
	                <input type="checkbox" name="socialMediaDesign" id="socialMediaDesign">
					<label for = "socialMediaDesign" ></label>
            	</div>
            	<div class="float-left mt-3">
					<div class=" title ml-4 addonsHead"><b>Social Media Design</b>
		        	</div>
		        	<a class="ml-4" data-container="body" data-toggle="popover" data-placement="left"
		              data-content="You will receive three design concepts and allowed three revisions." href="javascript:void(0)">Learn More</a>
            	</div>
	        	<div class="float-right mt-3 mr-4"><span>$<span class="price">{{$addon->socialMediaDesignPrice}}</span></span></div>	
			</div>
		</div>
		<div class="col-md-1 col-sm-1 col-12"></div>
	</div>
	<div class="row mt-5 ">
		<div class="col-md-1 col-sm-1 col-12"></div>
        <div class="col-md-5 col-sm-5 col-12 mt-4">
			<h4>PROMO CODE:</h4>
		</div>
	</div>	
	<div class="row mt-3 ">
		<div class="col-md-1 col-sm-1 col-12"></div>
        <div class="col-md-10 col-sm-10 col-12 ">
			<div class="borderFav input-group mb-3 p-1">
				<input type="text" name="couponCode" class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput" id="couponCode" placeholder="Ex: 123456AB">
				<div class="input-group-append">
					<button class="btn btn-cstm rounded-0 shadow-none" type="button" id="applyPromoCode">Apply</button>
				</div>
			</div>
		</div>
		<input type="hidden" id="couponJsonHai" value="">
	</div>
	<div class="row mt-3">
		<div class="col-md-1 col-sm-1 col-12"></div>
		<div class="col-md-5 col-sm-5 col-12 ">
			<h3><b>Billing Details</b><h3>
		</div>
	</div>

	<div class="row  mb-3 mt-3">
		<div class="col-md-1 col-sm-1 col-12"></div>
        <div class="col-md-10 col-sm-10 col-12">
              <h4 class="d-inline grayColor">Total:</h4>
              <h4 class="favColor d-inline" ><span>$<span id="amount1">0</span></span></h4>
              <div class="col-12"></div>
              <h6 class="d-inline grayColor">ONE TIME AMOUNT:</h6>
              <h6 class="favColor d-inline" ><span>$<span id="totalPrice">0</span></span></h6> &nbsp; &nbsp;
              <div class="col-12"></div>
              <h6 id="freewebsiteCardnot" class="d-none grayColor">
                You will not be charged at this time. Credit card details are stored on your account in case of future purchases.
              </h6>

        </div>
     </div>
	<div class="row mt-2">
		<div class="col-md-1 col-sm-1 col-12"></div>
		<div class="col-md-10 col-sm-10 col-12 ">
			<label for="card-element" class="grayColor">
			Credit or Debit Card
		</label>
		<div id="card-element" class="form-control">
			<!-- A Stripe Element will be inserted here. -->
		</div>

		<!-- Used to display form errors. -->
		<div id="card-errors" role="alert"></div>
		</div>
		
	</div>
	</div>
	<div class="row p-2 ">
		<div class="col-md-8 col-sm-8 col-12 "></div>
		<div class="col-md-3 col-sm-3 col-12 mt-4 pt-3 ">
		<button type="submit" id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-cstm rounded-5 shadow-none w-100 pt-2 pb-2 float-md-right ">Next</button>
		</div>
    </div>
</div>
</form>
<style type="text/css">
	.designSelect{
		background-color: white;
		height: 80%;
		border-radius: 10px;
		/*width: 95%;*/
	}
	.title{
		color: black;
	}
	.cartbody{
		border-bottom:1px dashed;
	}
	.cartbox{
		display: flex;
		border-left:1px dashed;
		border-right:1px dashed;
		border-top:1px dashed;
	}
	input[type = 'checkbox']{
		cursor: pointer;
		zoom: 1.5;
	}
	#card-button{
		color: white;
		font-size: 20px;
	}
	input[type=checkbox] + label {
		margin: 0;
		cursor: pointer;
		padding: 0;
	}

	input[type=checkbox] {
		display: none;
	}

	input[type=checkbox] + label:before {
		content: "\2714";
		border: 0.1em solid #65c5b4;
		border-radius: 50%;
		display: inline-block;
		width: 1em;
		height: 1em;
		padding-left: 0.2em;
		padding-bottom: 0.3em;
		margin-right: 0.2em;
		vertical-align: bottom;
		color: transparent;
		transition: .2s;
		box-sizing: unset
	}

	input[type=checkbox] + label:active:before {
		transform: scale(0);
	}

	input[type=checkbox]:checked + label:before {
		background-color: #65c5b4;
		border-color: #65c5b4;
		color: #fff;
	}
</style>
<script type="text/javascript">
	var radio_status = Array();
	var increase = 1;
	var reduce = -1;
	var status = reduce;
	var totalPrice = 0;

	for (var i = 0; i < 4; i++) {
		radio_status[i] = false;

	}
		$("input[type = 'checkbox']").on('click', function()
		{
			
			var index = $("input[type='checkbox']").index(this);
			radio_status[index] = !radio_status[index];

			if (radio_status[index]) 
			{
				$($("input[type='checkbox']")[index]).prop('checked',true);
				var price = $($(".price")[index]).text();
				status = increase;
				totalpricecalcu(price,status);
				return;
			}
			else
			{
				$($("input[type='checkbox']")[index]).prop('checked',false);
				var price = $($(".price")[index]).text();
				status = reduce;
				totalpricecalcu(price, status);
			}			
		});
		function totalpricecalcu(  price, status){
			
			if(status == increase){
				totalPrice += Number(price);
			}
			else if(status == reduce)
			{
				totalPrice -= Number(price);
			}
			$('#totalPrice').text(totalPrice);
			$('#amount1').text(totalPrice);
		}
</script>