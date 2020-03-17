@extends('layouts.master')
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
            <li class="breadcrumb-item active" aria-current="page">Update Billing Information</li>
        </ol>
        <h6 class="slim-pagetitle">Update Billing Information</h6>
    </div>
    @include('common.messages')

    <div class="section-wrapper text-white p-4">



        <form action="{{ route('updateCard') }}" method="post" id="payment-form">
            @csrf
            <div class="p-4">

                <div class="form-layout">


                  @if (dev())
                    @include('common.copyBtn')
                  @endif


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



                    <div class="form-layout-footer mt-4">


                        <button  id="card-button" data-secret="{{ $intent->client_secret }}" type="submit" id="submitButton" class="btn btn-primary " name="button">Update</button>

                    </div>
                </div>
            </div>
        </form>

    </div>

</div>

@endsection
