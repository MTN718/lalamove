<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- Sign up panel -->      
  <div class="modal-dialog">
      <div id="wallet-box3" class="topPad">
          
      <div id="user-register-box" class="noto-sans">
          <h3 class="dft-gry2 bld mg-btm-10" style="float: left;"> Settings </h3><br>
              <?php $attributes = array("name" => "signupform");
              echo form_open("user/updateReceiptEmail", $attributes); ?>    
              <br>
              <div class="form-input-ctn">
                <div style="float: left;">BILLING</div><br>
                  <i class="glyphicon glyphicon-envelope user-ic"></i>&nbsp;&nbsp;
                  <input class="form-input-2 psnl-email account-email-input" id="receipt-email-input" name="email" type="text" value="<?php echo $email; ?>" />
                  <span class="text-danger error-personal email-err"></span>
                </div>
                <hr class="hr-cls">

                <div class="form-input-ctn">
                <span class="settings-toggle">
                <i class="glyphicon glyphicon-list-alt user-ic"></i>&nbsp;&nbsp;

                  Receive E-Receipts </span>
                  <label class="switch">
                    <?php if(($e_receipt == "YES") || $e_receipt == "yes" ){ ?>
                    <input type="checkbox" id="e_receipt" name="e_receipt" value="YES" checked>
                    <span class="slider round e_receipt"></span>                      
                      <?php }else{ ?>
                    <input type="checkbox" id="e_receipt" name="e_receipt" value="NO">
                    <span class="slider round e_receipt"></span>
                    <?php } ?>
                  </label>
                </div>
             <hr class="hr-cls">
             <br>
                <div class="fnt-15 form-input-ctn dft-gry alg-c mg-btm-15">      
                    <button id="form-register-btn" type="button" class="lightbox-btn-pwd dismisss-btn" data-dismiss="modal"> Dismisss </button>
                    <button id="form-register-btn" type="button" class="lightbox-btn-pwd" onclick="updateReceiptEmail()"> Update </button>
                </div>    
              </form>
  
      </div> 
      </div>
  </div>
      
      
     
   
  