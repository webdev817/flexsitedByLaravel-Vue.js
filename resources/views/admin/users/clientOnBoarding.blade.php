@extends('layouts.admin')

@section('body')

<div class="slim-pageheader">
    <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('root') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">Client On Boarding</li>
    </ol>
    <h6 class="slim-pagetitle">Client On Boarding</h6>
</div>
@include('common.messages')

<div class="row">

    <div class="col-lg-8">

        <div class="card card-people-list mg-b-20 pd-0 ">
            <div class="card-contact mg-b-10 aacard_contact border-0">
                <p class="contact-item border-top-0">
                    <span>Progress:</span>
                    @if ($wizeredObj->currentStep == 1)
                    Website Domain
                    @elseif ($wizeredObj->currentStep == 2)
                    WEBSITE DESIGN INSPIRATION
                    @elseif ($wizeredObj->currentStep == 3)
                    Website Package
                    @elseif ($wizeredObj->currentStep == 4)
                    Subscription Plan and Billing
                    @elseif ($wizeredObj->currentStep == 5 && $wizeredObj->wizered == null)
                    BUSINESS INFORMATION
                    @elseif ($wizeredObj->currentStep == 5 && $wizeredObj->wizered == "allDone")
                    Completed
                    @else
                    Registered
                    @endif
                </p>
                @if ($wizeredObj->currentStep == 5 && $wizeredObj->wizered == "allDone")
                <p class="contact-item">
                    <span>Business Name:</span>
                    {{{ $wizeredObj->businessName }}}
                </p>
                <p class="contact-item">
                    <span>Business Phone Number:</span>
                    {{{ $wizeredObj->businessPhoneNumber }}}
                </p>
                <p class="contact-item">
                    <span>Business Address:</span>
                    {{{ $wizeredObj->businessAddress }}}
                </p>
                <p class="contact-item">
                    <span>Hours of Operation:</span>
                    {{{ $wizeredObj->hoursOfOperation }}}
                </p>
                <p class="contact-item">
                    <span>Beauty Services:</span>
                    {{{ $wizeredObj->whatBeautyServicesDoYouOffer }}}
                </p>
                <p class="contact-item">
                    <span>Appointment:</span>
                    {{{ $wizeredObj->appointment }}}
                </p>
                <p class="contact-item">
                    <span>Social Media Handles:</span>
                    {{ $wizeredObj->socialMediaHandles }}
                </p>

                @endif

                <p class="contact-item">
                    <span>Domain:</span>
                    <a href="javascript:void(0)">
                        {{ $wizeredObj->domain ?? '-' }}
                    </a>
                </p>

                <p class="contact-item">
                    <span>Design:</span>
                    @if ($wizeredObj->selectedDesignObj == null)
                    -
                    @else
                    @php
                    $design = $wizeredObj->selectedDesignObj;
                    @endphp
                    <img src="{{ asset($design->image) }}" class="img-fluid displayPictureLarge rounded-0" alt="">
                    @endif
                </p>

                <p class="contact-item">
                    <span>Plan:</span>
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
                </p>
                <p class="contact-item">
                    <span>Logo Design:</span>
                    @if ($wizeredObj->logoDesign == "on")
                    Yes
                    @else
                    -
                    @endif
                </p>

                <p class="contact-item">
                    <span>Business Card Design:</span>
                    @if ($wizeredObj->businessCardDesign == "on")
                    Yes
                    @else
                    -
                    @endif

                </p>
                <p class="contact-item">
                    <span>Flayer Design:</span>
                    @if ($wizeredObj->flayerDesign == "on")
                    Yes
                    @else
                    -
                    @endif

                </p>
                <p class="contact-item">
                    <span>Charge Status:</span>
                    @if ($wizeredObj->charged == "complete")
                    <a href="{{ route('invoiceDownload', [$wizeredObj->chargeInvoiceId, 'userId'=> $user->id]) }}">View Invoice</a>
                    @elseif ($wizeredObj->charged == "NotNeeded")
                    Not Needed
                    @endif

                </p>
                <p class="contact-item">
                  <span>Coupon Used:</span>
                  @if ($wizeredObj->couponUsedId == null)
                    No
                  @else
                    <a href="{{ route('coupons.edit', $wizeredObj->couponUsedId) }}">
                      Yes
                    </a>
                  @endif
                </p>


            </div>
        </div>


        @if ($wizeredObj->logoUpload->count() || $wizeredObj->contentUpload->count() || $wizeredObj->galleryImages->count() )
        <div class="card card-contact mb-5 aacard_contact border-0 ">

          @if ($wizeredObj->logoUpload->count())
            <p class="contact-item border-0">
              <div class="float-left">
                <span>Logo Files:</span>
              </div>
              <div class="float-right">
                @foreach ($wizeredObj->logoUpload as $logoFile)
                  <a  target="_blank" href="{{ Storage::url($logoFile->path) }}">
                    {{ fileInfo($logoFile->path)->basename }}
                  </a>
                @endforeach
              </div>
            </p>
          @endif
          @if ($wizeredObj->contentUpload->count())
            <p class="contact-item border-0">
              <div class="float-left">
                <span>Content Files:</span>
              </div>
              <div class="float-right">
                @foreach ($wizeredObj->contentUpload as $contentFile)
                  <a  target="_blank" href="{{ Storage::url($contentFile->path) }}">
                    {{ fileInfo($contentFile->path)->basename }}
                  </a>
                @endforeach
              </div>
            </p>
          @endif

          @if ($wizeredObj->galleryImages->count())
            <p class="contact-item border-0">
              <div class="float-left">
                <span>Gallery Images:</span>
              </div>
              <div class="float-right">
                @foreach ($wizeredObj->galleryImages as $galleryImage)
                  <a target="_blank" href="{{ Storage::url($galleryImage->path) }}">
                    {{ fileInfo($galleryImage->path)->basename }}
                  </a>
                @endforeach
              </div>
            </p>
          @endif

        </div>
      @endif

    </div>

    <div class="col-lg-4">

        <div class="card-contact mg-b-20">
            <div class="tx-center">

                <a href="{{ route('users.show',$user->id) }}">
                    <img src="{{ asset('mawaisnow\slim\img\avatar_11.png') }}" class="card-img" alt="" style="width:100px; height:100px;">
                </a>

                <h5 class="mg-t-10 mg-b-5"><a href="{{ route('users.show',$user->id) }}" class="contact-name">{{ $user->name }}</a></h5>


            </div><!-- tx-center -->



            <p class="contact-item">
                <span>Email:</span>
                {{ $user->email }}
            </p>


            <p class="contact-item">
                <span>Phone:</span>
                {{ $user->phone }}

            </p>

            <p class="contact-item">
                <span>Status:</span>
                @if ($user->status == 0) Pending
                @endif
                @if ($user->status == 1) Active
                @endif
                @if ($user->status == 2) Block
                @endif
            </p>

            @if ($user->hasStripeId())

              @php
                $subscription = $user->subscription('main');
              @endphp

              @if ($subscription == null)
                <p class="contact-item">
                  <span>Subscription:</span>
                  No
                </p>
              @else


                    @if ($subscription->onGracePeriod())
                      <p class="contact-item">
                        <span>Subscription:</span>
                        Cancelled - (Grace Period)
                      </p>
                      <p class="contact-item">
                        <span>Subscription End Date:</span>
                        {{ $subscription->ends_at->format('F d, Y') }}
                      </p>
                      <p class="contact-item">
                        <span>Resume Subscription:</span>
                        <form action="{{ route('resumeSubscription') }}" method="post">
                            @csrf
                            <input type="hidden" name="subscription" value="{{ $subscription->id }}">
                            <button type="submit" class="btn btn-success btn-sm" name="button">Resume</button>
                        </form>

                      </p>
                    @elseif ($subscription->ended())
                      <p class="contact-item">
                        <span>Subscription:</span>
                        Cancelled
                      </p>
                    @elseif ($subscription->hasIncompletePayment())
                      <p class="contact-item">
                        <span>Subscription:</span>
                        Require Secondary Payment Action
                      </p>
                    @elseif ($subscription->active())
                      <p class="contact-item">
                        <span>Subscription:</span>
                        Active
                      </p>
                      <p class="contact-item">
                        <span>Next Billing Date:</span>
                        @php
                          $stripeSubscription = $subscription->asStripeSubscription();

                        @endphp
                         {{  Carbon\Carbon::createFromTimeStamp($stripeSubscription->current_period_end)->format('F jS, Y') }}
                      </p>
                      <p class="contact-item">
                        <span>Stripe Customer ID:</span>
                        {{ $user->stripe_id }}
                      </p>
                      <p class="contact-item">
                        <span>Stripe Subscription ID:</span>
                        {{ $subscription->stripe_id }}
                      </p>
                      <p class="contact-item">
                        <span>View Detail:</span>
                        <a class="btn btn-outline-primary btn-sm" href="{{ route('subscriptionHistory', $subscription->id) }}">
                          <i class="icon ion-ios-eye"></i> View
                        </a>
                      </p>

                      <ul class="list-group">
                        <li class="list-group-item border-right-0 border-left-0 p-0 pt-1 pb-1">
                          <div class="float-left">
                            Cancel Subscription:
                          </div>
                          <div class="float-right">
                            <form action="{{ route('cancelSubscription') }}" method="post">
                              @csrf
                              <input type="hidden" name="subscription" value="{{ $subscription->id }}">
                              <input type="hidden" name="cancelNow" value="1">
                              <button type="submit" class="btn btn-danger btn-sm" name="button">Cancel Now</button>
                            </form>
                          </div>

                        </li>

                      </ul>


                    @endif


              @endif



            @else

            <p class="contact-item">
                <span>Subscription:</span>
                No
            </p>
            @endif








        </div>



    </div>

</div>


@endsection

@section('head')
<script src="{{ asset('mawaisnow/slim/lib/select2/js/select2.full.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('mawaisnow/slim/lib/select2/css/select2.min.css') }}">

@endsection
@section('cJS')
@include('common.modals')
<script>
    $('.select2hai').select2({
        containerCssClass: 'select2-outline-info',
        dropdownCssClass: 'bd-info hover-info'
    });

    $(".statusSelectBox").change(function() {
        var status = $(this).val();
        var id = $(this).attr('data-id');

        showConfirm({
            'route': '{{ route('changeUserStatus') }}',
            'method': 'post',
            'params': {
                'status': status,
                'userId': id
            }
        });
    });


    $(".deleteBtn").click(function() {

        var id = $(this).attr('data-id');

        showConfirm({
            'route': '{{ route('deleteUser') }}',
            'method': 'post',
            'params': {
                'userId': id
            },
            'message': "Are sure, you want to delete that user?"
        });
    });
</script>
@endsection
