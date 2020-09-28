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
                                <form action="{{ route('addonUpdate', ['id' => $addon->id])}}" method="post" id="payment-form" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">                               

                                    <div class="section-wrapper">

                                        <div class="form-layout">

                                            <div class="row mb-4">

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label w-100" for="price">Logo Design: </label>
                                                        <input class="form-control " type="text"  id="logoDesignPrice" name="logoDesignPrice" value="{{ $addon->logoDesignPrice }}">
                                                    </div>
                                                </div>

                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label  w-100" for="price">Business Card Design: </label>
                                                        <input class="form-control" type="text" id="cardDesignPrice" name="cardDesignPrice" value="{{ $addon->cardDesignPrice }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label  w-100" for="price">Flyer Design: </label>
                                                        <input class="form-control" type="text" id="flyerDesignPrice" name="flyerDesignPrice" value="{{ $addon->flyerDesignPrice }}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label class="form-control-label  w-100" for="price">Social Media Design: </label>
                                                        <input class="form-control" type="text" id="socialMediaDesignPrice" name="socialMediaDesignPrice" value="{{ $addon->socialMediaDesignPrice }}">
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
