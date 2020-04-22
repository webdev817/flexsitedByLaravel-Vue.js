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

                                                        @if (superAdmin() && $project->status != 1)
                                                          <th>
                                                            <h6>
                                                              Action
                                                            </h6>
                                                          </th>
                                                        @endif


                                                    </tr>
                                                </thead>
                                                <thead>
                                                    <tr>
                                                        <td>{{ $project->title }}</td>
                                                        <td>

                                                            @if (superAdmin())
                                                            <input type="text" onchange="updateDueOn( this,{{ $project->id }})" class="form-control" style="width: 130px" id="dueOn" name="dueOn" value="">
                                                            @else
                                                                @if ($project->dueOn == null)
                                                                To be determined Team
                                                                @else
                                                                {{ $project->dueOn }}
                                                                @endif
                                                            @endif
                                                        </td>

                                                        <td>
                                                            {{ $project->order->price }} USD
                                                        </td>
                                                        <td>
                                                          <div class="mt-2">
                                                              @include('supportPortal.common.projectStatus', ['status' => $project->status])
                                                          </div>
                                                        </td>

                                                        @if (superAdmin()  && $project->status != 1)
                                                          <td>
                                                            <form id="changeProjectStatus" action="{{ route('changeProjectStatus', $project->id) }}" method="post">
                                                              @csrf
                                                              <select onchange="$('#changeProjectStatus').submit()" title="Project Status" class="form-control" style="width: 150px" name="projectStatus">
                                                                <option @if($project->status == 2) selected @endif value="2">In Progress</option>
                                                                <option @if($project->status == 3) selected @endif value="3">In Review</option>
                                                                <option @if($project->status == 10) selected @endif value="10">Completed</option>
                                                                <option @if($project->status == 20) selected @endif value="20">Cancelled</option>
                                                              </select>
                                                            </form>
                                                          </td>

                                                        @endif


                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                @if ($project->status == 10 && $project->stars == null && !superAdmin())
                                  <div class="row">
                                      <div class="col-12 ">
                                          <div class="card bg1 mb-0">
                                              <div class="card-header">
                                                <h4 class="text-white">Order Completed</h4>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">
                                              <div class="row">
                                                <div class="col-6">
                                                  <form action="{{ route('projectFeedback', $project->id) }}" method="post">
                                                    @csrf
                                                  <h4>Give Feedback</h4>
                                                  <br>
                                                  <p>How was your experience been with us so far?</p>
                                                  <div class="card-block border text-center pt-2 mb-2 pl-2 ">
                                                      <div class="stars stars-example-css">
                                                          <select id="example-css" class="rating-star" name="stars" autocomplete="off">
                                                              <option value="1">1</option>
                                                              <option value="2">2</option>
                                                              <option value="3">3</option>
                                                              <option value="4">4</option>
                                                              <option value="5">5</option>
                                                          </select>
                                                      </div>
                                                  </div>
                                                  <p>How can we improve?</p>
                                                  <textarea name="improveMessage" rows="8" class="form-control" placeholder="Please write your message" cols="80"></textarea>

                                                  <button type="submit" class="btn btn-primary btn-block" name="button">Submit Review</button>
                                                </form>

                                                </div>
                                                <div class="col-6">
                                                  <img class="img-fluid noselect" src="{{ asset('mawaisnow/sp/order/orderCompleteRating.png') }}" alt="">
                                                </div>
                                              </div>
                                            </div>
                                        </div>
                                      </div>





                                  </div>
                                @endif
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="mb-0 float-left">Project Progress</h4>

                                                @if (superAdmin())
                                                @if ($project->status == 1)
                                                <a href="{{ route('startProjectWork',$project->id) }}" class="d-inline btn float-right btn-outline-primary">Start Work</a>
                                                @else
                                                <button data-toggle="modal" data-target="#uploadMilestone" type="button" class="d-inline btn float-right btn-outline-primary" name="button">
                                                    <i class="feather icon-paperclip"></i>
                                                    Upload Work for Review
                                                </button>
                                                @endif
                                                @endif

                                            </div>

                                            @if ($projectAttachments->count())
                                            <div class="card-body ">
                                                <div class="row">
                                                    @foreach ($projectAttachments as $attachment)

                                                      @include('supportPortal.project.show.milestones', ['attachment' => $attachment])

                                                    @endforeach
                                                </div>

                                            </div>

                                            @else
                                            <div class="card-body justify-content-center d-flex">

                                                <h4 class="mt-3 mb-3 ">

                                                </h4>

                                            </div>

                                            @endif




                                            {{-- project deliver completed work here --}}
                                            @if ($projectFinalDeliverables->count())
                                              <div class="card-header">
                                                  <h4 class="mb-0 float-left">Completed Work</h4>


                                              </div>

                                              <div class="card-body ">
                                                  <div class="row">
                                                      @foreach ($projectFinalDeliverables as $attachment)
                                                        @include('supportPortal.project.show.workCompleted', ['attachment' => $attachment])
                                                      @endforeach
                                                  </div>
                                              </div>
                                            @endif


                                            <div class="card-header pb-5">
                                                @if (superAdmin() && $project->status != 10 && $project->status != 20)
                                                  <button data-toggle="modal" data-target="#finalUpload" type="button" class="d-inline btn  btn-primary" name="button">
                                                      Deliver Project
                                                  </button>
                                                @else
                                                  @if ($project->status == 3)
                                                    <a class=" d-inline btn  btn-primary" href="{{ route('approveProject',$project->id) }}">
                                                        Approve Project
                                                    </a>
                                                  @endif
                                                @endif

                                            </div>


                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-4 col-12">
                                <div class=" card">


                                    <div class="" id="projectChat">
                                        <div class="h-list-body">
                                            <div class="msg-user-chat scroll-div ps">
                                                <div class="main-friend-chat" id="projectChatBody">

                                                    <div v-if="chat == null" style="height:100%; background:#fafafa">
                                                    </div>




                                                    <div v-else v-for="m in chat" class="media chat-messages">
                                                        <a v-if="m.createdBy != userId" class="media-left photo-table" href="javascript:void(0)"><img class="media-object img-radius img-radius m-t-5"
                                                              src="{{ asset('mawaisnow/able/assets/images/user/avatar-2.jpg') }}" alt="Generic placeholder image"></a>
                                                        <div v-bind:title="m.created_at" v-bind:class="{ 'chat-menu-reply': m.createdBy == userId, 'chat-menu-content': m.createdBy != userId }" class="media-body ">

                                                            <div class="">
                                                                <p class="chat-cont">
                                                                    @{{ m.message }}</p>
                                                                        <p v-if="m.isAttachment == 1" class="fileHai chat-cont">
                                                                            <a target="_blank" v-bind:style="[m.createdBy != userId ? {color: 'white'}: '']" v-bind:href="'/storage/' + m.path">
                                                                                @{{ m.fileName }}</a>
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
                                                <input type="text" class="form-control msg-send-chat" v-on:keyup.enter="sendMessage" v-model="message" id="message" placeholder="Message . . .">
                                                <div class="input-group-append">
                                                    <input type="file" ref="file" v-on:change="fileChanged()" id="imgupload" style="display:none">
                                                    <button onclick="$('#imgupload').click()" class="btn btn-secondary btn-icon" type="button" data-toggle="tooltip" title="" data-original-title="file attachment"><i
                                                          class="feather icon-paperclip"></i></button>
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

                                                @{{ attachedFileName }} </span>
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










                    <div class="modal fade" id="uploadMilestone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Upload Work For Review</h5>
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





                    {{-- finalzied work upload model model model --}}





                    <div class="modal fade" id="finalUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Deliver Completed work</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="{{ route('projectMilestone',$project->id) }}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <input type="hidden" name="isFinalDeliverAbles" value="1">

                                    <div class="modal-body">

                                        <div class="container">

                                            <div class="form-group col-md-12">
                                                <div class="custom-file">
                                                    <input type="file" name="file" required onchange="showthefilename(this,'showfilenameModelpMilestone')" class="custom-file-input" id="showfilenameModelpMilestonef" required="">
                                                    <label class="custom-file-label" id="showfilenameModelpMilestone" for="showfilenameModelpMilestonef">Upload Work...</label>
                                                </div>
                                                <div class="custom-file mt-3">
                                                    <input type="file" name="source" required onchange="showthefilename(this,'projectuploadSource')" class="custom-file-input" id="uploadSource" required="">
                                                    <label class="custom-file-label" id="projectuploadSource" for="uploadSource">Upload Source...</label>
                                                </div>
                                            </div>

                                            <div class="form-group col-12 ">
                                                <textarea class="form-control bg-transparent" required name="message" rows="8" placeholder="Please write your message" cols="80"></textarea>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="modal-footer border-0">
                                      <div class="container">
                                        <div class="col-12">
                                          <button type="submit" class="btn btn-block btn-primary">Deliver Project</button>
                                        </div>
                                      </div>
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

@include('common.loadJS', ['flatpicker'=> true])

@endsection

@section('js')
@include('supportPortal.project.chat.js', [ 'projectId' => $project->id ])
@if ($project->status == 10)
  <script src="{{ asset('mawaisnow/able/assets/plugins/ratting/js/jquery.barrating.min.js') }}" charset="utf-8"></script>
@endif
<script type="text/javascript">
    @if ($project->status == 10)
    $('.rating-star').barrating({
         theme: 'css-stars',
         showSelectedRating: false
     });
    @else

    @endif
    function showthefilename(ths, showid) {
        f = ths.value
        f = f.replace(/.*[\/\\]/, '');
        if (f != '') {
            $("#" + showid).html(f);
        } else {
            $("#" + showid).html('Choose file');
        }
    }

    function updateDueOn(ths, projectId) {
        axios.get('{{ route('updateProjectDueDate') }}?date=' + ths.value + "&id=" + projectId).then(function() {

        });
    }
    var s = flatpickr("#dueOn", {
        defaultDate: "{{ $project->dueOn }}"
    });
</script>

@endsection


@section('head')
<link rel="stylesheet" href="{{ asset('mawaisnow/chat/chat.css') }}">
<script src="{{ asset('mawaisnow/vue/vue.js') }}" charset="utf-8"></script>
<script src="{{ asset('mawaisnow/axios/axios.min.js') }}" charset="utf-8"></script>
<style media="screen">
    .fileHai {}

    .chat-cont {
        word-break: break-word;
    }

    .br-theme-css-stars .br-widget a.br-active:after {
      color: #5abaa5 !important;
    }
    .br-theme-css-stars .br-widget a.br-selected:after {
      color: #5abaa5 !important;
    }

    .br-theme-css-stars .br-widget {
      display: inline-block;

    }
    .br-theme-css-stars .br-widget a {
        width: 32px !important;

        font-size: 31px !important;
    }

</style>
<link rel="stylesheet" href="{{ asset('mawaisnow/able/assets/plugins/ratting/css/css-stars.css') }}">

@endsection
