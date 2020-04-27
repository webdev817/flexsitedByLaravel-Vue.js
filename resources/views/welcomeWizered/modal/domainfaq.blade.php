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
          $faqs = [
            (object)[
              'q'=> 'What is a domain name?',
              'ans'=> 'domain name is a website address for your site. Ie.. yourcompany.com'
            ],
            (object)[
              'q'=> 'Will Flexsited purchase the domain for my website?',
              'ans'=> 'Flexsited will cover the purchase of all domains under its annual subscription.'
            ],
            (object)[
              'q'=> 'Will my domain be renewed annually?',
              'ans'=> 'Yes as long as you are subscribed to Flexsited.'
            ],
            (object)[
              'q'=> 'Can Flexsited use a domain that I already have?',
              'ans'=> 'Yes, we can use a domain that you already have.'
            ],
            (object)[
              'q'=> 'Can my domain be transferred to me?',
              'ans'=> 'Yes, it can after 60 days after purchase for a one-time fee of $40.'
            ],
            (object)[
              'q'=> 'When will you purchase the domain?',
              'ans'=> 'The domain is purchased right before your website goes live.  If you need for it to be purchased sooner, let you project manager know.'
            ],
            (object)[
              'q'=> 'Does Flexsited provide business email?',
              'ans'=> 'Flexsited doesn’t business email.  We recommend G-Suite.  Please review the support detail regarding G Suite <a href="https://gsuite.google.com/">here</a>. '
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
