<form method="POST", action="{{route('storeMarketing')}}">
@csrf
<div class="container mt-5 ">
	<div class="text-center mt-4">
		<h3 style="line-height:150%"><b> Thank you for your interest in our marketing services.</b></h3>
		<h4 class="mt-3" style="line-height:150%">Please let us know whitch services we can help you with.</h4>	
	</div>
	
	<div class="row mt-3">
		<div class="col-md-1 col-sm-1 col-12"></div>
		<div class="col-md-5 col-sm-5 col-12">
			<div class="designSelect mt-5 ml-1 border pt-2">
				<div class=" mt-4 ml-4 float-left">
	                <input type="checkbox" name="marketingStrategy" id="marketingStrategy" class =" myCheckbox">
					<label for = "marketingStrategy" class="radioLabel"></label>
            	</div>
            	<div class="float-left mt-3">
					<div class=" ml-4 addonsHead title"> <b>Marketing Strategy</b>
		        	</div>
            	</div>	
			</div>
		</div>
		<div class="col-md-5 col-sm-5 col-12">
			<div class="designSelect mt-5 ml-1 border pt-2">
				<div class=" mt-4 ml-4 float-left">
	                <input type="checkbox" name="emailMarketing" id="emailMarketing">
					<label for = "emailMarketing" class="radioLabel"></label>
            	</div>
            	<div class="float-left mt-3">
					<div class="title  ml-4 addonsHead"><b>Email Marketing</b>
		        	</div>
            	</div>	
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
	                <input type="checkbox" name="contentMarketing" id="contentMarketing">
					<label for = "contentMarketing" class="radioLabel"></label>
            	</div>
            	<div class="float-left mt-3">
					<div class="title  ml-4 addonsHead"><b>Content Marketing</b>
		        	</div>
            	</div>	
			</div>
		</div>
		<div class="col-md-5 col-sm-5 col-12">
			<div class="designSelect mt-5 ml-1 border pt-2">
				<div class=" mt-4 ml-4 float-left">
	                <input type="checkbox" name="videoMarketing" id="VideoMarketing">
					<label for="VideoMarketing" class="radioLabel"></label>
            	</div>
            	<div class="float-left mt-3">
					<div class=" title ml-4 addonsHead"><b>Video Marketing</b>
		        	</div>		      
            	</div>
			</div>
		</div>
		<div class="col-md-1 col-sm-1 col-12"></div>
	</div>
	<div class="row">
		<div class="col-md-1 col-sm-1 col-12"></div>
		<div class="col-md-10 col-sm-10 col-12">
			<div class="designSelect mt-5 ml-1 border pt-2">
				<div class=" mt-4 ml-4 float-left">
	                <input type="checkbox" name="searchEngineOptimization" id="searchEngineOptimization">
					<label for="searchEngineOptimization" class="radioLabel"></label>
            	</div>
            	<div class="float-left mt-3">
					<div class="title  ml-4 addonsHead"><b>Search Engine Optimization</b>
		        	</div>
            	</div>	
			</div>
		</div>
		<div class="col-md-1 col-sm-1 col-12"></div>
	</div>
	<div class="row p-2 ">
		<div class="col-md-4 col-sm-4 col-12 "></div>
		<div class="col-md-4 col-sm-4 col-12 mt-4 pt-3 ">
			<a data-toggle="modal" data-target="#confirm" class="btn btn-cstm rounded-5 shadow-none w-100 pt-2 pb-2" id="marketingNext">Next</a>
		</div>
		<div class="col-md-4 col-sm-4 col-12 ">
			<button type="submit" class="d-none" id="submitMarketing" style="width: 0px;height: 0px;"></button>
		</div>
    </div>
</div>

</form>

<div class="modal fade" id="confirm">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
	    <div class="modal-header">
	      <button type="button" class="close" data-dismiss="modal">&times;</button>
	    </div>
	    <div class="modal-body">
	    	<div class="container text-center p-5">
	    		<div class="text-center ">
	    			<img src="{{ asset('mawaisnow/flexsited_assets/flexisted_marketing.png')}}" style="width: 90%">
	    		</div>
	    		<div class="text-center mt-4 ">
	    			<h3>Our marketing specialist will get in touch<br>
					with you within 24 business hours</h3>	
	    		</div>
	    		<div class="text-center mt-4 ">
	    			<button class="btn btn-cstm rounded-5 shadow-none w-75 pt-2 pb-2" id="submitOk">OK</button>
	    		</div>
	    	</div>
	    </div>
	  </div>
	</div>
</div>
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
		/* zoom: 1.5; */
		cursor: pointer;

	}
	#marketingNext{
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
	for (var i = 0; i < 5; i++) {
		radio_status[i] = false;
	}
	$("input[type = 'checkbox']").on('click', function()
	{
		
		var index = $("input[type='checkbox']").index(this);
		radio_status[index] = !radio_status[index];

		if (radio_status[index]) 
		{
			$($("input[type='checkbox']")[index]).prop('checked',true);
		}
		else
		{
			$($("input[type='checkbox']")[index]).prop('checked',false);
		}

	});
	$('#submitOk').click(function()
	{
		$('#submitMarketing').click();
	})
</script>