        <div class="modal-dialog">
          <div class="logo-lalamove" style="text-align:center;"><img src="<?php echo base_url('assets/images/lalamove-logo.png'); ?>" alt=""></div>
          <div id="wallet-box2" class="topPad">
             
                 <!-- forget password -->
            <div class="modal-content">
              <div style="width:auto;height:auto;overflow: auto;position:relative; background:#f6f6f3;">
                <button type="button" class="close closeCross" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="signPanel">
                  <div id="user-login-box" class="noto-sans">
                    <div class="fnt-28 title dft-gry2 bld mg-btm-10"> Forgot Password </div>
                    <div class="mg-btm-10" style="font-size: 12px;"> Enter your registered <b>Email</b> address or <b>Mobile</b> number to reset your password. You will receive an email or a SMS from us shortly. </div>
                     <?php $attributes = array("name" => "forgotform");
                    echo form_open("user/forgot_password", $attributes); ?>
                      <input type="hidden" id="forgot_email" name="forgot_email" value="1">
                      <div class="form-email-mobile-ctn">
                        
                        <input id="username-input" type="email" name="email" value="" class="form-input-2 forgot-email" placeholder="Email">
                        <span class="text-danger eml-err"><?php echo form_error('email'); ?></span>
                        <!-- <input id="username-input" class="form-input-2" value="" type="text"> -->
                      </div>
                       <br>
                       
                      <div class="fnt-15 form-input-ctn mg-btm-15 fnt-15">
                        <!-- <input id="form-signin-btn" class="bdr-all dft-gry" value="Submit" type="submit"> -->
                        <button id="form-signin-btn" type="button" class="bdr-all dft-gry" onclick="submitForgotPassword()">Submit</button>
                      </div>
                       
                    <div class="form-input-ctn mg-top-5 mg-btm-5 alg-c">                       
                        <a id="user-signin" class="bg-none oge"  href="#model-signIn" data-toggle="modal"> Return to Login </a> 
                    </div>
                    </form>              
                  </div>
                </div>
              </div>
               
            </div>
              
 
          </div>
        </div>