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



                            <div class="col-12">
                                <div class="card">


                                    <div class="" id="supportChat">
                                        <div class="h-list-body">
                                            <div class="msg-user-chat scroll-div ps">
                                                <div class="main-friend-chat" id="supportChatBody">

                                                    <div v-if="chat == null || chat.length == 0" style="padding-top: 20px;height:100%; background:#fafafa; text-align:center">
                                                      @if (isset($new))
                                                        Welcome to Chat!  A Flexsited specialist will be with you shortly
                                                      @endif

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
                                                    <button data-toggle="modal" data-target="#closeChatModal"  class="btn btn-secondary btn-icon" type="button" title="Close Chat" ><i
                                                          class="feather icon-x-circle"></i></button>
                                                </div>
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


                </div>
            </div>
        </div>
    </div>
</div>
</div>


<div class="modal fade" id="closeChatModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Close Chat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    <form action="{{ route('supportChatSessionClose',$supportChatSession->id) }}" enctype="multipart/form-data" method="post">
      @csrf
      <div class="modal-body">

        <div class="container">
            <div class="row">
               <div class="col-12">
                 <p>
                   Are you sure you want to close the chat?
                 </p>
               </div>

            </div>


        </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Yes, close the chat</button>
      </div>

    </form>


    </div>
  </div>
</div>


@endsection

@section('js')

@include('supportPortal.support.chat.js', [ 'sessionId' => $supportChatSession->id ])


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



</style>
@endsection
