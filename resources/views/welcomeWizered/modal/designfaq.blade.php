<div class="modal fade" id="faqModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal600per70" role="document">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title">Website Design Inspiration FAQ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        @php
          $faqs = [
            (object)[
              'q'=> 'What is website design inspiration?',
              'ans'=> 'This is the part of the process to where you provide us with an idea of what design you like.'
            ],
            (object)[
              'q'=> 'Will my website be just like the design I selected?',
              'ans'=> 'No it won’t.  We will build you a custom website that includes your logo and content.'
            ],
            (object)[
              'q'=> 'Do you provide the images for my website?',
              'ans'=> 'You are welcome to provide your own images but we do offer stock images for FREE.'
            ],
            (object)[
              'q'=> 'Do you design custom logos?',
              'ans'=> 'Yes, we do.  Our one-time fee is $150.'
            ],
            (object)[
              'q'=> 'Where would I complete the details for my logo?',
              'ans'=> 'You will be provided this option later in the order process.'
            ],
            (object)[
              'q'=> 'Where do I send content and my vision for my website?',
              'ans'=> 'You will be provided this option later in the order process.'
            ]
          ];
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
                                            Q: {{ $obj->q }}
                                          </button>
                                        </h5>
                                  </div>
                                  <div id="q{{$key}}" class="collapse" aria-labelledby="heading{{$key}}" data-parent="#faqExample">
                                      <div class="card-body">
                                          <b>Answer:</b> {!! $obj->ans !!}
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
