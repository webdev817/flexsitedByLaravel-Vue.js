@extends('layouts.welcomeWizered')

@section('body')
<div class="container mt-5 mb-10 pt-5 pb-5">

    <div class="row mt-3">
        <div class="col-12 text-center p-4 card border-0 shadow-sm mt-5">
            <h1 class="text-success">
                Planned Maintenance In Progress.
            </h1>
        </div>
        <div class="col-12 card text-center pt-3 border-0 shadow-sm">
            <p style="font-size:23px;" class="text-dark">
                Welcome to {{ config('mawaisnow.title') }}. We are doing planned maintenance.
                <br>

                <br>
                <strong class="mt-5 mb-5">Please check back soon.</strong>
            </p>
            <br>

            <br>

        </div>


    </div>


</div>
@endsection
