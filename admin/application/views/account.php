<!--
  
  KARYON SOLUTIONS CONFIDENTIAL
  __________________
  
    Author : Ashwin Choudhary
    Url - http://www.karyonsolutions.com  
    [2016] - [2017] Karyon Solutions 
    All Rights Reserved.
  
  NOTICE:  All information contained herein is, and remains
  the property of Karyon Solutions and its suppliers,
  if any.  The intellectual and technical concepts contained
  herein are proprietary to Karyon Solutions
  and its suppliers and may be covered by Indian and Foreign Patents,
  patents in process, and are protected by trade secret or copyright law.
  Dissemination of this information or reproduction of this material
  is strictly forbidden unless prior written permission is obtained
 from Karyon Solutions.
-->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
    <?php if ($this->session->flashdata('warning_msg') != "") { ?>
      <div class="alert alert-warning alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warnig!</strong> <?php echo $this->session->flashdata('warning_msg'); ?>
      </div>
    <?php } ?>
    <?php if ($this->session->flashdata('success_msg') != "") { ?>
      <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
      </div>
    <?php } ?>
  <section class="content-header">
    <h1>User Profile</h1>
    <ol class="breadcrumb">
      <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">User profile</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <!-- Profile Image -->
        <div class="box box-primary">
          <div class="box-body box-profile">
              <?php if (empty($data['adminNameInfo']->PERSON_IMAGE_URL)) { ?>
                <img class="profile-user-img img-responsive img-circle"
                     src="<?php echo base_url(); ?>images/profile_img.jpg" alt="User profile picture" width="300px"
                     height="300px">
              <?php } else { ?>
                <img class="profile-user-img img-responsive img-circle"
                     src="<?php echo base_url(); ?>images/<?php echo $data['adminNameInfo']->PERSON_IMAGE_URL; ?>"
                     alt="User profile picture" width="300px" height="300px">
              <?php } ?>
            <h3 class="profile-username text-center"><?php echo $data['adminNameInfo']->FIRST_NAME; ?><?php echo $data['adminNameInfo']->LAST_NAME; ?></h3>

            <p class="text-muted text-center">Admin</p>

            <ul class="list-group list-group-unbordered">
              <li class="list-group-item">
                <b>Customer</b> <a class="pull-right"><?php echo $data['noOfCustomer']; ?></a>
              </li>
              <li class="list-group-item">
                <b>Driver</b> <a class="pull-right"><?php echo $data['noOfDriver']; ?></a>
              </li>
              <li class="list-group-item">
                <b>Business Lister</b> <a class="pull-right"><?php echo $data['noOfBusinessLister']; ?></a>
              </li>
            </ul>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="<?php if ($data['active'] == "setting") echo "active"; ?>"><a href="#settings" data-toggle="tab">Basic
                Info</a></li>
            <li class="<?php if ($data['active'] == "password") echo "active"; ?>"><a href="#password"
                                                                                      data-toggle="tab">Change
                Password</a></li>
            <li class="<?php if ($data['active'] == "profilepicture") echo "active"; ?>"><a href="#editprofilepicture"
                                                                                            data-toggle="tab">Edit
                Profile picture</a></li>
          </ul>

          <div class="tab-content">

            <div class="tab-pane <?php if ($data['active'] == "password") echo "active"; ?>" id="password">
              <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/home/updateUserPasswordInfo"
                    method="POST">
                <input type="hidden" name="PARTY_ID"
                       value="<?php if (!empty($data['partyId'])) echo $data['partyId']; ?>">
                <div class="form-group">
                  <label class="col-sm-2 control-label asterisk">New Password</label>
                  <div class="col-md-10">
                    <input type="password" class="form-control" name="NEW_PASSWORD" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label asterisk">Confirm New Password</label>
                  <div class="col-md-10">
                    <input type="password" class="form-control" name="CON_NEW_PASSWORD" required="required">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" onclick='' class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>


            <div class="tab-pane <?php if ($data['active'] == "setting") echo "active"; ?>" id="settings">
              <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/home/updateUserInfo"
                    method="POST">
                <input type="hidden" name="PARTY_ID"
                       value="<?php if (!empty($data['partyId'])) echo $data['partyId']; ?>">
                <input type="hidden" name="EMAIL_MECH_ID"
                       value="<?php if (!empty($data['partyEmailInfo']->CONTACT_MECH_ID)) echo $data['partyEmailInfo']->CONTACT_MECH_ID; ?>">
                <input type="hidden" name="TELECOM_MECH_ID"
                       value="<?php if (!empty($data['partyTelecomInfo']->CONTACT_MECH_ID)) echo $data['partyTelecomInfo']->CONTACT_MECH_ID; ?>">
                <input type="hidden" name="POSTAL_MECH_ID"
                       value="<?php if (!empty($data['partyAddressInfo']->CONTACT_MECH_ID)) echo $data['partyAddressInfo']->CONTACT_MECH_ID; ?>">

                <div class="form-group">
                  <label class="col-sm-2 control-label asterisk">User Name</label>
                  <div class="col-md-10">
                      <?php if (isset($data['partyUserNameInfo'])) { ?>
                        <input type="text" class="form-control" name="USER_LOGIN_ID"
                               value="<?php if (!empty($data['partyUserNameInfo']->USER_LOGIN_ID)) echo $data['partyUserNameInfo']->USER_LOGIN_ID; ?>"
                               required="required"/>
                      <?php } else { ?>
                        <input type="text" class="form-control" name="USER_LOGIN_ID" required="required"/>
                      <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label asterisk">First Name</label>
                  <div class="col-md-10">
                      <?php if (isset($data['adminNameInfo']->FIRST_NAME)) { ?>
                        <input type="text" class="form-control" name="FIRST_NAME"
                               value="<?php if (!empty($data['adminNameInfo']->FIRST_NAME)) echo $data['adminNameInfo']->FIRST_NAME; ?>"
                               required="required">
                      <?php } else { ?>
                        <input type="text" class="form-control" name="FIRST_NAME" required="required">
                      <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label asterisk">Last Name</label>
                  <div class="col-md-10">
                      <?php if (isset($data['adminNameInfo']->LAST_NAME)) { ?>
                        <input type="text" class="form-control" name="LAST_NAME"
                               value="<?php if (!empty($data['adminNameInfo']->LAST_NAME)) echo $data['adminNameInfo']->LAST_NAME; ?>">
                      <?php } else { ?>
                        <input type="text" class="form-control" name="LAST_NAME">
                      <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label asterisk">Email</label>
                  <div class="col-md-10">
                      <?php if (isset($data['partyEmailInfo']->INFO_STRING)) { ?>
                        <input type="email" class="form-control" name="INFO_STRING"
                               value="<?php if (!empty($data['partyEmailInfo']->INFO_STRING)) echo $data['partyEmailInfo']->INFO_STRING; ?>"
                               required="required">
                      <?php } else { ?>
                        <input type="email" class="form-control" name="INFO_STRING">
                      <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label asterisk">Phone</label>
                  <div class="col-md-4">
                      <?php if (isset($data['partyTelecomInfo'])) { ?>
                        <input type="text" class="form-control" name="AREA_CODE"
                               value="<?php if (!empty($data['partyTelecomInfo']->AREA_CODE)) echo $data['partyTelecomInfo']->AREA_CODE; ?>"
                               required="required">
                      <?php } else { ?>
                        <input type="text" class="form-control" name="AREA_CODE">
                      <?php } ?>
                  </div>
                  <div class="col-md-6">
                      <?php if (isset($data['partyTelecomInfo'])) { ?>
                        <input type="text" class="form-control" name="CONTACT_NUMBER"
                               value="<?php if (!empty($data['partyTelecomInfo']->CONTACT_NUMBER)) echo $data['partyTelecomInfo']->CONTACT_NUMBER; ?>"
                               required="required">
                      <?php } else { ?>
                        <input type="text" class="form-control" name="CONTACT_NUMBER">
                      <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label asterisk">Mobile</label>
                  <div class="col-md-10">
                      <?php if (isset($data['partyTelecomInfo'])) { ?>
                        <input type="text" class="form-control" name="MOBILE_NUMBER"
                               value="<?php if (!empty($data['partyTelecomInfo']->MOBILE_NUMBER)) echo $data['partyTelecomInfo']->MOBILE_NUMBER; ?>"
                               required="required">
                      <?php } else { ?>
                        <input type="text" class="form-control" name="MOBILE_NUMBER">
                      <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label asterisk">Alt Mobile</label>
                  <div class="col-md-10">
                      <?php if (isset($data['partyTelecomInfo'])) { ?>
                        <input type="text" class="form-control" name="ALT_MOBILE_NUMBER"
                               value="<?php if (!empty($data['partyTelecomInfo']->ALT_MOBILE_NUMBER)) echo $data['partyTelecomInfo']->ALT_MOBILE_NUMBER; ?>"
                               required="required">
                      <?php } else { ?>
                        <input type="text" class="form-control" name="ALT_MOBILE_NUMBER">
                      <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label asterisk">Address Name</label>
                  <div class="col-md-10">
                      <?php if (isset($data['partyAddressInfo']->TO_NAME)) { ?>
                        <input type="text" class="form-control" name="TO_NAME"
                               value="<?php if (!empty($data['partyAddressInfo']->TO_NAME)) echo $data['partyAddressInfo']->TO_NAME; ?>"
                               required="required">
                      <?php } else { ?>
                        <input type="text" class="form-control" name="TO_NAME">
                      <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label asterisk">Address Line 1</label>
                  <div class="col-md-10">
                      <?php if (isset($data['partyAddressInfo']->ADDRESS1)) { ?>
                        <input type="text" class="form-control" name="ADDRESS1"
                               value="<?php if (!empty($data['partyAddressInfo']->ADDRESS1)) echo $data['partyAddressInfo']->ADDRESS1; ?>">
                      <?php } else { ?>
                        <input type="text" class="form-control" name="ADDRESS1">
                      <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label asterisk">Address Line 2</label>
                  <div class="col-md-10">
                      <?php if (isset($data['partyAddressInfo']->ADDRESS2)) { ?>
                        <input type="text" class="form-control" name="ADDRESS2"
                               value="<?php if (!empty($data['partyAddressInfo']->ADDRESS2)) echo $data['partyAddressInfo']->ADDRESS2; ?>">
                      <?php } else { ?>
                        <input type="text" class="form-control" name="ADDRESS2">
                      <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label asterisk">City</label>
                  <div class="col-md-10">
                      <?php if (isset($data['partyAddressInfo']->CITY)) { ?>
                        <input type="text" class="form-control" name="CITY"
                               value="<?php if (!empty($data['partyAddressInfo']->CITY)) echo $data['partyAddressInfo']->CITY; ?>"
                               required="required">
                      <?php } else { ?>
                        <input type="text" class="form-control" name="CITY" required="required">
                      <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label asterisk">State</label>
                  <div class="col-md-10">
                      <?php if (isset($data['partyAddressInfo']->STATE_PROVINCE_GEO_ID)) { ?>
                        <input type="text" class="form-control"
                               value="<?php if (!empty($data['partyAddressInfo']->STATE_PROVINCE_GEO_ID)) echo $data['partyAddressInfo']->STATE_PROVINCE_GEO_ID; ?>"
                               name="STATE" required="required">
                      <?php } else { ?>
                        <input type="text" class="form-control" name="STATE" required="required">
                      <?php } ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label asterisk">Postal Code</label>
                  <div class="col-md-10">
                      <?php if (isset($data['partyAddressInfo']->POSTAL_CODE)) { ?>
                        <input type="text" class="form-control"
                               value="<?php if (!empty($data['partyAddressInfo']->POSTAL_CODE)) echo $data['partyAddressInfo']->POSTAL_CODE; ?>"
                               name="POSTAL_CODE" required="required">
                      <?php } else { ?>
                        <input type="text" class="form-control" name="POSTAL_CODE" required="required">
                      <?php } ?>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" onclick='' class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>

            <div class="tab-pane <?php if ($data['active'] == "profilepicture") echo "active"; ?>"
                 id="editprofilepicture">
              <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/home/updateUserPictureInfo"
                    method="POST" enctype="multipart/form-data">
                <input type="hidden" name="PARTY_ID"
                       value="<?php if (!empty($data['partyId'])) echo $data['partyId']; ?>">
                <div class="form-group">
                  <div class="col-md-10">
                    <input type="file" name="image" id="file-7" class="inputfile inputfile-6"
                           data-multiple-caption="{count} files selected" required="required" multiple/>
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
                <div class="modal-footer">
                  <button type="submit" onclick='' class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</div>  