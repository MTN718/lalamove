<script type="text/javascript">
    $(document).ready(function(){      
        $('.criminal-case').on('click', function() {

            var data = $(this).attr('data');

            if(data == "yes") {
                $('#criminal_case_no_input').html("<input type='text' class='form-control' placeholder='Enter Police Clearance Number' name='criminal_case_clearance_no' required='required' value='<?php if (!empty($data['partyNameInfo']->criminal_case_clearance_no)) echo $data['partyNameInfo']->criminal_case_clearance_no; ?>'' style='border:1px solid red;'>");
            } else {
                $('#criminal_case_no_input').html('');
            }
       
        });
  });
</script>

<script type="text/javascript">
    $(document).ready(function(){      
        $('.owner-case').on('click', function() {
        
            var data = $(this).attr('data');
            
            if(data == "no") {
                $('#owner_case_no_input').html("<select class='form-control select2' id='driver' col-index='0' data-placeholder='Select Owner' name='external_id' required='required'><option value=''>Select Owner</option><?php foreach ($data['partyBusinessList'] as $partyBusiness) { ?><option value='<?php echo $partyBusiness->party_id; ?>'> <?php echo $partyBusiness->first_name; ?> <?php echo $partyBusiness->last_name; ?> </option> <?php } ?> </select>");
            } else {
                $('#owner_case_no_input').html('');
            }
       
        });
  });
</script>

<div class="content-wrapper">
     <?php if ($this->session->flashdata('success_msg') != "") { ?>
      <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successfully</strong> <?php echo $this->session->flashdata('success_msg'); ?>
      </div>
    <?php } ?>
    <?php if ($this->session->flashdata('error_msg') != "") { ?>
      <div class="alert alert-warning alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warnig!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
      </div>
    <?php } ?>
    <section class="content">
        <?php if (isset($data['partyUserNameInfo'])) { ?>
        <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/business/updateUserInfo/<?php echo $data['status']; ?>" method="POST">
            <input type="hidden" name="party_type_id" value="<?php if (!empty($data['partyNameInfo'])) echo $data['partyNameInfo']->party_type_id; ?>">
            <input type="hidden" name="party_id" value="<?php if (!empty($data['partyNameInfo'])) echo $data['partyNameInfo']->party_id; ?>">
        <?php } else { ?>
        <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/business/addUserInfo/<?php echo $data['status']; ?>" method="POST">
            <input type="hidden" name="party_type_id" value="<?php if (!empty($data['partyTypeInfo'])) echo $data['partyTypeInfo']; ?>">
            <input type="hidden" name="party_id" value="<?php if (!empty($data['partyid'])) echo $data['partyid']; ?>">
        <?php } ?>
            <input type="hidden" name="email_mech_id" value="<?php if (!empty($data['partyEmailInfo']->contact_mech_id)) echo $data['partyEmailInfo']->contact_mech_id; ?>">
            <input type="hidden" name="telecom_mech_id" value="<?php if (!empty($data['partyTelecomInfo']->contact_mech_id)) echo $data['partyTelecomInfo']->contact_mech_id; ?>">
            <input type="hidden" name="postal_mech_id" value="<?php if (!empty($data['partyAddressInfo']->contact_mech_id)) echo $data['partyAddressInfo']->contact_mech_id; ?>">

            <!-- Main content -->
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">

                        <?php if (isset($data['partyUserNameInfo'])) {
                            if ($data['partyNameInfo']->party_type_id == "customer") { ?>

                                <h3 class='box-title'>Edit Basic Info of Customer</h3>
                                <a href="<?php echo base_url(); ?>index.php/business/customerOverview/<?php echo $data['status']; ?>?party_id=<?php echo $data['partyNameInfo']->party_id; ?>" class="btn btn-default float__right"><i class="fa fa-reply"></i></a>

                            <?php }
                            if ($data['partyNameInfo']->party_type_id == "driver") { ?>

                                <h3 class='box-title'>Edit Basic Info of Driver</h3>
                                <a href="<?php echo base_url(); ?>index.php/business/driverOverview/<?php echo $data['status']; ?>?party_id=<?php echo $data['partyNameInfo']->party_id; ?>" class="btn btn-default float__right"><i class="fa fa-reply"></i></a>

                            <?php }
                            if ($data['partyNameInfo']->party_type_id == "business") { ?>

                                <h3 class='box-title'>Edit Basic Info of Driver</h3>
                                <a href="<?php echo base_url(); ?>index.php/business/businessOverview/<?php echo $data['status']; ?>?party_id=<?php echo $data['partyNameInfo']->party_id; ?>" class="btn btn-default float__right"><i class="fa fa-reply"></i></a>

                            <?php }
                        } else if ($data['partyTypeInfo'] == "customer") { ?>

                            <h3 class='box-title'>Add Customer</h3>
                            <a href="<?php echo base_url(); ?>index.php/business/customers" class="btn btn-default float__right"><i class="fa fa-reply"></i></a>

                        <?php } else if ($data['partyTypeInfo'] == "driver") { ?>

                            <h3 class='box-title'>Add Driver</h3>
                            <?php if($data['status'] == "business") { ?>
                                <a href="<?php echo base_url(); ?>index.php/business/businessOverview?party_id=<?php echo $data['owner_id']; ?>" class="btn btn-default float__right"><i class="fa fa-reply"></i></a>
                            <?php } else { ?>
                                <a href="<?php echo base_url(); ?>index.php/business/drivers" class="btn btn-default float__right"><i class="fa fa-reply"></i></a>
                            <?php } ?>

                        <?php } else if ($data['partyTypeInfo'] == "business") { ?>

                            <h3 class='box-title'>Add Business Lister</h3>
                            <a href="<?php echo base_url(); ?>index.php/business/business" class="btn btn-default float__right"><i class="fa fa-reply"></i></a>

                        <?php } ?>

                        </div>
                        <div class="box-body">

                            <?php if (isset($data['partyUserNameInfo'])) { ?>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-sm-2 control-label asterisk">User Name</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="user_login_id" value="<?php if (!empty($data['partyUserNameInfo']->user_login_id)) echo $data['partyUserNameInfo']->user_login_id; ?>" required="required">
                                        </div>
                                    </div>
                                </div>
                             <?php } else { ?>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-sm-2 control-label asterisk">User Name</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control" name="user_login_id" required="required">
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
                                        <?php if (isset($data['partyNameInfo']->first_name)) { ?>
                                            <input type="text" class="form-control" name="first_name" value="<?php if (!empty($data['partyNameInfo']->first_name)) echo $data['partyNameInfo']->first_name; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="first_name" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">Last Name</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyNameInfo']->last_name)) { ?>
                                            <input type="text" class="form-control" name="last_name" value="<?php if (!empty($data['partyNameInfo']->last_name)) echo $data['partyNameInfo']->last_name; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="last_name" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>











                            <!-- Here Field only for Drives -->
                            <?php if ($data['partyTypeInfo'] == "driver") { ?>
                                <div class="row">
                                    <div class="form-group col-sm-6 col-md-6">
                                        <label class="col-sm-2 control-label asterisk">License No.</label>
                                        <div class="col-md-10">
                                            <?php if (isset($data['partyNameInfo']->license_number)) { ?>
                                                <input type="text" class="form-control" name="license_number" value="<?php if (!empty($data['partyNameInfo']->license_number)) echo $data['partyNameInfo']->license_number; ?>" required="required">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="license_number" required="required">
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group col-sm-12 col-md-12">
                                            <label class="col-sm-2 control-label asterisk">Criminal Case</label>
                                            <div class="col-md-10">
                                                <div class="col-xs-3" style="padding: 0px;">
                                                    <div class="radio-inline">
                                                        <label>
                                                        <input type="radio" class="criminal-case" name="criminal_case_status" data="yes" value="Yes" required="required" <?php if (isset($data['partyNameInfo']->criminal_case_status) AND $data['partyNameInfo']->criminal_case_status == 'Yes') echo 'checked'; ?>>
                                                        Yes</label>
                                                    </div>
                                                    <div class="radio-inline">
                                                        <label>
                                                        <input type="radio" class="criminal-case" name="criminal_case_status" data="no" value="No" required="required" <?php if (isset($data['partyNameInfo']->criminal_case_status) AND $data['partyNameInfo']->criminal_case_status == 'No') echo 'checked'; ?>>
                                                        No</label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-9" style="padding: 0px;">
                                                    <?php if (isset($data['partyNameInfo']->criminal_case_clearance_no) AND $data['partyNameInfo']->criminal_case_status == 'Yes') { ?>
                                                        <div id="criminal_case_no_input">
                                                            <input type="text" class="form-control" name="criminal_case_clearance_no" value="<?php if (!empty($data['partyNameInfo']->criminal_case_clearance_no)) echo $data['partyNameInfo']->criminal_case_clearance_no; ?>" required="required" style="border:1px solid red;">
                                                        </div>
                                                    <?php } else { ?>
                                                        <div id="criminal_case_no_input"></div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>

                                        <input type="hidden" name="external_id" value="<?php echo $data['adminNameInfo']->party_id;?>">\
                                        
                                    </div>
                                </div>


                            <?php } else { ?>
                                <input type="hidden" name="external_id" value="">
                                <input type="hidden" name="license_number" value="">
                                <input type="hidden" name="criminal_case_status" value="">
                                <input type="hidden" name="criminal_case_clearance_no" value="">
                            <?php } ?>
                            <!-- End Field for only Drives -->


















                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">Email</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyEmailInfo']->info_string)) { ?>
                                            <input type="email" class="form-control" name="info_string" value="<?php if (!empty($data['partyEmailInfo']->info_string)) echo $data['partyEmailInfo']->info_string; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="email" class="form-control" name="info_string" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">Phone</label>
                                    <div class="col-md-4">
                                        <?php if (isset($data['partyTelecomInfo']->area_code)) { ?>
                                            <input type="number" class="form-control" name="area_code"
                                                 value="<?php if (!empty($data['partyTelecomInfo']->area_code)) echo $data['partyTelecomInfo']->area_code; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="number" class="form-control" name="area_code" required="required">
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php if (isset($data['partyTelecomInfo']->contact_number)) { ?>
                                            <input type="number" class="form-control" name="contact_number"
                                                 value="<?php if (!empty($data['partyTelecomInfo']->contact_number)) echo $data['partyTelecomInfo']->contact_number; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="number" class="form-control" name="contact_number" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">Mobile</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyTelecomInfo']->mobile_number)) { ?>
                                            <input type="number" class="form-control" name="mobile_number" value="<?php if (!empty($data['partyTelecomInfo']->mobile_number)) echo $data['partyTelecomInfo']->mobile_number; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="number" class="form-control" name="mobile_number" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">Alt Mobile</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyTelecomInfo']->alt_mobile_number)) { ?>
                                            <input type="number" class="form-control" name="alt_mobile_number" value="<?php if (!empty($data['partyTelecomInfo']->alt_mobile_number)) echo $data['partyTelecomInfo']->alt_mobile_number; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="number" class="form-control" name="alt_mobile_number" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">Address Line 1</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyAddressInfo']->address1)) { ?>
                                            <input type="text" class="form-control" name="address1" value="<?php if (!empty($data['partyAddressInfo']->address1)) echo $data['partyAddressInfo']->address1; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="address1" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">Address Line 2</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyAddressInfo']->address2)) { ?>
                                            <input type="text" class="form-control" name="address2" value="<?php if (!empty($data['partyAddressInfo']->address2)) echo $data['partyAddressInfo']->address2; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="address2" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">city</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyAddressInfo']->city)) { ?>
                                            <input type="text" class="form-control" name="city" value="<?php if (!empty($data['partyAddressInfo']->city)) echo $data['partyAddressInfo']->city; ?>" required="required" required="required">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="city" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">state</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyAddressInfo']->state_province_geo_id)) { ?>
                                            <input type="text" class="form-control" name="state" value="<?php if (!empty($data['partyAddressInfo']->state_province_geo_id)) echo $data['partyAddressInfo']->state_province_geo_id; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="state" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">Address Name</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyAddressInfo']->to_name)) { ?>
                                            <input type="text" class="form-control" name="to_name" value="<?php if (!empty($data['partyAddressInfo']->to_name)) echo $data['partyAddressInfo']->to_name; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="to_name" required="required">
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-group col-sm-6 col-md-6">
                                    <label class="col-sm-2 control-label asterisk">Postal Code</label>
                                    <div class="col-md-10">
                                        <?php if (isset($data['partyAddressInfo']->postal_code)) { ?>
                                            <input type="text" class="form-control" name="postal_code" value="<?php if (!empty($data['partyAddressInfo']->postal_code)) echo $data['partyAddressInfo']->postal_code; ?>" required="required">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="postal_code" required="required">
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

                                <?php if (isset($data['partyUserNameInfo'])) { ?>
                                    <button class="btn btn-primary">Update</button>
                                <?php } else { ?>
                                    <button class="btn btn-primary">Add</button>
                                <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        <?php if ($data['partyTypeInfo'] != "driver") { ?>

        <div class="row">
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class='box-title'>Change Password</h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <form action="<?php echo base_url();?>index.php/business/updatePartyPassword" method="POST">
                                    <input type="hidden" name="party_id" value="<?php echo $data['partyNameInfo']->party_id; ?>">
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
            </div>

            <?php } ?>

      </section>
    </div>