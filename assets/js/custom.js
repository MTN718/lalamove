var base_url = window.location.origin;

var username='';

$(document).ready(function() {


    $('#myTable').DataTable();    

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


    $('.showRecords').click(function(){        
        var party_id    = document.getElementById('party_id').value;
        if(party_id == '' || party_id == undefined){
            $("#model-signIn").modal('show');
            openLoginModal();
            return false;
        }
        var path = base_url+'/lalamove/home/records';
        window.location.href = path;        
    });

    $('.my_wallet').click(function(){
        var party_id    = document.getElementById('party_id').value;
        if(party_id == '' || party_id == undefined){
            $("#model-signIn").modal('show');
            openLoginModal();
            return false;
        }
        var path = base_url+'/lalamove/home/wallet';
        window.location.href = path;        
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

/* Click function to forgot password*/
$(document).on("click", ".user_forget", function(){
    
   var path = base_url+'/lalamove/user/forgot_password';
        $.ajax({
            url:path,
            type: 'POST',
            dataType: 'html',
            success: function(output_string){
                $("#model-signIn").modal('hide');
                $('.forgot_modal').html(output_string);
                $('.eml-err').html('');
                // $(".register-prsnl").css("display", "block"); 
                // $('#model-signUp').modal('show');
            }
        });
});


function submitForgotPassword(){
    var email = $('.forgot-email').val();forgot_email
    var forgot_email = $('#forgot_email').val();        
    
    var path = base_url+'/lalamove/user/forgot_password';
    $.ajax({
        url:path,
        type:'POST',
        data: {email: email, forgot_email: forgot_email},
        dataType:'JSON',
        success:function(data){        
            if(data.status == 'success'){
                alert(data['message']);
                $("#model-forget").modal('hide');
            }else{
                $('.eml-err').html(data['message']);
            }                       
        }
    });
}

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
                            $(".remaining_wallet_amt").val(data['walletAmount']);
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
        var mobile_code = $('.mobile_code option:selected').val();
            $('.mobile-danger').html('');
            $('.mpassword-danger').html('');
            $('.wrng-mbl-pwd').html('');
            var path = base_url+'/lalamove/user/login';    

                $.ajax({
                    url:path,
                    type:'POST',
                    data: {login_type: login_type, mobile: mobile, mobile_code: mobile_code, password: password},
                    dataType:'JSON',
                    success:function(data){
                            
                        if(data.status == 'success'){  
                            $(".party_id").val(data['user_id']);
                            $(".order_by").val(data['user_type']);
                            $(".remaining_wallet_amt").val(data['walletAmount']);
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
    var mobile_code = $('.mobile_code1 option:selected').val();    


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
                    data: {user_type: user_type, first_name: first_name, last_name: last_name, email: email, mobile: mobile, password: password, password_confirm: password_confirm, mobile_code: mobile_code},
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
    var mobile_code = $('.mobile_code2 option:selected').val();
alert(mobile_code);
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
                         company_name: company_name, industry: industry, staff: staff, mobile_code: mobile_code},
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

$('.wallet-check').click(function(){
    var party_id = $('.party_id').val();
    var path = base_url+'/lalamove/user/walletRecharge';
         $.ajax({
            url: path,
            type:'POST',
            data:{party_id: party_id},
            dataType: 'JSON',
            success: function(data){                
                if(data.status == 'success'){                    
                    $('#walletAmt').modal('show');
                    $('#wallet-input').html('$'+data.amount);                    
                }else{         
                    alert(data.message);
                }          
            } // End of success function of ajax form
        }); // End of ajax call
});

$('.useWallet').click(function(){
    var party_id = $('.party_id').val();
    var path = base_url+'/lalamove/user/walletRecharge';
        $.ajax({
            url: path,
            type:'POST',
            data:{party_id: party_id},
            dataType: 'JSON',
            success: function(data){
                if(data.status == 'success'){
                    
                    $('#walletAmt').modal('hide');
                    $('.wallet-check').css('pointer-events','none');
                    var adrate = $('.final_rate_before_discount').text().replace('$','');
                    var bdrate = $('.final_rate_after_discount').text().replace('$','');

                    if(adrate == bdrate){
                        var wallet_rate = adrate - data.amount;
                        if(wallet_rate <= 0){
                            $('.final_rate_before_discount').html('$0');
                            $('.final_rate_after_discount').html('$0');
                            $('.remaining_wallet_amt').val(Math.abs(wallet_rate));
                        }else{
                            $('.final_rate_before_discount').html('$'+wallet_rate);
                            $('.final_rate_after_discount').html('$'+wallet_rate);
                            $('.remaining_wallet_amt').val(0);
                        }
                    }else{
                        var wallet_rate = bdrate - data.amount;
                        if(wallet_rate <=0){
                            $('.final_rate_before_discount').html('$0');
                            $('.final_rate_after_discount').html('$0');
                            $('.remaining_wallet_amt').val(Math.abs(wallet_rate));
                        }else{
                            $('.final_rate_before_discount').html('$'+wallet_rate);
                            $('.final_rate_after_discount').html('$'+wallet_rate);
                            $('.remaining_wallet_amt').val(0);
                        }
                    }
                    // alert(wallet_rate);
                    // alert(Math.abs(wallet_rate));
                    console.log(data);
                }else{         
                    alert(data.message);
                    // $('.error-personal').html(data['email']);
                }          
            } // End of success function of ajax form
        }); // End of ajax call

});


function showDriver(){
    var party_id = $('.party_id').val();
    var path = base_url+'/lalamove/user/getFavoriteDriver';

    $.ajax({
        url: path,
        type: 'POST',
        data: {party_id: party_id},
        dataType: 'JSON',
        success: function(data){
            if(data.status == 'success'){                
                $('#favorite-driver').find('tbody').empty();
                $('#banned-driver').find('tbody').empty();                
                $.each(data.getDriver, function( index, value ) {
                    if(value.favStatus == 1){                        
                        var row = $("<tr><td>" + value.first_name + "</td><td>" + value.vehicle_no + "</td><td>" + value.vehicle_type_name + "</td><td><a href='#' class='removeFavDriver' onclick='removefavdri(" + value.party_driver_id + ")'><img src='"+base_url+"/lalamove/assets/images/removefav.png' height='25px;' width='25px'></a></td></tr>");
                        $("#favorite-driver").append(row);                    
                    }else if(value.favStatus == 0){
                        var bannedRow = $("<tr><td>" + value.first_name + "</td><td>" + value.vehicle_no + "</td><td>" + value.vehicle_type_name + "</td><td><a href='#' class='addFavDriver' onclick='addfavdri(" + value.party_driver_id + ")'><img class='addFavDriver' src='"+base_url+"/lalamove/assets/images/addfav.png' height='25px;' width='25px'></a></td></tr>");
                        $("#banned-driver").append(bannedRow);
                    }
                });
            }else{
                alert(data.message);
            }
            // location.reload();
        }
    });
}
$('.fav-driver-modal').click(function(){
    showDriver();
});

function removefavdri(party_driver_id){
    var path = base_url+'/lalamove/user/removeFavoriteDriver';
    var party_driver_id = party_driver_id;    
    var party_customer_id = $('.party_id').val();

    $.ajax({
        url: path,
        type: 'POST',
        data: {party_driver_id: party_driver_id, party_customer_id: party_customer_id},
        dataType: 'JSON',
        success: function(data){
            if(data.status == 'success'){                
                $('#favorite-driver').find('tbody').empty();
                $('#banned-driver').find('tbody').empty();
                showDriver();
            }
        }
    });

}

function addfavdri(party_driver_id){
    var path = base_url+'/lalamove/user/addFavoriteDriverUser';
    var party_driver_id = party_driver_id;    
    var party_customer_id = $('.party_id').val()

    $.ajax({
        url: path,
        type: 'POST',
        data: {party_driver_id: party_driver_id, party_customer_id: party_customer_id},
        dataType: 'JSON',
        success: function(data){
            if(data.status == 'success'){                
                $('#favorite-driver').find('tbody').empty();
                $('#banned-driver').find('tbody').empty();
                showDriver();
            }
        }
    });    
}

function cancelOrder(order_id){
 
    var path = base_url+'/lalamove/user/cancelOrder';
        $.ajax({
            url: path,
            type:'POST',
            data:{order_id: order_id},
            dataType: 'JSON',
            success: function(data){                
                location.reload();
            }
        });
}

function favoriteDriver(driver_id){
    order_id = $('.fav-driver').data('order_id');
    no = $('.fav-driver').data('no');
    party_id = $('.fav-driver').data('party_id');
    driver_id = driver_id;    
    var path = base_url+'/lalamove/user/favoriteDriver';
    $.ajax({
        url: path,
        type: 'POST',
        data: {order_id: order_id, no: no, party_id: party_id, driver_id: driver_id},
        dataType: 'JSON',
        success: function(data){
            if(data.status == 'success'){
                alert(data.message);
            }else{
                alert(data.message);
            }
            // location.reload();
        }
    });
}

/*$('.addDriver').click(function(){
    $('.inputDriver').show();
});*/
/*$('#add-driver-license-ok-btn').click(function(){
    var license_no = $('.license_no').val();
    var party_id = $('.party_id').val();
    if(license_no != ''){
        var path = base_url+'/lalamove/user/addDriverLicense';
         $.ajax({
            url: path,
            type: 'POST',
            data: {license_no: license_no, party_id: party_id},
            dataType: 'JSON',
            success: function(data){
                if(data.status == 'success'){
                    alert(data.message);
                    showDriver();
                }else{
                    alert(data.message);
                }
                // location.reload();
            }
    });
    }else{
        
    }
});*/

$('.enable_favdriver').click(function(){
    if($('.enable_favdriver').is(":checked")) {        
        var party_id = $('.party_id').val();    
        var path = base_url+'/lalamove/order/enableFavDriver';
        $.ajax({
                url: path,
                type: 'POST',
                data: {party_id: party_id},
                dataType: 'JSON',
                success: function(data){
                    if(data.status == 'success'){
                        $('.enable_favdriver').val(1);                        
                        alert(data.message);
                        showDriver();
                    }else{
                        $('.enable_favdriver').attr('checked', false); 
                        alert(data.error);
                    }                
                }
        });
    }else{
     $('.enable_favdriver').val(0);
    }
});

