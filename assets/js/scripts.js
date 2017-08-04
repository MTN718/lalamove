(function($) {
    "use strict";

    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 60
    });

    $('#topNav').affix({
        offset: {
            top: 200
        }
    });
    
    new WOW().init();
    
    $('a.page-scroll').bind('click', function(event) {
        var $ele = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($ele.attr('href')).offset().top - 60)
        }, 1450, 'easeInOutExpo');
        event.preventDefault();
    });
    
    $('.navbar-collapse ul li a').click(function() {
        /* always close responsive nav after click */
        $('.navbar-toggle:visible').click();
    });

    $('#galleryModal').on('show.bs.modal', function (e) {
       $('#galleryImage').attr("src",$(e.relatedTarget).data("src"));
    });

})(jQuery);

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

$('.typeahead').typeahead({
  source: function (typeahead, query) {
   /* put your ajax call here..
   return $.get('/typeahead', { query: query }, function (data) {
      return typeahead.process(data);
   });
   */
   return ['alpha','beta','bravo','delta','epsilon','gamma','zulu'];
  }
});
    $("[rel='tooltip']").tooltip();    
 
    $('.thumbnail').hover(
        function(){
            $(this).find('.caption').slideDown(250); //.fadeIn(250)
        },
        function(){
            $(this).find('.caption').slideUp(250); //.fadeOut(205)
        }
    ); 
 $(document).ready(function() {
        $('#additional-service-btn').click(function(){
      $('.overlay-menu').slideToggle('slow');
      });
        $('#more-info-link').click(function(){
      $('#service-type-info-overlay').slideToggle('slow');
      });

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
    
    $('#toll-tunnels-btn').click(function(){
      $('.overlay-menu').slideToggle('slow');
      });
    
    
       
     $('.overlay-back-btn').click(function(){
      $('.overlay-menu').hide('slow');
      }); 
      
$(document).ready(function(){
    $('.business-btn').click(function(){
        // $('.error-company').hide();
        $('.business').show();
        $('.personal').hide();
    });
    $('.personal-btn').click(function(){
        $('.business').hide();
        $('.personal').show();
    });


    $('#industry').multiselect({
        columns: 1,
        placeholder: 'Industry'
    });
    $('#staff').multiselect({
        columns: 1,
        placeholder: '# of staff'
    });

    $('.login-email').click(function(){

        $('.email-login').show();
        $('.mobile-login').hide();
    });
    $('.login-mobile').click(function(){
        $('.email-login').hide();
        $('.mobile-login').show();
    });



});

$(window).load(function() {
    var value = $('.company-onload').val();
        if(value==1){
            $('.personal').hide();
            $('.business').show();
            $('.error-personal').hide();
        }

    var login_val = $('.login-onload').val();
        if(login_val==1){
            $('.mobile-login').show();
            $('.email-login').hide();
            $('.email-error').hide();
            $(".login-mobile").attr('checked', true);
        }

});