@extends('layouts.dashboard.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="page-header">
                    <div class="page-block">
                        <div class="row align-items-center">
                            <div class="col-md-12">

                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('adminHome') }}"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                                    <li class="breadcrumb-item">Client On Boarding</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="row">




                            <div class="col-xl-8 col-lg-12">
                                <div class="card">
                                    <div class="card-block pt-0">
                                        <h6 class="text-muted mt-4 mb-3">Progress :

                                            @if ($wizeredObj->currentStep == 1)
                                            Website Domain
                                            @elseif ($wizeredObj->currentStep == 2)
                                            Website Design Inspiration
                                            @elseif ($wizeredObj->currentStep == 3)
                                            Website Package
                                            @elseif ($wizeredObj->currentStep == 4)
                                            Subscription Plan and Billing
                                            @elseif ($wizeredObj->currentStep == 5 && $wizeredObj->wizered == null)
                                            Business Information
                                            @elseif ($wizeredObj->currentStep == 5 && $wizeredObj->wizered == "allDone")
                                            Completed
                                            @else
                                            Registered
                                            @endif

                                        </h6>
                                        <div class="progress">
                                            <div class="progress-bar progress-c-theme" role="progressbar" style="width:{{ $wizeredObj->currentStep * 20 }}%;height:11px;" aria-valuenow="{{ $wizeredObj->currentStep * 20 }}" aria-valuemin="0"
                                              aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card">
                                    @if ($wizeredObj->currentStep == 5 && $wizeredObj->wizered == "allDone")


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

                                    @endif
                                    <div class="card-header">
                                        <h5>Domain Information</h5>
                                    </div>
                                    <div class="card-block pb-0 pt-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td style="width:30%">Domain</td>
                                                        <td style="width:70%">
                                                            <a href="javascript:void(0)">
                                                                {{ $wizeredObj->domain ?? '-' }}
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                    <div class="card-header">
                                        <h5>Design</h5>
                                    </div>
                                    <div class="card-block pb-0 pt-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td style="width:30%">Selected Design </td>
                                                        <td style="width:70%">
                                                            @if ($wizeredObj->selectedDesignObj == null)
                                                            -
                                                            @else
                                                            @php
                                                            $design = $wizeredObj->selectedDesignObj;
                                                            @endphp
                                                            <img src="{{ asset($design->image) }}" class="img-fluid displayPictureLarge rounded-0" alt="">
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <h5>Plan</h5>
                                    </div>
                                    <div class="card-block pb-0 pt-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td style="width:30%">Selected Plan </td>
                                                        <td style="width:70%">
                                                            @php

                                                            switch ($wizeredObj->planId) {
                                                            case 'basicPlanYearly':
                                                            $plan = "Basic Plan - Yearly";
                                                            break;
                                                            case 'essentialPlanYearly':
                                                            $plan = "Essential Plan - Yearly";
                                                            break;
                                                            case 'activePlanYearly':
                                                            $plan = "Active Plan - Yearly";
                                                            break;
                                                            case 'completePlanYearly':
                                                            $plan = "Complete Plan - Yearly";
                                                            break;
                                                            case 'basicPlanMonthly':
                                                            $plan = "Basic Plan - Monthly";
                                                            break;
                                                            case 'essentialPlanMonthly':
                                                            $plan = "Basic Plan - Monthly";
                                                            break;
                                                            case 'activePlanMonthly':
                                                            $plan = "Active Plan - Monthly";
                                                            break;
                                                            case 'completePlanMonthly':
                                                            $plan = "Complete Plan - Monthly";
                                                            break;
                                                            default:
                                                            $plan = '-';
                                                            break;
                                                            }
                                                            @endphp
                                                            {{ $plan }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <h5>ADDONS</h5>
                                    </div>
                                    <div class="card-block pb-0 pt-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td style="width:30%">Logo Design </td>
                                                        <td style="width:70%">
                                                            @if ($wizeredObj->logoDesign == "on")
                                                            Yes
                                                            @else
                                                            -
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:30%">Business Card Design</td>
                                                        <td style="width:70%">
                                                            @if ($wizeredObj->businessCardDesign == "on")
                                                            Yes
                                                            @else
                                                            -
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:30%">Flayer Design</td>
                                                        <td style="width:70%">
                                                            @if ($wizeredObj->flayerDesign == "on")
                                                            Yes
                                                            @else
                                                            -
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>




                                    @include('admin.users.billing')



                                </div>


                                @if ($wizeredObj->logoUpload->count() || $wizeredObj->contentUpload->count() || $wizeredObj->galleryImages->count() )

                                <div class="card">
                                    @if ($wizeredObj->logoUpload->count())
                                    <div class="card-header">
                                        <h5>Attached Logo Files</h5>
                                    </div>
                                    <div class="card-block task-attachment">
                                        <ul class="media-list p-0">
                                            @foreach ($wizeredObj->logoUpload as $logoFile)
                                            @php
                                            $obj = fileInfoWithClassObj(Storage::path($logoFile->path));
                                            @endphp
                                            @endforeach
                                            <li class="media d-flex m-b-15">
                                                <div class="m-r-20 file-attach">
                                                    <i class="{{ $obj->class }} f-28 text-muted"></i>
                                                </div>
                                                <div class="media-body">
                                                    <a href="#!" class="m-b-5 d-block text-secondary text-break">{{ $obj->fullName }}</a>
                                                    <div class="text-muted">
                                                        <span>Size: {{ $obj->size }}</span>

                                                    </div>
                                                </div>
                                                <div class="float-right text-muted">
                                                    <a target="_blank" href="{{ Storage::url($logoFile->path) }}">
                                                        <i class="fas fa-download f-18"></i>

                                                    </a>

                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                    @endif

                                    @if ($wizeredObj->contentUpload->count())
                                    <div class="card-header">
                                        <h5>Content Upload</h5>
                                    </div>
                                    <div class="card-block task-attachment">
                                        <ul class="media-list p-0">
                                            @foreach ($wizeredObj->contentUpload as $contentFile)
                                            @php
                                            $obj = fileInfoWithClassObj(Storage::path($contentFile->path));
                                            @endphp
                                            @endforeach
                                            <li class="media d-flex m-b-15">
                                                <div class="m-r-20 file-attach">
                                                    <i class="{{ $obj->class }} f-28 text-muted"></i>
                                                </div>
                                                <div class="media-body">
                                                    <a href="#!" class="m-b-5 d-block text-secondary text-break">{{ $obj->fullName }}</a>
                                                    <div class="text-muted">
                                                        <span>Size: {{ $obj->size }}</span>

                                                    </div>
                                                </div>
                                                <div class="float-right text-muted">
                                                    <a target="_blank" href="{{ Storage::url($contentFile->path) }}">
                                                        <i class="fas fa-download f-18"></i>
                                                    </a>

                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                    @endif

                                    @if ($wizeredObj->galleryImages->count())
                                    <div class="card-header">
                                        <h5>Gallery Images</h5>
                                    </div>
                                    <div class="card-block task-attachment">
                                        <ul class="media-list p-0">
                                            @foreach ($wizeredObj->galleryImages as $galleryImage)
                                            @php
                                            $obj = fileInfoWithClassObj(Storage::path($galleryImage->path));
                                            @endphp
                                            @endforeach
                                            <li class="media d-flex m-b-15">
                                                <div class="m-r-20 file-attach">
                                                    <i class="{{ $obj->class }} f-28 text-muted"></i>
                                                </div>
                                                <div class="media-body">
                                                    <a href="#!" class="m-b-5 d-block text-secondary text-break">{{ $obj->fullName }}</a>
                                                    <div class="text-muted">
                                                        <span>Size: {{ $obj->size }}</span>

                                                    </div>
                                                </div>
                                                <div class="float-right text-muted">
                                                    <a target="_blank" href="{{ Storage::url($galleryImage->path) }}">
                                                        <i class="fas fa-download f-18"></i>
                                                    </a>

                                                </div>
                                            </li>

                                        </ul>
                                    </div>
                                    @endif



                                </div>


                                @endif





                            </div>



                            <div class="col-xl-4 col-lg-12">

                                <div class="card">
                                    <div class="text-center project-main">
                                        <a href="{{ route('users.show',$user->id) }}">
                                            <img src="{{ asset('mawaisnow\slim\img\avatar_11.png') }}" class="img-radius img-fluid rounded-circle" alt="User-Profile-Image">
                                        </a>

                                        <h5 class="mt-4">{{ $user->name }}</h5>
                                        @if ($user->businessName != null)
                                        <span>{{ $user->businessName }}</span>

                                        @endif

                                    </div>


                                    <div class="card-block task-details pt-0 pb-0">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td><i class="fas fa-id-badge m-r-5"></i> ID:</td>
                                                    <td class="text-right"><span class="float-right"> {{ $user->id }} </span></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-envelope m-r-5"></i> Email:</td>
                                                    <td class="text-right"><span class="float-right"> {{ $user->email }} </span></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="fas fa-phone m-r-5"></i> Phone:</td>
                                                    <td class="text-right"><span class="float-right"> {{ $user->phone }} </span></td>
                                                </tr>

                                                <tr>
                                                    <td><i class="fas fa-thermometer-half m-r-5"></i> Status:</td>
                                                    <td class="text-right">
                                                        @if ($user->status == 0) Pending
                                                        @endif
                                                        @if ($user->status == 1) Active
                                                        @endif
                                                        @if ($user->status == 2) Block
                                                        @endif
                                                    </td>
                                                </tr>










                                                <tr>
                                                    <td><i class="far fa-calendar-alt m-r-5"></i> Updated:</td>
                                                    <td class="text-right">{{ $user->updated_at->format('d F, Y') }}</td>
                                                </tr>
                                                <tr>
                                                    <td><i class="far fa-credit-card m-r-5"></i> Created:</td>
                                                    <td class="text-right">{{ $user->created_at->format('d F, Y') }}</td>
                                                </tr>


                                            </tbody>
                                        </table>

                                    </div>
                                </div>




                            </div>




                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
