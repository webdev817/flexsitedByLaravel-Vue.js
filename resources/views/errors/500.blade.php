
@extends('layouts.welcomeWizered')

@section('body')
<div class="container mt-5 mb-10 pt-5 pb-5">
    <div class="row justify-content-center ">
        <div class="col-md-8 mb-2  pb-5">
            <div class="bg-transparent border-0 card p-5 rounded-0 shadow-sm">

                <div class="col-xs-12 p-3 error-content text-center">
                  <i style="font-size:26px" class="ion ion-ios-bug"></i>
                    <h1>500</h1>
                    <p>Oops! That's a bug</p>

                    <span>If you need help, contact at. <a href="mailto:{{ myconf('contactAddress') }}">{{ myconf('contactAddress') }}</a></span>
                    <br>
                    <div class="p-5 w-100 text-center">
                      <a href="{{ route('root') }}" class="btn btn-cstm shadow-none rounded-0">Go Home</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
