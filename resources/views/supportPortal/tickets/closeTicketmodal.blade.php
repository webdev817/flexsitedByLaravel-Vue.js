<div class="modal fade" id="ticekt{{$ticket->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5>Close Ticket</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">

                <div class="container">
                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                              <textarea name="response" rows="8" cols="80" class="form-control"></textarea>
                            </div>

                        </div>



                    </div>




                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Close Ticket</button>
            </div>


        </div>
    </div>
</div>
