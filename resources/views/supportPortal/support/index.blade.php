@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper p-3">

                        @include('common.messagesSupport')

                        <div class="row">
                            <div class="col-12">
                                <div id="generalTabToTriggerClick" class="hand supportTabs active">
                                    General
                                </div>
                                <div class="hand supportTabs">
                                    Tasks
                                </div>
                                <div class="hand supportTabs">
                                    Plans
                                </div>
                                <div class="hand supportTabs">
                                    Payment
                                </div>
                                <div class="hand supportTabs">
                                    Profile
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 borderTopRound  bg1 pt-2 pb-2 headingWhite border-bottom">
                                <img class="img-fluid" src="{{ asset('mawaisnow\sp\support\Group 103.png') }}" alt="">
                                &nbsp;
                                FAQ's
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 bg-white">

                                <div class="accordion" id="accordion">
                                    @foreach ($faqs as $faq)
                                    <div class="card mb-0 cat_{{ $faq->category }} questionsAccordion @if($faq->category == " General") active @endif" >
                                    <div class="card-header" id="heading{{ $faq->id }}">
                                        <h5 class="mb-0"><a href="javascript:void(0)" data-toggle="collapse" data-target="#collapse{{ $faq->id }}" aria-expanded="true" aria-controls="collapse{{ $faq->id }}">{{ $faq->question }}</a></h5>
                                    </div>
                                    <div id="collapse{{ $faq->id }}" class=" card-body collapse" aria-labelledby="heading{{ $faq->id }}" data-parent="#accordion">
                                        {{ $faq->answer }}
                                    </div>
                                </div>

                                @endforeach

                            </div>


                        </div>
                    </div>



                    <div class="row justify-content-center mt-4 mb-3">
                        <div class="col-md-10 col-12 text-center">
                            <h4>Do you want to contact us?</h4>
                            <p class="text-dark">If you can't find answer to your question in our FAQ, you can always contact us. We will answer you shortly!</p>
                        </div>
                    </div>


                    <div class="row mb-5">


                        <div class="col-xl-4 col-lg-4 col-md-6 col-12 text-center">
                            <div class="card p-md-3 p-lg-1">

                                <div class="row mb-2">
                                    <div class="col-12 text-center">
                                        <img src="{{ asset('mawaisnow\sp\support\Group 211.png') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <h4>Contact us by email</h4>

                                <p>Need to email us? Our CS Team is ready to assist you</p>
                                <br>
                                <div class="w-100 p-2">
                                    <a href="mailto:{{ config('mawaisnow.contactAddress') }}" class="btn btn-primary btn-block">Contact us!</a>
                                </div>
                            </div>

                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-6 col-12 text-center">
                            <div class="card p-md-3 p-lg-1">
                                <div class="row mb-2">
                                    <div class="col-12 text-center">
                                        <img src="{{ asset('mawaisnow\sp\support\Group 212.png') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <h4>Live Chat</h4>

                                <p>Need to chat live? Our CS Team is ready to assist you</p>
                                <br>
                                <div class="w-100 p-2">
                                    <a href="{{ route('supportChat') }}" class="btn btn-primary btn-block">Chat Now!</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-12 text-center">
                            <div class="card p-md-3 p-lg-1">
                                <div class="row mb-2">
                                    <div class="col-12 text-center">
                                        <img src="{{ asset('mawaisnow\sp\support\Group 213.png') }}" class="img-fluid" alt="">
                                    </div>
                                </div>
                                <h4>Submit Ticket</h4>

                                <p>Need to Submit Ticket? Our CS Team is ready to assist you</p>
                                <br>
                                <div class="w-100 p-2">
                                    <a href="{{ route('tickets.create') }}" class="btn btn-primary btn-block">Submit a Ticket!</a>
                                </div>
                            </div>
                        </div>



                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
</div>

@include('common.copyBtn')

@endsection

@include('common.loadJS', ['select2'=>true])

@section('js')
<script type="text/javascript">
    $(".supportTabs").click(function() {
        var text = $(this).text();
        text = text.trim();
        var elms = $(".cat_" + text);
        $(".questionsAccordion").removeClass('active');
        $(elms).removeClass('active').addClass('active');

    });
    $("#generalTabToTriggerClick").click();


    $(".supportTabs").click(function () {
      $(".supportTabs").removeClass('active');

      $(this).removeClass('active').addClass('active');
    });

</script>
@endsection
