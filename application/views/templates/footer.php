
    <!-- Essential javascripts for application to work-->
    <script async="" src="//www.google-analytics.com/analytics.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= base_url() ?>assets/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->

    <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="<?= base_url() ?>assets/js/plugins/sweetalert.min.js"></script>

    <script>
      $('#datepicker1').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
      });

      $('#datepicker2').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
      });

      $('.demoSwal').click(function(){
        tbl = $(this).data('tbl');
        id = $(this).data('id');
        
        swal({
          title: "Are you sure?",
          text: "You will not be able to recover this file!",
          type: "warning",
          showCancelButton: true,
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel plx!",
          closeOnConfirm: false,
          closeOnCancel: false
        }, function(isConfirm) {
          if (isConfirm) {

            swal("Deleted!", "Your file has been deleted.", "success");
          } else {
            swal("Cancelled", "Your file is safe :)", "error");
          }
        });
      });

      // 
$("#filter").click(function(e) {
  e.preventDefault();
  var date1 = $("#datepicker1").val();
  var date2 = $("#datepicker2").val();
  // alert(date1);
  var dataString = '&date1='+date1+'&date2='+date2;

  $.ajax({
    type:'POST',
    data:dataString,
    url:'<?= base_url(); ?>admin/saving_calculator',
    beforeSend: function() {
      $(".response").hide();
        $(".loading-img").show();
  },
    success: function (resp) {
      
      setTimeout(function() { 
        $(".loading-img").hide();
        $(".response").show();
      $('.response').html(resp); 
    }, 2500);
         
    },
    error: function (xhr, ajaxOptions, thrownError) {
      $(".loading-img").hide();
      $(".response").show();
        var errorMsg = 'Request Failed: ' + xhr.responseText;
      $('.response').html(errorMsg);
    }
  });
});


      $('#dropdownYear').each(function() {

      var year = (new Date()).getFullYear();
      var current = year;
      year -= 3;
      for (var i = 0; i < 6; i++) {
        if ((year+i) == current)
          $(this).append('<option selected value="' + (year + i) + '">' + (year + i) + '</option>');
        else
          $(this).append('<option value="' + (year + i) + '">' + (year + i) + '</option>');
      }

    })
    </script>
  
</body></html>