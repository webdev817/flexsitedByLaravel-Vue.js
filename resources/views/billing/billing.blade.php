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
            <li class="breadcrumb-item active" aria-current="page">Billing Detail</li>
        </ol>
        <h6 class="slim-pagetitle">Billing Detail</h6>
    </div>
    @include('common.messages')



    <form action="{{ route('updateCard') }}" method="post" id="payment-form">
        @csrf
        <div class="section-wrapper p-4">

            <div class="form-layout">


                <label class="col-12 pt-0 pl-0 mb-2 section-title">Billing Information</label>


                <div class="">
                    <div class="col-12 p-0 col-sm-12 col-lg-6 col-md-6 col-xl-6">
                        <label for="card-element">
                            Credit or debit card
                        </label>
                        <div id="card-element" class="form-control">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>

                </div>
                <br>

                <div class="form-layout-footer">

                    <button type="submit" id="submitButton" class="btn btn-primary " name="button">Submit</button>

                </div>
            </div>
        </div>
    </form>

</div>

@endsection
