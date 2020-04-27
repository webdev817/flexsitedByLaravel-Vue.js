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

                                <form @isset($coupon)
                                action="{{ route('coupons.update',$coupon->id) }}"
                                @else
                                action="{{ route('coupons.store') }}"
                                @endisset
                                method="post" id="payment-form">
                                @csrf
                                @isset($coupon)

                                {{ method_field('PUT') }}
                                @endisset

                                <div class="section-wrapper">

                                    <div class="form-layout">

                                        <div class="row mb-4">

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label w-100" for="title">Title: <span class="tx-danger">*</span> </label>
                                                    <input class="form-control" type="text" id="title" name="title" @isset($coupon)
                                                    value="{{$coupon->title }}"
                                                    @else
                                                    value="{{ old('title') }}"
                                                    @endisset
                                                    required>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label  w-100" for="code">Code: <span class="tx-danger">*</span> </label>
                                                    <input class="form-control" type="text" id="code" name="code" @isset($coupon) readonly
                                                    value="{{$coupon->code }}"
                                                    @else
                                                    value="{{ old('code') }}"
                                                    @endisset

                                                    required>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label  w-100" for="status">Status: <span class="tx-danger">*</span> </label>
                                                    @isset($coupon)
                                                    <select class="form-control" name="status" id="status">
                                                        <option @if($coupon->status == 1) selected
                                                            @endif value="1">Active</option>
                                                        <option @if($coupon->status == 0) selected
                                                            @endif value="0">InActive</option>
                                                    </select>
                                                    @else
                                                    <select class="form-control" name="status" id="status">
                                                        <option selected value="1">Active</option>
                                                        <option value="0">InActive</option>
                                                    </select>
                                                    @endisset

                                                </div>
                                            </div>

                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-control-label  w-100" for="percentOff">Percent Off: </label>
                                                    <input class="form-control" type="number" max="100" min="1" id="percentOff" name="percentOff" @isset($coupon) readonly
                                                    value="{{$coupon->percentOff }}"
                                                    @else
                                                    value="{{ old('percentOff') }}"
                                                    @endisset

                                                    >
                                                </div>
                                            </div>
                                            <div class="col-12">

                                            </div>
                                            <div class="col-lg-3">
                                                <label class="w-100 mb-4 section-title fontSize12px">Free Logo Design</label>

                                                <label class="ckbox" for="freeLogo">
                                                    <input type="checkbox" id="freeLogo" @if (isset($coupon) && $coupon->freeLogo == 1) checked
                                                    @endif name="freeLogo"><span>Yes</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="w-100 mb-4 section-title fontSize12px">Free Flayer Design</label>
                                                <label class="ckbox" for="freeFlayer">
                                                    <input type="checkbox" id="freeFlayer" @if (isset($coupon) && $coupon->freeFlayer == 1) checked
                                                    @endif name="freeFlayer"><span>Yes</span>
                                                </label>
                                            </div>

                                            <div class="col-lg-3">
                                                <label class="w-100 mb-4 section-title fontSize12px">Free Business Card Design</label>
                                                <label class="ckbox" for="freeBusinessCard">
                                                    <input type="checkbox" id="freeBusinessCard" @if (isset($coupon) && $coupon->freeBusinessCard == 1) checked
                                                    @endif name="freeBusinessCard"><span>Yes</span>
                                                </label>
                                            </div>
                                            <div class="col-lg-3">
                                                <label class="w-100 mb-4 section-title fontSize12px">Free One Page Website</label>
                                                <label class="ckbox" for="freeOnePageWebsite">
                                                    <input type="checkbox" id="freeOnePageWebsite" @if (isset($coupon) && $coupon->freeOnePageWebsite == 1) checked
                                                    @endif name="freeOnePageWebsite"><span>Yes</span>
                                                </label>
                                            </div>

                                        </div>







                                        <div class="form-layout-footer submitSection">

                                            <button type="submit" id="submitButton" class="btn btn-primary " name="button">Submit</button>


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
