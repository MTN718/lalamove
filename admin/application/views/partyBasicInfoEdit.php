<script type="text/javascript">
    $(document).ready(function(){      
        $('.criminal-case').on('click', function() {
        
            var data = $(this).attr('data');
            var gridContainer = document.getElementById("criminal_case_no_input");
            gridContainer.innerHTML = ""; 

            if(data == "yes") {
                gridContainer.innerHTML += "<input type='text' class='form-control' placeholder='Enter Police Clearance Number' name='CRIMINAL_CASE_CLEARANCE_NO' required='required'  style='border:1px solid red;'>";
            } else {
                gridContainer.innerHTML = " ";
            }
       
        });
  });
</script>

<div class="content-wrapper">
    <section class="content">
        <?php if (isset($data['partyUserNameInfo'])) { ?>
        <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/home/updateUserInfo" method="POST">
            <input type="hidden" name="PARTY_TYPE_ID" value="<?php if (!empty($data['partyNameInfo'])) echo $data['partyNameInfo']->PARTY_TYPE_ID; ?>">
            <input type="hidden" name="PARTY_ID" value="<?php if (!empty($data['partyNameInfo'])) echo $data['partyNameInfo']->PARTY_ID; ?>">
        <?php } else { ?>
        <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/home/addUserInfo" method="POST">
            <input type="hidden" name="PARTY_TYPE_ID" value="<?php if (!empty($data['partyTypeInfo'])) echo $data['partyTypeInfo']; ?>">
            <input type="hidden" name="PARTY_ID" value="<?php if (!empty($data['partyId'])) echo $data['partyId']; ?>">
        <?php } ?>
            <input type="hidden" name="EMAIL_MECH_ID" value="<?php if (!empty($data['partyEmailInfo']->CONTACT_MECH_ID)) echo $data['partyEmailInfo']->CONTACT_MECH_ID; ?>">
            <input type="hidden" name="TELECOM_MECH_ID" value="<?php if (!empty($data['partyTelecomInfo']->CONTACT_MECH_ID)) echo $data['partyTelecomInfo']->CONTACT_MECH_ID; ?>">
            <input type="hidden" name="POSTAL_MECH_ID" value="<?php if (!empty($data['partyAddressInfo']->CONTACT_MECH_ID)) echo $data['partyAddressInfo']->CONTACT_MECH_ID; ?>">
            <!-- Main content -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">

                        <?php if (isset($data['partyUserNameInfo'])) {
                            if ($data['partyNameInfo']->PARTY_TYPE_ID == "CUSTOMER") { ?>

                                <h3 class='box-title'>Edit Basic Info of Customer</h3>
                                <a href="<?php echo base_url(); ?>index.php/home/customerOverview?PARTY_ID=<?php echo $data['partyNameInfo']->PARTY_ID; ?>" class="btn btn-default float__right"><i class="fa fa-reply"></i></a>

                            <?php }
                            if ($data['partyNameInfo']->PARTY_TYPE_ID == "DRIVER") { ?>

                                <h3 class='box-title'>Edit Basic Info of Driver</h3>
                                <a href="<?php echo base_url(); ?>index.php/home/driverOverview?PARTY_ID=<?php echo $data['partyNameInfo']->PARTY_ID; ?>" class="btn btn-default float__right"><i class="fa fa-reply"></i></a>

                            <?php }
                            if ($data['partyNameInfo']->PARTY_TYPE_ID == "BUSINESS") { ?>

                                <h3 class='box-title'>Edit Basic Info of Driver</h3>
                                <a href="<?php echo base_url(); ?>index.php/home/businessOverview?PARTY_ID=<?php echo $data['partyNameInfo']->PARTY_ID; ?>" class="btn btn-default float__right"><i class="fa fa-reply"></i></a>

                            <?php }
                        } else if ($data['partyTypeInfo'] == "CUSTOMER") { ?>

                            <h3 class='box-title'>Add Customer</h3>
                            <a href="<?php echo base_url(); ?>index.php/home/customers" class="btn btn-default float__right"><i class="fa fa-reply"></i></a>

                        <?php } else if ($data['partyTypeInfo'] == "DRIVER") { ?>

                            <h3 class='box-title'>Add Driver</h3>
                            <a href="<?php echo base_url(); ?>index.php/home/drivers" class="btn btn-default float__right"><i class="fa fa-reply"></i></a>

                        <?php } else if ($data['partyTypeInfo'] == "BUSINESS") { ?>

                            <h3 class='box-title'>Add Business Lister</h3>
                            <a href="<?php echo base_url(); ?>index.php/home/business" class="btn btn-default float__right"><i class="fa fa-reply"></i></a>

                        <?php } ?>

                        </div>
                        <div class="box-body">

                            <?php if (isset($data['partyUserNameInfo'])) { ?>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-sm-2 control-label asterisk">User Name</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="USER_LOGIN_ID" value="<?php if (!empty($data['partyUserNameInfo']->USER_LOGIN_ID)) echo $data['partyUserNameInfo']->USER_LOGIN_ID; ?>" required="required">
                                        </div>
                                    </div>
                                </div>
                             <?php } else { ?>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-sm-2 control-label asterisk">User Name</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="USER_LOGIN_ID" required="required">
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-sm-2 control-label asterisk">Password</label>
                                        <div class="col-md-10">
                                            <input type="password" class="form-control" name="PASSWORD" required="required">
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>

                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">First Name</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyNameInfo']->FIRST_NAME)) { ?>
                                            <input type="text" class="form-control" name="FIRST_NAME" value="<?php if (!empty($data['partyNameInfo']->FIRST_NAME)) echo $data['partyNameInfo']->FIRST_NAME; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="FIRST_NAME" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">Last Name</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyNameInfo']->LAST_NAME)) { ?>
                                            <input type="text" class="form-control" name="LAST_NAME" value="<?php if (!empty($data['partyNameInfo']->LAST_NAME)) echo $data['partyNameInfo']->LAST_NAME; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="LAST_NAME" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>



















                            <!-- Here Field for only Drives -->
                            <?php if ($data['partyTypeInfo'] == "DRIVER" OR $data['partyNameInfo']->PARTY_TYPE_ID == "DRIVER") { ?>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-sm-2 control-label asterisk">License No.</label>
                                        <div class="col-md-10">
                                            <?php if (isset($data['partyNameInfo']->LICENSE_NUMBER)) { ?>
                                                <input type="text" class="form-control" name="LICENSE_NUMBER" value="<?php if (!empty($data['partyNameInfo']->LICENSE_NUMBER)) echo $data['partyNameInfo']->LICENSE_NUMBER; ?>" required="required">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="LICENSE_NUMBER" required="required">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-sm-2 control-label asterisk">Criminal Case</label>
                                        <div class="col-md-10">
                                            <div class="col-xs-3" style="padding: 0px;">
                                                <div class="radio-inline">
                                                    <label><input type="radio" class="criminal-case" name="CRIMINAL_CASE_STATUS" data="yes" required="required">Yes</label>
                                                </div>
                                                <div class="radio-inline">
                                                    <label><input type="radio" class="criminal-case" name="CRIMINAL_CASE_STATUS" data="no" required="required">No</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-9" style="padding: 0px;">
                                                <?php if (isset($data['partyNameInfo']->CRIMINAL_CASE_CLEARANCE_NO)) { ?>
                                                    <input type="text" class="form-control" name="CRIMINAL_CASE_CLEARANCE_NO" value="<?php if (!empty($data['partyNameInfo']->CRIMINAL_CASE_CLEARANCE_NO)) echo $data['partyNameInfo']->CRIMINAL_CASE_CLEARANCE_NO; ?>" required="required" style="border:1px solid red;">
                                                <?php } else { ?>
                                                    <div id="criminal_case_no_input"></div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } else { ?>
                                <input type="hidden" name="LICENSE_NUMBER" value="">
                                <input type="hidden" name="CRIMINAL_CASE_STATUS" value="">
                                <input type="hidden" name="CRIMINAL_CASE_CLEARANCE_NO" value="">
                            <?php } ?>
                            <!-- End Field for only Drives -->


















                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">Email</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyEmailInfo']->INFO_STRING)) { ?>
                                            <input type="email" class="form-control" name="INFO_STRING" value="<?php if (!empty($data['partyEmailInfo']->INFO_STRING)) echo $data['partyEmailInfo']->INFO_STRING; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="email" class="form-control" name="INFO_STRING" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">Phone</label>
                                    <div class="col-md-4">
                                        <?php if (isset($data['partyTelecomInfo']->AREA_CODE)) { ?>
                                            <input type="number" class="form-control" name="AREA_CODE"
                                                 value="<?php if (!empty($data['partyTelecomInfo']->AREA_CODE)) echo $data['partyTelecomInfo']->AREA_CODE; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="number" class="form-control" name="AREA_CODE" required="required">
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if (isset($data['partyTelecomInfo']->CONTACT_NUMBER)) { ?>
                                            <input type="number" class="form-control" name="CONTACT_NUMBER"
                                                 value="<?php if (!empty($data['partyTelecomInfo']->CONTACT_NUMBER)) echo $data['partyTelecomInfo']->CONTACT_NUMBER; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="number" class="form-control" name="CONTACT_NUMBER" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">Mobile</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyTelecomInfo']->MOBILE_NUMBER)) { ?>
                                            <input type="number" class="form-control" name="MOBILE_NUMBER" value="<?php if (!empty($data['partyTelecomInfo']->MOBILE_NUMBER)) echo $data['partyTelecomInfo']->MOBILE_NUMBER; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="number" class="form-control" name="MOBILE_NUMBER" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">Alt Mobile</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyTelecomInfo']->ALT_MOBILE_NUMBER)) { ?>
                                            <input type="number" class="form-control" name="ALT_MOBILE_NUMBER" value="<?php if (!empty($data['partyTelecomInfo']->ALT_MOBILE_NUMBER)) echo $data['partyTelecomInfo']->ALT_MOBILE_NUMBER; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="number" class="form-control" name="ALT_MOBILE_NUMBER" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">Address Line 1</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyAddressInfo']->ADDRESS1)) { ?>
                                            <input type="text" class="form-control" name="ADDRESS1" value="<?php if (!empty($data['partyAddressInfo']->ADDRESS1)) echo $data['partyAddressInfo']->ADDRESS1; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="ADDRESS1" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">Address Line 2</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyAddressInfo']->ADDRESS2)) { ?>
                                            <input type="text" class="form-control" name="ADDRESS2" value="<?php if (!empty($data['partyAddressInfo']->ADDRESS2)) echo $data['partyAddressInfo']->ADDRESS2; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="ADDRESS2" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">City</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyAddressInfo']->CITY)) { ?>
                                            <input type="text" class="form-control" name="CITY" value="<?php if (!empty($data['partyAddressInfo']->CITY)) echo $data['partyAddressInfo']->CITY; ?>" required="required" required="required">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="CITY" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">State</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyAddressInfo']->STATE_PROVINCE_GEO_ID)) { ?>
                                            <input type="text" class="form-control" name="STATE" value="<?php if (!empty($data['partyAddressInfo']->STATE_PROVINCE_GEO_ID)) echo $data['partyAddressInfo']->STATE_PROVINCE_GEO_ID; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="STATE" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">Address Name</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyAddressInfo']->TO_NAME)) { ?>
                                            <input type="text" class="form-control" name="TO_NAME" value="<?php if (!empty($data['partyAddressInfo']->TO_NAME)) echo $data['partyAddressInfo']->TO_NAME; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="TO_NAME" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">Postal Code</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyAddressInfo']->POSTAL_CODE)) { ?>
                                            <input type="text" class="form-control" name="POSTAL_CODE" value="<?php if (!empty($data['partyAddressInfo']->POSTAL_CODE)) echo $data['partyAddressInfo']->POSTAL_CODE; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="POSTAL_CODE" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">Image</label>
                                    <div class="col-md-10">
                                        <input type="file" name="image" id="file-7" class="inputfile inputfile-6" data-multiple-caption="{count} files selected"/>
                                        <label for="file-7"><span></span>
                                            <strong>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                                <path
                                                    d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
                                                </svg>
                                            Upload Image&hellip;
                                            </strong>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="walk_request_button">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    <!--<div class="row">
    	   <div class="col-md-6">
    			<div class="box box-primary">
    				<div class="box-header">
    					<h3 class='box-title'>Change Password</h3>
    				</div>
    				<div class="box-body">
    					<div class="row">
    						<form action="<?php echo base_url(); ?>index.php/admin_controller/updatecustomerpassword" method="POST">
    							<input type="hidden" name="user_id" value="<?php echo $customerbasicdata->user_id; ?>">
    							<div class="form-group col-sm-12 col-md-12">
    								<label class="col-sm-3 control-label asterisk">New Password</label>
    								<div class="col-md-9">		
    									<input type="password" class="form-control" name="newpwd" required="required">
    								</div>
    							</div>
    							<div class="form-group col-sm-12 col-md-12">
    								<label class="col-sm-3 control-label asterisk">Confirm New Password</label>
    								<div class="col-md-9">		
    									<input type="password" class="form-control" name="confirmnewpwd" required="required">
    								</div>
    							</div>
    							<div class="walk_request_button">
    								<button class="btn btn-primary">Update</button>
    							</div>
    						</form>	
    					</div>
    				</div>
    			</div>
    		</div>
    	</div> -->

      </section>
    </div>