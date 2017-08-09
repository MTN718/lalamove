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





   



});

        $(document).ready(function() {
    });

        
$(window).load(function() {
        $('#industry').multiselect();
        $('#staff').multiselect();
    /*$('#industry').multiselect({
        columns: 1,
        placeholder: 'Industry'
    });
    $('#staff').multiselect({
        columns: 1,
        placeholder: '# of staff'
    });*/


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


//Login Model Start
$(document).on("click", ".login-email", function(event){
       $('.email-login').show();
        $('.mobile-login').hide();
});

$(document).on("click", ".login-mobile", function(event){
        $('.email-login').hide();
        $('.mobile-login').show();
});
//Login Model END