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


                            <div class="col-8 ">
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
                                                <td>--</td>

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

                                      <button type="button" class="d-inline btn float-right btn-outline-primary" name="button">
                                          <i class="feather icon-paperclip"></i>
                                        Upload Work for Review

                                      </button>
                                    </div>

                                    <div class="card-body justify-content-center d-flex">
                                      <h4 class="mt-3 mb-3 "></h4>
                                    </div>

                                  </div>

                                </div>
                              </div>

                            </div>

                            <div class="col-4">
                              <div class=" card">


                                <div class="ch-block">
                                    <div class="h-list-body">
                                        <div class="msg-user-chat scroll-div ps">
                                            <div class="main-friend-chat" id="projectChat">

                                                {{-- <div style="height:100%; background:#fafafa">

                                                </div> --}}

                                                <div class="media chat-messages">
                                                    <a class="media-left photo-table" href="javascript:void(0)"><img class="media-object img-radius img-radius m-t-5" src="{{ asset('mawaisnow/able/assets/images/user/avatar-2.jpg') }}" alt="Generic placeholder image"></a>
                                                    <div class="media-body chat-menu-content">
                                                        <div class="">
                                                            <p class="chat-cont">hello Datta! Will you tell me something</p>
                                                            <p class="chat-cont">about yourself?</p>
                                                        </div>
                                                        <p class="chat-time">8:20 a.m.</p>
                                                    </div>
                                                </div>
                                                <div class="media chat-messages">
                                                    <div class="media-body chat-menu-reply">
                                                        <div class="">
                                                            <p class="chat-cont">Ohh! very nice</p>
                                                        </div>
                                                        <p class="chat-time">8:22 a.m.</p>
                                                    </div>
                                                </div>
                                                <div class="media chat-messages">
                                                    <a class="media-left photo-table" href="javascript:void(0)"><img class="media-object img-radius img-radius m-t-5" src="{{ asset('mawaisnow/able/assets/images/user/avatar-2.jpg') }}" alt="Generic placeholder image"></a>
                                                    <div class="media-body chat-menu-content">
                                                        <div class="">
                                                            <p class="chat-cont">can you help me?</p>
                                                        </div>
                                                        <p class="chat-time">8:20 a.m.</p>
                                                    </div>
                                                </div>
                                                <div class="media chat-messages">
                                                    <a class="media-left photo-table" href="javascript:void(0)"><img class="media-object img-radius img-radius m-t-5" src="{{ asset('mawaisnow/able/assets/images/user/avatar-2.jpg') }}" alt="Generic placeholder image"></a>
                                                    <div class="media-body chat-menu-content">
                                                        <div class="">
                                                            <p class="chat-cont">hello Datta! Will you tell me something</p>
                                                            <p class="chat-cont">about yourself?</p>
                                                        </div>
                                                        <p class="chat-time">8:20 a.m.</p>
                                                    </div>
                                                </div>
                                                <div class="media chat-messages">
                                                    <div class="media-body chat-menu-reply">
                                                        <div class="">
                                                            <p class="chat-cont">Ohh! very nice</p>
                                                        </div>
                                                        <p class="chat-time">8:22 a.m.</p>
                                                    </div>
                                                </div>
                                                <div class="media chat-messages">
                                                    <div class="media-body chat-menu-reply">
                                                        <div class="">
                                                            <p class="chat-cont">Ohh! very nice</p>
                                                        </div>
                                                        <p class="chat-time">8:22 a.m.</p>
                                                    </div>
                                                </div>
                                                <div class="media chat-messages">
                                                    <a class="media-left photo-table" href="javascript:void(0)"><img class="media-object img-radius img-radius m-t-5" src="{{ asset('mawaisnow/able/assets/images/user/avatar-2.jpg') }}" alt="Generic placeholder image"></a>
                                                    <div class="media-body chat-menu-content">
                                                        <div class="">
                                                            <p class="chat-cont">can you help me?</p>
                                                        </div>
                                                        <p class="chat-time">8:20 a.m.</p>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                    <hr class="m-0">
                                    <div class="msg-form">
                                        <div class="input-group mb-0">
                                            <input type="text" class="form-control msg-send-chat" placeholder="Text . . .">
                                            <div class="input-group-append">
                                                <input type="file" id="imgupload" style="display:none">
                                                <button onclick="$('#imgupload').click()" class="btn btn-secondary btn-icon" type="button" data-toggle="tooltip" title="" data-original-title="file attachment"><i class="feather icon-paperclip"></i></button>
                                            </div>
                                            <div class="input-group-append">
                                                <button class="btn btn-primary btn-icon btn-msg-send" type="button"><i class="feather icon-play"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

@include('common.loadJS', ['select2'=>true])

@section('js')
<script type="text/javascript">
    $("#marketingService").select2({
        minimumResultsForSearch: -1,
        placeholder: "Which Service are you interested in?"
    }).val(null).change();

    $('#projectChat').scrollTop(1000000);




</script>
@endsection
@section('head')
  <style media="screen">
    .main-friend-chat{
      overflow-y: scroll;
      padding-bottom: 0px;
      height: 100%;
    }

    .h-list-body .chat-messages .chat-menu-content > div:before {
        color: #60baaa;
    }
    .h-list-body .chat-messages .chat-menu-content > div p {
    background: linear-gradient(-135deg, #5a9e91 0%, #62c3b2 100%);
    }
  </style>

@endsection
