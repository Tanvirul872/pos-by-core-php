
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="assets/vendors/chart.js/Chart.min.js"></script>
<script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
<script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="assets/js/off-canvas.js"></script>
<script src="assets/js/hoverable-collapse.js"></script>
<script src="assets/js/misc.js"></script>
<script src="assets/js/settings.js"></script>
<script src="assets/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="assets/js/dashboard.js"></script>
<!-- End custom js for this page -->


<!-- <style type="text/css">
    .form-inline .form-group{display:inline-block;margin-bottom:0;vertical-align:middle}
    .form-inline .form-control{display:inline-block;width:auto;vertical-align:middle}
    .form-inline .form-control-static{display:inline-block}
</style> -->

<link rel="stylesheet" >
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

  <script type="text/javascript">
      $(function(){
         $("#dt").datepicker({
             dateformat: 'yy-mm-dd',
             defaultDate:"+1w",
             changeMonth:true,
             changeYear:true,
             numberOfMonths:1,
             startDate:'2020-12-05',
             onclose:function(selectedDate){
                 $("#dt2").datepicker("option","minDate",selectedDate)
             }
         }); 

         $("#dt2").datepicker({
            dateformat: 'yy-mm-dd',
             defaultDate:"+1w",
             changeMonth:true,
             changeYear:true,
             numberOfMonths:1,

         }); 
      });
  </script>

<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      
      <!-- Javascript -->
      <script>
         $(function() {
            $( "#datepicker-13" ).datepicker();
            $( "#datepicker-13" ).datepicker("show");
         });
      </script>  


</body>
</html>
