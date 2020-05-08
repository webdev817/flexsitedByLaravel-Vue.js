<div class="row justify-content-center">
    <div class="col-12 col-md-6 col-lg-6 col-xl-6 grayColor mt-3 p-0">
        <h4 class="d-inline favColor">Flyer Design</h4>
    </div>
    <div class="col-12"></div>
</div>
<div class="row justify-content-center mb-3">
    <div class="col-12 col-md-6 col-lg-6 col-xl-6 grayColor mt-3 p-0">
        <h6 class="d-inline text-dark">
            Only complete the following sections if you have purchased these as addons or it’s are part of your chosen plan.
        </h6>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-0">
        <div class="borderFav input-group mb-3 p-1">
            <input type="file" onchange="fileChanged(this,'.contentUploadForFlyer')" accept="application/pdf,application/msword,
      application/vnd.openxmlformats-officedocument.wordprocessingml.document,.txt" class="d-none" id="contentUploadForFlyer" name="contentUploadForFlyer" value="">
            <input type="text" onclick="$('#contentUploadForFlyer').trigger('click')" class="contentUploadForFlyer border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput" placeholder="Content you would like included on your Flyer">
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
