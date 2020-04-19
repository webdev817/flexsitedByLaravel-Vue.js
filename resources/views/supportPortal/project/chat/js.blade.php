
<script type="text/javascript">
axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    'X-CSRF-TOKEN' : "{!! csrf_token() !!}"
};
Array.prototype.last = function() {
    return this[this.length - 1];
}
var apiEndPoint = '{{ route('projectChatApi') }}?projectId={{ $projectId }}';
var apiEndPointMine = '{{ route('projectChatMine') }}?projectId={{ $projectId }}';

var projectChat = new Vue({
  el: '#projectChat',
  data () {
    return {
      chat: null,
      message: '',
      attachment: '',
      uploadProgress: null,

      userId: {{ Auth::id() }}
    }
  },
  methods: {
      sendMessage : function() {
        var message = this.message;
         if (message.length == 0) {
           alert('Please Enter a valid message');
           return 0;
         }

         let formData = new FormData();
         formData.append('message', message);
         var config = {
           headers: {
               'Content-Type': 'multipart/form-data'
           }
         };

         if (this.attachment != '') {
            formData.append('file', this.attachment);
            formData.append('fileName', this.attachment.name);

            config.onUploadProgress = (progressEvent) => {
              this.uploadProgress = Math.round( (progressEvent.loaded * 100) / progressEvent.total );
              console.log(this.uploadProgress);
            };
         }

         axios.post(apiEndPoint,formData,config).then(response => {
           this.message = '';
           this.attachment = '';
           this.uploadProgress = null;

           if (response.data.status != 1) {
             alert(response.data.message);
             return 0;
           }else {
             this.chat.push(response.data.data);
           }

           setTimeout( () => {
             this.scrollToEnd();
           }, 0);

         }).catch(function(e,f){


           this.uploadProgress = null;
           console.log(e);
        });


      },

      scrollToEnd: function() {
        var container = this.$el.querySelector("#projectChatBody");
        container.scrollTop = container.scrollHeight;
      },


      fileChanged: function () {
        var file = this.$refs.file.files[0];
        if (file == undefined) {
          this.attachment = '';
        }
        var maxFileSize = 10;
        console.log(file.size);

        if (file.size  > (1024 * 1024 ) * maxFileSize) {
          alert('File can\'t be large than ' + maxFileSize + "MB. File that you choosed is almost of " + Math.round((file.size / 1024 ) / 1024) + "MB");
          this.attachment = '';
          return 0;
        }
        this.attachment = file;
      },
      removeAttachment: function () {
        this.attachment = '';
      }


  },
  mounted: function(){
    axios.get( apiEndPoint).then( response => {
        this.chat = response.data;
        setTimeout( () => {
          this.scrollToEnd();
        }, 0);
    });

    setInterval(() => {
      var lastId = null;
      var lastElm = this.chat.last();
      if (lastElm != undefined) {
        lastId = lastElm.id;
      }
      axios.post(apiEndPointMine,{
        lastId: lastId
      }).then( response => {
        var projectChat = response.data.data.projectChat;
        var status = response.data.status;

        if (projectChat.length == 0) {
          return 0;
        }

        if (status == 0) {
          this.chat = projectChat;
        }else {
          projectChat.forEach((obj) => {
            this.chat.push(obj);
          });
        }
        setTimeout( () => {
          this.scrollToEnd();
        }, 0);
      });

    },1000);

  },
  computed: {

    attachedFileName: function () {
      var attachment = this.attachment;
      if (attachment == '') {
        return '';
      }
      return attachment.name;
    }


  }
});

</script>
