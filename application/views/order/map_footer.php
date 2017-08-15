</body>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> -->
<script src="<?php echo base_url();?>assets/js/jquery.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>assets/js/jquery.datetimepicker.full.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>assets/js/bootstrap-multiselect.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>assets/js/scripts.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>assets/js/custom.js" type="text/javascript"></script> 
<script src="<?php echo base_url();?>assets/js/map.js" type="text/javascript"></script> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgf4koP2rKWwdNatZvK1foprSqOdHRlVw&libraries=places&callback=initMap"  async defer></script>

<script> 
$('#openBtn').click(function(){
    $('#myModal').modal({show:true})
});$('#myTab a').click(function (e) {
   e.preventDefault();
   $(this).tab('show');
});

$(function () {
$('#myTab a:last').tab('show');
})
$("[data-toggle=tooltip]").tooltip();
$("[data-toggle=popover]").popover();
$(".alert").delay(200).addClass("in").fadeOut(3500);

$(".alert").addClass("in").fadeOut(3500);

/*$('.typeahead').typeahead({
  source: function (typeahead, query) {
    put your ajax call here..
   return $.get('/typeahead', { query: query }, function (data) {
      return typeahead.process(data);
   });
   
   return ['alpha','beta','bravo','delta','epsilon','gamma','zulu'];
  }
});*/
    $("[rel='tooltip']").tooltip();    
 
    $('.thumbnail').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    ); 
</script> 

<!-- js for dropdown --> 
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script> 
<script>
      $(document).ready(function() {
        $('#additional-service-btn').click(function(){
      $('.overlay-menu').slideToggle('slow');
      });
        $('#more-info-link').click(function(){
      $('#service-type-info-overlay').slideToggle('slow');
      });
      
      });
    
    $('#toll-tunnels-btn').click(function(){
      $('.overlay-menu').slideToggle('slow');
      });
    
    
       
     $('.overlay-back-btn').click(function(){
      $('.overlay-menu').hide('slow');
      }); 
      
    
    
      </script>
</html>




