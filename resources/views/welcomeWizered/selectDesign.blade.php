<div class="row m-0 py-5">

<div class="col-12 py-5">
  <h4>Working on this one...</h4>
</div>

</div>

<div class="container ">
  <div class="row m-0 py-3">
    <div class="col-12 text-center">
      <a class="btn btn-cstm rounded-0 shadow-none" href="#">FREQUENTLY ASKED QUESTIONS</a>
    </div>
  </div>
</div>

<div class="container ">
  <div class="row m-0 py-3">
    <div class="col-12 text-center">
      <button onclick="window.location = '{{ route('root') }}'" class=" float-left btn btn-cstm rounded-0 shadow-none backBtn" type="button">Back</button>
    </div>
  </div>
</div>




<div class="hide">
  <form action="{{ route('domainSelected') }}" id="hiddenDomainForm" method="post">
    @csrf

    <input type="hidden" name="alreadyExist" id="alreadyExistDomain" value="0">
    <input type="hidden" name="domain" id="inputDomainSelected" value="">

  </form>
</div>
