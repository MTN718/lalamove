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