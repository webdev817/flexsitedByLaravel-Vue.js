


<div class="modal fade" id="updateBilling" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered modelUpdateBilling" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <form  id="payment-form"  action="{{ route('updateBilling') }}" method="post">
          @csrf
        <div class="row p-5">
              <div class="col-12 mb-5 pb-5 text-center">
                <h5>Update Billing Information</h5>
              </div>

              <div class="col-12  col-sm-12">
                  {{-- <label for="card-element">
                      Credit or debit card
                  </label> --}}
                  {{-- <input id="card-holder-name" class="form-control mb-2 mt-2" placeholder="Card Holder Name" type="text"> --}}


                  <div id="card-element" class="form-control">
                      <!-- A Stripe Element will be inserted here. -->
                  </div>

                  <!-- Used to display form errors. -->
                  <div id="card-errors" role="alert"></div>
              </div>



          <div class="col-12 mt-3">
            <button  id="card-button" data-secret="{{ $intent->client_secret }}" type="submit" class="btn btn-primary btn-block" name="button">Update</button>
          </div>

        </div>
      </form>




      </div>


    </div>
  </div>
</div>
