
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
    $('#domainMessagesCenter').removeClass('alert-success').addClass('alert-danger').text(message);
  }else {
    $('#domainMessagesCenter').removeClass('alert-danger').addClass('alert-success').text(message);
  }
}

function validateDomain(the_domain) {
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
    $("#inputDomainSelected").val(domain);
    $("#alreadyExistDomain").val(0);
    $("#hiddenDomainForm").submit();
    return false;
  }
});

function domainSearchNameValidate(val) {
    if (/^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]$/.test(val)) {
      return true;
    }
    else {
      return false;
    }
}

// function selectedDomainYeHai(domain){
//   $(".domainSelectBtn").text('SELECT');
//   $(this).text('SELECTED');
// }
$('body').on('click', '.domainSelectBtn', function() {
    var domain = $(this).attr('data-selectedDomain');
    $(".domainSelectBtn").text('SELECT');
    $(this).text('SELECTED');
    $("#inputDomainSelected").val(domain);
    $("#alreadyExistDomain").val(0);
    $("#hiddenDomainForm").submit();
});

$("#needNewDomainSearch").click(function(){

  $(".domainListStuff").css('display','none');
  var domain = $("#searchForNewDomain").val();
  // var result = validateDomain(domain);
  var r = domainSearchNameValidate(domain);
  if (r) {
      domainRelatedMessage('Search...');
      $(this).attr('disabled','disabled');
  }else {
    domainRelatedMessage('Enter a valid name',true);
    return false;
  }
    $.ajax({
        method: "get",
        url: "/domainSearch?q=" +  domain
      })
    .done(function( data ) {
      if (data.status == 0) {
        domainRelatedMessage(data.message,true);
        return false;
      }
      if (data.status == 1) {
        $(".domainListStuff").css('display','block');
        domainRelatedMessage('Please choose one of doman');

        var html = '';
        var domains = data.data;

        for (var i = 0; i < domains.length; i++) {
          var dObj = domains[i];
          var domainName = dObj.domain;
          var textColor = "text-success";
          var status = "Available";
          var doWeNeedToDisable = '';
          if (dObj.status == 0) {
            textColor = "text-danger";
            status = "Not Available";
            doWeNeedToDisable = " disabled='disabled'";
          }
          html += '<div class="d-flex justify-content-center mb-2 ml-0 mr-0 mt-0 row">';
          var nextPart1 = '<div class="bg-white border col-sm-10 col-12 col-md-5 offset-md-2 p-2 pr-0 align-self-center" ><h5 class="float-left m-0">'+ domainName +'</h5> <h5 class="mb-0 mr-3 float-right '+ textColor +'">'+ status +'</h5></div>';
          var nextPart2 = '<div class="col-md-3 col-sm-2 col-12 pl-0"><button class="btn btn-cstm rounded-0 shadow-none domainSelectBtn" type="button" '+ doWeNeedToDisable +' data-selectedDomain="'+domainName+'" >SELECT</button></div></div>';
          html += nextPart1 + nextPart2;
        }
        $("#domainsList").html('');
        $("#domainsList").html(html);

      }

    }).fail(function(err){
      domainRelatedMessage('Something went wrong');
      console.log(err);
    }).always(function(){
      $("#needNewDomainSearch").removeAttr('disabled');

    });


});
