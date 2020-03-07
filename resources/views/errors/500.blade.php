@extends('layouts.welcomeWizered')

@section('body')
<div class="container mt-5 mb-10 pt-5 pb-5">
    <div class="row justify-content-center ">
        <div class="col-md-8 mb-2  pb-5">
            <div class="card bg-transparent shadow">

                <div class="col-xs-12 p-3 error-content text-center">
                  <i style="font-size:26px" class="ion ion-ios-bug"></i>
                    <h1>500</h1>
                    <p>Oops! That's a bug</p>
                    <span>Please send us a ticket at <a href="mailto:support@flexSited.com">support@flexSited.com</a></span>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
