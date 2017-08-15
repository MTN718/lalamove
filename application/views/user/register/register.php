<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Sign up panel -->
      <div id="model-signUp" class="modal fade ogBox mybulletPanel in register-prsnl" tabindex="-1" role="dialog">
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
			<input type="hidden" name="user_type" id="userType" value="1">
    <div class="form-input-ctn ">
      <div class="firstname-input-ctn flt-l">
        <div class="text-placeholder flt-l cursor-dflt"> First Name </div>
        <!-- <input id="register-name-input" class="form-input validate[required]" type="text"> -->
        <input class="form-input psnl-first_name" id="register-name-input" name="first_name" type="text" value="<?php echo set_value('first_name'); ?>" />
        <span class="text-danger error-personal fname-err"></span>
      </div>
      <div class="lastname-input-ctn flt-r">
        <div class="text-placeholder flt-l cursor-dflt"> Last Name </div>
        <!-- <input id="register-lastname-input" class="form-input validate[required]" type="text"> -->
        <input class="form-input psnl-last_name" name="last_name" id="register-lastname-input" type="text" value="<?php echo set_value('last_name'); ?>" />
		<span class="text-danger error-personal lname-err"></span>
      </div>
    </div>
    <div class="form-input-ctn" style="margin-top: -5px;">
      <div class="text-placeholder flt-l cursor-dflt"> Email </div>
      <!-- <input id="register-email-input" class="form-input-2 validate[groupRequired[registration],custom[email]]" type="text"> -->
    	<input class="form-input-2 psnl-email" id="register-email-input" name="email" type="text" value="<?php echo set_value('email'); ?>" />
		<span class="text-danger error-personal email-err"></span>
    </div>
    <input id="area-code-link" data-country="hk" data-areacode="852" type="hidden">
    <div class="form-input-ctn va-m" style="position: relative;">
      <div class="text-placeholder flt-l cursor-dflt"> Mobile </div>
       
      <div class=" ">
        <!-- <input id="register-phone-input" class="form-input register-phone-input-style-i validate[groupRequired[registration]]" type="text" placeholder=""> -->
        <input id="register-phone-input" class="form-input psnl-mobile register-phone-input-style-i " name="mobile" type="text" value="<?php echo set_value('mobile'); ?>" />
		<span class="text-danger error-personal mobile-err"></span>
      </div>
    </div>
    <div class="form-input-ctn mg-btm-15">
      <div class="flt-l cursor-dflt lgt-gry2 inl-blck" style="font-size: 11px; padding-top: 3px; padding-left: 8px; width:100%;"> A verification SMS will be sent to this number. </div>
      <br>
      <div class="text-placeholder flt-l cursor-dflt t-p-s"> Password </div>
      <!-- <input id="register-password-input" class="form-input-2 t-p-s validate[required,minSize[6]]" type="password"> -->
    	<input id="register-password-input" class="form-input-2 t-p-s psnl-pwd" name="password" type="password" />
		<span class="text-danger error-personal pwd-err"></span>
    </div>

    <div class="form-input-ctn mg-btm-15">
      
      
      <div class="text-placeholder flt-l cursor-dflt t-p-s"> Confirm password </div>
      <!-- <input id="register-password-input" class="form-input-2 t-p-s validate[required,minSize[6]]" type="password"> -->
    	<input type="password" id="register-password-input" class="form-input-2 t-p-s cnf-pwd" id="password_confirm" name="password_confirm" >
		<span class="text-danger error-personal cnf-err"></span>					
    </div>
    <div class="form-input-ctn-modified alg-l flt-l mg-0-i mg-btm-10-i">
      <div class="link-spanner-2 cursor-ptr inl-blck" style="display: none;"> <a href="javascript:void(0);" class="register-newsletter-checkbox" data-newsletter="0"></a>
        <div class="form-input-ctn-modified alg-l inl-blck mg-0-i mg-btm-6-i"> I agree to receive Lalamove newsletter </div>
      </div>
      <div class="form-input-ctn"> By signing up, I agree to Lalamove's <a href="https://www.lalamove.com/hongkong-eng/terms-conditions" target="_blank" id="form-terms-and-cond">Terms and Conditions</a> and <a href="https://www.lalamove.com/hongkong-eng/privacy" target="_blank" id="form-privacy-policy">Privacy Policy</a>. </div>
    </div>
    <div class="fnt-15 form-input-ctn dft-gry alg-c mg-btm-15">
      <!-- <input id="form-register-btn" class="lightbox-btn" type="submit" value="Sign Up" disabled="disabled"> -->
      <!-- <input type="submit" id="form-register-btn" class="lightbox-btn" onclick="submitRegistrationPersonal()" value=""> -->
      <button id="form-register-btn" type="button" class="lightbox-btn" onclick="submitRegistrationPersonal()"> Register </button>
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
	<input type="hidden" name="user_type" id="user_type" value="2">
    <div class="form-input-ctn ">
      <div class="firstname-input-ctn flt-l">
        <div class="text-placeholder flt-l cursor-dflt"> First Name </div>
        <!-- <input id="register-name-input" class="form-input validate[required]" type="text"> -->
        <input id="register-name-input" class="form-input busns-first_name" name="first_name" type="text" value="<?php echo set_value('first_name'); ?>" />
		<span class="text-danger error-company bfname-err"></span>
      </div>
      <div class="lastname-input-ctn flt-r">
        <div class="text-placeholder flt-l cursor-dflt"> Last Name </div>
        <!-- <input id="register-lastname-input" class="form-input validate[required]" type="text"> -->
        <input id="register-lastname-input" class="form-input busns-last_name" name="last_name" type="text" value="<?php echo set_value('last_name'); ?>" />
		<span class="text-danger error-company blname-err"></span>
      </div>
    </div>
    <div class="form-input-ctn" style="margin-top: -5px;">
      <div class="text-placeholder flt-l cursor-dflt"> Email </div>
      <!-- <input id="register-email-input" class="form-input-2 validate[groupRequired[registration],custom[email]]" type="text"> -->
      	<input id="register-email-input" class="form-input-2 busns-email" name="email" placeholder="" type="text" value="<?php echo set_value('email'); ?>" />
		<span class="text-danger error-company bemail-err"></span>
    </div>
    <input id="area-code-link" data-country="hk" data-areacode="852" type="hidden">
    <div class="form-input-ctn va-m" style="position: relative;">
      <div class="text-placeholder flt-l cursor-dflt"> Mobile </div>
       
      <div class=" ">
        <!-- <input id="register-phone-input" class="form-input register-phone-input-style-i validate[groupRequired[registration]]" type="text" placeholder=""> -->
        <input id="register-phone-input" class="form-input register-phone-input-style-i busns-mobile" name="mobile" placeholder="" type="text" value="<?php echo set_value('mobile'); ?>" />
		<span class="text-danger error-company bmobile-err"></span>
      </div>
    </div>
    <div class="form-input-ctn mg-btm-15">
      <div class="flt-l cursor-dflt lgt-gry2 inl-blck" style="font-size: 11px; padding-top: 3px; padding-left: 8px; width:100%;"> A verification SMS will be sent to this number. </div>
      <br>
      <div class="text-placeholder flt-l cursor-dflt t-p-s"> Password </div>
      <!-- <input id="register-password-input" class="form-input-2 t-p-s validate[required,minSize[6]]" type="password"> -->
    	<input id="register-password-input" class="form-input-2 t-p-s busns-pwd" name="password"  type="password" />
		<span class="text-danger error-company bpwd-err"></span>
    </div>

    <div class="form-input-ctn mg-btm-15">     
      <br>
      <div class="text-placeholder flt-l cursor-dflt t-p-s"> Confirm Password </div>
      <!-- <input id="register-password-input" class="form-input-2 t-p-s validate[required,minSize[6]]" type="password"> -->
    	<input type="password" id="register-password-input" class="form-input-2 t-p-s busns-cnf_pwd" name="password_confirm" >
		<span class="text-danger error-company bcnf-pwd-err"></span>					
    </div>
    

     <div class="company-input-ctn"> 
     	<div class="text-placeholder flt-l cursor-dflt"> Company Name </div> 
     	<!-- <input id="register-company-input" class="form-input-2">  -->
     	<input id="register-company-input" class="form-input-2 company-name" name="company_name" placeholder="" type="text" value="<?php echo set_value('company_name'); ?>" />
		<span class="text-danger bcmpny-name"></span>
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
				<select name="industry[]" multiple="multiple" id="industry" class="form-control busns-industry">
					<option value="11" >Apparel</option>
					<option value="12" >Construction</option>
					<option value="13" >Electronics</option>
					<option value="14" >Food and Beverage</option>
					<option value="15" >Logistics</option>
					<option value="16" >Online Marketplace</option>
					<option value="17" >Other</option>
					<option value="18" >Professional Services</option>
				</select>
				<span class="text-danger industry-err"></span>
			</div>



		<div class="form-group">
				<label for="name">Staff</label>			
					<select name="staff[]" multiple="multiple" id="staff" class="form-control busns-staff">
						<option value="10">1-10</option>
						<option value="50">11-50</option>
						<option value="200">51-200</option>
						<option value="500">201-500</option>
						<option value="501">500+</option>
					</select>
				<span class="text-danger staff-err"></span>
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
      <!-- <input type="submit" id="form-register-btn" class="lightbox-btn" value="Register"> -->
      <button id="form-register-btn" type="button" class="lightbox-btn" onclick="submitRegistrationBusiness()"> Register </button>
    </div>
    <div class="fnt-15 form-input-ctn dft-gry alg-c">
      <!-- <input id="user-signup" class="form-signup-btn-style bdr-all cursor-ptr" type="submit" value="Back"> -->
      <button type="button" id="user-signup" class="form-signup-btn-style bdr-all cursor-ptr" onclick="backRegister()"> Back </button>
    </div>
  </form>
  <div class="form-input-ctn alg-c mg-top-10 oge"> <a id="user-signin" class="bg-none oge" href="#"> Already have an account </a> </div>
</div>

 
          </div>
        </div>
      </div>   
      
