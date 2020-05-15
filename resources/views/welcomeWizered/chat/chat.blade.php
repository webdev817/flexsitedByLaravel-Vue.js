
<style media="screen">
.msg-user-chat.scroll-div {
    height: calc(100vh - 330px);
    position: relative;
}
/**  =====================
    Chatting css start
==========================  **/
.header-chat,
.header-user-list {
height: 100%;
width: 350px;
position: fixed;
top: 0;
right: -350px;
border-radius: 0;
z-index: 1030;
background-color: #fff;
-webkit-transition: all 0.3s ease-in-out;
transition: all 0.3s ease-in-out;
}
.header-chat .main-friend-cont,
.header-user-list .main-friend-cont {
height: calc(100vh - 66px);
}
.header-chat .h-list-header,
.header-user-list .h-list-header {
padding: 15px;
border-bottom: 1px solid #f1f1f1;
}
.header-chat .h-list-body,
.header-user-list .h-list-body {
padding: 20px 0;
}
.header-chat.open,
.header-user-list.open {
-webkit-box-shadow: 0 1px 10px 0 rgba(69, 90, 100, 0.2);
        box-shadow: 0 1px 10px 0 rgba(69, 90, 100, 0.2);
right: 0;
}

.header-user-list.open .h-close-text {
position: absolute;
top: 111px;
left: -99px;
}
.header-user-list.open .h-close-text i {
position: absolute;
top: 23px;
left: 73px;
font-size: 25px;
z-index: 1003;
color: #1de9b6;
}
.header-user-list.open .h-close-text:after {
content: "\61";
font-family: "pct";
z-index: 1001;
font-size: 150px;
line-height: 0;
color: #fff;
position: absolute;
top: 35px;
left: 6px;
text-shadow: -4px 0 7px rgba(69, 90, 100, 0.12);
}
.header-user-list.open.msg-open:after {
color: rgba(4, 169, 245, 0.1);
}

.h-list-header .form-control:active, .h-list-header .form-control:focus, .h-list-header .form-control:hover {
-webkit-box-shadow: none;
        box-shadow: none;
outline: none;
}

.h-list-body {
position: relative;
}
.h-list-body .userlist-box {
cursor: pointer;
display: -webkit-box;
display: -ms-flexbox;
display: flex;
-webkit-box-align: center;
    -ms-flex-align: center;
        align-items: center;
padding: 15px 20px;
position: relative;
}
.h-list-body .userlist-box:after {
content: "";
position: absolute;
bottom: 0;
left: 20px;
width: calc(100% - 40px);
height: 1px;
background: #f3f4f9;
}
.h-list-body .userlist-box.active {
background: #e0f5fe;
}
.h-list-body .userlist-box .media-left {
padding-right: 10px;
}
.h-list-body .userlist-box .media-object {
width: 50px;
display: inline-block;
}
.h-list-body .userlist-box .chat-header {
font-size: 14px;
font-weight: 600;
margin-bottom: 0;
}
.h-list-body .userlist-box .chat-header small {
margin-top: 5px;
font-size: 90%;
}
.h-list-body .userlist-box .live-status {
height: 25px;
width: 25px;
position: absolute;
top: 35px;
right: 20px;
border-radius: 100%;
color: #fff;
padding: 2px 0;
text-align: center;
background: linear-gradient(-135deg, #1de9b6 0%, #1dc4e9 100%);
}

.header-chat .h-list-header {
text-align: center;
position: relative;
}
.header-chat .h-list-header h6 {
margin: 5px 0;
}
.header-chat .h-list-header .h-back-user-list {
position: absolute;
left: 0;
top: 0;
height: 100%;
display: -webkit-box;
display: -ms-flexbox;
display: flex;
-webkit-box-align: center;
    -ms-flex-align: center;
        align-items: center;
width: 40px;
-webkit-box-pack: center;
    -ms-flex-pack: center;
        justify-content: center;
font-size: 20px;
}
.header-chat .main-chat-cont {
height: calc(100vh - 166px);
}
.header-chat .h-list-body {
height: 100%;
background: #e0f5fe;
}
.header-chat .h-list-footer {
position: absolute;
bottom: 0;
width: 100%;
right: 0;
padding: 20px 15px;
z-index: 10;
background: #e0f5fe;
}
.header-chat .h-list-footer .input-group {
background: #fff;
border: none;
display: -webkit-inline-box;
display: -ms-inline-flexbox;
display: inline-flex;
-webkit-box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
        box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
padding: 7px;
border-radius: 20px 0 10px 20px;
width: calc(100% - 40px);
}
.header-chat .h-list-footer .input-group .form-control,
.header-chat .h-list-footer .input-group .input-group-text {
background: transparent;
border: none;
border-radius: 0;
padding: 0;
}
.header-chat .h-list-footer .input-group .btn-send:active, .header-chat .h-list-footer .input-group .btn-send:focus, .header-chat .h-list-footer .input-group .btn-send:hover,
.header-chat .h-list-footer .input-group .form-control:active,
.header-chat .h-list-footer .input-group .form-control:focus,
.header-chat .h-list-footer .input-group .form-control:hover {
outline: none;
-webkit-box-shadow: none;
        box-shadow: none;
}
.header-chat .h-list-footer .input-group .btn-attach {
border-radius: 50%;
padding: 5px;
margin-right: 5px;
}
.header-chat .h-list-footer .input-group .btn-attach > i {
margin-right: 0;
}
.header-chat .h-list-footer .input-group .btn-send {
border-radius: 50%;
padding: 10px;
margin-left: 5px;
position: absolute;
right: -45px;
top: 2px;
z-index: 99;
}
.header-chat .h-list-footer .input-group .btn-send i {
margin-right: 0;
}
.header-chat .h-list-footer .input-group .btn-send .input-group-text {
color: #fff;
}
.header-chat .h-list-footer .input-group .form-control {
-webkit-transition: all 0.3s ease-in-out;
transition: all 0.3s ease-in-out;
width: 0;
}
.header-chat .h-list-footer .input-group:after {
content: "\67";
font-family: "pct";
z-index: 1001;
font-size: 35px;
line-height: 0;
color: #fff;
position: absolute;
top: 18px;
right: -23px;
text-shadow: 4px 10px 20px rgba(0, 0, 0, 0.1);
}

.h-list-body .chat-messages {
padding-bottom: 20px;
padding-left: 15px;
padding-right: 15px;
}
.h-list-body .chat-messages .photo-table {
padding-right: 5px;
}
.h-list-body .chat-messages .photo-table img {
display: inline-block;
width: 50px;
margin-bottom: 5px;
}
.h-list-body .chat-messages .chat-menu-content > div,
.h-list-body .chat-messages .chat-menu-reply > div {
position: relative;
overflow: visible;
display: inline-block;
}
.h-list-body .chat-messages .chat-menu-content > div .chat-cont,
.h-list-body .chat-messages .chat-menu-reply > div .chat-cont {
padding: 15px 20px;
}
.h-list-body .chat-messages .chat-menu-content .chat-time,
.h-list-body .chat-messages .chat-menu-reply .chat-time {
margin: 9px 8px 0 10px;
}
.h-list-body .chat-messages .chat-menu-reply {
text-align: right;
}
.h-list-body .chat-messages .chat-menu-reply > div p {
background: #fff;
border-radius: 4px;
margin-bottom: 4px;
margin-right: 25px;
-webkit-box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
        box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
}
.h-list-body .chat-messages .chat-menu-reply > div p:first-child {
border-top-left-radius: 8px;
border-top-right-radius: 8px;
}
.h-list-body .chat-messages .chat-menu-reply > div p:last-child {
border-bottom-left-radius: 8px;
border-bottom-right-radius: 0;
}
.h-list-body .chat-messages .chat-menu-reply > div:before {
content: "\66";
font-family: "pct";
z-index: 5;
font-size: 30px;
line-height: 0;
color: #fff;
position: absolute;
bottom: 19px;
right: 5px;
text-shadow: 7px 10px 20px rgba(0, 0, 0, 0.1);
}
.h-list-body .chat-messages .chat-menu-content > div p {
background: #65c4b4;
color: #fff;
border-radius: 4px;
margin-bottom: 4px;
-webkit-box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
        box-shadow: 0 10px 20px 0 rgba(0, 0, 0, 0.1);
}
.h-list-body .chat-messages .chat-menu-content > div p:first-child {
border-top-left-radius: 0;
border-top-right-radius: 10px;
}
.h-list-body .chat-messages .chat-menu-content > div p:last-child {
border-bottom-left-radius: 10px;
border-bottom-right-radius: 10px;
}
.h-list-body .chat-messages .chat-menu-content > div:before {
}

/* massage page start */
.msg-card .msg-user-list {
height: calc(100vh - 300px);
}
.msg-card .msg-user-chat {
background: #e0f5fe;
height: calc(100vh - 330px);
padding-top: 25px;
padding-bottom: 25px;
padding-left: 5px;
padding-right: 5px;
}
.msg-card .msg-block > .row > div:before {
content: "";
width: 1px;
height: 100%;
background: #f1f1f1;
position: absolute;
top: 0;
}
.msg-card .msg-block > .row > div:first-child:before {
right: 0;
}
.msg-card .msg-block > .row > div:last-child:before {
left: -1px;
}

.main-friend-chat {
padding-bottom: 15px;
}

@media screen and (max-width: 991px) {
.msg-card .msg-block > .row > div:before {
  background: none;
}
}

</style>
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
                            <p  v-html="refresh(m.message)" class="chat-cont">
                                 </p>
                                    <p v-if="m.isAttachment == 1" class="fileHai chat-cont">
                                        <a target="_blank" v-bind:style="[m.createdBy != userId ? {color: 'white'}: '']"
                                        v-bind:href="'/storage/' + m.path"
                                        >
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
            <input type="text" class="form-control rounded-0 shadow-none border msg-send-chat" v-on:keyup.enter="sendMessage" v-model="message" id="message" placeholder="Message . . .">

            <div class="input-group-append">
                <button id="messageSendBtn" v-on:click="sendMessage" class="btn shadow-none rounded-0 btn-primary btn-icon btn-msg-send" type="button">

                    <i class="fa fa-paper-plane"></i>

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
