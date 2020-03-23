<div class="card-header">
    <h5>Business Information</h5>
</div>
<div class="card-block pb-0 pt-0">
    <div class="table-responsive">
        <table class="table">
            <tbody>
                <tr>
                    <td style="width:30%">Name</td>
                    <td style="width:70%">{{{ $wizeredObj->businessName }}} </td>
                </tr>

                <tr>
                    <td>
                        Phone Number
                    </td>
                    <td>
                        {{{ $wizeredObj->businessPhoneNumber }}}
                    </td>
                </tr>

                <tr>
                    <td>
                        Address
                    </td>
                    <td>
                        {{{ $wizeredObj->businessAddress }}}
                    </td>
                </tr>

                <tr>
                    <td>
                        Hours Of Operation
                    </td>
                    <td>
                        {{{ $wizeredObj->hoursOfOperation }}}
                    </td>
                </tr>

                <tr>
                    <td>
                        Beauty Services
                    </td>
                    <td>
                        {{{ $wizeredObj->whatBeautyServicesDoYouOffer }}}
                    </td>
                </tr>

                <tr>
                    <td>
                        Appointment
                    </td>
                    <td>
                        {{{ $wizeredObj->appointment }}}
                    </td>
                </tr>

                <tr>
                    <td>
                        Social Media Handles
                    </td>
                    <td>
                        <textarea name="name" class="bg-transparent border-0 form-control pl-0 rounded-0 shadow-none" readonly rows="3" cols="80">{{ $wizeredObj->socialMediaHandles }}</textarea>
                    </td>
                </tr>

                <tr>
                    <td>
                        Pages Selected
                    </td>
                    <td>
                        @if ($wizeredObj->pageSelected != null)
                        @php
                        $pages = explode(",", $wizeredObj->pageSelected);
                        @endphp
                        @endif
                        <div class="row m-0">
                            @foreach ($pages as $page)
                            <div class="media p-0 col-md-6 col-12 col-lg-4 col-xl-4">
                                <div class="media-left">
                                    <a class="btn btn-outline-primary btn-icon" href="javascript:void(0)" role="button"><i class="fas fa-globe"></i>
                                    </a>
                                </div>
                                <div class="media-body">
                                    <div class="chat-header f-w-400 mt-2">{{ $page }}</div>

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        Providing Content
                    </td>
                    <td>
                        <span class="text-capitalize">{{ $wizeredObj->providingContent }}</span>

                    </td>
                </tr>
                <tr>
                    <td>
                        How Find Us
                    </td>
                    <td>
                        <span class="text-capitalize">{{ $wizeredObj->howfindus }}</span>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
