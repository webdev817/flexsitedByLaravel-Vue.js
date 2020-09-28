
<div class="container mt-5">
    <div class="row">
      
      <div class="col-md-5 col-sm-5 col-12 mt-5 pr-md-5 ">
        <div class="hero_img_title mt-5 text-center ">
          <img src="{{ asset('mawaisnow/flexsited_assets/welcome_hero.png')}}" style="width: 80%">
          <h3 class="mt-4 title" >Welcome to Flexsited! </h3> 
          <h3 class="mt-3 title"> How can we help you thrive?</h3>
          
        </div>
      </div>
      <div class="col-md-1 col-sm-5 col-12"></div>
    
        <div class="col-md-5 col-sm-5 col-12 mt-2 ">
         
            <div class="row  ">
              <div class="col-sm-6 col-sm-6 col-12 selectBox mt-4 text-center ">
                <div class="selectItem pt-5 pb-4">
                  <img src="{{ asset('mawaisnow/flexsited_assets/flexisted_graphic_icon.jpg')}}">
                  <p class="mt-4"> Graphic Design</p>
                </div>
                <div class="labelBox">
                  <input type="checkbox" name="ecommerce" class ="myCheckbox" />
                  <label class="checkboxLabel"></label>
                </div>
              </div>
              <div class="col-sm-6 col-sm-6 col-12 selectBox mt-4  text-center ">
                <div class="selectItem pt-5 pb-4">
                  <img src="{{ asset('mawaisnow/flexsited_assets/flexisted_website_icon.jpg')}}">
                  <p class="mt-4"> Website Design</p>
                </div>
                <div class="labelBox">
                  <input type="checkbox" name="ecommerce" class ="myCheckbox" />
                  <label class="checkboxLabel"></label>
                </div>
              </div>
            </div>
            <div class="row ">
              <div class="col-sm-6 col-sm-6 col-12 selectBox mt-4 text-center ">
                <div class="selectItem pt-5 pb-4">
                  <img src="{{ asset('mawaisnow/flexsited_assets/flexisted_ecommerce_icon.jpg')}}">
                  <p class="mt-4"> Ecommerce</p>
                  <div class="labelBox">
                  <input type="checkbox" name="ecommerce" class ="myCheckbox" />
                  <label class="checkboxLabel"></label>
                </div>
                </div>
              </div>
              <div class="col-sm-6 col-sm-6 col-12 selectBox mt-4 text-center ">
                <div class="selectItem pt-5 pb-4">
                  <img src="{{ asset('mawaisnow/flexsited_assets/flexisted_marketing_icon.jpg')}}">
                  <p class="mt-4">Marketing</p>
                </div>
                <div class="labelBox">
                  <input type="checkbox" name="ecommerce" class ="myCheckbox" />
                  <label class="checkboxLabel"></label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-12  "></div>
              <div class="col-md-6 col-sm-6 col-12 mt-4 pt-3 text-center">
                <a   class="btn btn-cstm rounded-5 shadow-none pt-2 pb-2" id="selectedDesignNextBtn">Next</a>
              </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="modal fade" id="warnning" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body text-center">
          <h5 id = modal-title> </h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-block btn-cstm rounded-0 shadow-none w-25" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</div>

<style type="text/css">


  .hero_img_title{
    margin-top = 15% !important;
  }
  .selectItem {
    background-color: white;
    border-radius: 20px;
    border: 2px solid white;
    /* box-shadow:0,0, 5px 5px 8px black; */
    cursor: pointer;
  }
  .selectItem>img{
    width: 5rem;
  }
  .title{
    font-weight: 600;
    font-family: -webkit-body;
  }
  
  #selectedDesignNextBtn{
    width: 100%;
    color: white;
    font-size: 20px;
  }

  input[type=checkbox] + label {
    display: none;
    margin: 0;
    cursor: pointer;
    padding: 0;
  }

  input[type=checkbox] {
    display: none;
  }

  input[type=checkbox] + label:before {
    content: "\2714";
    border: 0.1em solid #000;
    border-radius: 0.2em;
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

  .selectBox {
    position: relative;
  }

  .labelBox {
    position: absolute;
    top: 0;
    left: 50%;
    transform: translate(-50%, 0);
  }
</style>
<script type="text/javascript">

  var btn_status = Array();
  var click_flag = false;
  for (var i = 0; i < 4; i++) {
     btn_status[i] = false;
   }
$("#selectedDesignNextBtn").click(function()
{
    if(btn_status[0] == false && btn_status[1] == false && btn_status[2] == false && btn_status[3] == false)
    {
      $('#selectedDesignNextBtn').attr("disabled",true);
      $('#modal-title').text('Please select any service.');
      $('#warnning').modal();
    }
    else if(((btn_status[0] == true) && (btn_status[1] == false)) && ((btn_status[2] == false ) && (btn_status[3] == false))) 
    {
      $('#selectedDesignNextBtn').attr("disabled",false);
      $('#selectedDesignNextBtn').attr('href',"{{route('graphicDesignBilling')}}");
    }
    else if(((btn_status[0] == false) && (btn_status[1] == false)) && ((btn_status[2] == false ) && (btn_status[3] == true)))
    {
      $('#selectedDesignNextBtn').attr("disabled",false);
      $('#selectedDesignNextBtn').attr('href',"{{route('marketing')}}");
    }
    else if(((btn_status[0] == true) && (btn_status[1] == false)) && ((btn_status[2] == false ) && (btn_status[3] == true)))
    {
      $('#selectedDesignNextBtn').attr("disabled",false);
      // $("#modal-title").text("Marketing Consultation Comes With Your Package.");
      // $('#warnning').modal();
      $('#selectedDesignNextBtn').attr('href',"{{route('graphicDesignBilling')}}");
    }
    else
    {
      $('#selectedDesignNextBtn').attr("disabled",false);
      $('#selectedDesignNextBtn').attr('href',"{{route('websiteDesign')}}");
    }
});

  $('.selectItem').click(function(){
    localStorage.setItem('isModal', 'true');
    var index = $('.selectItem').index(this);

    btn_status[index] = !btn_status[index];
      
    if(btn_status[index])
    {
      $($('.checkboxLabel')[index]).css('display', 'block');
      $($('.myCheckbox')[index]).prop('checked', true); 
      $($('.selectItem')[index]).css('border','2px solid #65c5b4');
    }
    else{
      $($('.checkboxLabel')[index]).css('display', 'none');
      $($('.myCheckbox')[index]).prop('checked', false);
      $($('.selectItem')[index]).css('border','2px solid white');
    }
  })
</script>


