@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->
                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <div class="col-12 card bg-white p-3">


                                @include('common.messages')

                                <form action="{{ route('plans.update', $plan->id) }}" method="post" id="payment-form">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">

                                    <div class="section-wrapper">

                                        <div class="form-layout">

                                            <div class="row mb-4">

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label w-100" for="title">Title: <span class="tx-danger">*</span> </label>
                                                        <input class="form-control bg-transparent border-0 text-capitalize" type="text" readonly disabled id="title" name="title" value="{{ $plan->name }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label  w-100" for="price">Per Month Price: <span class="tx-danger">*</span> </label>
                                                        <input class="form-control" type="text" id="price" name="price" value="{{ $plan->price }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label  w-100" for="priceYearlyMonthly">Per Month For Year Price: <span class="tx-danger">*</span> </label>
                                                        <input class="form-control" type="text" id="priceYearlyMonthly" name="priceYearlyMonthly" value="{{ $plan->priceYearlyMonthly }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label  w-100" for="priceYearly">Per Year Price: <span class="tx-danger">*</span> </label>
                                                        <input class="form-control" type="text" id="priceYearly" name="priceYearly" value="{{ $plan->priceYearly }}">
                                                    </div>
                                                </div>










                                            </div>







                                            <div class="form-layout-footer submitSection">

                                                <button type="submit" id="submitButton" class="btn btn-primary " name="button">Update</button>


                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
