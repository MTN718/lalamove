var base_url = window.location.origin;

var username='';

$(document).ready(function() {


/* Click function to load login page */
    $('.user_signin').click(function(){
        var path = base_url+'/lalamove/user/login';
        
        $.ajax({
            url: path,
            type:'POST',
            dataType: 'html',
            success: function(output_string){                
                $('.login-text').html(output_string);
            } // End of success function of ajax form
        }); // End of ajax call
    });


});

function openLoginModal(){
    var path = base_url+'/lalamove/user/login';
        
        $.ajax({
            url: path,
            type:'POST',
            dataType: 'html',
            success: function(output_string){                
                $('.login-text').html(output_string);
            } // End of success function of ajax form
        }); // End of ajax call
}

/* Click function to registration*/
$(document).on("click", ".user_register", function(){
    
   var path = base_url+'/lalamove/user/register';
        $.ajax({
            url:path,
            type: 'POST',
            dataType: 'html',
            success: function(output_string){
                $("#model-signIn").modal('hide');                
                $('.registration-text').html(output_string);
                $(".register-prsnl").css("display", "block"); 
                // $('#model-signUp').modal('show');
            }
        });
});

/*Email login*/
function submitLoginFormEmail(){
    var login_type = $('#login_type').val();
    
        var email = $('#username-input').val();    
        var password = $('#password-input').val();
            $('.email-danger').html('');
            $('.password-danger').html('');
            $('.wrng-eml-pwd').html('');
            var path = base_url+'/lalamove/user/login';    

                $.ajax({
                    url:path,
                    type:'POST',
                    data: {login_type: login_type, email: email, password: password},
                    dataType:'JSON',
                    success:function(data){
                            
                        if(data.status == 'success'){ 
                            $(".party_id").val(data['user_id']);
                            $(".order_by").val(data['user_type']);
                            $("#order-username-input").val(data['name']);
                            $("#user-login-name").html(data['name']);
                            $("#user-login-name").removeClass('hide');
                            $("#user-profile-name").addClass('hide');
                            var username = data['name'];
                            $(".account").removeClass('hide');
                            $(".wallet").removeClass('hide');
                            $(".settings").removeClass('hide');
                            $(".logout").removeClass('hide');
                            $(".login").addClass('hide');
                            $("#order-user-phone-input").val(data['mobile']);
                            $("#model-signIn").modal('hide');
                            $('.login-header').hide();
                            $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
                            $("#success-alert").slideUp(500);
                                });
                        }else{
                            $('.email-danger').html(data['email_error_message']);
                            $('.password-danger').html(data['pass_error_message']);
                            $('.wrng-eml-pwd').html(data['error']);
                            data["email_error_message"]=null;
                            data["pass_error_message"]=null;
                            data["error"]=null;
                        }
                     
                    }
                });
    
    
}

/*Mobile login*/
function submitLoginFormMobile(){
        var login_type = $('#login_type_mobile').val();        
        var mobile = $('.mobile-cls').val();    
        var password = $('.mpass-cls').val();
            $('.mobile-danger').html('');
            $('.mpassword-danger').html('');
            $('.wrng-mbl-pwd').html('');
            var path = base_url+'/lalamove/user/login';    

                $.ajax({
                    url:path,
                    type:'POST',
                    data: {login_type: login_type, mobile: mobile, password: password},
                    dataType:'JSON',
                    success:function(data){
                            
                        if(data.status == 'success'){  
                            $(".party_id").val(data['user_id']);
                            $(".order_by").val(data['user_type']);
                            $("#order-username-input").val(data['name']);
                            $("#user-login-name").html(data['name']);
                            $("#user-login-name").removeClass('hide');
                            $("#user-profile-name").addClass('hide');
                            var username = data['name'];
                            $(".account").removeClass('hide');
                            $(".settings").removeClass('hide');
                            $(".logout").removeClass('hide');
                            $(".wallet").removeClass('hide');
                            $(".login").addClass('hide');
                            $("#order-user-phone-input").val(data['mobile']);
                            $("#model-signIn").modal('hide');
                            $('.login-header').hide();
                            $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
                            $("#success-alert").slideUp(500);
                                });                            
                        }else{
                            $('.mobile-danger').html(data['email_error_message']);
                            $('.mpassword-danger').html(data['pass_error_message']);
                            $('.wrng-mbl-pwd').html(data['error']);
                            data["email_error_message"]=null;
                            data["pass_error_message"]=null;
                            data["error"]=null;
                        }                       
                    }
                });

}

/* Registration form personal*/
function submitRegistrationPersonal(){
    var user_type = $('#userType').val();
    var first_name = $('.psnl-first_name').val();
    var last_name = $('.psnl-last_name').val();
    var email = $('.psnl-email').val();
    var mobile = $('.psnl-mobile').val();
    var password = $('.psnl-pwd').val();
    var password_confirm = $('.cnf-pwd').val();

        $('.fname-err').html('');
        $('.lname-err').html('');
        $('.email-err').html('');
        $('.mobile-err').html('');
        $('.pwd-err').html('');
        $('.cnf-err').html('');
    
    var path = base_url+'/lalamove/user/register';
    
                $.ajax({
                    url:path,
                    type:'POST',
                    data: {user_type: user_type, first_name: first_name, last_name: last_name, email: email, mobile: mobile, password: password, password_confirm: password_confirm},
                    dataType:'JSON',
                    success:function(data){
                            
                        if(data.status == 'success'){                    
                            window.location.href = base_url+"/lalamove/home/";
                            $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
                            $("#success-alert").slideUp(500);
                        });
                        }else{
                            $('.fname-err').html(data['first_name']);
                            $('.lname-err').html(data['last_name']);
                            $('.email-err').html(data['email']);
                            $('.mobile-err').html(data['mobile']);
                            $('.pwd-err').html(data['password']);
                            $('.cnf-err').html(data['password_confirm']);
                        }                       
                    }
                });
}


/* Registration form business*/
function submitRegistrationBusiness(){
    var user_type = $('#user_type').val();
    var first_name = $('.busns-first_name').val();
    var last_name = $('.busns-last_name').val();
    var email = $('.busns-email').val();
    var mobile = $('.busns-mobile').val();
    var password = $('.busns-pwd').val();
    var password_confirm = $('.busns-cnf_pwd').val();
    var company_name = $('.company-name').val();
    var industry = $('.busns-industry').val();
    var staff = $('.busns-staff').val();

            $('.bfname-err').html('');
            $('.blname-err').html('');
            $('.bemail-err').html('');
            $('.bmobile-err').html('');
            $('.bpwd-err').html('');
            $('.bcnf-pwd-err').html('');
            $('.bcmpny-name').html('');
            $('.industry-err').html('');
            $('.staff-err').html('');
    var path = base_url+'/lalamove/user/register';

             $.ajax({
                    url:path,
                    type:'POST',
                    data: {user_type: user_type, first_name: first_name, last_name: last_name, email: email, mobile: mobile, password: password, password_confirm: password_confirm,
                         company_name: company_name, industry: industry, staff: staff },
                    dataType:'JSON',
                    success:function(data){
                            
                        if(data.status == 'success'){                    
                            window.location.href = base_url+"/lalamove/home/";
                            $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
                            $("#success-alert").slideUp(500);
                        });
                        }else{
                            $('.bfname-err').html(data['first_name']);
                            $('.blname-err').html(data['last_name']);
                            $('.bemail-err').html(data['email']);
                            $('.bmobile-err').html(data['mobile']);
                            $('.bpwd-err').html(data['password']);
                            $('.bcnf-pwd-err').html(data['password_confirm']);
                            $('.bcmpny-name').html(data['company_name']);
                            $('.industry-err').html(data['industry']);
                            $('.staff-err').html(data['staff']);
                        }                       
                    }
                });

}

function backRegister(){    
    $('#model-business').modal('hide1');
}
    
// loginCheck();
// function loginCheck(){
    var partyID = $(".party_id").val();
    var orderBY = $(".order_by").val();    
    
    if(partyID == '' || orderBY == ''){
        }else{
            
            $("#user-profile-name").html(username);
            $("#user-login-name").removeClass('hide');
            $("#user-profile-name").addClass('hide');
            $(".account").removeClass('hide');
            $(".settings").removeClass('hide');
            $(".logout").removeClass('hide');
            $(".wallet").removeClass('hide');
            $(".login").addClass('hide');
    }
// }


    $('.account_click').click(function(){
    // alert('fff');return;
    var party_id = $('.party_id').val();
    var path = base_url+'/lalamove/user/account';
        
        $.ajax({
            url: path,
            type:'POST',
            data:{party_id:party_id},
            dataType: 'html',
            success: function(output_string){                
                $('.account-text').html(output_string);
            } // End of success function of ajax form
        }); // End of ajax call
    });

  $('.settings_click').click(function(){    
    var party_id = $('.party_id').val();
    var path = base_url+'/lalamove/user/billing';
        
        $.ajax({
            url: path,
            type:'POST',
            data:{party_id:party_id},
            dataType: 'html',
            success: function(output_string){                
                $('.settings-text').html(output_string);
            } // End of success function of ajax form
        }); // End of ajax call
    });

  function changePassword(){
    var party_id = $('.party_id').val();
    var path = base_url+'/lalamove/user/changePassword';

    $.ajax({
            url: path,
            type:'POST',            
            dataType: 'html',
            success: function(output_string){
                // $('#model-account').modal('hide');
                $('.account-text').html(output_string);
            } // End of success function of ajax form
        }); // End of ajax call

  }

  /* Registration form personal*/
function submitPassword(){
    var party_id = $('.party_id').val();
    var password = $('.psnl-pwd').val();
    var password_confirm = $('.cnf-pwd').val();

        $('.pwd-err').html('');
        $('.cnf-err').html('');
    
    var path = base_url+'/lalamove/user/changePassword';
    
                $.ajax({
                    url:path,
                    type:'POST',
                    data: {party_id: party_id, password: password, password_confirm: password_confirm},
                    dataType:'JSON',
                    success:function(data){
                            
                        if(data.status == 'success'){                    
                            alert(data.message);
                            $('#model-account').modal('hide');
                        }else{                           
                            $('.pwd-err').html(data['password']);
                            $('.cnf-err').html(data['password_confirm']);
                        }                       
                    }
                });
}

/* Click function to e-receipts*/
$(document).on("click", ".e_receipt", function(){
   
    if($('#e_receipt').val() == "YES"){       
        $('#e_receipt').val('NO');
    }else{
        $('#e_receipt').val('YES');
    }
});

function updateReceiptEmail(){
    var party_id = $('.party_id').val();
    var email = $('#receipt-email-input').val();
    var e_receipt = $('#e_receipt').val();
    // $('.email-err').html('');

        var path = base_url+'/lalamove/user/updateReceiptEmail';
         $.ajax({
            url: path,
            type:'POST',
            data:{party_id: party_id, email: email, e_receipt: e_receipt},
            dataType: 'JSON',
            success: function(data){                
                if(data.status == 'success'){                    
                    $('#model-settings').modal('hide');
                    alert(data.message);
                }else{         
                console.log('else');
                    $('.error-personal').html(data['email']);
                }          
            } // End of success function of ajax form
        }); // End of ajax call
}