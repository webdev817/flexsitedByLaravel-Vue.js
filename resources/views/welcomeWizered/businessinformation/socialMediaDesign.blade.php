<div class="row justify-content-center">
    <div  data-class="socialMediaDesignSection4" class="col-12 col-md-6 col-lg-6 col-xl-6  p-4 favBG text-white sectionHeading hand mt-3">
        <h4 class="d-inline ">Social Media Design</h4>
        <i class="fas fa-plus float-right pt-1 socialMediaDesignSection4Sign"></i>
    </div>

    <div class="col-12"></div>
</div>

<div class="row socialMediaDesignSection4 collapse multi-collapse">

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

                    <select class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput" id="socialSelected" name="socialSelected">

                        <option value="Text Only ">Instagram</option>
                        <option value="Text Only">Facebook</option>
                        <option value="Text Only">Other</option>
                    </select>

                    <div class="input-group-append">
                        <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" onclick="$('#socialSelected').select2('open');" type="button">
                            <i class="fa fa-angle-down" style="font-size:30px"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
                <div class="borderFav input-group mb-3 p-1">

                    <select class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput" id="socialSelected1" name="socialSelected1">

                        <option value="Text Only">Post</option>
                        <option value="Text Only">Story</option>
                        <option value="Text Only">Banner</option>
                        <option value="Text Only">Profle</option>
                    </select>

                    <div class="input-group-append">
                        <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" onclick="$('#socialSelected1').select2('open');" type="button">
                            <i class="fa fa-angle-down" style="font-size:30px"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
                <div class="borderFav input-group mb-3 p-1">
                    <input type="file" onchange="fileChanged(this,'.logoExamples')" accept="image/*" multiple class="d-none" id="logoExamples" name="logoExamples[]" value="">
                    <input type="text" onclick="$('#logoExamples').trigger('click')" class="logoExamples border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput"
                      placeholder="List or upload the content that you would added to your design: ">
                    <div class="input-group-append" onclick="$('#logoExamples').trigger('click')">
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
                        <textarea value="{{ old('socialProjectDetail') }}" rows="5" name="socialProjectDetail" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="You may enter project details here." aria-label="Social Media Design Project Detail"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
