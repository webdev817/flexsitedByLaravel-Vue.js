<div class="modal fade" id="faqModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal600per70" role="document">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title">Website Domain FAQ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        @php
           

          $faqs = \App\OnBoardingFaq::where('status',1)->where('category','domain')->get();
        @endphp


              <div class="container-fluid">
                  <div class="row">
                      <div class="col-12 p-0">
                          <div class="accordion" id="faqExample">

                            @foreach ($faqs as $key => $obj)
                            <div class="card">
                                  <div class="card-header p-2" id="heading{{$key}}">
                                      <h5 class="mb-0">
                                          <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#q{{$key}}" aria-expanded="true" aria-controls="collapseOne">
                                            Q: {{ $obj->question }}
                                          </button>
                                        </h5>
                                  </div>
                                  <div id="q{{$key}}" class="collapse" aria-labelledby="heading{{$key}}" data-parent="#faqExample">
                                      <div class="card-body">
                                          <b>Answer:</b> {!! $obj->answer !!}
                                      </div>
                                  </div>
                            </div>
                            @endforeach



                          </div>

                      </div>
                  </div>
                  <!--/row-->
              </div>
              <!--container-->






      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<style media="screen">
  .btn-link{
    text-align: left;
  }
</style>
