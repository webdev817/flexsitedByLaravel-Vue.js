<div class="row justify-content-center">
    <div class="col-12 col-md-6 col-lg-6 col-xl-6">


        <div class="row">

            <div class="col-12 p-0">
                <div class="input-group mb-3 border">
                    <input value="{{ old('businessAddress') }}" name="businessAddress" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="Business Address" aria-label="Business Address" required>
                </div>
            </div>
            <div class="col-12 p-0">
                <div class="input-group mb-3 border">
                    <input value="{{ old('hoursOfOperation') }}" name="hoursOfOperation" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="Hours of Operation" aria-label="Hours of Operation" required>
                </div>
            </div>
            <div class="col-12 p-0">
                <div class="input-group mb-3 border">
                    <input value="{{ old('whatBeautyServicesDoYouOffer') }}" name="whatBeautyServicesDoYouOffer" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="What beauty services do you offer?"
                      aria-label="What beauty services do you offer?" required>
                </div>
            </div>
            <div class="col-12 p-0">
                <div class="input-group mb-3 border">
                    <input value="{{ old('appointment') }}" name="appointment" type="text" class="border-0 form-control shadow-none cstmFormControl" placeholder="Appointment Booking Provider: (If applicable)"
                      aria-label="Appointment Booking Provider: (If applicable)"  >
                </div>
            </div>

            <div class="col-12 p-0">
                <div class="input-group mb-3 border">
                    <textarea name="socialMediaHandles" rows="5" placeholder="Social Media Handles: Facebook, Instagram, Youtube, Other.
Type Social Media Links" cols="80" class="border-0 form-control shadow-none cstmFormControl"></textarea>
                </div>
            </div>

        </div>
    </div>
</div>
