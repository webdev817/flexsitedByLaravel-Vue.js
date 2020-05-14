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
                                    Project
                                </div>
                                <div class="hand supportTabs">
                                    Plans
                                </div>
                                <div class="hand supportTabs">
                                    Billing
                                </div>
                                <div class="hand supportTabs">
                                    Tasks
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
                                    <div class="card-header cstm-header-card commonQuestionHeader" id="heading{{ $faq->id }}">
                                        <h5 class="mb-0 h5q"><a href="javascript:void(0)" data-toggle="collapse" data-target="#collapse{{ $faq->id }}" aria-expanded="true" aria-controls="collapse{{ $faq->id }}">{{ $faq->question }}</a></h5>
                                    </div>
                                    <div id="collapse{{ $faq->id }}" class=" card-body collapse" aria-labelledby="heading{{ $faq->id }}" data-parent="#accordion">
                                        <textarea  name="name" class="form-control bg-tranparent border-0 questionFaqTextArea"  disabled cols="80">{{ $faq->answer }}</textarea>
                                    </div>
                                </div>

                                @endforeach

                            </div>


                        </div>
                    </div>



                    <div class="row justify-content-center mt-4 mb-3">
                        <div class="col-md-10 col-12 text-center">

                            <p class="text-dark">
                              If you can't find the answer to your question in our FAQ,
                               you can always contact us. We will answer you shortly!




                            </p>
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
