
$(".domainTabs").click(function(){
  $('.domainTabs').removeClass('active');
  $(this).addClass('active');
  var currentTab = $(this).attr('data-id');
  if (currentTab == "buyNewDomain") {
    $(".buyNewDomain").css('display','block');
    $(".alreadyHaveDomain").css('display','none');
  }else {
    $(".buyNewDomain").css('display','none');
    $(".alreadyHaveDomain").css('display','block');
  }
  emptyDomainRelatedMessage();
});
function emptyDomainRelatedMessage(){
  $('#domainMessagesCenter').removeClass('alert-danger').removeClass('alert-success').text('');
}
function domainRelatedMessage(message, isDanger = false){
  if (isDanger) {
    $('#domainMessagesCenter').removeClass('alert-danger').addClass('alert-danger').text(message);
  }else {
    $('#domainMessagesCenter').removeClass('alert-success').addClass('alert-success').text(message);
  }
}
function validateDomain(the_domain) {
 // strip off "http://" and/or "www."
 the_domain = the_domain.trim();
 the_domain = the_domain.replace("http://", "");
 the_domain = the_domain.replace("www.", "");

 var reg = /^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}$/;
 if (reg.test(the_domain) == false) {
   $('#alreadyHaveDomainInput').focus();
   domainRelatedMessage('Please Enter a valid domain',true);
   return false;
 } else {
   emptyDomainRelatedMessage();
   return true;
 }

}

$("#alreadyHaveADomain").click(function(){
  var domain = $("#alreadyHaveDomainInput").val();
  var result = validateDomain(domain);
  if (result) {
    alert('Under Development');
    return false;
  }

});


$("#needNewDomainSearch").click(function(){
  var domain = $("#searchForNewDomain").val();
  var result = validateDomain(domain);
  if (result) {
    alert('Under Development');
    return false;
  }
});
