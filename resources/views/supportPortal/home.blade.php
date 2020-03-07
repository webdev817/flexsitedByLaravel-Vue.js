@extends('layouts.welcomeWizered')
@section('js')
<script src="{{ asset('js/welcomeWizered.js') . "?ver=" . date('ymdhis') }}" charset="utf-8"></script>

@endsection

@section('head')

@endsection

@section('body')
<div class="container-fluid p-0 mb-5">
    <div class="row m-0">
        <div class="col-12 text-center p-0 " style="background-color:black;">
            <img src="{{ asset('mawaisnow/logo/FLEXSITED-2.jpg') }}" alt="" class="navLogo noselect">
        </div>
    </div>


    <div class="container d-none d-xl-block mt-5">
        <div class="row m-0 mt-5">

            <div class="col p-0">
                <div class="wizeredHeadingItem active">
                  All is done
                  <br>
                    Support Portal Will be here
                </div>

            </div>


        </div>
    </div>


</div>

@endsection
