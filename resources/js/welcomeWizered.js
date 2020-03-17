$(".commonSelectPages").click(function() {

    var abc = $(this).find('.boxRadioContainer').hasClass('active');

    if (abc) {
        $(this).find('.boxRadioContainer').removeClass('active');
    } else {
        var maxPagesToBeSelected = $("#maxPagesToBeSelected").val();
        var elms = $(".boxRadioContainer.active");
        if (maxPagesToBeSelected <= elms.length) {
            alert('You can select max ' + maxPagesToBeSelected + " Pages");
            return 0;
        }
        $(this).find('.boxRadioContainer').addClass('active');
    }
});


function getRecurringAmount() {
  var elms = $(".planHead.active");
  var p = $(elms).children().filter('.planPrice').text();
  return p;
}
// billing page start here
$(".planHead").click(function() {
    var path = window.location.pathname;
    if (path != "/websitePackege") {
        $(".planHead").removeClass('active');
        $(this).addClass('active');

        updateRecurringPriceYo();

    }
});
function updateRecurringPriceYo() {
  var recurringAmount = getRecurringAmount();
  recurringAmount = recurringAmount.replace('$', '');
  recurringAmount = parseFloat(recurringAmount);

  var coupon = getCouponObj();

  var recurringAmountForTotal = 0;

  if (coupon.subscriptionDiscount == 1) {
      var percentage = coupon.percentOff;
      var howMuchToSubtract = recurringAmount * (percentage / 100);
      var recurringAmountAfterDiscount = recurringAmount - howMuchToSubtract;
      if (recurringAmountAfterDiscount == 0) {
          recurringAmountAfterDiscount = "Free";
      } else {
          recurringAmountForTotal = recurringAmountAfterDiscount;
          recurringAmountAfterDiscount = "$" + recurringAmountAfterDiscount;
      }
      var finalOutput = "<div class='couponApplied d-inline'>$" + recurringAmount + "</div> " + " <span class='font8px'>,One Time</span> " + recurringAmountAfterDiscount;
      $("#recurringAmount").html(finalOutput);
  } else if (coupon.freeOnePageWebsite == 1 && $("#hiddenPlanNumber").val() == 1) {
      recurringAmountForTotal = 0;
      var finalOutput = "<div class='couponApplied d-inline'>$" + recurringAmount + "</div> " + " <span class='font8px'>,One Time</span> Free";
      $("#recurringAmount").html(finalOutput);
  }else {
    recurringAmountForTotal = recurringAmount;
    $("#recurringAmount").html(recurringAmount);
  }


  var price = 0;

  var logoDesign = $("#logoDesign").is(':checked');
  if (logoDesign && coupon.freeLogo != 1) {
      price = 100;
  }
  var businessCardDesign = $("#businessCardDesign").is(':checked');
  if (businessCardDesign && coupon.freeBusinessCard != 1) {
      price = price + 150;

  }
  var flayerDesign = $("#flayerDesign").is(':checked');
  if (flayerDesign && coupon.freeFlayer != 1) {
      price = price + 200;
  }


  price = price + recurringAmountForTotal;
  if (price == 0) {
    price = "Free";
  }else {
    price = "$"+ price;
  }
  $("#amount").html(price);

}
function getCouponObj() {
    var coupon = $("#couponJsonHai").val();
    try {
        var coupon = JSON.parse(coupon);
    } catch (e) {}

    if (coupon == null) {
        coupon = {
            freeLogo: 0,
            freeFlayer: 0,
            freeBusinessCard: 0,
            subscriptionDiscount: 0,
            percentOff: 0,
            freeOnePageWebsite: 0,
        };
    }
    return coupon;
}

function showTotalPrice() {
    updateRecurringPriceYo();
    updatePricesIfThereIsCouponForAddons();

}

function doVisibitlyWork(hideTo, showTo) {
    $(hideTo).removeClass('hide');
    $(showTo).removeClass('hide').addClass('hide');
}

function updatePricesIfThereIsCouponForAddons() {

    var coupon = getCouponObj();
    if (coupon.freeLogo == 1) {
        doVisibitlyWork(".logoDiscountedPrice", ".logoNormalPrice");
    } else {
        doVisibitlyWork(".logoNormalPrice", ".logoDiscountedPrice");
    }
    if (coupon.freeFlayer == 1) {
        doVisibitlyWork(".flayerDiscountedPrice", ".flayerNormalPrice");
    } else {
        doVisibitlyWork(".flayerNormalPrice", ".flayerDiscountedPrice");
    }
    if (coupon.freeBusinessCard == 1) {
        doVisibitlyWork(".businessDiscountedPrice", ".businessNormalPrice");
    } else {
        doVisibitlyWork(".businessNormalPrice", ".businessDiscountedPrice");
    }
}




$("#applyPromoCode").click(function() {
    var couponCode = $("#couponCode").val();
    if (couponCode.length < 1) {
        alert('Please enter a valid Coupon');
        return 0;
    }

    doAjax({
        url: '/couponInfo',
        method: 'get',
        data: {
            couponCode: couponCode
        },
        done: function(response) {
            if (response.status == 0) {
                $("#couponJsonHai").val('');
                $("#couponCode").val('');
                alert(response.message);
                return 0;
            } else {
                var json = JSON.stringify(response.data.coupon);
                $("#couponJsonHai").val(json);
                showTotalPrice();
            }

        },
        fail: function(error) {
            alert(error);
        }
    });


});


// amount
$(".planHead").click(showTotalPrice);
$("#logoDesign").change(showTotalPrice);
$("#businessCardDesign").change(showTotalPrice);
$("#flayerDesign").change(showTotalPrice);

var path = window.location.pathname;
if (path != "/websitePackege") {
    $(".planHead.active").trigger('click');
}

$("#logoDesign").change(function() {
    var result = $(this).is(':checked');
    if (result) {
        $(".logoDesign").removeClass('active').addClass('active');
    } else {
        $(".logoDesign").removeClass('active');
    }
});
$("#businessCardDesign").change(function() {
    var result = $(this).is(':checked');
    if (result) {
        $(".businessCardDesign").removeClass('active').addClass('active');
    } else {
        $(".businessCardDesign").removeClass('active');
    }
});
$("#flayerDesign").change(function() {
    var result = $(this).is(':checked');
    if (result) {
        $(".flayerDesign").removeClass('active').addClass('active');
    } else {
        $(".flayerDesign").removeClass('active');
    }
});

// billing page maybee end here




$(".domainTabs").click(function() {
    $('.domainTabs').removeClass('active');
    $(this).addClass('active');
    var currentTab = $(this).attr('data-id');
    if (currentTab == "buyNewDomain") {
        $(".buyNewDomain").css('display', 'block');
        $(".alreadyHaveDomain").css('display', 'none');
    } else {
        $(".buyNewDomain").css('display', 'none');
        $(".alreadyHaveDomain").css('display', 'block');
    }
    emptyDomainRelatedMessage();
});


function emptyDomainRelatedMessage() {
    $('#domainMessagesCenter').removeClass('alert-danger').removeClass('alert-success').text('');
}

function domainRelatedMessage(message, isDanger = false) {
    if (isDanger) {
        $('#domainMessagesCenter').removeClass('alert-success').addClass('alert-danger').text(message);
    } else {
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
        domainRelatedMessage('Please Enter a valid domain', true);
        return false;
    } else {
        emptyDomainRelatedMessage();
        return true;
    }
}

$("#alreadyHaveADomain").click(function() {
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
    } else {
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


function dosomeActionRelatedToBusinessInformation() {
    var allPages = [];
    var elms = $(".boxRadioContainer.active");
    for (var i = 0; i < elms.length; i++) {
        var elm = elms[i];
        var elm = $(elm).siblings().text();
        allPages.push(elm.trim());
    }
    $("#hiddenPageSelected").val(allPages.toString());

}
window.dosomeActionRelatedToBusinessInformation = dosomeActionRelatedToBusinessInformation;

$("#needNewDomainSearch").click(function() {

    $(".domainListStuff").css('display', 'none');
    var domain = $("#searchForNewDomain").val();
    // var result = validateDomain(domain);
    var r = domainSearchNameValidate(domain);
    if (r) {
        $(".loaderSearch").removeClass('d-none');
        domainRelatedMessage('Searching... ');
        $(this).attr('disabled', 'disabled');
    } else {
        domainRelatedMessage('Enter a valid name', true);
        return false;
    }
    $.ajax({
            method: "get",
            url: "/domainSearch?q=" + domain
        })
        .done(function(data) {
            if (data.status == 0) {
                domainRelatedMessage(data.message, true);
                return false;
            }
            if (data.status == 1) {
                $(".domainListStuff").css('display', 'block');
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
                    var nextPart1 = '<div class="bg-white border col-sm-10 col-12 col-md-5 offset-md-2 p-2 pr-0 align-self-center" ><h5 class="float-left m-0">' + domainName + '</h5> <h5 class="mb-0 mr-3 float-right ' + textColor + '">' + status + '</h5></div>';
                    var nextPart2 = '<div class="col-md-3 col-sm-2 col-12 pl-0"><button class="btn btn-cstm rounded-0 shadow-none domainSelectBtn" type="button" ' + doWeNeedToDisable + ' data-selectedDomain="' + domainName + '" >SELECT</button></div></div>';
                    html += nextPart1 + nextPart2;
                }
                $("#domainsList").html('');
                $("#domainsList").html(html);

            }

        }).fail(function(err) {
            domainRelatedMessage('Something went wrong');
            console.log(err);
        }).always(function() {
            $(".loaderSearch").addClass('d-none');

            $("#needNewDomainSearch").removeAttr('disabled');

        });


});
