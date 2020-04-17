
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


         axios.post(apiEndPoint,{
           'message': message
         }).then(response => {
           this.chat.push(response.data.data);
           this.message = '';

           setTimeout( () => {
             this.scrollToEnd();
           }, 0);
         });


      },

      scrollToEnd: function() {
        var container = this.$el.querySelector("#projectChatBody");
        container.scrollTop = container.scrollHeight;
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

  }
});

</script>
