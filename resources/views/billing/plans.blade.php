@extends('layouts.supportPortal.master')

@section('head')

<script src="https://js.stripe.com/v3/"></script>

@endsection

@section('cJS')
@include('common.stripe')
@endsection

@section('body')
<div class="container">
    <div class="slim-pageheader">
        <ol class="breadcrumb slim-breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Buy Proxy Plan</li>
        </ol>
        <h6 class="slim-pagetitle">Buy Proxy Plan</h6>
    </div>
    @include('common.messages')

    <div class="section-wrapper text-white p-4">

        <div class="row">
            <div class="col-7">

                <div class="card card-pricing-two border-0">
                    <h6 class="pricing-title">Monthly T2 Residential Plans ( <strong>10GB</strong> )</h6>
                    <h1 class="pricing-price">$60</h1>
                    <p class="mg-b-25">per month</p>

                    <ul class="pricing-list m-0">
                        <li class="text-left">This is Monthly a Recurring Subscription. Data Will Roll Over!</li>
                        <li class="text-left">Data Does NOT Roll Over if Subscription is Canceled. </li>
                        <li class="text-left">All Proxies are User:Pass. Proxies are Guaranteed to work on Adidas, NIke, Footsites, & Supreme</li>
                        <li class="text-left">
                            Any Additional T2 Data Will be Standard rates.
                        </li>
                        <li class="text-left">Plans are Instantly Activated and Billing Cycles Will Begin From the Date of Purchase. </li>
                        <li class="text-left">
                          <i>T1 and Datacenter Proxies are Not Included and are Separate Purchases.</i>
                        </li>
                        <li class="text-left">
                          Any Additional T2 Data Will Be Sold at Standard rates.
                        </li>

                    </ul>
                    {{-- <a href="" class="btn btn-primary btn-pricing">Start Free Trial</a> --}}
                </div>
            </div>
            <div class="col-5 mt-5">
                <H1 class="fadeInRightBig dTextLogo animated text-center">
                    <img src="assets/logos/awaisss2.svg" style="width:80px" alt="">
                    <br>
                    <span id="logoText">
                        What Proxies
                    </span>
                </H1>
            </div>
        </div>

        <form action="{{ route('subscribe') }}" method="post" id="payment-form">
            @csrf
            <div class="mt-5 p-4">

                <div class="form-layout">


                    <label class="col-12 pt-0 pl-0 mb-2 section-title">Billing Information
                      @if (dev())
                        @include('common.copyBtn')
                      @endif
                    </label>


                    <div class="">
                        <div class="col-12 p-0 col-sm-12 col-lg-6 col-md-6 col-xl-6">
                            {{-- <label for="card-element">
                                Credit or debit card
                            </label> --}}
                            {{-- <input id="card-holder-name" class="form-control mb-2 mt-2" placeholder="Card Holder Name" type="text"> --}}


                            <div id="card-element" class="form-control">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>

                    </div>
                    <br>

                    <div class="col-12 p-0">
                                            I ackowledge that this is monthly reoccuring charge and will automatically renew until I cancel.
                    </div>
                    <div class="col-12  p-0">

                              <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="iackowledge" id="iackowledge"
                              @if (dev())
                                checked
                              @endif
                               class="custom-control-input" value="yes" required="">
                              <label class="custom-control-label" for="iackowledge">I agree</label>
                            </div>

                    </div>
                    <div class="form-layout-footer mt-4">


                        <button  id="card-button" data-secret="{{ $intent->client_secret }}" type="submit" id="submitButton" class="btn btn-primary " name="button">Process Payment</button>

                    </div>
                </div>
            </div>
        </form>

    </div>

</div>

@endsection
