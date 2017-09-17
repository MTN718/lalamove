<!-- this footer will not be shown on login page -->
<?php if ($inner_view != 'common/login') { ?>
  <!-- <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Designed and Developed by <a href="http://www.karyonsolutions.com"><strong>Karyon Solutions</strong></a>
    </div>
    <strong>&copy; <?php echo date('Y'); ?></strong> All rights reserved by <strong>Karyon Solutions</strong>
  </footer> -->
<?php } ?>
</div>
</body>
<!-- getting this scripts from karyon_config.php file which is under application > config folder -->
<?php
foreach ($scripts['foot'] as $file) {
    echo "<script src='$file'></script>";
}
?>
<script>
    $(function () {
        $("#WYSIHTML").wysihtml5();
        $("#WYSIHTML1").wysihtml5();
        $("#WYSIHTML2").wysihtml5();
        $("#WYSIHTML3").wysihtml5();
    });

    //Date range picker
    $('.datepicker').daterangepicker();
 
</script>
<script>
    $(function () {
        //Date for the calendar events (dummy data)
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultView: 'agendaWeek',
            buttonText: {
                today: 'today',
                month: 'month',
                week: 'week',
                day: 'day'
            },
            eventSources: ['<?php echo site_url('customer_controller/getcalendardata?user_id=' . $userInfo->user_id); ?>'],
        });
    });
</script>
<script>
    $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });
        $('#example22').DataTable({
            "ordering": false,
            "lengthChange": false,
            "autoWidth": false,
        });
        $('#example23').DataTable({
            "lengthChange": false,
            "autoWidth": false,
        });
        $('#example24').DataTable({
            "lengthChange": false,
            "autoWidth": false,
        });
        $('#example25').DataTable({
            "lengthChange": false,
            "autoWidth": false,
        });
        $("#example3").DataTable();
        $("#example4").DataTable();
        $("#example5").DataTable();
        $("#example6").DataTable();
    });
</script>


  <script>
    function deleteMail() {
      $('#deleteMail').submit();
    }
  </script>





  
</html>
