<script src="{{ asset('mawaisnow/able/assets/plugins/sweetalert/sweetalert2.min.js') }}" charset="utf-8"></script>
<link rel="stylesheet" href="{{ asset('mawaisnow/able/assets/plugins/sweetalert/sweetalert2.min.css') }}">
<form class="d-none" id="hiddenFormForGenPurpose" action="" method="post">

</form>
<script type="text/javascript">
    function fireSwal(obj) {
        if (!('title' in obj)) {
            obj.title = 'Are you sure?';
        }
        if (!('html' in obj)) {
            obj.html = "You won't be able to revert this!";
        }

        if (!('confirmButtonText' in obj)) {
            obj.confirmButtonText = 'Yes, delete it!';
        }
        obj.confirmButtonColor = '#3085d6';
        obj.cancelButtonColor = '#d33';
        obj.icon = 'warning';
        obj.showCancelButton = true;

        Swal.fire(obj).then((result) => {
            if (result.value) {
                if (('yes' in obj)) {
                    obj.yes();
                }
            } else {
                if (('no' in obj)) {
                    obj.no();
                }
            }
        });
    }

    $(".deleteConfirm").click(function() {

        var obj = {};
        if ($(this).attr('data-title') != undefined && $(this).attr('data-title').length > 2) {
            obj.title = $(this).attr('data-title');
        }
        if ($(this).attr('data-html') != undefined && $(this).attr('data-html').length > 2) {
            obj.html = $(this).attr('data-html');
        }
        if ($(this).attr('data-confirmButtonText') != undefined && $(this).attr('data-confirmButtonText').length > 2) {
            obj.confirmButtonText = $(this).attr('data-confirmButtonText');
        }
        try {
          var dataObj = $(this).attr('data-obj');
          var dataObj = JSON.parse(dataObj);

          $("#hiddenFormForGenPurpose").empty();
          $("#hiddenFormForGenPurpose").attr('action', dataObj['url']);

          $("#hiddenFormForGenPurpose").attr('method', 'POST');
          var input = "<input type='hidden' name='_method' value=' " + dataObj['method'] + " '/>";
          $("#hiddenFormForGenPurpose").append(input);

          if (dataObj.method == undefined || dataObj.method == "get") {
            $("#hiddenFormForGenPurpose").attr('method', 'GET');
          }
          var input = '@csrf';
          $("#hiddenFormForGenPurpose").append(input);
          for (var key in dataObj) {
            if (dataObj.hasOwnProperty(key)) {
              console.log();
              var input = "<input type='hidden' name='" + key + " ' value=' " + dataObj[key] + " '/>";
              $("#hiddenFormForGenPurpose").append(input);
            }
          }
        } catch (e) {}
        obj.yes = function() {
          $("#hiddenFormForGenPurpose").submit();
        }
        fireSwal(obj);
    });
</script>
