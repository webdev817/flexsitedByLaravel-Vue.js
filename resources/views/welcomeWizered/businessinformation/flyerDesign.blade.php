<div class="row justify-content-center">
    <div data-class="websiteDesignSection3" class="col-12 col-md-6 col-lg-6 col-xl-6  p-4 favBG text-white sectionHeading hand  mt-3  ">
        <h4 class="d-inline ">Flyer Design</h4>
        <i class="fas fa-plus float-right pt-1 websiteDesignSection3Sign"></i>
    </div>
    <div class="col-12"></div>
</div>



<div class="row websiteDesignSection3 collapse multi-collapse">

    <div class="col-12">


        <div class="row justify-content-center mb-3">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 grayColor mt-3 p-0">
                <h6 class="d-inline text-dark"  style = " @if($pages == 0) display : none !important; @else display:inline !important; @endif">
                    Only complete the following sections if you have purchased these as addons or it’s are part of your chosen plan.
                </h6>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
                <div class="borderFav input-group mb-3 p-1">
                    <input type="file" onchange="fileChanged(this,'.contentUploadForFlyer')" accept="application/pdf,application/msword,
      application/vnd.openxmlformats-officedocument.wordprocessingml.document,.txt" class="d-none" id="contentUploadForFlyer" name="contentUploadForFlyer" value="">
                    <input type="text" onclick="$('#contentUploadForFlyer').trigger('click')" class="contentUploadForFlyer border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput"
                      placeholder="Content you would like included on your Flyer">
                    <div class="input-group-append" onclick="$('#contentUploadForFlyer').trigger('click')">
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
                            <input placeholder="Do you have a color preference?" value="{{ old('flayerColorPrefernce') }}" name="flayerColorPrefernce" type="text" class="border-0 form-control shadow-none cstmFormControl">
                        </div>

                    </div>
                </div>
            </div>
        </div>




        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
                <div class="borderFav input-group mb-3 p-1">
                    <input type="file" onchange="fileChanged(this,'.imagesandlogoForFlyer')" accept="image/*" multiple class="d-none" id="imagesandlogoForFlyer" name="imagesandlogoForFlyer[]" value="">
                    <input type="text" onclick="$('#imagesandlogoForFlyer').trigger('click')" class="imagesandlogoForFlyer border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput" placeholder="Load images and logo (if applicable)">
                    <div class="input-group-append" onclick="$('#imagesandlogoForFlyer').trigger('click')">
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
                        <textarea value="{{ old('flyerProjectDetail') }}" rows="5" name="flyerProjectDetail" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="You may enter project details here." aria-label="Flyer Design Project Detail"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
