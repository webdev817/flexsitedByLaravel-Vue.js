<div class="row justify-content-center">
    <div data-class="websiteDesignSection1" id="websiteDesignSection1" class="col-12 favBG sectionHeading hand col-md-6 p-4 col-lg-6 col-xl-6 text-white mt-3 p-0 ">
        <h4 class="d-inline ">WEBSITE DESIGN</h4>
        <i class="fas fa-minus float-right pt-1 websiteDesignSection1Sign"></i>
    </div>
    <div class="col-12"></div>
</div>

<div class="row websiteDesignSection1 show collapse multi-collapse">

    <div class="col-12 pt-2">



        <div class="row justify-content-center ">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
                <div class="borderFav input-group mb-3 p-1">

                    <select class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput" required id="providingContent" name="providingContent">
                        {{-- <option value="" selected disabled>Are you providing content?</option> --}}
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    {{-- <input type="text" class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput"  placeholder="Are you providing content?" > --}}
                    <div class="input-group-append">
                        <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" onclick="$('#providingContent').select2('open');" type="button">
                            <i class="fa fa-angle-down" style="font-size:30px"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center ">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
                <div class="borderFav input-group mb-3 p-1">

                    <input type="file" onchange="fileChanged(this,'.logoUploadInputDisplay')" multiple accept="image/*,.zip,.rar,.7zip" class="d-none" id="logoUpload" name="logoUpload[]" value="">

                    <input type="text" onclick="$('#logoUpload').trigger('click')" class="logoUploadInputDisplay border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput" placeholder="Logo Upload( If applicable)">
                    <div class="input-group-append" onclick="$('#logoUpload').trigger('click')">
                        <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" type="button">
                            <i class="fas fa-paperclip" style="font-size:22px"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
                <div class="borderFav input-group mb-3 p-1">

                    <input type="file" onchange="fileChanged(this,'.contentUploadInput')" accept="application/pdf,application/msword,
application/vnd.openxmlformats-officedocument.wordprocessingml.document,.txt" class="d-none" id="contentUpload" name="contentUpload" value="">


                    <input type="text" onclick="$('#contentUpload').trigger('click')" class="contentUploadInput border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput" placeholder="Content Upload( If applicable)">
                    <div class="input-group-append" onclick="$('#contentUpload').trigger('click')">
                        <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" type="button">
                            <i class="fas fa-paperclip" style="font-size:22px"></i>


                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
                <div class="borderFav input-group mb-3 p-1">
                    <input type="file" onchange="fileChanged(this,'.galleryImagesInput')" accept=".zip,.rar,.7zip,image/*" multiple class="d-none" id="galleryImages" name="galleryImages[]" value="">
                    <input type="text" onclick="$('#galleryImages').trigger('click')" class="galleryImagesInput border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput" placeholder="Gallery Images ( If applicable)">
                    <div class="input-group-append" onclick="$('#galleryImages').trigger('click')">
                        <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" type="button">
                            <i class="fas fa-paperclip" style="font-size:22px"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center ">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
                <div class="borderFav input-group mb-3 p-1">
                    <select class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput" required id="howfindus" name="howfindus">
                        {{-- <option value="" selected disabled>How did you find us?</option> --}}
                        <option value="Google">Google</option>
                        <option value="Flyer">Flyer</option>
                        <option value="Social Media">Social Media</option>
                        <option value="Friend">Friend</option>
                        <option value="Conference">Conference</option>
                        <option value="Other">Other</option>

                    </select>
                    {{-- <input type="text" class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput"  placeholder="How did you find us?" > --}}
                    <div class="input-group-append">
                        <button class="btn btn-cstm rounded-0 shadow-none btnsPage5" onclick="$('#howfindus').select2('open')" type="button">
                            <i class="fa fa-angle-down" style="font-size:30px"></i>


                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="justify-content-center row">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="row">
                    <div class="borderFav input-group mb-3 p-1">
                        <input value="{{ old('websiteProjectDetail') }}" name="websiteProjectDetail" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="You may enter project details here." aria-label="Website Design Project Detail">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
