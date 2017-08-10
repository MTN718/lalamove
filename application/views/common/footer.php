<!-- footer panel -->
<section class="footerpanel">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12 col-lg-12">
        <!-- logo -->
        <div class="col-md-3 footlogo"><img src="<?php echo base_url('assets/images/logoFooter.png');?>" alt=""></div>

        <!-- navigation -->
        <div class="col-xs-12 col-sm-12 col-md-6 foot_nav_panel">
          <ul class="foot_nav">
            <li class="col-sm-12 col-md-4"> <span>company</span>
              <ul>
                <li> <a href="#">contact us</a></li>
                <li> <a href="#">careers</a></li>
              </ul>
            </li>
            <li class="col-sm-12  col-md-4"> <span>cites</span>
              <ul>
                <li> <a href="#">Bangkok</a></li>
                <li> <a href="#">Manila</a></li>
                <li> <a href="#">Bangkok</a></li>
                <li> <a href="#">Manila</a></li>
                <li> <a href="#">Bangkok</a></li>
                <li> <a href="#">Manila</a></li>
              </ul>
            </li>
            <li class="col-sm-12  col-md-4"> <span>company</span>
              <ul>
                <li> <a href="#">contact us</a></li>
                <li> <a href="#">careers</a></li>
              </ul>
            </li>
          </ul>
        </div>

        <!-- social media -->
        <div class="col-xs-12 col-sm-12 col-md-3 app_icons">
          <h4>download user app !</h4>
          <a href="#"><img src="<?php echo base_url('assets/images/as_img.png'); ?>"></a> <a href="#"><img src="<?php echo base_url('assets/images/gp_img.png'); ?>"></a> </div>
      </div>
    </div>
  </div>
</section>
</body>
<!-- jQuery -->
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script>
     var lastScrollTop = 0;
     $(window).scroll(function (event) {
     //    console.log($(this).scrollTop());
         var st = $(this).scrollTop();
         if (st > lastScrollTop) {
             // downscroll code
             //console.log("down");
             $('.mainheader').addClass("sticky");  //hide
         } else {
             // upscroll code
             //console.log("up");
             $('.mainheader').removeClass("sticky");
         }
         lastScrollTop = st;
         if ($(this).scrollTop() > 0)
         {
             $('.mainheader').addClass("bg_header");
         }else
         {
             $('.mainheader').removeClass("bg_header");
         }
     });
 </script>
</html>
