<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div>
    <div class="logo-ctn"> <a class="logo-link" href="/" target="_self"> <img src="<?php echo base_url('assets/images/lalamove-logo.png'); ?>" alt=" " width="176" height="40"> </a> </div>
    <div id="header-menu-ctn">
      <div id="tutorial-ctn"> <a id="tutorial" class="header-menu-btn cursor-ptr dft-gry"> Tutorial </a> </div>
      <div id="user-profile-ctn" class="dropdown"> <a id="user-profile" class="header-menu-btn cursor-ptr dft-gry dropdown-toggle"  href="#" class="" data-toggle="dropdown"> <span id="user-profile-name" class="ellipsis">Guest</span> <span class="down-arrow-icon"></span> </a>
        <ul class="dropdown-menu" role="menu">
          <li><a id="about-us" class="user-profile-icon cursor-ptr"> About Us </a></li>
          <li><a id="user-signin" class="user-profile-icon cursor-ptr"  href="#model-signIn" data-toggle="modal"> Sign In </a></li>
        </ul>
      </div>
      
      <!-- user sign in panel -->
      <div id="model-signIn" class="modal fade ogBox mybulletPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="logo-lalamove" style="text-align:center;"><img src="<?php echo base_url('assets/images/lalamove-logo.png'); ?>" alt=""></div>
          <div id="wallet-box" class="topPad">
            <div class="modal-content">
              <div style="width:auto;height:auto;overflow: auto;position:relative; background:#f6f6f3;">
                <button type="button" class="close closeCross" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="signPanel">
                  <div id="user-login-box" class="noto-sans">
                    <?php if (isset($loginType)) { ?>
        	<input type="hidden" name="login" class="login-onload" value="<?php echo $loginType; ?>">
        <?php } ?>
                    <div class="fnt-28 title dft-gry2 bld mg-btm-10"> Login </div>
                    <form id="login-form" action="javascript:void(0);">
                      <div class="form-email-mobile-ctn">
                        <div class="emailMobileRadio">
                          <div class="custom-radio form-email-btn">
                            <input name="" type="radio" value="">
                            <label class="emailLbl"> Email </label>
                          </div>
                          <div class="custom-radio form-mobile-btn">
                            <input name="" type="radio" value="">
                            <label class="mobileLbl"> Mobile </label>
                          </div>
                        </div>
                        <div id="country-list-ctn" class="cursor-ptr dis-none flt-l" style="display: inline-block; position: absolute; top: 1rem; left: 9rem; right: 0px; float: left;">
                          <div class="width-70 flt-l" style="margin-left:10px;">
                              <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="border:none; background:none; padding:0;">
                                <img class="va-m" src="http://pro.lalamove.com/assets/img/login-box/hk-flag.png" width="20px"> <span class="caret"></span>
                                <div id="areacode" class="inl-blck lgt-gry2 va-t hide" value="852"> Hong Kong </div>
                              </a>
                              <ul class="dropdown-menu" role="menu" style="top:1e2;">
                                <li><a href="#"><img class="area-code-style" src="http://pro.lalamove.com/assets/img/login-box/th-flag.png"> Bangkok</a></li>
                                <li><a href="#"><img class="area-code-style" src="http://pro.lalamove.com/assets/img/login-box/th-flag.png"> Bangkok</a></li>
                                <li><a href="#"><img class="area-code-style" src="http://pro.lalamove.com/assets/img/login-box/th-flag.png"> Bangkok</a></li>
                                <li><a href="#"><img class="area-code-style" src="http://pro.lalamove.com/assets/img/login-box/th-flag.png"> Bangkok</a></li>
                                <li><a href="#"><img class="area-code-style" src="http://pro.lalamove.com/assets/img/login-box/th-flag.png"> Bangkok</a></li>
                              </ul>
                            </div>
                               
                        </div>
                        <div id="country-list-ctn" class="cursor-ptr dis-none flt-l">
                          <div class="width-70 flt-l"> <a id="country-list-picker" class="country-list-dropdown-btn cursor-ptr"> <img src="http://pro.lalamove.com/assets/img/login-box/hk-flag.png" class="va-m" width="20px"> </a>
                            <div class="country-list-menu-box dft-menubox">
                              <div id="country-selected"> <img class="area-code-style" src="http://pro.lalamove.com/assets/img/login-box/th-flag.png">
                                <div id="areacode" class="inl-blck lgt-gry2 va-t" style="padding-top: 6px;" value="66"> Bangkok </div>
                              </div>
                              <div id="country-selected"> <img class="area-code-style" src="http://pro.lalamove.com/assets/img/login-box/hk-flag.png">
                                <div id="areacode" class="inl-blck lgt-gry2 va-t" style="padding-top: 6px;" value="852"> Hong Kong </div>
                              </div>
                              <div id="country-selected"> <img class="area-code-style" src="http://pro.lalamove.com/assets/img/login-box/ph-flag.png">
                                <div id="areacode" class="inl-blck lgt-gry2 va-t" style="padding-top: 6px;" value="63"> Manila </div>
                              </div>
                              <div id="country-selected"> <img class="area-code-style" src="http://pro.lalamove.com/assets/img/login-box/sg-flag.png">
                                <div id="areacode" class="inl-blck lgt-gry2 va-t" style="padding-top: 6px;" value="65"> Singapore </div>
                              </div>
                              <div id="country-selected"> <img class="area-code-style" src="http://pro.lalamove.com/assets/img/login-box/tw-flag.png">
                                <div id="areacode" class="inl-blck lgt-gry2 va-t" style="padding-top: 6px;" value="886"> Taipei </div>
                              </div>
                            </div>
                          </div>
                          <div class="wdth-20 flt-r"> <span class="icon-dropdown va-m"></span> </div>
                          <input id="country-code-hidden" value="852" type="hidden">
                          <input id="hidden_cokkie" value="" type="hidden">
                        </div>
                        <input id="username-input" class="form-input-2 validate[required,custom[email]]" value="" type="text">
                      </div>
                      <div class="form-input-ctn inl-blck">
                        <div class="text-placeholder flt-l cursor-dflt"> Password </div>
                        <input id="password-input" class="form-input-2 validate[required]" value="" type="password">
                      </div>
                      <div class="form-input-ctn-modified alg-l flt-l link-spanner-1 cursor-ptr"> <a href="javascript:void(0);" class="remember-checkbox"><img src="images/show-on-map-icon.png" alt="" style="vertical-align:middle;"></a>
                        <h1 class="remember"> Remember me </h1>
                      </div>
                      <div class="form-input-ctn-modified alg-l flt-r"> <a id="user-forget" class="dft-gry" href="#model-forget" data-toggle="modal"> Forgot password </a> </div>
                      <div class="fnt-15 form-input-ctn mg-btm-15 fnt-15">
                        <input id="form-signin-btn" class="bdr-all dft-gry" value="Log in" type="submit">
                      </div>
                      <div class="form-input-ctn mg-btm-15 alg-c"> Don't have an account?  
                      <a id="user-signup" class="user-profile-icon cursor-ptr"  href="#model-signUp" data-toggle="modal">
                      Create an Account </a> </div>
                      <div id="network-connection-error-msg" class="form-input-ctn mg-btm-40 dft-gry alg-r red hide"> Network connection error, please login again </div>
                    </form>
                  </div>
                </div>
              </div>
              <div id="fancybox-title" style="display: block; position: absolute; padding: 10px 15px 15px; color: white; font-family: &quot;Noto Sans&quot;,sans-serif; width: 390px;">
                <div class="form-social-media-footer pull-left" style="margin-top: 5px;">Or login with</div>
                <button id="form-gp-signin-btn" class="cursor-ptr icon-google flt-r" style="padding-right: 0px"> </button>
                <button id="form-fb-signin-btn" class="cursor-ptr  flt-r" style="padding-right: 0px; font-size:15px;"><i class="fa fa-facebook" aria-hidden="true"></i> </button>
              </div>
            </div>

            
          </div>
        </div>
      </div>
      
      <!-- forget password -->
      <div id="model-forget" class="modal fade ogBox mybulletPanel" tabindex="-1" role="dialog">
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
                    <form id="login-form" action="javascript:void(0);">
                      <div class="form-email-mobile-ctn">
                        <div class="emailMobileRadio">
                          <div class="custom-radio form-email-btn">
                            <input name="" type="radio" value="">
                            <label class="emailLbl"> Email </label>
                          </div>
                          <div class="custom-radio form-mobile-btn">
                            <input name="" type="radio" value="">
                            <label class="mobileLbl"> Mobile </label>
                          </div>
                        </div>

                        <input id="username-input" class="form-input-2 validate[required,custom[email]]" value="" type="text">
                      </div>
                       <br>
                       
                      <div class="fnt-15 form-input-ctn mg-btm-15 fnt-15">
                        <input id="form-signin-btn" class="bdr-all dft-gry" value="Submit" type="submit">
                      </div>
                       
                      <div class="form-input-ctn mg-top-5 mg-btm-5 alg-c"> 
                       
                      <a id="user-signin" class="bg-none oge"  href="#model-signIn" data-toggle="modal"> Return to Login </a> </div>
                    </form>
                  </div>
                </div>
              </div>
               
            </div>
              
 
          </div>
        </div>
      </div>
          
      <!-- Sign up panel -->
      <div id="model-signUp" class="modal fade ogBox mybulletPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="logo-lalamove" style="text-align:center;"><img src="<?php echo base_url('assets/images/lalamove-logo.png'); ?>" alt=""></div>
          <div id="wallet-box3" class="topPad">
           <div style="width:auto;height:auto;overflow: hidden;position:relative; background:#f6f6f3;">
                <button type="button" class="close closeCross" data-dismiss="modal" aria-hidden="true">×</button>
                </div>      
         <?php if (isset($company)) { ?>
  <input type="hidden" name="company" class="company-onload" value="<?php echo $company; ?>">
<?php unset($company); } ?>       
            <div id="user-register-box" class="noto-sans">
  <div class="fnt-28 title dft-gry2 bld mg-btm-10"> Create an Account </div>
  <!-- <form id="register-form" action="javascript:void(0);"> -->
  <?php $attributes = array("name" => "signupform");
			echo form_open("user/register", $attributes); ?>
			<input type="hidden" name="user_type" value="1">
    <div class="form-input-ctn ">
      <div class="firstname-input-ctn flt-l">
        <div class="text-placeholder flt-l cursor-dflt"> First Name </div>
        <!-- <input id="register-name-input" class="form-input validate[required]" type="text"> -->
        <input class="form-input" id="register-name-input" name="first_name" type="text" value="<?php echo set_value('first_name'); ?>" />
        <span class="text-danger error-personal"><?php echo form_error('first_name'); ?></span>
      </div>
      <div class="lastname-input-ctn flt-r">
        <div class="text-placeholder flt-l cursor-dflt"> Last Name </div>
        <!-- <input id="register-lastname-input" class="form-input validate[required]" type="text"> -->
        <input class="form-input" name="last_name" id="register-lastname-input" type="text" value="<?php echo set_value('last_name'); ?>" />
		<span class="text-danger error-personal"><?php echo form_error('last_name'); ?></span>
      </div>
    </div>
    <div class="form-input-ctn" style="margin-top: -5px;">
      <div class="text-placeholder flt-l cursor-dflt"> Email </div>
      <!-- <input id="register-email-input" class="form-input-2 validate[groupRequired[registration],custom[email]]" type="text"> -->
    	<input class="form-input-2" id="register-email-input" name="email" type="text" value="<?php echo set_value('email'); ?>" />
		<span class="text-danger error-personal"><?php echo form_error('email'); ?></span>
    </div>
    <input id="area-code-link" data-country="hk" data-areacode="852" type="hidden">
    <div class="form-input-ctn va-m" style="position: relative;">
      <div class="text-placeholder flt-l cursor-dflt"> Mobile </div>
       
      <div class=" ">
        <!-- <input id="register-phone-input" class="form-input register-phone-input-style-i validate[groupRequired[registration]]" type="text" placeholder=""> -->
        <input id="register-phone-input" class="form-input register-phone-input-style-i " name="mobile" type="text" value="<?php echo set_value('mobile'); ?>" />
		<span class="text-danger error-personal"><?php echo form_error('mobile'); ?></span>
      </div>
    </div>
    <div class="form-input-ctn mg-btm-15">
      <div class="flt-l cursor-dflt lgt-gry2 inl-blck" style="font-size: 11px; padding-top: 3px; padding-left: 8px; width:100%;"> A verification SMS will be sent to this number. </div>
      <br>
      <div class="text-placeholder flt-l cursor-dflt t-p-s"> Password </div>
      <!-- <input id="register-password-input" class="form-input-2 t-p-s validate[required,minSize[6]]" type="password"> -->
    	<input id="register-password-input" class="form-input-2 t-p-s" name="password" type="password" />
		<span class="text-danger error-personal"><?php echo form_error('password'); ?></span>
    </div>

    <div class="form-input-ctn mg-btm-15">
      
      
      <div class="text-placeholder flt-l cursor-dflt t-p-s"> Confirm password </div>
      <!-- <input id="register-password-input" class="form-input-2 t-p-s validate[required,minSize[6]]" type="password"> -->
    	<input type="password" id="register-password-input" class="form-input-2 t-p-s" id="password_confirm" name="password_confirm" >
		<span class="text-danger error-personal"><?php echo form_error('password_confirm'); ?></span>					
    </div>
    <div class="form-input-ctn-modified alg-l flt-l mg-0-i mg-btm-10-i">
      <div class="link-spanner-2 cursor-ptr inl-blck" style="display: none;"> <a href="javascript:void(0);" class="register-newsletter-checkbox" data-newsletter="0"></a>
        <div class="form-input-ctn-modified alg-l inl-blck mg-0-i mg-btm-6-i"> I agree to receive Lalamove newsletter </div>
      </div>
      <div class="form-input-ctn"> By signing up, I agree to Lalamove's <a href="https://www.lalamove.com/hongkong-eng/terms-conditions" target="_blank" id="form-terms-and-cond">Terms and Conditions</a> and <a href="https://www.lalamove.com/hongkong-eng/privacy" target="_blank" id="form-privacy-policy">Privacy Policy</a>. </div>
    </div>
    <div class="fnt-15 form-input-ctn dft-gry alg-c mg-btm-15">
      <!-- <input id="form-register-btn" class="lightbox-btn" type="submit" value="Sign Up" disabled="disabled"> -->
      <input type="submit" id="form-register-btn" class="lightbox-btn" value="Register">
    </div>
    <div class="fnt-15 form-input-ctn dft-gry alg-c">
      <!--<input id="user-signup-business" class="bdr-all cursor-ptr" type="submit" value="Try Lalamove Business">-->
       <a id="user-businessLogin" class="user-profile-icon cursor-ptr"  href="#model-business" data-toggle="modal">
                     Try Lalamove Business</a>
    </div>
  </form>
  <div class="form-input-ctn alg-c mg-top-10 oge"> <a id="user-signin" class="bg-none oge" href=""> Already have an account </a> </div>
</div>

 
          </div>
        </div>
      </div>
      
       <!-- Business Login panel -->
      <div id="model-business" class="modal fade ogBox mybulletPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog">
          <div class="logo-lalamove" style="text-align:center;"><img src="<?php echo base_url('assets/images/lalamove-logo.png'); ?>" alt=""></div>
          <div id="wallet-box3" class="topPad">
             <div style="width:auto;height:auto;overflow: hidden;position:relative; background:#f6f6f3;">
                <button type="button" class="close closeCross" data-dismiss="modal" aria-hidden="true">×</button>
                </div>  
 <div id="user-register-box" class="noto-sans">
  <div class="fnt-28 title dft-gry2 bld mg-btm-10"> Business Account </div>
  <?php $attributes = array("name" => "signupcompanyform");
	echo form_open("user/register", $attributes); ?>
	<input type="hidden" name="user_type" value="2">
    <div class="form-input-ctn ">
      <div class="firstname-input-ctn flt-l">
        <div class="text-placeholder flt-l cursor-dflt"> First Name </div>
        <!-- <input id="register-name-input" class="form-input validate[required]" type="text"> -->
        <input id="register-name-input" class="form-input" name="first_name" type="text" value="<?php echo set_value('first_name'); ?>" />
		<span class="text-danger error-company"><?php echo form_error('first_name'); ?></span>
      </div>
      <div class="lastname-input-ctn flt-r">
        <div class="text-placeholder flt-l cursor-dflt"> Last Name </div>
        <!-- <input id="register-lastname-input" class="form-input validate[required]" type="text"> -->
        <input id="register-lastname-input" class="form-input" name="last_name" type="text" value="<?php echo set_value('last_name'); ?>" />
		<span class="text-danger error-company"><?php echo form_error('last_name'); ?></span>
      </div>
    </div>
    <div class="form-input-ctn" style="margin-top: -5px;">
      <div class="text-placeholder flt-l cursor-dflt"> Email </div>
      <!-- <input id="register-email-input" class="form-input-2 validate[groupRequired[registration],custom[email]]" type="text"> -->
      	<input id="register-email-input" class="form-input-2" name="email" placeholder="" type="text" value="<?php echo set_value('email'); ?>" />
		<span class="text-danger error-company"><?php echo form_error('email'); ?></span>
    </div>
    <input id="area-code-link" data-country="hk" data-areacode="852" type="hidden">
    <div class="form-input-ctn va-m" style="position: relative;">
      <div class="text-placeholder flt-l cursor-dflt"> Mobile </div>
       
      <div class=" ">
        <!-- <input id="register-phone-input" class="form-input register-phone-input-style-i validate[groupRequired[registration]]" type="text" placeholder=""> -->
        <input id="register-phone-input" class="form-input register-phone-input-style-i" name="mobile" placeholder="" type="text" value="<?php echo set_value('mobile'); ?>" />
		<span class="text-danger error-company"><?php echo form_error('mobile'); ?></span>
      </div>
    </div>
    <div class="form-input-ctn mg-btm-15">
      <div class="flt-l cursor-dflt lgt-gry2 inl-blck" style="font-size: 11px; padding-top: 3px; padding-left: 8px; width:100%;"> A verification SMS will be sent to this number. </div>
      <br>
      <div class="text-placeholder flt-l cursor-dflt t-p-s"> Password </div>
      <!-- <input id="register-password-input" class="form-input-2 t-p-s validate[required,minSize[6]]" type="password"> -->
    	<input id="register-password-input" class="form-input-2 t-p-s" name="password"  type="password" />
		<span class="text-danger error-company"><?php echo form_error('password'); ?></span>
    </div>

    <div class="form-input-ctn mg-btm-15">     
      <br>
      <div class="text-placeholder flt-l cursor-dflt t-p-s"> Confirm Password </div>
      <!-- <input id="register-password-input" class="form-input-2 t-p-s validate[required,minSize[6]]" type="password"> -->
    	<input type="password" id="register-password-input" class="form-input-2 t-p-s" name="password_confirm" >
		<span class="text-danger error-company"><?php echo form_error('password_confirm'); ?></span>					
    </div>
    

     <div class="company-input-ctn"> 
     	<div class="text-placeholder flt-l cursor-dflt"> Company Name </div> 
     	<!-- <input id="register-company-input" class="form-input-2">  -->
     	<input id="register-company-input" class="form-input-2" name="company_name" placeholder="" type="text" value="<?php echo set_value('company_name'); ?>" />
		<span class="text-danger"><?php echo form_error('company_name'); ?></span>
     </div>



     <!-- <div id="industry-input-ctn" class="bdr-btm flt-l mg-btm-15" style="border-color: #303030; text-align:left;"> <a id="industry-picker" class="industry-dropdown-btn cursor-ptr" data-originalvalue="Industry"> 
     <span id="register-industry-input" class="form-input cursor-ptr"> Industry </span> 
     <span id="register-industry-input-list" class="form-input cursor-ptr" style="display:none;color:#747474 !important;font-weight: 400 !important;"> 
     		<span id="multi_industry_list"></span> 
     			<span class="tooltiptext" style="display: none;"></span> 
     	</span> 
     	<span class="down-arrow-icon flt-r" style="margin-right: 10px; margin-top: 6px"> </span> 
     	</a> -->
			<div class="form-group">
				<label for="name">Industry</label>				
				<select name="industry[]" multiple="multiple" id="industry" class="form-control">
					<option value="11" >Apparel</option>
					<option value="12" >Construction</option>
					<option value="13" >Electronics</option>
					<option value="14" >Food and Beverage</option>
					<option value="15" >Logistics</option>
					<option value="16" >Online Marketplace</option>
					<option value="17" >Other</option>
					<option value="18" >Professional Services</option>
				</select>
				<span class="text-danger"><?php echo form_error('industry[]'); ?></span>
			</div>



		<div class="form-group">
				<label for="name">Staff</label>			
					<select name="staff[]" multiple id="staff" class="form-control">
						<option value="10">1-10</option>
						<option value="50">11-50</option>
						<option value="200">51-200</option>
						<option value="500">201-500</option>
						<option value="501">500+</option>
					</select>
				<span class="text-danger"><?php echo form_error('staff[]'); ?></span>
			</div>
     
   <!--   <div id="industry-input-ctn" class="bdr-btm flt-l mg-btm-15" style="border-color: #303030; text-align:left;"> <a id="industry-picker" class="industry-dropdown-btn cursor-ptr" data-originalvalue="Industry"> 
     <span id="register-industry-input" class="form-input cursor-ptr"> Industry </span> 
     	<span id="register-industry-input-list" class="form-input cursor-ptr" style="display:none;color:#747474 !important;font-weight: 400 !important;"> 
     		<span id="multi_industry_list"></span> 
     			<span class="tooltiptext" style="display: none;"></span> 
     	</span> 
     	<span class="down-arrow-icon flt-r" style="margin-right: 10px; margin-top: 6px"> </span> 
     	</a>
  <div class="industry-menu-box dft-menubox">
  <select name="industry[]" multiple id="industry">
					<option value="11" >Apparel</option>
					<option value="12" >Construction</option>
					<option value="13" >Electronics</option>
					<option value="14" >Food and Beverage</option>
					<option value="15" >Logistics</option>
					<option value="16" >Online Marketplace</option>
					<option value="17" >Other</option>
					<option value="18" >Professional Services</option>
				</select>
				<span class="text-danger"><?php echo form_error('industry[]'); ?></span>
    <div class="inl-blck wdth-100 pd-top-5" id="industryNo7"> <a id="7" href="javascript:void(0);" class="register-business-industry-checkbox" data-newsletter="0"></a> <span> Apparel </span> </div>
    <div class="inl-blck wdth-100 pd-top-5" id="industryNo3"> <a id="3" href="javascript:void(0);" class="register-business-industry-checkbox" data-newsletter="0"></a> <span> Construction </span> </div>
    <div class="inl-blck wdth-100 pd-top-5" id="industryNo4"> <a id="4" href="javascript:void(0);" class="register-business-industry-checkbox" data-newsletter="0"></a> <span> Electronics </span> </div>
    <div class="inl-blck wdth-100 pd-top-5" id="industryNo1"> <a id="1" href="javascript:void(0);" class="register-business-industry-checkbox" data-newsletter="0"></a> <span> Food and Beverage </span> </div>
    <div class="inl-blck wdth-100 pd-top-5" id="industryNo2"> <a id="2" href="javascript:void(0);" class="register-business-industry-checkbox" data-newsletter="0"></a> <span> Logistics </span> </div>
    <div class="inl-blck wdth-100 pd-top-5" id="industryNo6"> <a id="6" href="javascript:void(0);" class="register-business-industry-checkbox" data-newsletter="0"></a> <span> Online Marketplace </span> </div>
    <div class="inl-blck wdth-100 pd-top-5" id="industryNo8"> <a id="8" href="javascript:void(0);" class="register-business-industry-checkbox" data-newsletter="0"></a> <span> Other </span> </div>
    <div class="inl-blck wdth-100 pd-top-5" id="industryNo5"> <a id="5" href="javascript:void(0);" class="register-business-industry-checkbox" data-newsletter="0"></a> <span> Professional Services </span> </div>
  </div>
</div> -->

<!-- <div id="staffs-input-ctn" class="bdr-btm flt-r" style="border-color: #303030"> <a id="staffs-picker" class="staffs-dropdown-btn cursor-ptr" data-originalvalue="# of Staff"> <span id="register-staffs-input" class="form-input cursor-ptr"> # of Staff </span> <span class="down-arrow-icon inl-blck flt-r" style="margin-right: 10px; margin-top: 6px"></span> </a> <div class="staff-menu-box dft-menubox">   <div class="inl-blck wdth-100 pd-top-5" id="staffNo9"> <a id="9" href="javascript:void(0);" class="register-business-staffs-checkbox" data-newsletter="0"></a> <span> 1-10 </span> </div>  <div class="inl-blck wdth-100 pd-top-5" id="staffNo10"> <a id="10" href="javascript:void(0);" class="register-business-staffs-checkbox" data-newsletter="0"></a> <span> 11-50 </span> </div>  <div class="inl-blck wdth-100 pd-top-5" id="staffNo11"> <a id="11" href="javascript:void(0);" class="register-business-staffs-checkbox" data-newsletter="0"></a> <span> 51-200 </span> </div>  <div class="inl-blck wdth-100 pd-top-5" id="staffNo12"> <a id="12" href="javascript:void(0);" class="register-business-staffs-checkbox" data-newsletter="0"></a> <span> 201-500 </span> </div>  <div class="inl-blck wdth-100 pd-top-5" id="staffNo13"> <a id="13" href="javascript:void(0);" class="register-business-staffs-checkbox" data-newsletter="0"></a> <span> 500+ </span> </div>  </div> </div>
      -->
    <div class="form-input-ctn-modified alg-l flt-l mg-0-i mg-btm-10-i">
      <div class="link-spanner-2 cursor-ptr inl-blck" style="display: none;"> <a href="javascript:void(0);" class="register-newsletter-checkbox" data-newsletter="0"></a>
        <div class="form-input-ctn-modified alg-l inl-blck mg-0-i mg-btm-6-i"> I agree to receive Lalamove newsletter </div>
      </div>
      <div class="form-input-ctn"> By signing up, I agree to Lalamove's <a href="https://www.lalamove.com/hongkong-eng/terms-conditions" target="_blank" id="form-terms-and-cond">Terms and Conditions</a> and <a href="https://www.lalamove.com/hongkong-eng/privacy" target="_blank" id="form-privacy-policy">Privacy Policy</a>. </div>
    </div>
    <div class="fnt-15 form-input-ctn dft-gry alg-c mg-btm-15">
      <!-- <input id="form-register-btn" class="lightbox-btn" type="submit" value="Sign Up" disabled="disabled"> -->
      <input type="submit" id="form-register-btn" class="lightbox-btn" value="Register">
    </div>
    <div class="fnt-15 form-input-ctn dft-gry alg-c">
      <input id="user-signup" class="form-signup-btn-style bdr-all cursor-ptr" type="submit" value="Back">
    </div>
  </form>
  <div class="form-input-ctn alg-c mg-top-10 oge"> <a id="user-signin" class="bg-none oge" href=""> Already have an account </a> </div>
</div>

 
          </div>
        </div>
      </div>
      
      
      <!-- city language -->
      <div id="city-and-language-ctn">
        <div id="language-picker-ctn">
          <ul id="language-picker">
            <li> <a class="language-link cursor-ptr dft-gry" href="#"> <span id="language-name">EN</span> </a> </li>
            <li> <span class="seperator">|</span> </li>
            <li> <a class="language-link cursor-ptr dft-gry" href="#"> <span id="language-name">中文</span> </a> </li>
          </ul>
        </div>
        <div id="city-picker-ctn" class="dropdown"> <a id="city-picker" class="header-menu-btn cursor-ptr dft-gry dropdown-toggle" href="#" data-toggle="dropdown"> <span id="country-name">Hong Kong</span><span class="down-arrow-icon"></span> </a>
          <div class="header-menu-box dft-menubox active dropdown-menu" role="menu" style="width: 235px;"> <a id="bkk-link" class="country-header-link dft-gry cursor-ptr bkk-link" href="/th/en" target="_self"> Bangkok </a> <a id="hk-link" class="country-header-link dft-gry cursor-ptr hk-link" href="/hk/en" target="_self"> Hong Kong </a> <a id="ph-link" class="country-header-link dft-gry cursor-ptr ph-link" href="/ph/en" target="_self"> Manila </a> <a id="sg-link" class="country-header-link dft-gry cursor-ptr sg-link" href="/sg/en" target="_self"> Singapore </a> <a id="tp-link" class="country-header-link dft-gry cursor-ptr tp-link" href="/tw/tc" target="_self"> Taipei </a> </div>
        </div>
      </div>
    </div>
  </div>
</header>


<!-- left one panel -->
<nav class="bdr-right">
  <ul>
    <li class="sidemenu-list"> <a href="#" id="place-order-btn" class="sidemenu-btn cursor-ptr dft-gry active" href="map.html"> <span id="place-order-icon" class="place-order-icon"></span> <br>
      Place Order </a> </li>
    <li class="sidemenu-list"> <a href="#" id="on-going-orders-btn" class="sidemenu-btn cursor-ptr dft-gry"> <span id="on-going-orders-icon" class="on-going-orders-icon"> <span id="on-going-orders-counter" class="notification-counter hide"></span> </span> <br>
      Ongoing Orders </a> </li>
    <li class="sidemenu-list"> <a href="#" id="records-btn" class="sidemenu-btn cursor-ptr dft-gry"> <span id="records-icon" class="records-icon"> <span id="records-counter" class="notification-counter hide"></span> </span> <br>
      Records </a>
      <ul>
        <li>
          <div id="records-menu" class="slide-menu"></div>
        </li>
      </ul>
    </li>
    <li class="sidemenu-list"> <a href="#model-id" id="my-fleet-btn" class="sidemenu-btn cursor-ptr dft-gry" data-toggle="modal"> <span id="my-fleet-icon" class="my-fleet-icon"></span> <br>
      Manage My Driver </a> </li>
    <li class="sidemenu-list"> <a href="#model-id2"  id="user-wallet" class="sidemenu-btn cursor-ptr dft-gry" data-toggle="modal"> <span id="my-wallet-icon" class="my-wallet-icon"></span> <br>
      My Wallet </a> </li>
    <li class="sidemenu-list"> </li>
  </ul>
</nav>

<!-- left two panel -->
<div id="menu-ctn" class="bdr-right">
  <input id="searchTextField" address-id="" address="" placeholder="Enter a query" autocomplete="off" type="text">
  <div id="place-order-section" class="open">
    <div class="normal-request-ctn bdr-btm">
      <div class="jcarousel-control-ctn" style="height: 80px;"> <a class="jcarousel-prev" href="#">‹</a> </div>
      <div class="jcarousel vehicle-type-select">
        <ul>
          <li> <a id="motorcycle-btn" class="vehicle-type-select-btn lgt-gry active" href="javascript:void(0);" data-type="LOAD_PARCEL"> <span class="vehicle-type-select-icon"> <img class="off" src="<?php echo base_url('assets/images/map/moto_v2_off.png'); ?>" height="55"> <img class="on" src="<?php echo base_url('assets/images/map/moto_v2.png'); ?>" height="55"> </span> <br>
            Motorcycle </a> </li>
          <li> <a id="van-btn" class="vehicle-type-select-btn lgt-gry " href="javascript:void(0);" data-type="VAN"> <span class="vehicle-type-select-icon"> <img class="off" src="<?php echo base_url('assets/images/map/van_v2_off.png'); ?>" height="55"> <img class="on" src="<?php echo base_url('assets/images/map/van_v2.png'); ?>" height="55"> </span> <br>
            Van </a> </li>
          <li> <a id="5.5-ton-btn" class="vehicle-type-select-btn lgt-gry " href="javascript:void(0);" data-type="TON55"> <span class="vehicle-type-select-icon"> <img class="off" src="<?php echo base_url('assets/images/map/truck_v2_off.png'); ?>" height="55"> <img class="on" src="<?php echo base_url('assets/images/map/truck_v2.png'); ?>" height="55"> </span> <br>
            5.5 Ton </a> </li>
        </ul>
      </div>
      <div class="jcarousel-control-ctn" style="height: 80px;"> <a class="jcarousel-next" href="#">›</a> </div>
    </div>
    <div id="motorcycle-vehicle-type-select" class="vehicle-type-detail-select bdr-btm active">
      <ul>
        <li> <a id="document-vechicle-type-detail-select" class="vehicle-type-detail-select-link lgt-gry active" data-type="DOCUMENT" href="javascript:void(0);"> Document </a> </li>
        <li> <a id="parcel-vechicle-type-detail-select" class="vehicle-type-detail-select-link lgt-gry " data-type="PARCEL" href="javascript:void(0);"> Parcel </a> </li>
        <li> <a id="food-vechicle-type-detail-select" class="vehicle-type-detail-select-link lgt-gry " data-type="FOOD" href="javascript:void(0);"> Food </a> </li>
      </ul>
    </div>
    <div class="place-order-inputs">
      <div class="place-order-input-wrapper alg-r mg-btm-10"> <a id="more-info-link" class="oge-link-btn" href="javascript:void(0);"> More Info </a> </div>
      <ul class="sortable bdr-all" data-sortable-id="0" aria-dropeffect="move">
        <li id="location-list-1" class="location-list" data-item-sortable-id="0" role="option" aria-grabbed="false">
          <div class="place-order-input-wrapper wht-bg"> <a class="from-location-icon from-to-location-icon" href="javascript:void(0);" draggable="true"> <span class="location-drag-icon"></span> <span class="location-drag-tips">Drag To Reorder</span> </a> <span class="location-input-wrapper bdr-btm">
            <input id="location-1" class="location-input ellipsis" tabindex="1" data-placeid="" data-lat="" data-lng="" data-address="" placeholder="Select Origin" type="text">
            <span class="input-right-icon recipient-info-icon"></span> </span> <span id="location-1-predict" class="predict-ctn" style="display: none;"></span> </div>
          <div id="location-1-recipient" class="location-recipient-wrapper bdr-all">
            <div class="overlay-input-wrapper">
              <div class="overlay-title-ctn"> <span class="dft-gry flt-l"> Recipient Info </span> </div>
              <div class="location-recipient-input-wrapper bdr-all wht-bg">
                <input id="location-1-recipient-name" tabindex="1" class="order-recipient-name-input recipient-overlay-input" placeholder="Recipient Name" type="text">
              </div>
              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">
                <input id="location-1-recipient-number" tabindex="1" class="order-recipient-phone-input recipient-overlay-input" placeholder="Recipient Phone Number" type="text">
              </div>
              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">
                <input id="location-1-recipient-block" tabindex="1" class="order-recipient-block-input recipient-overlay-input recipient-overlay-address-input" placeholder="Block" type="text">
              </div>
              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">
                <div class="location-recipient-input-wrapper-1-2 bdr-right">
                  <input id="location-1-recipient-floor" tabindex="1" class="order-recipient-floor-input recipient-overlay-input recipient-overlay-address-input" placeholder="Floor" type="text">
                </div>
                <div class="location-recipient-input-wrapper-1-2">
                  <input id="location-1-recipient-room" tabindex="1" class="order-recipient-room-input recipient-overlay-input recipient-overlay-address-input" placeholder="Room" type="text">
                </div>
              </div>
            </div>
          </div>
        </li>
        <li id="location-list-2" class="location-list" data-item-sortable-id="0" role="option" aria-grabbed="false">
          <div class="place-order-input-wrapper waypoint waypoint-2 wht-bg"> <a class="from-location-icon from-to-location-icon" href="javascript:void(0);" draggable="true"> <span class="location-drag-icon"></span> <span class="location-drag-tips">Drag To Reorder</span> </a> <span class="location-input-wrapper bdr-btm">
            <input id="location-1" class="location-input ellipsis" tabindex="1" data-placeid="" data-lat="" data-lng="" data-address="" placeholder="Select Origin" type="text">
            <span class="input-right-icon recipient-info-icon"></span> </span> <span id="location-1-predict" class="predict-ctn" style="display: none;"></span> </div>
          <div id="location-1-recipient" class="location-recipient-wrapper bdr-all">
            <div class="overlay-input-wrapper">
              <div class="overlay-title-ctn"> <span class="dft-gry flt-l"> Recipient Info </span> </div>
              <div class="location-recipient-input-wrapper bdr-all wht-bg">
                <input id="location-1-recipient-name" tabindex="1" class="order-recipient-name-input recipient-overlay-input" placeholder="Recipient Name" type="text">
              </div>
              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">
                <input id="location-1-recipient-number" tabindex="1" class="order-recipient-phone-input recipient-overlay-input" placeholder="Recipient Phone Number" type="text">
              </div>
              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">
                <input id="location-1-recipient-block" tabindex="1" class="order-recipient-block-input recipient-overlay-input recipient-overlay-address-input" placeholder="Block" type="text">
              </div>
              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">
                <div class="location-recipient-input-wrapper-1-2 bdr-right">
                  <input id="location-1-recipient-floor" tabindex="1" class="order-recipient-floor-input recipient-overlay-input recipient-overlay-address-input" placeholder="Floor" type="text">
                </div>
                <div class="location-recipient-input-wrapper-1-2">
                  <input id="location-1-recipient-room" tabindex="1" class="order-recipient-room-input recipient-overlay-input recipient-overlay-address-input" placeholder="Room" type="text">
                </div>
              </div>
            </div>
          </div>
        </li>
        <li id="location-list-3" class="location-list" data-item-sortable-id="0" role="option" aria-grabbed="false">
          <div class="place-order-input-wrapper wht-bg"> <a class="from-to-location-icon to-location-icon" href="javascript:void(0);" draggable="true"> <span class="location-drag-icon"></span> <span class="location-drag-tips">Drag To Reorder</span> </a> <span class="location-input-wrapper">
            <input id="location-2" class="location-input ellipsis" tabindex="2" data-placeid="" data-lat="" data-lng="" data-address="" placeholder="Select Destination" type="text">
            <span class="input-right-icon recipient-info-icon"></span> </span> <span id="location-2-predict" class="predict-ctn" style="display: none;"></span> </div>
          <div id="location-2-recipient" class="location-recipient-wrapper bdr-all">
            <div class="overlay-input-wrapper">
              <div class="overlay-title-ctn"> <span class="dft-gry flt-l"> Recipient Info </span> </div>
              <div class="location-recipient-input-wrapper bdr-all wht-bg">
                <input id="location-2-recipient-name" tabindex="2" class="order-recipient-name-input recipient-overlay-input" placeholder="Recipient Name" type="text">
              </div>
              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">
                <input id="location-2-recipient-number" tabindex="2" class="order-recipient-phone-input recipient-overlay-input" placeholder="Recipient Phone Number" type="text">
              </div>
              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">
                <input id="location-2-recipient-block" tabindex="2" class="order-recipient-block-input recipient-overlay-input recipient-overlay-address-input" placeholder="Block" type="text">
              </div>
              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">
                <div class="location-recipient-input-wrapper-1-2 bdr-right">
                  <input id="location-2-recipient-floor" tabindex="2" class="order-recipient-floor-input recipient-overlay-input recipient-overlay-address-input" placeholder="Floor" type="text">
                </div>
                <div class="location-recipient-input-wrapper-1-2">
                  <input id="location-2-recipient-room" tabindex="2" class="order-recipient-room-input recipient-overlay-input recipient-overlay-address-input" placeholder="Room" type="text">
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
      <div class="place-order-input-wrapper alg-r mg-top-10 mg-btm-10"> <a id="clear-all-stops-link" class="extra-stops-link oge-link-btn" href="javascript:void(0);"> Clear All Stops </a> <a id="add-extra-stop-link" class="extra-stops-link oge-link-btn" href="javascript:void(0);"> Add Stop </a> <a id="remove-extra-stop-link" class="extra-stops-link oge-link-btn" href="javascript:void(0);"> Remove Last Stop </a> </div>
      <div id="importMultipleAddress" class="place-order-input-wrapper alg-r">
        <div class="place-order-input-wrapper-1-2 flt-l mg-top-2"> <a href="javascript:void(0);" id="optimizeRouteCheckBox"></a> <span class="optimizeRouteBtn">Optimize Route <a id="optimize-route-annoucement" class="oge" href="javascript:void(0);"><img class="va-m" src="http://pro.lalamove.com/assets/img/side-menu/more.png" width="17" height="17"></a> </span> </div>
        <div class="place-order-input-wrapper-1-2 flt-r"> <a id="importAddresses" href="javascript:void(0);"> Import Stops From List <span class="arrow"></span> </a> </div>
        <div class="place-order-input-wrapper hide" id="multiple-address-area">
          <textarea id="multiple-address-input-textarea" class="comment-textarea-input bdr-all hide" placeholder="Copy and paste your route addresses. One address per line (20 addresses max.) "></textarea>
          <div id="multiple-address-input-div" class="bdr-all hide" data-ph="Copy and paste your route addresses. One address per line (20 addresses max.) " contenteditable="true"></div>
          <div id="add-address-btn-ctn" class="alg-c"> <a id="add-address-btn" href="javascript:void(0);"> Create Route </a> </div>
        </div>
      </div>
      <div class="place-order-input-wrapper"> <a id="toll-tunnels-btn" class="additional-service-input bdr-all alg-c lgt-gry" href="javascript:void(0);"> Toll Tunnels <span id="tunnel-edit" class="oge-link-btn flt-r hide"> Edit </span> </a> </div>
      <div class="place-order-input-wrapper mg-btm-15">
        <div id="tunnel-selected-list" class="bdr-left bdr-btm bdr-right"></div>
      </div>
      <div class="place-order-input-wrapper"> <a id="additional-service-btn" class="additional-service-input bdr-all alg-c lgt-gry" > Additional Services <span id="additional-service-edit" class="oge-link-btn flt-r hide"> Edit </span> </a> </div>
      
      <!-- mg 15-->
      <div class="place-order-input-wrapper mg-btm-15"> </div>
      <div class="place-order-input-wrapper mg-btm-15">
        <textarea id="comment-input" class="comment-textarea-input bdr-all" placeholder="Enter a remark or comment for this order"></textarea>
      </div>
      <div class="place-order-input-wrapper mg-btm-15">
        <input id="promo-input" class="promo-code-input bdr-all" placeholder="Promo Code" value="" type="text">
        <div class="flt-r"> <span class="total-text dft-gry">Total</span> <span id="price-total" class="total-number dft-gry bld" data-price="0">$0</span> </div>
      </div>
    </div>
    <div class="place-order-button-ctn"> <a id="advanced-order-btn" class="btn-1-2" href="javascript:void(0);"> Advanced Order </a> <a id="immediate-order-btn" class="btn-1-2" href="javascript:void(0);"> Immediate Order (&lt;20 Min) </a> </div>
  </div>
  <div id="on-going-orders-section"></div>
</div>

<!-- map panel -->
<div id="map-ctn"> 
  <!-- google map area -->
  <div class="maparea"><img src="<?php echo base_url('assets/images/map.jpg'); ?>" class="img-responsive" style="width:100%; height:auto;"> </div>
  
  <!-- click box 1-->
  <div id="service-type-info-overlay" class="overlay-menu">
    <div class="back-btn-ctn mg-btm-15"> <a id="service-type-back-btn" class="overlay-back-btn dft-gry flt-r" href="javascript:void(0);"> Hide </a> </div>
    <div id="service-type-info-ctn" class="ovf-y-hd">
      <div class="service-type-info-text">
        <iframe class="web-content" src="https://www.lalamove.com/hk-chi/easyvan-business-price?inapp=1" sandbox="allow-scripts allow-same-origin" scrolling="yes" seamless frameborder="0"></iframe>
      </div>
    </div>
  </div>
  
  <!-- click box 2 -->
  <div id="toll-tunnels-overlay" class="overlay-menu">
    <div class="back-btn-ctn mg-btm-15"> <a id="ongoing-order-back-btn" class="overlay-back-btn dft-gry flt-r" href="javascript:void(0);"> Hide </a> </div>
    <div id="tunnel-item-ctn">
      <div class="tunnel-item bdr-btm" data-type="tunnel_any" data-itemid="1" data-name="Any Tunnel"> <span class="tunnel-item-desc cursor-ptr"> <b>Any Tunnel</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_any" data-itemid="1" data-name="Any Tunnel"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_hongham" data-itemid="2" data-name="Cross Harbour"> <span class="tunnel-item-desc cursor-ptr"> <b>Cross Harbour</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_hongham" data-itemid="2" data-name="Cross Harbour"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_eastern" data-itemid="3" data-name="Eastern"> <span class="tunnel-item-desc cursor-ptr"> <b>Eastern</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_eastern" data-itemid="3" data-name="Eastern"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_western" data-itemid="4" data-name="Western"> <span class="tunnel-item-desc cursor-ptr"> <b>Western</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_western" data-itemid="4" data-name="Western"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_tates_cairn" data-itemid="5" data-name="Tate's Cairn"> <span class="tunnel-item-desc cursor-ptr"> <b>Tate's Cairn</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_tates_cairn" data-itemid="5" data-name="Tate's Cairn"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_lion_rock" data-itemid="6" data-name="Lion Rock"> <span class="tunnel-item-desc cursor-ptr"> <b>Lion Rock</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_lion_rock" data-itemid="6" data-name="Lion Rock"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_shing_mun" data-itemid="7" data-name="Shing Mun"> <span class="tunnel-item-desc cursor-ptr"> <b>Shing Mun</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_shing_mun" data-itemid="7" data-name="Shing Mun"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_eagles_nest" data-itemid="8" data-name="Eagles's Nest"> <span class="tunnel-item-desc cursor-ptr"> <b>Eagles's Nest</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_eagles_nest" data-itemid="8" data-name="Eagles's Nest"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_tai_lam" data-itemid="9" data-name="Tai Lam"> <span class="tunnel-item-desc cursor-ptr"> <b>Tai Lam</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_tai_lam" data-itemid="9" data-name="Tai Lam"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_tseung_kuan_o" data-itemid="10" data-name="Tseung Kwan O"> <span class="tunnel-item-desc cursor-ptr"> <b>Tseung Kwan O</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_tseung_kuan_o" data-itemid="10" data-name="Tseung Kwan O"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_aberdeen" data-itemid="11" data-name="Aberdeen"> <span class="tunnel-item-desc cursor-ptr"> <b>Aberdeen</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_aberdeen" data-itemid="11" data-name="Aberdeen"></a> </div>
    </div>
  </div>
  
  <!-- payment order box -->
  <div id="payment-order-overlay" class="overlay-menu" data-showwallet="1">
    <div class="back-btn-ctn mg-btm-15"> <a id="payment-order-back-btn" class="overlay-back-btn dft-gry flt-r" href="javascript:void(0);"> Hide </a> </div>
    <div class="overlay-title-ctn dft-gry"> Payment - <span class="total-desc-hk">Does not include extra fee e.g. toll or parking fee</span> </div>
    <div id="top-up-your-wallet-btn-ctn" class="top-up-your-wallet-ctn-on ellipsis"> <a id="top-up-your-wallet-btn" class="dft-gry bdr-all" href="javascript:void(0);"> <span class="arrow-right"></span>Add Value To Account <span id="wallet-balance-ctn" class="ellipsis">(Balance: <span id="wallet-balance">$0</span>)</span> </a> </div>
    <div class="wallet-detail-ctn bdr-btm"> <span class="wallet-item-1-2 alg-l"> Basic Fare </span> <span id="payment-basic-fee" class="wallet-item-1-2 alg-r">$ 0</span> <span class="wallet-item-1-2 alg-l"> Additional Services </span> <span id="payment-additional-service" class="wallet-item-1-2 alg-r">$ 0</span> <span class="wallet-item-1-2 alg-l"> Discount </span> <span id="payment-discount" class="wallet-item-1-2 alg-r">$ 0</span> <span class="wallet-item-1-2 alg-l"> Surcharge </span> <span id="payment-surcharge" class="wallet-item-1-2 alg-r">$ 0</span> <span id="payment-free-credit-txt" class="wallet-item-1-2 alg-l oge"> Rewards </span> <span id="payment-free-credit" class="wallet-item-1-2 alg-r oge">-$ 0</span> <span class="wallet-item-1-2 alg-l bld"> Total </span> <span id="payment-total" class="wallet-item-1-2 alg-r bld">$ 0</span> </div>
    <div class="overlay-title-ctn dft-gry mg-btm-15"> Pay By </div>
    <div class="payment-btn-ctn bdr-all "> <span class="wallet-item-1-2 alg-c bdr-right"> <a id="cash-btn" class="payment-btn dft-gry active" href="javscript:void(0);"> Cash </a> </span> <span class="wallet-item-1-2 alg-c"> <a id="pre-payment-btn" class="payment-btn dft-gry" href="javscript:void(0);"> My Wallet </a> </span> </div>
    <div id="prepayment-overlay-warning" class="overlay-btn-ctn mg-btm-15 alg-c oge fnt-13"> <span class="warning-logo"></span> <br>
      Not enough prepayment credit on your account, please pay by cash or top-up your account </div>
    <div id="free-credit-overlay-warning" class="overlay-btn-ctn mg-btm-15 alg-c oge fnt-13"> <span class="warning-logo"></span> <br>
      You have enough free credits to cover the cost of this ride </div>
    <div class="overlay-btn-ctn"> <a id="payment-overlay-confirm-btn" class="overlay-submit-btn" href="javascript:void(0);" data-ordertype="" data-prepaymentpossible="" data-paymenttype=""> Confirm </a> </div>
  </div>
  
  <!-- add priority fee red left box on map -->
  <div id="priority-fee-sticker" style="display:block;"> Add Priority Fee </div>
  
  <!-- add priority fee -->
  <div id="priority-fee-ctn" style="display:block">
    <div class="top oge"> <a id="add-prority-fee-btn" class="oge flt-r" href="javascript:void(0);"> Add Priority Fee <span id="add-prority-fee-arrow" class="right-arrow flt-r" href="javascript:void(0);"></span> </a> </div>
    <div class="btm">
      <div class="priority-fee-desc"> Adding tips to an assigning order will increase your chances to get matched with a driver. </div>
      <div class="priority-fee-title lgt-gry mg-top-10"> Select An Order </div>
      <div id="priority-fee-list-selected" class="mg-top-10"> <a id="priority-fee-list-selected-btn" class="oge" href="javascript:void(0);" data-orderno="" data-orderid="" data-cost=""> Order #<span id="priority-fee-orderno"> ...</span> <span id="priority-fee-list-selected-arrow" class="right-arrow flt-r"></span> </a> </div>
      <div id="priority-fee-list"></div>
      <div class="priority-fee-title lgt-gry mg-top-10"> Select An Amount </div>
      <div class="priority-fee-increment-ctn mg-top-10"> <span class="priority-fee-decrease-ctn"> <a id="priority-fee-decrease" class="priority-fee-increase-decrease-btn" href="javascript:void(0);"></a> </span> <span id="priority-fee-total-ctn"> $<span id="priority-fee-total" data-total="">5</span> </span> <span class="priority-fee-increase-ctn"> <a id="priority-fee-increase" class="priority-fee-increase-decrease-btn" href="javascript:void(0);"></a> </span> </div>
      <div class="priority-fee-title lgt-gry mg-top-10"> Total Amount </div>
      <div id="priority-fee-display-ctn" class="mg-top-10"> </div>
      <input id="priority-fee-confirm" class="mg-top-10 alg-c cursor-ptr" value="Confirm" type="submit">
    </div>
  </div>
</div>

<!-- light box my driver -->
<div id="model-id" class="modal fade ogBox" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="width:auto;height:auto;overflow: auto;position:relative; background:#f6f6f3">
        <button type="button" class="close closeCross" data-dismiss="modal" aria-hidden="true">×</button>
        <div id="my-fleet-box" class="topPad">
          <div class="title dft-gry bld mg-lr-20 mg-btm-15">Manage My Drivers</div>
          <div class="desc dft-gry mg-lr-20 mg-btm-15">Satisfied by your drivers? Add or ban drivers from your list.</div>
          <div id="add-driver-btn-ctn" class="alg-c"> <a id="add-driver-btn" href="javascript:void(0);"> Add Driver </a> </div>
          <div id="driver-license-ctn" class="alg-c"> <span class="mg-btm-10"> Enter the driver license number. </span>
            <form id="my-fleet-form" action="javascript:void(0);">
              <span class="my-fleet-input-ctn">
              <input id="add-driver-license" class="bdr-left bdr-top bdr-btm mg-btm-30 validate[required]" placeholder="Driver's License Number" type="text">
              <input id="add-driver-license-ok-btn" class="cursor-ptr" value="OK" type="submit">
              </span>
            </form>
          </div>
          <div class="tabbable">
            <ul class="nav desc">
              <li class="tab-1-2 cursor-ptr active"><a href="#tab1" data-toggle="tab">Favorite</a></li>
              <li class="tab-1-2 cursor-ptr"><a href="#tab2" data-toggle="tab">Banned</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab1">
                <p>Favoright content start here </p>
              </div>
              <div class="tab-pane" id="tab2">
                <p>Banned Content Start here </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- my wallet -->
<div id="model-id2" class="modal fade ogBox mybulletPanel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="width:auto;height:auto;overflow: auto;position:relative; background:#f6f6f3;">
        <button type="button" class="close closeCross" data-dismiss="modal" aria-hidden="true">×</button>
        <div id="wallet-box" class="topPad">
          <div class="title dft-gry bld mg-btm-15 alg-c">My Wallet</div>
          <div class="desc dft-gry mg-btm-15">CURRENT BALANCE</div>
          <div id="credits-ctn" class="desc dft-gry mg-btm-30" style="visibility: visible;"> <span id="prepaid-dollars" class="bld">$0</span> Cash Rewards&nbsp;<span id="free-credits">$0</span>&nbsp;pts </div>
          <div class="desc">
            <div id="wallet-recharge-btn" class="full tab-1-2 cursor-ptr active">Recharge</div>
          </div>
          <div id="wallet-transaction">
            <ul id="wallet-transaction-list">
            </ul>
          </div>
          <div id="wallet-recharge" class="open">
            <div class="desc mg-btm-30"> Payment in app will be soon available. In the meantime, we invite you to get in touch with our customer service team in order to recharge your account. </div>
            <form id="wallet-enquiry-form" action="javascript:void(0);">
              <input id="recharge-subject" class="recharge-input mg-btm-2 validate[required]" placeholder="Subject" type="text">
              <textarea id="recharge-enquiry" class="recharge-input validate[required]" placeholder="Your Enquiry"></textarea>
              <div class="recharge-btn-ctn mg-btm-15">
                <input id="recharge-send-btn" class="dft-gry flt-r cursor-ptr" value="Send" type="submit">
              </div>
            </form>
            <div class="contact"> Customer Service <br>
              3701 3701 </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <div class="container">
	<div class="row">
		
<?php
if (isset($company)) { ?>
  <input type="hidden" name="company" class="company-onload" value="<?php echo $company; ?>">
<?php unset($company); } ?>
		<div class="col-md-12 personal">
			<div class="page-header">
				<h1>Register</h1>
			</div>
			<?php $attributes = array("name" => "signupform");
			echo form_open("user/register", $attributes); ?>
			<input type="hidden" name="user_type" value="1">
			<div class="form-group">
				<label for="name">First Name</label>
				<input class="form-control" name="first_name" placeholder="Your First Name" type="text" value="<?php echo set_value('first_name'); ?>" />
				<span class="text-danger error-personal"><?php echo form_error('first_name'); ?></span>
			</div>			
		
			<div class="form-group">
				<label for="name">Last Name</label>
				<input class="form-control" name="last_name" placeholder="Last Name" type="text" value="<?php echo set_value('last_name'); ?>" />
				<span class="text-danger error-personal"><?php echo form_error('last_name'); ?></span>
			</div>
		
			<div class="form-group">
				<label for="email">Email ID</label>
				<input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" />
				<span class="text-danger error-personal"><?php echo form_error('email'); ?></span>
			</div>

			<div class="form-group">
				<label for="mobile">Mobile</label>
				<select name="myselect">
					<option value="bg" <?php echo set_select('myselect', 'Bangkok', TRUE); ?> >Bangkok</option>
					<option value="hk" <?php echo set_select('myselect', 'Hong Kong'); ?> >Hong Kong</option>
					<option value="ml" <?php echo set_select('myselect', 'Manila'); ?> >Manila</option>
					<option value="sp" <?php echo set_select('myselect', 'Singapore'); ?> >Singapore</option>
					<option value="tp" <?php echo set_select('myselect', 'Taipei'); ?> >Taipei</option>
				</select>
				<input class="form-control" name="mobile" placeholder="Mobile" type="text" value="<?php echo set_value('mobile'); ?>" />
				<span class="text-danger error-personal"><?php echo form_error('mobile'); ?></span>
			</div>

			<div class="form-group">
				<label for="subject">Password</label>
				<input class="form-control" name="password" placeholder="Password" type="password" />
				<span class="text-danger error-personal"><?php echo form_error('password'); ?></span>
			</div>

			<div class="form-group">
					<label for="password_confirm">Confirm password</label>
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm your password">
					<span class="text-danger error-personal"><?php echo form_error('password_confirm'); ?></span>					
			</div>

				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Register">
				</div>
			</form>
			<div class="form-group">
					<button class="business-btn">Try business</button>
			</div>
		</div>
		<div class="col-md-12 business" style="display: none;">
			<div class="page-header">
				<h1>Register</h1>
			</div>
			<?php $attributes = array("name" => "signupcompanyform");
			echo form_open("user/register", $attributes); ?>
			<input type="hidden" name="user_type" value="2">
				<div class="form-group">
				<label for="name">First Name</label>
				<input class="form-control" name="first_name" placeholder="Your First Name" type="text" value="<?php echo set_value('first_name'); ?>" />
				<span class="text-danger error-company"><?php echo form_error('first_name'); ?></span>
			</div>			
		
			<div class="form-group">
				<label for="name">Last Name</label>
				<input class="form-control" name="last_name" placeholder="Last Name" type="text" value="<?php echo set_value('last_name'); ?>" />
				<span class="text-danger error-company"><?php echo form_error('last_name'); ?></span>
			</div>

			<div class="form-group">
				<label for="email">Email ID</label>
				<input class="form-control" name="email" placeholder="Email-ID" type="text" value="<?php echo set_value('email'); ?>" />
				<span class="text-danger error-company"><?php echo form_error('email'); ?></span>
			</div>

			<div class="form-group">
				<label for="mobile">Mobile</label>
				<select name="myselect">
					<option value="bg" <?php echo set_select('myselect', 'Bangkok', TRUE); ?> >Bangkok</option>
					<option value="hk" <?php echo set_select('myselect', 'Hong Kong'); ?> >Hong Kong</option>
					<option value="ml" <?php echo set_select('myselect', 'Manila'); ?> >Manila</option>
					<option value="sp" <?php echo set_select('myselect', 'Singapore'); ?> >Singapore</option>
					<option value="tp" <?php echo set_select('myselect', 'Taipei'); ?> >Taipei</option>
				</select>
				<input class="form-control" name="mobile" placeholder="Mobile" type="text" value="<?php echo set_value('mobile'); ?>" />
				<span class="text-danger error-company"><?php echo form_error('mobile'); ?></span>
			</div>

			<div class="form-group">
				<label for="subject">Password</label>
				<input class="form-control" name="password" placeholder="Password" type="password" />
				<span class="text-danger error-company"><?php echo form_error('password'); ?></span>
			</div>

			<div class="form-group">
					<label for="password_confirm">Confirm password</label>
					<input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm your password">
					<span class="text-danger error-company"><?php echo form_error('password_confirm'); ?></span>					
			</div>

			<div class="form-group">
				<label for="name">Company Name</label>
				<input class="form-control" name="company_name" placeholder="Company Name" type="text" value="<?php echo set_value('company_name'); ?>" />
				<span class="text-danger"><?php echo form_error('company_name'); ?></span>
			</div>

			<div class="form-group">
				<label for="name">Industry</label>				
				<select name="industry[]" multiple id="industry">
					<option value="11" >Apparel</option>
					<option value="12" >Construction</option>
					<option value="13" >Electronics</option>
					<option value="14" >Food and Beverage</option>
					<option value="15" >Logistics</option>
					<option value="16" >Online Marketplace</option>
					<option value="17" >Other</option>
					<option value="18" >Professional Services</option>
				</select>
				<span class="text-danger"><?php echo form_error('industry[]'); ?></span>
			</div>

			<div class="form-group">
				<label for="name">Staff</label>			
					<select name="staff[]" multiple id="staff">
						<option value="10">1-10</option>
						<option value="50">11-50</option>
						<option value="200">51-200</option>
						<option value="500">201-500</option>
						<option value="501">500+</option>
					</select>
				<span class="text-danger"><?php echo form_error('staff[]'); ?></span>
			</div>

				<div class="form-group">
					<input type="submit" class="btn btn-default" value="Register">
				</div>
			</form>
			<div class="form-group">
					<button class="personal-btn">Back</button>
			</div>
		</div>

	</div>-->
	<!-- .row -->
	<!--
</div>-->
<!-- .container --> 