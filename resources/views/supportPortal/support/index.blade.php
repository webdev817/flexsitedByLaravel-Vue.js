@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper p-3">

                        @include('common.messagesSupport')


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

    $(".commonQuestionHeader").click(function () {
      setTimeout(function () {
        $(".questionFaqTextArea").each(function (a,b) {
          var height = $(b)[0].scrollHeight;

          $(b).css('height',  height +"px")
        });
      }, 10);
    });

</script>


<style media="screen">
  .cstm-header-card{
    padding: 10px 25px !important;
  }
  .h5q{
    font-size: 15px !important;
    font-weight: 100 !important;
  }
  .form-control:disabled, .form-control[readonly] {
    background-color: white !important;
    opacity: 1;
  }
</style>
@endsection
