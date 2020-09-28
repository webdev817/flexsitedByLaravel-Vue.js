<div class="row justify-content-center">
    <div  data-class="websiteDesignSection4"  class="col-12 col-md-6 col-lg-6 col-xl-6 grayColor mt-3  favBG text-white sectionHeading hand p-4">
        <h4 class="d-inline">Business Card Design</h4>
         <i class="fas fa-plus float-right pt-1 websiteDesignSection4Sign"></i>
    </div>
    <div class="col-12"></div>
</div>



<div class="row websiteDesignSection4 collapse multi-collapse">

    <div class="col-12">


        <div class="row justify-content-center mb-3">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 grayColor mt-3 p-0">
                <h6 class="d-inline text-dark" style = " @if($pages == 0) display : none !important; @else display:inline !important; @endif">
                    Only complete the following sections if you have purchased these as addons or it’s are part of your chosen plan.
                </h6>
            </div>
        </div>




        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
                <div class="borderFav input-group mb-3 p-1">

                    <select class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput" id="frontandbackdesign" name="frontandbackdesign">

                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>

                    <div class="input-group-append">
                        <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" onclick="$('#frontandbackdesign').select2('open');" type="button">
                            <i class="fa fa-angle-down" style="font-size:30px"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>




        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
                <div class="borderFav input-group mb-3 p-1">
                    <input type="file" onchange="fileChanged(this,'.contentFront')" accept="application/pdf,application/msword,
application/vnd.openxmlformats-officedocument.wordprocessingml.document,.txt"   class="d-none" id="contentFront" name="contentFront" value="">
                    <input type="text" autocomplete="new-password" onclick="$('#contentFront').trigger('click')" class="contentFront border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput"
                      placeholder="Content you would like on your business card: Back">
                    <div class="input-group-append" onclick="$('#contentFront').trigger('click')">
                        <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" type="button">
                            <i class="fas fa-paperclip" style="font-size:22px"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
                <div class="borderFav input-group mb-3 p-1">
                    <input type="file" onchange="fileChanged(this,'.contentBack')" accept="application/pdf,application/msword,
application/vnd.openxmlformats-officedocument.wordprocessingml.document,.txt" multiple class="d-none" id="contentBack" name="contentBack" value="">
                    <input type="text" autocomplete="new-password" onclick="$('#contentBack').trigger('click')" class="contentBack border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput"
                      placeholder="Content you would like on your business card: Front">
                    <div class="input-group-append" onclick="$('#contentBack').trigger('click')">
                        <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" type="button">
                            <i class="fas fa-paperclip" style="font-size:22px"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>





        <div class="justify-content-center row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="row">
                    <div class="col-12 p-0  mb-3 ">
                        <div class="input-group border">
                            <input placeholder="Do you have a color preference?" value="{{ old('businesssCardColorPrefernce') }}" name="businesssCardColorPrefernce" type="text" class="border-0 form-control shadow-none cstmFormControl">
                        </div>

                    </div>
                </div>
            </div>
        </div>





        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
                <div class="borderFav input-group mb-3 p-1">
                    <input type="file" onchange="fileChanged(this,'.logoImagesAndLogo')" accept="image/*" multiple class="d-none" id="logoImagesAndLogo" name="logoImagesAndLogo[]" value="">
                    <input type="text" onclick="$('#logoImagesAndLogo').trigger('click')" class="logoImagesAndLogo border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput"
                      placeholder="Load examples of logos or images you would like to be considered">
                    <div class="input-group-append" onclick="$('#logoImagesAndLogo').trigger('click')">
                        <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" type="button">
                            <i class="fas fa-paperclip" style="font-size:22px"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="justify-content-center row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="row">
                    <div class="borderFav input-group mb-3 p-1">
                        <textarea value="{{ old('businessProjectDetail') }}" rows="5" name="businessProjectDetail" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="You may enter project details here." aria-label="business card Design Project Detail"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
