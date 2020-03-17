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


    <div class="row">
      <div class="col-12">
        Default Card:
        @if ($defaultPaymentMethod != null)
          @dump($defaultPaymentMethod)
        @else
          ---
        @endif
      </div>
    </div>

</div>

@endsection
