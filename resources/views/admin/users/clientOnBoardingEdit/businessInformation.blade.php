<div class="card-header">
    <h5>Business Information</h5>
</div>
<div class="card-block pb-0 pt-0">
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td style="width:30%">Name</td>
                    <td style="width:70%">
                      <input type="text" class="form-control" name="businessName" value="{{{ $wizeredObj->businessName }}}">
                    </td>
                </tr>

                <tr>
                    <td>
                        Phone Number
                    </td>
                    <td>
                      <input type="text" class="form-control" name="businessPhoneNumber" value="{{{ $wizeredObj->businessPhoneNumber }}}">
                    </td>
                </tr>

                <tr>
                    <td>
                        Address
                    </td>
                    <td>
                      <input type="text" class="form-control" name="businessAddress" value="{{{ $wizeredObj->businessAddress }}}">
                    </td>
                </tr>

                <tr>
                    <td>
                        Hours Of Operation
                    </td>
                    <td>
                      <input type="text" class="form-control" name="hoursOfOperation" value="{{{ $wizeredObj->hoursOfOperation }}}">
                    </td>
                </tr>

                <tr>
                    <td>
                        Beauty Services
                    </td>
                    <td>
                        <input type="text" class="form-control" name="whatBeautyServicesDoYouOffer" value="{{{ $wizeredObj->whatBeautyServicesDoYouOffer }}}">
                    </td>
                </tr>

                <tr>
                    <td>
                        Appointment
                    </td>
                    <td>
                      <input type="text" class="form-control" name="appointment" value="{{{ $wizeredObj->appointment }}}">
                    </td>
                </tr>

                <tr>
                    <td>
                        Social Media Handles
                    </td>
                    <td>
                        <textarea name="socialMediaHandles" class="form-control pl-0 " rows="5" cols="80">{{ $wizeredObj->socialMediaHandles }}</textarea>
                    </td>
                </tr>

                <tr>
                    <td>
                        Pages Selected
                    </td>
                    <td>

                        <div class="row m-0">
                          <select class="form-control pagesSelected" name="pageSelected[]" id="pages">
                            <option value="Home">Home</option>
                            <option value="Booking">Booking</option>
                            <option value="About">About</option>
                            <option value="Classes">Classes</option>
                            <option value="Services">Services</option>
                            <option value="Testimonial">Testimonial</option>
                            <option value="FAQS">FAQS</option>
                            <option value="Specials">Specials</option>
                            <option value="Pricing">Pricing</option>
                            <option value="Privacy Policy">Privacy Policy</option>
                            <option value="Portfolio">Portfolio</option>
                            <option value="Terms & Conditions">Terms & Conditions</option>
                          </select>
                        </div>
                    </td>
                </tr>



            </tbody>
        </table>
    </div>
</div>
