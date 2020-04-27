<div class="row m-0">

    <div class="col-10 offset-1 col-md-10 offset-md-1      col-lg-8 offset-lg-2            col-xl-6 offset-xl-3 py-5">
        <div class="row">
            <div data-id="alreadyHaveDomain" class="col-12 col-sm-6 text-center domainTab1 domainTabs hand">
                ALREADY HAVE DOMAIN
            </div>
            <div data-id="buyNewDomain" class="col-12  col-sm-6 text-center domainTab2 domainTabs active hand">
                I NEED A DOMAIN
            </div>
        </div>
    </div>
</div>

<div class="row m-0 hide justify-content-center d-flex domainMessages">
  <div class="col-9 col-sm-8 text-center alert h4" id="domainMessagesCenter">
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
  </div>
</div>

<div class="container buyNewDomain">
    <div class="row m-0">

        <div class="col-12 py-5">
          <div class="col-12 p-0    col-sm-10 offset-sm-1">
            <div class="borderFav input-group mb-3 p-1">
              <input type="text" class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput" id="searchForNewDomain"  placeholder="your domain name (exclude .com)">
              <div class="input-group-append">
                <button class="btn btn-cstm rounded-0 shadow-none" type="button" id="needNewDomainSearch">
                  <i class="d-none fa  loaderSearch fa-spinner fa-spin" style="font-size:20px"></i>
                  Search
                </button>
              </div>
            </div>
          </div>
        </div>

    </div>


    <div class="row m-0 mb-4 domainListStuff hide">
      <div class="text-center col-12 ">
        <h3 class="favColor">Domain List</h3>
      </div>
    </div>




</div>
<div class="container buyNewDomain" id="domainsList">

</div>

<div class="container alreadyHaveDomain">
    <div class="row m-0">

      <div class="col-12 py-5">
        <div class="col-12 p-0    col-sm-10 offset-sm-1">
          <div class="borderFav input-group mb-3 p-1">
            <input type="text" class="border-0 form-control shadow-none cstmFormControl cstmFontForDomainInput" id="alreadyHaveDomainInput"  placeholder="www.enteryourdomain.com" >
            <div class="input-group-append">
              <button class="btn btn-cstm rounded-0 shadow-none" type="button" id="alreadyHaveADomain">Next</button>
            </div>
          </div>
        </div>
      </div>

    </div>

</div>

<div class="container ">
  <div class="row m-0 py-3">
    <div class="col-12 text-center">
      <a class="btn btn-cstm rounded-0 shadow-none" href="javascript:void(0)" data-toggle="modal" data-target="#faqModal">FREQUENTLY ASKED QUESTIONS</a>
    </div>
  </div>
</div>

{{-- <div class="container ">
  <div class="row m-0 py-3">
    <div class="col-12 text-center">
      <button class=" float-left btn btn-cstm rounded-0 shadow-none" disabled="disabled" type="button">Back</button>
      <button class=" float-right btn btn-cstm rounded-0 shadow-none" type="button">Next</button>

    </div>
  </div>
</div> --}}




<div class="hide">
  <form action="{{ route('domainSelected') }}" id="hiddenDomainForm" method="post">
    @csrf

    <input type="hidden" name="alreadyExist" id="alreadyExistDomain" value="0">
    <input type="hidden" name="domain" id="inputDomainSelected" value="">

  </form>
</div>


@include('welcomeWizered.modal.domainfaq')
