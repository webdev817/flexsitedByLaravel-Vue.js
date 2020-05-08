<div class="row justify-content-center">
    <div  data-class="websiteDesignSection2" class="col-12 col-md-6 col-lg-6 col-xl-6  p-4 favBG text-white sectionHeading hand mt-3">
        <h4 class="d-inline ">Logo Design</h4>
        <i class="fas fa-plus float-right pt-1 websiteDesignSection2Sign"></i>
    </div>

    <div class="col-12"></div>
</div>







<div class="row websiteDesignSection2 collapse multi-collapse">

    <div class="col-12">


        <div class="row justify-content-center mb-3">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 grayColor mt-3 p-0">
                <h6 class="d-inline text-dark">
                    Only complete the following sections if you have purchased these as addons or it’s are part of your chosen plan.
                </h6>
            </div>
        </div>



        <div class="justify-content-center row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="row">
                    <div class="col-12 p-0  mb-3 ">
                        <div class="input-group border">
                            <input value="{{ old('nameofCompanyForLog') }}" name="nameofCompanyForLog" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="Company Name" aria-label="Company Name">
                        </div>
                        <small class="form-text text-muted">(exactly as you would like it on the design)</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="justify-content-center row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="row">
                    <div class="col-12 p-0  mb-3 ">
                        <div class="input-group border">
                            <input placeholder="Tagline/Slogan  (if applicable) " aria-label="Tagline/Slogan" value="{{ old('taglineSlogan') }}" name="taglineSlogan" type="text" class="border-0 form-control shadow-none cstmFormControl">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="justify-content-center row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="row">
                    <div class="col-12 p-0  mb-3 ">
                        <div class="input-group border">
                            <input placeholder="Do you have a color preference?" value="{{ old('logoColorPrefernce') }}" name="logoColorPrefernce" type="text" class="border-0 form-control shadow-none cstmFormControl">
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
                <div class="borderFav input-group mb-3 p-1">

                    <select class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput" id="textandImageOrText" name="textandImageOrText">

                        <option value="Text and Image">Text and image</option>
                        <option value="Text Only">Text Only</option>
                    </select>

                    <div class="input-group-append">
                        <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" onclick="$('#textandImageOrText').select2('open');" type="button">
                            <i class="fa fa-angle-down" style="font-size:30px"></i>
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
                            <input placeholder="Do you have font preference? " value="{{ old('logoFontPrefernce') }}" name="logoFontPrefernce" type="text" class="border-0 form-control shadow-none cstmFormControl">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
                <div class="borderFav input-group mb-3 p-1">
                    <input type="file" onchange="fileChanged(this,'.logoExamples')" accept="image/*" multiple class="d-none" id="logoExamples" name="logoExamples[]" value="">
                    <input type="text" onclick="$('#logoExamples').trigger('click')" class="logoExamples border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput"
                      placeholder="Load examples of logos or images you would like to be considered">
                    <div class="input-group-append" onclick="$('#logoExamples').trigger('click')">
                        <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" type="button">
                            <i class="fas fa-paperclip" style="font-size:22px"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
