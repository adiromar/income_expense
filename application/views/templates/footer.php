
    <!-- Essential javascripts for application to work-->
    <script async="" src="//www.google-analytics.com/analytics.js"></script><script src="<?= base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="<?= base_url() ?>assets/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script>
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