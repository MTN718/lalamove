<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Sign up panel -->      
  <div class="modal-dialog">
      <div id="wallet-box3" class="topPad">         
         
      <div id="user-register-box" class="noto-sans">
          <div class="fnt-28 title dft-gry2 bld mg-btm-10"> Change Password </div>
              <?php $attributes = array("name" => "signupform");
              echo form_open("user/changePassword", $attributes); ?>    
    
                <div class="form-input-ctn">      
                    <i class="glyphicon glyphicon-lock user-ic"></i>&nbsp;&nbsp;&nbsp;
                    <input id="register-password-input" class="form-input-2 t-p-s psnl-pwd account-email-input" placeholder="Password" name="password" type="password" value="" />
                    <span class="text-danger error-personal pwd-err"></span>
                </div>
                <hr class="hr-cls">
                <div class="form-input-ctn">                          
                    <input type="password" id="register-password-input" class="form-input-2 t-p-s cnf-pwd account-email-input" placeholder="Confirm Password" id="password_confirm" value="" name="password_confirm" >
                    <span class="text-danger error-personal cnf-err"></span>          
                </div>
                <hr class="hr-cls">
                <br>
                <div class="fnt-15 form-input-ctn dft-gry alg-c mg-btm-15">      
                    <button id="form-register-btn" type="button" class="lightbox-btn-pwd dismisss-btn" data-dismiss="modal"> Dismisss </button>
                    <button id="form-register-btn" type="button" class="lightbox-btn-pwd" onclick="submitPassword()"> Submit </button>
                </div>    
              </form>
  
      </div> 
      </div>
  </div>
      
      
     
   
  
  

 