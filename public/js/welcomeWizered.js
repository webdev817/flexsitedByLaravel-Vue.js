!function(e){var a={};function t(n){if(a[n])return a[n].exports;var i=a[n]={i:n,l:!1,exports:{}};return e[n].call(i.exports,i,i.exports,t),i.l=!0,i.exports}t.m=e,t.c=a,t.d=function(e,a,n){t.o(e,a)||Object.defineProperty(e,a,{enumerable:!0,get:n})},t.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},t.t=function(e,a){if(1&a&&(e=t(e)),8&a)return e;if(4&a&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(t.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&a&&"string"!=typeof e)for(var i in e)t.d(n,i,function(a){return e[a]}.bind(null,i));return n},t.n=function(e){var a=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(a,"a",a),a},t.o=function(e,a){return Object.prototype.hasOwnProperty.call(e,a)},t.p="/",t(t.s=7)}({7:function(e,a,t){e.exports=t(8)},8:function(e,a){function t(){var e=0;$("#logoDesign").is(":checked")&&(e=100),$("#businessCardDesign").is(":checked")&&(e+=150),$("#flayerDesign").is(":checked")&&(e+=200);var a=$("#recurringAmount").text();a=a.replace("$",""),e+=a=parseFloat(a),$("#amount").html("$"+e)}function n(){$("#domainMessagesCenter").removeClass("alert-danger").removeClass("alert-success").text("")}function i(e){var a=arguments.length>1&&void 0!==arguments[1]&&arguments[1];a?$("#domainMessagesCenter").removeClass("alert-success").addClass("alert-danger").text(e):$("#domainMessagesCenter").removeClass("alert-danger").addClass("alert-success").text(e)}$(".commonSelectPages").click((function(){$(this).find(".boxRadioContainer").hasClass("active")?$(this).find(".boxRadioContainer").removeClass("active"):$(this).find(".boxRadioContainer").addClass("active")})),$(".planHead").click((function(){if("/websitePackege"!=window.location.pathname){$(".planHead").removeClass("active"),$(this).addClass("active");var e=$(this).children().filter(".planPrice").text();$("#recurringAmount").html(e)}})),$(".planHead").click(t),$("#logoDesign").change(t),$("#businessCardDesign").change(t),$("#flayerDesign").change(t),"/websitePackege"!=window.location.pathname&&$(".planHead.active").trigger("click"),$("#logoDesign").change((function(){$(this).is(":checked")?$(".logoDesign").removeClass("active").addClass("active"):$(".logoDesign").removeClass("active")})),$("#businessCardDesign").change((function(){$(this).is(":checked")?$(".businessCardDesign").removeClass("active").addClass("active"):$(".businessCardDesign").removeClass("active")})),$("#flayerDesign").change((function(){$(this).is(":checked")?$(".flayerDesign").removeClass("active").addClass("active"):$(".flayerDesign").removeClass("active")})),$(".domainTabs").click((function(){$(".domainTabs").removeClass("active"),$(this).addClass("active"),"buyNewDomain"==$(this).attr("data-id")?($(".buyNewDomain").css("display","block"),$(".alreadyHaveDomain").css("display","none")):($(".buyNewDomain").css("display","none"),$(".alreadyHaveDomain").css("display","block")),n()})),$("#alreadyHaveADomain").click((function(){var e,a=$("#alreadyHaveDomainInput").val();if(e=(e=(e=(e=a).trim()).replace("http://","")).replace("www.",""),0==/^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]\.[a-zA-Z]{2,}$/.test(e)?($("#alreadyHaveDomainInput").focus(),i("Please Enter a valid domain",!0),!1):(n(),!0))return $("#inputDomainSelected").val(a),$("#alreadyExistDomain").val(0),$("#hiddenDomainForm").submit(),!1})),$("body").on("click",".domainSelectBtn",(function(){var e=$(this).attr("data-selectedDomain");$(".domainSelectBtn").text("SELECT"),$(this).text("SELECTED"),$("#inputDomainSelected").val(e),$("#alreadyExistDomain").val(0),$("#hiddenDomainForm").submit()})),$("#needNewDomainSearch").click((function(){$(".domainListStuff").css("display","none");var e=$("#searchForNewDomain").val();if(!!!/^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-zA-Z0-9]$/.test(e))return i("Enter a valid name",!0),!1;$(".loaderSearch").removeClass("d-none"),i("Searching... "),$(this).attr("disabled","disabled"),$.ajax({method:"get",url:"/domainSearch?q="+e}).done((function(e){if(0==e.status)return i(e.message,!0),!1;if(1==e.status){$(".domainListStuff").css("display","block"),i("Please choose one of doman");for(var a="",t=e.data,n=0;n<t.length;n++){var s=t[n],o=s.domain,l="text-success",r="Available",c="";0==s.status&&(l="text-danger",r="Not Available",c=" disabled='disabled'"),a+='<div class="d-flex justify-content-center mb-2 ml-0 mr-0 mt-0 row">',a+='<div class="bg-white border col-sm-10 col-12 col-md-5 offset-md-2 p-2 pr-0 align-self-center" ><h5 class="float-left m-0">'+o+'</h5> <h5 class="mb-0 mr-3 float-right '+l+'">'+r+"</h5></div>"+('<div class="col-md-3 col-sm-2 col-12 pl-0"><button class="btn btn-cstm rounded-0 shadow-none domainSelectBtn" type="button" '+c+' data-selectedDomain="'+o+'" >SELECT</button></div></div>')}$("#domainsList").html(""),$("#domainsList").html(a)}})).fail((function(e){i("Something went wrong"),console.log(e)})).always((function(){$(".loaderSearch").addClass("d-none"),$("#needNewDomainSearch").removeAttr("disabled")}))}))}});