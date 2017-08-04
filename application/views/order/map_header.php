<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Lalamove</title>
<link href="//fonts.googleapis.com/css?family=Noto+Sans:700,400,400i,700i" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet" type="text/css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

<!-- Bootstrap Core CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" type="text/css">

<!-- Plugin CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/animate.min.css" type="text/css">

<!-- Custom CSS -->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/map.css" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

   <style type="text/css">       /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }

      /* Optional: Makes the sample page fill the window. */
     
    /*  .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #origin-input,
      #waypoints-Input,
      #destination-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 200px;
      }

      #origin-input:focus,
      #waypoints-Input:focus,
      #destination-input:focus {
        border-color: #4d90fe;
      }

      #mode-selector {
        color: #fff;
        background-color: #4d90fe;
        margin-left: 12px;
        padding: 5px 11px 0px 11px;
      }

      #mode-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }*/
</style>
</head>

<body>
<!-- top header  -->
<header id="header">
  <div>
    <div class="logo-ctn"> <a class="logo-link" href="/" target="_self"> <img src="<?php echo base_url('assets/images/lalamove-logo.png'); ?>" alt=" " width="176" height="40"> </a> </div>
    <div id="header-menu-ctn">
      <div id="tutorial-ctn"> <a id="tutorial" class="header-menu-btn cursor-ptr dft-gry"> Tutorial </a> </div>
      <div id="user-profile-ctn" class="dropdown"> <a id="user-profile" class="header-menu-btn cursor-ptr dft-gry dropdown-toggle"  href="#" class="" data-toggle="dropdown"> <span id="user-profile-name" class="ellipsis">Guest</span> <span class="down-arrow-icon"></span> </a>
        <ul class="dropdown-menu" role="menu">
          <li><a id="about-us" class="user-profile-icon cursor-ptr"> About Us </a></li>
          <li><a id="user-signin" class="user-profile-icon cursor-ptr user_signin"  href="#model-signIn" data-toggle="modal"> Sign In </a></li>
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
                
            <div id="user-register-box" class="noto-sans">
  <div class="fnt-28 title dft-gry2 bld mg-btm-10"> Create an Account </div>
  <form id="register-form" action="javascript:void(0);">
    <div class="form-input-ctn ">
      <div class="firstname-input-ctn flt-l">
        <div class="text-placeholder flt-l cursor-dflt"> First Name </div>
        <input id="register-name-input" class="form-input validate[required]" type="text">
      </div>
      <div class="lastname-input-ctn flt-r">
        <div class="text-placeholder flt-l cursor-dflt"> Last Name </div>
        <input id="register-lastname-input" class="form-input validate[required]" type="text">
      </div>
    </div>
    <div class="form-input-ctn" style="margin-top: -5px;">
      <div class="text-placeholder flt-l cursor-dflt"> Email </div>
      <input id="register-email-input" class="form-input-2 validate[groupRequired[registration],custom[email]]" type="text">
    </div>
    <input id="area-code-link" data-country="hk" data-areacode="852" type="hidden">
    <div class="form-input-ctn va-m" style="position: relative;">
      <div class="text-placeholder flt-l cursor-dflt"> Mobile </div>
       
      <div class=" ">
        <input id="register-phone-input" class="form-input register-phone-input-style-i validate[groupRequired[registration]]" type="text" placeholder="">
      </div>
    </div>
    <div class="form-input-ctn mg-btm-15">
      <div class="flt-l cursor-dflt lgt-gry2 inl-blck" style="font-size: 11px; padding-top: 3px; padding-left: 8px; width:100%;"> A verification SMS will be sent to this number. </div>
      <br>
      <div class="text-placeholder flt-l cursor-dflt t-p-s"> Password </div>
      <input id="register-password-input" class="form-input-2 t-p-s validate[required,minSize[6]]" type="password">
    </div>
    <div class="form-input-ctn-modified alg-l flt-l mg-0-i mg-btm-10-i">
      <div class="link-spanner-2 cursor-ptr inl-blck" style="display: none;"> <a href="javascript:void(0);" class="register-newsletter-checkbox" data-newsletter="0"></a>
        <div class="form-input-ctn-modified alg-l inl-blck mg-0-i mg-btm-6-i"> I agree to receive Lalamove newsletter </div>
      </div>
      <div class="form-input-ctn"> By signing up, I agree to Lalamove's <a href="https://www.lalamove.com/hongkong-eng/terms-conditions" target="_blank" id="form-terms-and-cond">Terms and Conditions</a> and <a href="https://www.lalamove.com/hongkong-eng/privacy" target="_blank" id="form-privacy-policy">Privacy Policy</a>. </div>
    </div>
    <div class="fnt-15 form-input-ctn dft-gry alg-c mg-btm-15">
      <input id="form-register-btn" class="lightbox-btn" type="submit" value="Sign Up" disabled="disabled">
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
  <form id="register-form" action="javascript:void(0);">
    <div class="form-input-ctn ">
      <div class="firstname-input-ctn flt-l">
        <div class="text-placeholder flt-l cursor-dflt"> First Name </div>
        <input id="register-name-input" class="form-input validate[required]" type="text">
      </div>
      <div class="lastname-input-ctn flt-r">
        <div class="text-placeholder flt-l cursor-dflt"> Last Name </div>
        <input id="register-lastname-input" class="form-input validate[required]" type="text">
      </div>
    </div>
    <div class="form-input-ctn" style="margin-top: -5px;">
      <div class="text-placeholder flt-l cursor-dflt"> Email </div>
      <input id="register-email-input" class="form-input-2 validate[groupRequired[registration],custom[email]]" type="text">
    </div>
    <input id="area-code-link" data-country="hk" data-areacode="852" type="hidden">
    <div class="form-input-ctn va-m" style="position: relative;">
      <div class="text-placeholder flt-l cursor-dflt"> Mobile </div>
       
      <div class=" ">
        <input id="register-phone-input" class="form-input register-phone-input-style-i validate[groupRequired[registration]]" type="text" placeholder="">
      </div>
    </div>
    <div class="form-input-ctn mg-btm-15">
      <div class="flt-l cursor-dflt lgt-gry2 inl-blck" style="font-size: 11px; padding-top: 3px; padding-left: 8px; width:100%;"> A verification SMS will be sent to this number. </div>
      <br>
      <div class="text-placeholder flt-l cursor-dflt t-p-s"> Password </div>
      <input id="register-password-input" class="form-input-2 t-p-s validate[required,minSize[6]]" type="password">
    </div>
     <div class="company-input-ctn"> <div class="text-placeholder flt-l cursor-dflt"> Company Name </div> <input id="register-company-input" class="form-input-2"> </div>
     
     <div id="industry-input-ctn" class="bdr-btm flt-l mg-btm-15" style="border-color: #303030; text-align:left;"> <a id="industry-picker" class="industry-dropdown-btn cursor-ptr" data-originalvalue="Industry"> <span id="register-industry-input" class="form-input cursor-ptr"> Industry </span> <span id="register-industry-input-list" class="form-input cursor-ptr" style="display:none;color:#747474 !important;font-weight: 400 !important;"> <span id="multi_industry_list"></span> <span class="tooltiptext" style="display: none;"></span> </span> <span class="down-arrow-icon flt-r" style="margin-right: 10px; margin-top: 6px"> </span> </a>
  <div class="industry-menu-box dft-menubox">
    <div class="inl-blck wdth-100 pd-top-5" id="industryNo7"> <a id="7" href="javascript:void(0);" class="register-business-industry-checkbox" data-newsletter="0"></a> <span> Apparel </span> </div>
    <div class="inl-blck wdth-100 pd-top-5" id="industryNo3"> <a id="3" href="javascript:void(0);" class="register-business-industry-checkbox" data-newsletter="0"></a> <span> Construction </span> </div>
    <div class="inl-blck wdth-100 pd-top-5" id="industryNo4"> <a id="4" href="javascript:void(0);" class="register-business-industry-checkbox" data-newsletter="0"></a> <span> Electronics </span> </div>
    <div class="inl-blck wdth-100 pd-top-5" id="industryNo1"> <a id="1" href="javascript:void(0);" class="register-business-industry-checkbox" data-newsletter="0"></a> <span> Food and Beverage </span> </div>
    <div class="inl-blck wdth-100 pd-top-5" id="industryNo2"> <a id="2" href="javascript:void(0);" class="register-business-industry-checkbox" data-newsletter="0"></a> <span> Logistics </span> </div>
    <div class="inl-blck wdth-100 pd-top-5" id="industryNo6"> <a id="6" href="javascript:void(0);" class="register-business-industry-checkbox" data-newsletter="0"></a> <span> Online Marketplace </span> </div>
    <div class="inl-blck wdth-100 pd-top-5" id="industryNo8"> <a id="8" href="javascript:void(0);" class="register-business-industry-checkbox" data-newsletter="0"></a> <span> Other </span> </div>
    <div class="inl-blck wdth-100 pd-top-5" id="industryNo5"> <a id="5" href="javascript:void(0);" class="register-business-industry-checkbox" data-newsletter="0"></a> <span> Professional Services </span> </div>
  </div>
</div>

<div id="staffs-input-ctn" class="bdr-btm flt-r" style="border-color: #303030"> <a id="staffs-picker" class="staffs-dropdown-btn cursor-ptr" data-originalvalue="# of Staff"> <span id="register-staffs-input" class="form-input cursor-ptr"> # of Staff </span> <span class="down-arrow-icon inl-blck flt-r" style="margin-right: 10px; margin-top: 6px"></span> </a> <div class="staff-menu-box dft-menubox">   <div class="inl-blck wdth-100 pd-top-5" id="staffNo9"> <a id="9" href="javascript:void(0);" class="register-business-staffs-checkbox" data-newsletter="0"></a> <span> 1-10 </span> </div>  <div class="inl-blck wdth-100 pd-top-5" id="staffNo10"> <a id="10" href="javascript:void(0);" class="register-business-staffs-checkbox" data-newsletter="0"></a> <span> 11-50 </span> </div>  <div class="inl-blck wdth-100 pd-top-5" id="staffNo11"> <a id="11" href="javascript:void(0);" class="register-business-staffs-checkbox" data-newsletter="0"></a> <span> 51-200 </span> </div>  <div class="inl-blck wdth-100 pd-top-5" id="staffNo12"> <a id="12" href="javascript:void(0);" class="register-business-staffs-checkbox" data-newsletter="0"></a> <span> 201-500 </span> </div>  <div class="inl-blck wdth-100 pd-top-5" id="staffNo13"> <a id="13" href="javascript:void(0);" class="register-business-staffs-checkbox" data-newsletter="0"></a> <span> 500+ </span> </div>  </div> </div>
     
    <div class="form-input-ctn-modified alg-l flt-l mg-0-i mg-btm-10-i">
      <div class="link-spanner-2 cursor-ptr inl-blck" style="display: none;"> <a href="javascript:void(0);" class="register-newsletter-checkbox" data-newsletter="0"></a>
        <div class="form-input-ctn-modified alg-l inl-blck mg-0-i mg-btm-6-i"> I agree to receive Lalamove newsletter </div>
      </div>
      <div class="form-input-ctn"> By signing up, I agree to Lalamove's <a href="https://www.lalamove.com/hongkong-eng/terms-conditions" target="_blank" id="form-terms-and-cond">Terms and Conditions</a> and <a href="https://www.lalamove.com/hongkong-eng/privacy" target="_blank" id="form-privacy-policy">Privacy Policy</a>. </div>
    </div>
    <div class="fnt-15 form-input-ctn dft-gry alg-c mg-btm-15">
      <input id="form-register-btn" class="lightbox-btn" type="submit" value="Sign Up" disabled="disabled">
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