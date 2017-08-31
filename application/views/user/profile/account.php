<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Sign up panel -->
      
        <div class="modal-dialog">
          
          <div id="wallet-box3" class="topPad">           
            <div id="user-register-box" class="noto-sans">
  <h3 class="title dft-gry2 bld mg-btm-10"> Account Information </h3>
  <div class="main-div">
    
  <!-- <form id="register-form" action="javascript:void(0);"> -->
  <?php $attributes = array("name" => "signupform");
      echo form_open("user/account", $attributes); ?>
      
    <div class="form-input-ctn ">
      <div class="firstname-input-ctn flt-l">
      <i class="glyphicon glyphicon-user user-ic"></i>&nbsp;&nbsp;&nbsp;
        <input readonly="" class="form-input psnl-first_name account-name-input" id="register-name-input" name="first_name" type="text" value="<?php echo $FIRST_NAME ?>" />
      </div>
      <div class="lastname-input-ctn flt-r">
        <input readonly="" class="form-input psnl-last_name account-name-input" name="last_name" id="register-lastname-input" type="text" value="<?php echo $LAST_NAME; ?>" />
      </div>
    </div>
      <hr class="hr-cls">
    <div class="form-input-ctn">
    <i class="glyphicon glyphicon-envelope user-ic"></i>&nbsp;&nbsp;&nbsp;
      <input readonly="" class="form-input-2 psnl-email account-email-input" id="register-email-input" name="email" type="text" value="<?php echo $USER_LOGIN_ID; ?>" />
    </div>
    <hr class="hr-cls">
    
  
    <div class="form-input-ctn">
    <i class="glyphicon glyphicon-earphone user-ic"></i>&nbsp;&nbsp;&nbsp;
      <input readonly="" id="register-password-input" class="form-input-2 t-p-s psnl-pwd account-email-input" name="mobile" type="text" value="<?php echo $USER_MOBILE; ?>" />      
    </div>
    <hr class="hr-cls">
    <br>  
    <div class="form-input-ctn">
      <div class="account-pwd">
        <i class="glyphicon glyphicon-lock user-ic"></i>&nbsp;&nbsp;&nbsp;
        <a id="change-pwd" href="#model-changePassword" class="profile-settings-btn" href="javascript:void(0);" onclick="changePassword()"> Change Password </a>    
      </div>      
    </div>

   
    <br>
    <div class="fnt-15 form-input-ctn dft-gry alg-c mg-btm-15">      
      <button id="form-register-btn" type="button" class="lightbox-btn-cstm" data-dismiss="modal"> OK </button>
    </div>
    
  </form>
  
  </div>
</div>

 
          </div>
        </div>
      
      
     
   
  
  

 