<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!--   <?php if ($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php } elseif ($this->session->flashdata('success')) { ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php } ?>  -->
        <?php if (isset($loginType)) { ?>
          <input type="hidden" name="login" class="login-onload" value="<?php echo $loginType; ?>">
        <?php } ?>
<div class="modal-dialog">
          <div class="logo-lalamove" style="text-align:center;"><img src="<?php echo base_url('assets/images/lalamove-logo.png'); ?>" alt=""></div>
          <div id="wallet-box" class="topPad">
            <div class="modal-content">
              <div style="width:auto;height:auto;overflow: auto;position:relative; background:#f6f6f3;">
                <button type="button" class="close closeCross" data-dismiss="modal" aria-hidden="true">×</button>
                <div class="signPanel">
                  <div id="user-login-box" class="noto-sans">
                    <div class="fnt-28 title dft-gry2 bld mg-btm-10"> Login </div>
                    <div class="form-email-mobile-ctn">
                      <div class="emailMobileRadio">
                          <div class="custom-radio form-email-btn">         
                            <input type="radio" name="login-radio" class="login-email custom-radio form-email-btn" id="email" checked="checked" value="Email"><label for="email" class="emailLbl">Email</label>
                          </div>
                          <div class="custom-radio form-mobile-btn">
                            <input type="radio" name="login-radio" class="login-mobile" id="mobile" value="Mobile"><label for="mobile" class="mobileLbl">Mobile</label>
                          </div>
                      </div>
                    </div>


                        <div class="email-login">
                          <?php $attributes = array("name" => "login","id"=>"email-login-form");
                          echo form_open("user/login", $attributes); ?>
                            <input type="hidden" id="login_type" name="login_type" value="1">
                              <input id="username-input" class="form-input-2" name="email" type="text" placeholder="Your email">
                              <span class="text-danger email-danger"></span>
                              <div class="form-input-ctn inl-blck">
                                <div class="text-placeholder flt-l cursor-dflt"> Password </div>
                                  <input id="password-input" class="form-input-2" type="password" placeholder="Your password">
                                  <span class="text-danger password-danger"></span>
                              </div>

                          <span class="text-danger wrng-eml-pwd"></span>
                            <!-- <div class="form-input-ctn-modified alg-l flt-l link-spanner-1 cursor-ptr"> <a href="javascript:void(0);" class="remember-checkbox"><img src="images/show-on-map-icon.png" alt="" style="vertical-align:middle;"></a>
                                   <h1 class="remember"> Remember me </h1>
                            </div> -->
                            <div class="form-input-ctn-modified alg-l flt-r"> <a id="user-forget" class="dft-gry user_forget" href="#model-forget" data-toggle="modal"> Forgot password </a> </div>
                          
                            <div class="fnt-15 form-input-ctn mg-btm-15 fnt-15">
                                  <!-- <input id="form-signin-btn" class="bdr-all dft-gry form-submit" value="Log in" type="submit"> -->
                                  <!-- <button class="btn btn-success" id="submit">Log in</button> -->
                                  <button id="form-signin-btn" type="button" class="bdr-all dft-gry form-submit" onclick="submitLoginFormEmail()">Log in</button>
                            </div>
                          </form>
                        </div>

                        <div class="mobile-login" style="display: none;">
                            <?php $attributes = array("name" => "login");
                            echo form_open("user/login", $attributes); ?>
                                <input type="hidden" name="login_type" id="login_type_mobile" value="2">
                                <div id="country-list-ctn" class="cursor-ptr dis-none flt-l" style="display: inline-block; position: relative; right: 0px;margin-bottom: -10%">
                                  <div class="width-70 flt-l" style="margin-left:10px;">
                                      <!-- <a class="btn btn-default dropdown-toggle" data-toggle="dropdown" style="border:none; background:none; padding:0;">
                                        <img class="va-m" src="http://pro.lalamove.com/assets/img/login-box/hk-flag.png" width="20px"> <span class="caret"></span>
                                        <div id="areacode" class="inl-blck lgt-gry2 va-t hide" value="852"> Hong Kong </div>
                                      </a> -->
                                    <!--   <ul class="dropdown-menu" role="menu" style="top:1e2;">
                                        <li><a href="#"><img class="area-code-style" src="http://pro.lalamove.com/assets/img/login-box/th-flag.png"> Bangkok</a></li>
                                        <li><a href="#"><img class="area-code-style" src="http://pro.lalamove.com/assets/img/login-box/th-flag.png"> Bangkok</a></li>
                                        <li><a href="#"><img class="area-code-style" src="http://pro.lalamove.com/assets/img/login-box/th-flag.png"> Bangkok</a></li>
                                        <li><a href="#"><img class="area-code-style" src="http://pro.lalamove.com/assets/img/login-box/th-flag.png"> Bangkok</a></li>
                                        <li><a href="#"><img class="area-code-style" src="http://pro.lalamove.com/assets/img/login-box/th-flag.png"> Bangkok</a></li>
                                      </ul> -->
                                      <select class="dropdown-menu1 mobile_code" name="mobile_code" role="menu" style="top:1e2; display: block !important; width: 30px;">
                                        <option value="66" class="dft-gry cursor-ptr bkk-link"> Bangkok</option>
                                        <option value="852" class="dft-gry cursor-ptr hk-link">Hong kong</option>
                                        <option value="63" class="dft-gry cursor-ptr ph-link">Manila</option>
                                        <option value="65" class="dft-gry cursor-ptr sg-link">Singapore</option>
                                        <option value="886" class="dft-gry cursor-ptr tp-link">Taipei</option>
                                      </select>
                                    </div>
                                </div>
                                
                                <input id="username-input" class="form-input-2 mobile-cls" name="mobile" type="text" placeholder="Your mobile">
                                <!-- <span class="text-danger"><?php //echo form_error('mobile'); ?></span> -->
                                <span class="text-danger mobile-danger"></span>
                              

                              <div class="form-input-ctn inl-blck">
                                <div class="text-placeholder flt-l cursor-dflt"> Password </div>
                                <input id="password-input" class="form-input-2 mpass-cls" type="password" placeholder="Your password">
                                <!-- <span class="text-danger"><?php //echo form_error('password'); ?></span> -->
                                <span class="text-danger mpassword-danger"></span>
                              </div>
                              <span class="text-danger wrng-mbl-pwd"></span>
                             <!--  <div class="form-input-ctn-modified alg-l flt-l link-spanner-1 cursor-ptr"> <a href="javascript:void(0);" class="remember-checkbox"><img src="images/show-on-map-icon.png" alt="" style="vertical-align:middle;"></a>
                                   <h1 class="remember"> Remember me </h1>
                            </div> -->
                            <div class="form-input-ctn-modified alg-l flt-r"> <a id="user-forget" class="dft-gry user_forget" href="#model-forget" data-toggle="modal"> Forgot password </a> </div>
                          
                            <div class="fnt-15 form-input-ctn mg-btm-15 fnt-15 vish">
                                  <!-- <input id="form-signin-btn" class="bdr-all dft-gry" value="Log in" type="submit"> -->
                                  <button id="form-signin-btn" type="button" class="bdr-all dft-gry form-submit" onclick="submitLoginFormMobile()">Log in</button>
                            </div>
                            </form>
                          </div>
                  
                     
                      <div class="form-input-ctn mg-btm-15 alg-c"> Don't have an account?  
                      <a id="user-signup" class="user-profile-icon cursor-ptr user_register"  href="#model-signUp" data-toggle="modal">
                      Create an Account </a> </div>
                      <div id="network-connection-error-msg" class="form-input-ctn mg-btm-40 dft-gry alg-r red hide"> Network connection error, please login again </div>
                    <!-- </form> -->
                  </div>
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