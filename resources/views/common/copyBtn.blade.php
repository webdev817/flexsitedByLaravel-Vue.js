
<div style="background:white;color:black;position:fixed;top:30px;left:30%" id="textOfAlertOfCopy">

</div>
<!-- Trigger -->
<button data-data="4242424242424242" class="btn btn-outline-primary btn-sm copyBtnAy" type="button" >
copy card
</button>

<button data-data="4000002500003155" title="4000002500003155 require auth first time" class="btn btn-outline-primary btn-sm ml-2 copyBtnAy" type="button"  >
copy card
</button>

<button data-data="4000002760003184" title="4000002760003184 always required auth" class="btn btn-outline-primary btn-sm ml-2 copyBtnAy" type="button" >
copy card
</button>

<script type="text/javascript">
function copyData(data){
  var input = "<input id='dataAyyyyyy' style='position:fixed;bottom:3999px' value='"+data+"'>";
  $("body").append(input);

  var copyText = document.getElementById("dataAyyyyyy");
  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");
  document.execCommand("copy");

  $("#dataAyyyyyy").remove();
}
window.onload = function(){
  $(".copyBtnAy").click(function(){
    var data = $(this).attr('data-data');
    copyData(data);
    displayQuickMessageForCopy(data);
  });
}

function displayQuickMessageForCopy(message){
  document.getElementById("textOfAlertOfCopy").style.display = "block";

  document.getElementById("textOfAlertOfCopy").innerHTML = message;
  setTimeout(function(){
    document.getElementById("textOfAlertOfCopy").innerHTML = "";
    document.getElementById("textOfAlertOfCopy").style.display = "none";
  },800);
}


</script>
