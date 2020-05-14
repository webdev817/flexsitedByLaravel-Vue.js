
<div class="modal fade" id="milestoneComment{{$attachment->id}}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">@if($attachment->isFinalDeliverAbles == 1) @else Project @endif comments</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form action="{{ route('commentMilestone',$attachment->id) }}" enctype="multipart/form-data" method="post">
      @csrf
      <div class="modal-body">

        <div class="container">
            <div class="row">
              @if ($attachment->milestoneChat->count())
                <div class="col-12">
                  <div class="card">

                <div class="h-list-body">
                    <div class="msg-user-chat scroll-div ps" style="height: auto !important">
                        <div class="main-friend-chat">
                              @foreach ($attachment->milestoneChat as $milestoneChat)
                                <div v-else v-for="m in chat" class="media chat-messages">
                                    @if($milestoneChat->createdBy != Auth::id())
                                    <a   class="media-left photo-table" href="javascript:void(0)"><img class="media-object img-radius img-radius m-t-5" src="{{ asset('mawaisnow/able/assets/images/user/avatar-2.jpg') }}" alt="Generic placeholder image"></a>
                                    @endif
                                    <div class="media-body @if($milestoneChat->createdBy == Auth::id()) chat-menu-reply @else chat-menu-content @endif">
                                        <div class="">
                                            <p class="chat-cont milestoneCommentHai">{{ $milestoneChat->comment }}</p>
                                        </div>

                                    </div>
                                </div>
                              @endforeach
                        </div>
                    </div>
                </div>
              </div>

              </div>


              @endif

            </div>

            <div class="form-group col-12">
              <textarea class="form-control border" required name="message" rows="8" placeholder="Please write your message" cols="80"></textarea>
            </div>

            <div class="form-group col-12">
              <select class="form-control" name="status">
                <option selected value="1">Active</option>

                <option value="2">Approve</option>

              </select>
            </div>

        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

    </form>


    </div>
  </div>
</div>
