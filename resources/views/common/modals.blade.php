<div class="modal fade  " id="pictureDekhanyWalaModal">
    <div class="modal-dialog modal-dialog-vertical-center" role="document">
        <div class="modal-content bd-0 tx-14">
            <div class="modal-header border-0 bg-white pd-y-20 pd-x-25">
                <h6 class="d-none tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold"> </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body pd-50">
                <img src="" class="img-fluid" id="pictureDekhanyWalaModalImg" alt="">
                <p class="mg-b-5"> </p>
            </div>


            <div class="modal-footer bg-white">
                <button type="button" class="btn btn-secondary pl-4 pr-4" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  $(".displayPictureLarge").click(function() {
    var src = $(this).attr('src');
    $("#pictureDekhanyWalaModalImg").attr('src', src);
    $("#pictureDekhanyWalaModal").modal('show');
  });
</script>
