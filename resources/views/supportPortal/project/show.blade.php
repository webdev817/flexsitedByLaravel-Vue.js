@extends('layouts.supportPortal.master')

@section('body')

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper">

                        @include('common.messagesSupport')

                        <div class="row">


                            <div class="col-lg-8 col-12 ">
                              <div class="row">
                                <div class="col-12">


                                  <div class="card">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <h6>Project Name</h6>
                                                </th>
                                                <th>
                                                    <h6>Due On</h6>
                                                </th>
                                                <th>
                                                    <h6>Total Amount</h6>
                                                </th>
                                                <th>
                                                    <h6>Status</h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <thead>
                                            <tr>
                                                <td>{{ $project->title }}</td>
                                                <td>
                                                  @if ($project->dueOn == null)
                                                    To be determined Team
                                                  @endif
                                                </td>

                                                <td>
                                                    {{ $project->order->price }} USD
                                                </td>
                                                <td>
                                                    @if ($project->status == 1)
                                                    Initializing
                                                    @else
                                                    Unknown
                                                    @endif
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                  </div>

                                </div>
                              </div>

                              <div class="row">
                                <div class="col-12">
                                  <div class="card">
                                    <div class="card-header">
                                      <h4 class="mb-0 float-left">Project Progress</h4>

                                      @if (superAdmin())
                                        <button data-toggle="modal" data-target="#uploadMilestone" type="button" class="d-inline btn float-right btn-outline-primary" name="button">
                                            <i class="feather icon-paperclip"></i>
                                          Upload Work for Review
                                        </button>
                                      @endif

                                    </div>

                                    @if ($project->projectAttachments->count())
                                      <div class="card-body ">
                                        <div class="row">
                                          @foreach ($project->projectAttachments as $attachment)
                                            <div class="col-12 col-md-6  mb-4">
                                              @if (getimagesize(Storage::path($attachment->path)))

                                              @include('supportPortal.project.show.modal', [ 'attachment'=> $attachment ])

                                              <div class="border">
                                                    <div class="w-100 p-2">

                                                      @if ($attachment->status == 2)

                                                        <a href="javascript:void(0)" style="color:black;" >
                                                          Approved
                                                        </a>
                                                      @else
                                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#milestoneComment{{ $attachment->id }}" >
                                                          <i class="feather icon-message-circle"></i>
                                                          Make comment
                                                        </a>
                                                      @endif


                                                    </div>
                                                    <a target="_blank" href="{{ Storage::url($attachment->path) }}">
                                                      <img class="img-fluid" src="{{ Storage::url($attachment->path) }}" alt="">
                                                    </a>
                                                    <br>
                                                    <div class="w-100 p-3">
                                                      {{ $attachment->message }}
                                                    </div>
                                              </div>

                                              @else
                                                <div class="border">
                                                  <div class="p-3">
                                                    <a target="_blank" href="{{ Storage::url($attachment->path) }}">
                                                      {{   pathinfo(Storage::path($attachment->path))['basename'] }}
                                                    </a>
                                                    <br>
                                                    <div class="w-100">
                                                      {{ $attachment->message }}
                                                    </div>
                                                  </div>

                                                </div>
                                              @endif

                                            </div>

                                          @endforeach
                                        </div>

                                      </div>

                                    @else
                                      <div class="card-body justify-content-center d-flex">

                                        <h4 class="mt-3 mb-3 ">

                                        </h4>

                                      </div>

                                    @endif

                                    <div class="card-header">
                                      <button data-toggle="modal" data-target="#finalUpload" type="button" class="d-inline btn  btn-primary" name="button">
                                        Deliver Project
                                      </button>
                                    </div>


                                  </div>

                                </div>
                              </div>

                            </div>

                            <div class="col-lg-4 col-12">
                              <div class=" card">


                                <div class=""  id="projectChat">
                                    <div class="h-list-body">
                                        <div class="msg-user-chat scroll-div ps">
                                            <div class="main-friend-chat" id="projectChatBody">

                                              <div v-if="chat == null" style="height:100%; background:#fafafa">
                                              </div>




                                                <div v-else v-for="m in chat" class="media chat-messages">
                                                    <a v-if="m.createdBy != userId" class="media-left photo-table" href="javascript:void(0)"><img class="media-object img-radius img-radius m-t-5" src="{{ asset('mawaisnow/able/assets/images/user/avatar-2.jpg') }}" alt="Generic placeholder image"></a>
                                                    <div v-bind:title="m.created_at" v-bind:class="{ 'chat-menu-reply': m.createdBy == userId, 'chat-menu-content': m.createdBy != userId }" class="media-body ">

                                                        <div class="">
                                                            <p class="chat-cont">@{{ m.message }}</p>
                                                            <p  v-if="m.isAttachment == 1" class="fileHai chat-cont">
                                                              <a target="_blank" v-bind:style="[m.createdBy != userId ? {color: 'white'}: '']" v-bind:href="'/storage/' + m.path">@{{ m.fileName }}</a>
                                                            </p>

                                                        </div>

                                                    </div>
                                                </div>





                                            </div>

                                        </div>
                                    </div>
                                    <hr class="m-0">
                                    <div class="msg-form">
                                        <div class="input-group mb-0">
                                            <input type="text" class="form-control msg-send-chat"  v-on:keyup.enter="sendMessage" v-model="message" id="message" placeholder="Message . . .">
                                            <div class="input-group-append">
                                                <input type="file" ref="file"  v-on:change="fileChanged()" id="imgupload" style="display:none">
                                                <button onclick="$('#imgupload').click()" class="btn btn-secondary btn-icon" type="button" data-toggle="tooltip" title="" data-original-title="file attachment"><i class="feather icon-paperclip"></i></button>
                                            </div>
                                            <div class="input-group-append">
                                                <button id="messageSendBtn" v-on:click="sendMessage" class="btn btn-primary btn-icon btn-msg-send" type="button">

                                                  <i class="feather icon-play"></i>

                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="fileChoosenDisplayed" class="mt-1 w-100">
                                      <span v-if="attachment != ''">

                                        @{{ attachedFileName }}


                                      </span>
                                      <div @click="removeAttachment" title="delete attachment" v-if="attachment != ''" class="mr-1 hand text-danger float-right">
                                        X
                                      </div>
                                    </div>

                                    <div id="fileChoosedProgress" class=" w-100">
                                      <span v-if="uploadProgress != null">
                                        <div class="progress mb-4">
                                        <div class="progress-bar bg-success" role="progressbar" v-bind:style="{ width: uploadProgress + '%'}"></div>
                                        </div>
                                      </span>

                                    </div>



                                </div>
                                </div>

                            </div>


                        </div>








  <!-- Modal -->
  <div class="modal fade" id="uploadMilestone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterTitle">Upload Work For Review</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

      <form action="{{ route('projectMilestone',$project->id) }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="modal-body">

          <div class="container">

              <div class="form-group col-md-12">

                <div class="custom-file">
                    <input type="file" name="file" required onchange="showthefilename(this,'showfilenameModel')" class="custom-file-input" id="milestoneFile" required="">
                    <label class="custom-file-label" id="showfilenameModel" for="milestoneFile">Choose file...</label>
                </div>

              </div>

              <div class="form-group col-12">
                <textarea class="form-control bg-transparent" required name="message" rows="8" placeholder="Please write your message" cols="80"></textarea>
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



                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
  @include('supportPortal.project.chat.js', [ 'projectId' => $project->id ])

  <script type="text/javascript">
  function showthefilename(ths, showid) {
       f = ths.value
       f = f.replace(/.*[\/\\]/, '');
       if (f != '') {
           $("#" + showid).html(f);
       } else {
           $("#" + showid).html('Choose file');
       }
   }
  </script>
@endsection



@section('head')
  <link rel="stylesheet" href="{{ asset('mawaisnow/chat/chat.css') }}">
  <script src="{{ asset('mawaisnow/vue/vue.js') }}" charset="utf-8"></script>
  <script src="{{ asset('mawaisnow/axios/axios.min.js') }}" charset="utf-8"></script>

  <style media="screen">
    .fileHai{

    }
    .chat-cont{
      word-break: break-word;
    }
  </style>
@endsection
