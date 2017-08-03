<div class="content-wrapper">	
	<section class="content">

		<?php if(isset($data['partyUserNameInfo'])) { ?>		
			<form class="form-horizontal" action="<?php echo base_url();?>index.php/home/updateUserInfo" method="POST">
			<input type="hidden" name="PARTY_TYPE_ID" value="<?php if(!empty($data['partyNameInfo'])) echo $data['partyNameInfo']->PARTY_TYPE_ID; ?>">
            <input type="hidden" name="PARTY_ID" value="<?php if(!empty($data['partyNameInfo'])) echo $data['partyNameInfo']->PARTY_ID; ?>">
		<?php } else { ?>
			<form class="form-horizontal" action="<?php echo base_url();?>index.php/home/addUserInfo" method="POST">
			<input type="hidden" name="PARTY_TYPE_ID" value="<?php if(!empty($data['partyTypeInfo'])) echo $data['partyTypeInfo']; ?>">
            <input type="hidden" name="PARTY_ID" value="<?php if(!empty($data['partyId'])) echo $data['partyId']; ?>">
		<?php } ?>
            <input type="hidden" name="EMAIL_MECH_ID" value="<?php if(!empty($data['partyEmailInfo']->CONTACT_MECH_ID)) echo $data['partyEmailInfo']->CONTACT_MECH_ID; ?>">
            <input type="hidden" name="TELECOM_MECH_ID" value="<?php if(!empty($data['partyTelecomInfo']->CONTACT_MECH_ID)) echo $data['partyTelecomInfo']->CONTACT_MECH_ID; ?>">
            <input type="hidden" name="POSTAL_MECH_ID" value="<?php if(!empty($data['partyAddressInfo']->CONTACT_MECH_ID)) echo $data['partyAddressInfo']->CONTACT_MECH_ID; ?>">
			<!-- Main content -->
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header">

							<?php if(isset($data['partyUserNameInfo'])) { 

								if($data['partyNameInfo']->PARTY_TYPE_ID == "CUSTOMER") { ?>	

									<h3 class='box-title'>Edit Basic Info of Customer</h3>
									<a href="<?php echo base_url();?>index.php/home/customerOverview?PARTY_ID=<?php echo $data['partyNameInfo']->PARTY_ID; ?>" class="btn btn-default float__right"><i class="fa fa-reply"></i></a>

								<?php } if($data['partyNameInfo']->PARTY_TYPE_ID == "DRIVER") { ?>

									<h3 class='box-title'>Edit Basic Info of Driver</h3>
									<a href="<?php echo base_url();?>index.php/home/driverOverview?PARTY_ID=<?php echo $data['partyNameInfo']->PARTY_ID; ?>" class="btn btn-default float__right"><i class="fa fa-reply"></i></a>

								<?php } if($data['partyNameInfo']->PARTY_TYPE_ID == "BUSSINESS") { ?>

									<h3 class='box-title'>Edit Basic Info of Driver</h3>
									<a href="<?php echo base_url();?>index.php/home/bussinessOverview?PARTY_ID=<?php echo $data['partyNameInfo']->PARTY_ID; ?>" class="btn btn-default float__right"><i class="fa fa-reply"></i></a>

							<?php } } else if($data['partyTypeInfo'] == "CUSTOMER") { ?>

								<h3 class='box-title'>Add Customer</h3>
								<a href="<?php echo base_url();?>index.php/home/customers" class="btn btn-default float__right"><i class="fa fa-reply"></i></a>	

							<?php } else if($data['partyTypeInfo'] == "DRIVER") { ?>

								<h3 class='box-title'>Add Driver</h3>
								<a href="<?php echo base_url();?>index.php/home/drivers" class="btn btn-default float__right"><i class="fa fa-reply"></i></a>
							
							<?php } else if($data['partyTypeInfo'] == "BUSSINESS") { ?>								
								
								<h3 class='box-title'>Add Bussiness Lister</h3>
								<a href="<?php echo base_url();?>index.php/home/bussiness" class="btn btn-default float__right"><i class="fa fa-reply"></i></a>
							
							<?php } ?>	
													
						</div>
						<div class="box-body">

							<?php if(isset($data['partyUserNameInfo'])) { ?>								
							<div class="row">
								<div class="form-group col-sm-6 col-md-6">
									<label class="col-sm-2 control-label asterisk">User Name</label>
									<div class="col-md-10">
										<input type="text" class="form-control" name="USER_LOGIN_ID" value="<?php if(!empty($data['partyUserNameInfo']->USER_LOGIN_ID)) echo $data['partyUserNameInfo']->USER_LOGIN_ID; ?>" required="required">
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
										<input type="text" class="form-control" name="PASSWORD">
									</div>
								</div>
							</div>
							<?php } ?>

							<div class="row">
								<div class="form-group col-sm-6 col-md-6">
									<label class="col-sm-2 control-label asterisk">First Name</label>
									<div class="col-md-10">
										<?php if(isset($data['partyNameInfo']->FIRST_NAME)) { ?>
										<input type="text" class="form-control" name="FIRST_NAME" value="<?php if(!empty($data['partyNameInfo']->FIRST_NAME)) echo $data['partyNameInfo']->FIRST_NAME; ?>" required="required">	
										<?php } else { ?>
										<input type="text" class="form-control" name="FIRST_NAME" required="required">
										<?php } ?>
									</div>
								</div>
								<div class="form-group col-sm-6 col-md-6">
									<label class="col-sm-2 control-label asterisk">Last Name</label>
									<div class="col-md-10">
										<?php if(isset($data['partyNameInfo']->LAST_NAME)) { ?>
										<input type="text" class="form-control" name="LAST_NAME" value="<?php if(!empty($data['partyNameInfo']->LAST_NAME)) echo $data['partyNameInfo']->LAST_NAME; ?>">	
										<?php } else { ?>
										<input type="text" class="form-control" name="LAST_NAME">
										<?php } ?>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="form-group col-sm-6 col-md-6">
									<label class="col-sm-2 control-label asterisk">Email</label>
									<div class="col-md-10">
										<?php if(isset($data['partyEmailInfo']->INFO_STRING)) { ?>
										<input type="text" class="form-control" name="INFO_STRING" value="<?php if(!empty($data['partyEmailInfo']->INFO_STRING)) echo $data['partyEmailInfo']->INFO_STRING; ?>" required="required">	
										<?php } else { ?>
										<input type="text" class="form-control" name="INFO_STRING" required="required">
										<?php } ?>
									</div>
								</div>
								<div class="form-group col-sm-6 col-md-6">
									<label class="col-sm-2 control-label asterisk">Phone</label>
									<div class="col-md-4">
										<?php if(isset($data['partyTelecomInfo']->AREA_CODE)) { ?>
										<input type="text" class="form-control" name="AREA_CODE" value="<?php if(!empty($data['partyTelecomInfo']->AREA_CODE)) echo $data['partyTelecomInfo']->AREA_CODE; ?>">	
										<?php } else { ?>
										<input type="text" class="form-control" name="AREA_CODE">
										<?php } ?>
									</div>
									<div class="col-md-6">
										<?php if(isset($data['partyTelecomInfo']->CONTACT_NUMBER)) { ?>
										<input type="text" class="form-control" name="CONTACT_NUMBER" value="<?php if(!empty($data['partyTelecomInfo']->CONTACT_NUMBER)) echo $data['partyTelecomInfo']->CONTACT_NUMBER; ?>">	
										<?php } else { ?>
										<input type="text" class="form-control" name="CONTACT_NUMBER">
										<?php } ?>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="form-group col-sm-6 col-md-6">
									<label class="col-sm-2 control-label asterisk">Mobile</label>
									<div class="col-md-10">
										<?php if(isset($data['partyTelecomInfo']->MOBILE_NUMBER)) { ?>
										<input type="text" class="form-control" name="MOBILE_NUMBER" value="<?php if(!empty($data['partyTelecomInfo']->MOBILE_NUMBER)) echo $data['partyTelecomInfo']->MOBILE_NUMBER; ?>" required="required">	
										<?php } else { ?>
										<input type="text" class="form-control" name="MOBILE_NUMBER" required="required">
										<?php } ?>
									</div>
								</div>
								<div class="form-group col-sm-6 col-md-6">
									<label class="col-sm-2 control-label asterisk">Alt Mobile</label>
									<div class="col-md-10">
										<?php if(isset($data['partyTelecomInfo']->ALT_MOBILE_NUMBER)) { ?>
										<input type="text" class="form-control" name="ALT_MOBILE_NUMBER" value="<?php if(!empty($data['partyTelecomInfo']->ALT_MOBILE_NUMBER)) echo $data['partyTelecomInfo']->ALT_MOBILE_NUMBER; ?>">	
										<?php } else { ?>
										<input type="text" class="form-control" name="ALT_MOBILE_NUMBER">
										<?php } ?>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group col-sm-6 col-md-6">
									<label class="col-sm-2 control-label asterisk">Address Line 1</label>
									<div class="col-md-10">
										<?php if(isset($data['partyAddressInfo']->ADDRESS1)) { ?>
										<input type="text" class="form-control" name="ADDRESS1" value="<?php if(!empty($data['partyAddressInfo']->ADDRESS1)) echo $data['partyAddressInfo']->ADDRESS1; ?>" required="required">	
										<?php } else { ?>
										<input type="text" class="form-control" name="ADDRESS1" required="required">
										<?php } ?>
									</div>
								</div>
								<div class="form-group col-sm-6 col-md-6">
									<label class="col-sm-2 control-label asterisk">Address Line 1</label>
									<div class="col-md-10">
										<?php if(isset($data['partyAddressInfo']->ADDRESS2)) { ?>
										<input type="text" class="form-control" name="ADDRESS2" value="<?php if(!empty($data['partyAddressInfo']->ADDRESS2)) echo $data['partyAddressInfo']->ADDRESS2; ?>">	
										<?php } else { ?>
										<input type="text" class="form-control" name="ADDRESS2">
										<?php } ?>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group col-sm-6 col-md-6">
									<label class="col-sm-2 control-label asterisk">City</label>
									<div class="col-md-10">
										<?php if(isset($data['partyAddressInfo']->CITY)) { ?>
										<input type="text" class="form-control" name="CITY" value="<?php if(!empty($data['partyAddressInfo']->CITY)) echo $data['partyAddressInfo']->CITY; ?>" required="required">	
										<?php } else { ?>
										<input type="text" class="form-control" name="CITY" required="required">
										<?php } ?>
									</div>
								</div>
								<div class="form-group col-sm-6 col-md-6">
									<label class="col-sm-2 control-label asterisk">State</label>
									<div class="col-md-10">
										<?php if(isset($data['partyAddressInfo']->STATE_PROVINCE_GEO_ID)) { ?>
										<input type="text" class="form-control" name="STATE" value="<?php if(!empty($data['partyAddressInfo']->STATE_PROVINCE_GEO_ID)) echo $data['partyAddressInfo']->STATE_PROVINCE_GEO_ID; ?>">	
										<?php } else { ?>
										<input type="text" class="form-control" name="STATE">
										<?php } ?>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="form-group col-sm-6 col-md-6">
									<label class="col-sm-2 control-label asterisk">Address Name</label>
									<div class="col-md-10">
										<?php if(isset($data['partyAddressInfo']->TO_NAME)) { ?>
										<input type="text" class="form-control" name="TO_NAME" value="<?php if(!empty($data['partyAddressInfo']->TO_NAME)) echo $data['partyAddressInfo']->TO_NAME; ?>" required="required">	
										<?php } else { ?>
										<input type="text" class="form-control" name="TO_NAME" required="required">
										<?php } ?>
									</div>
								</div>
								<div class="form-group col-sm-6 col-md-6">
									<label class="col-sm-2 control-label asterisk">Postal Code</label>
									<div class="col-md-10">
										<?php if(isset($data['partyAddressInfo']->POSTAL_CODE)) { ?>
										<input type="text" class="form-control" name="POSTAL_CODE" value="<?php if(!empty($data['partyAddressInfo']->POSTAL_CODE)) echo $data['partyAddressInfo']->POSTAL_CODE; ?>" required="required">	
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
				                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/>
				                                </svg> Upload Image&hellip;
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
		</form>
		
			<!-- <div class="row">
				<div class="col-md-6">
					<div class="box box-primary">
						<div class="box-header">
							<h3 class='box-title'>Change Password</h3>
						</div>
						<div class="box-body">
							<div class="row">
								<form action="<?php echo base_url();?>index.php/admin_controller/updatecustomerpassword" method="POST">
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