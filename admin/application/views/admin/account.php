<!--
  
  KARYON SOLUTIONS CONFidENTIAL
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
      <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i> admin</a></li>
      <li class="active">User profile</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <div class="box box-primary">
          <div class="box-body box-profile">
          
            <?php if (empty($data['adminNameInfo']->person_image_url)) { ?>
            <img class="profile-user-img img-responsive img-circle"
            src="<?php echo base_url(); ?>images/profile_img.jpg" alt="User profile picture" width="300px"
            height="300px">
            <?php } else { ?>
            <img class="profile-user-img img-responsive img-circle"
            src="<?php echo base_url(); ?>images/<?php echo $data['adminNameInfo']->person_image_url; ?>"
            alt="User profile picture" width="300px" height="300px">
            <?php } ?>

            <h3 class="profile-username text-center"><?php echo $data['adminNameInfo']->first_name; ?> <?php echo $data['adminNameInfo']->last_name; ?></h3>
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
        </div>
      </div>

      <div class="col-md-9">
        <div class="nav-tabs-custom">
          <ul class="nav nav-tabs">
            <li class="<?php if ($data['active'] == "time") echo "active"; ?>"><a href="#timeline" data-toggle="tab">Timeline</a></li>
            <li class="<?php if ($data['active'] == "setting") echo "active"; ?>"><a href="#settings" data-toggle="tab">Basic Info</a></li>
            <li class="<?php if ($data['active'] == "password") echo "active"; ?>"><a href="#password" data-toggle="tab">Change Password</a></li>
            <li class="<?php if ($data['active'] == "profilepicture") echo "active"; ?>"><a href="#editprofilepicture" data-toggle="tab">Edit Profile picture</a></li>
          </ul>

          <div class="tab-content">

            <div class="tab-pane <?php if($data['active'] == "time") echo "active";?>" id="timeline">
              <ul class="timeline timeline-inverse">
                <?php 
                $currentdate = date('Y-m-d H:i:s');
                for ($i = 0; $i < 7; $i++) { 
                  $newdate = strtotime ( '-'.$i.' day' , strtotime ( $currentdate ) ) ;
                  $newdate = date ( 'Y-m-d' , $newdate );   
                  $date = date('d', strtotime ($newdate));            
                  ?>
                  <li class="time-label">
                    <?php if($date%2 == 0) { ?>
                      <span class="bg-red">
                    <?php } else { ?>
                      <span class="bg-green">
                    <?php } ?>
                        <?php echo $newdate; ?>
                      </span>
                    </li>                    
                    <?php foreach ($data['timeLineInfo'] as $timeline) { 
                      $datetime = date('Y-m-d', strtotime($timeline->datetime));
                      if($datetime == $newdate) { ?>   
                      <!-- timeline item -->
                      <li>  
                      <?php if($timeline->notification_for == "party") { ?>
                        <i class="fa fa-user bg-red"></i>
                      <?php } else if($timeline->notification_for == "order") { ?>
                        <i class="fa fa-shopping-cart bg-yellow"></i>
                      <?php } else if($timeline->notification_for == "vehicle") { ?>
                        <i class="fa fa-truck bg-aqua"></i>
                      <?php } else if($timeline->notification_for == "vehicletype") { ?>
                        <i class="fa fa-truck bg-blue"></i>
                      <?php } else if($timeline->notification_for == "service") { ?>
                        <i class="fa fa-ioxhost bg-light-blue"></i>
                      <?php } else if($timeline->notification_for == "discount") { ?>
                        <i class="fa fa-percent bg-green"></i>
                      <?php } else if($timeline->notification_for == "password") { ?>
                        <i class="fa fa-key bg-navy"></i>
                      <?php } else if($timeline->notification_for == "wallet") { ?>
                        <i class="fa fa-credit-card bg-teal"></i>
                      <?php } else if($timeline->notification_for == "profile") { ?>
                        <i class="fa fa-photo bg-coral"></i>
                      <?php } else if($timeline->notification_for == "setting") { ?>
                        <i class="fa fa-cogs bg-olive"></i>
                      <?php } else if($timeline->notification_for == "policy") { ?>
                        <i class="fa fa-puzzle-piece bg-lime"></i>
                      <?php } else if($timeline->notification_for == "termcondition") { ?>
                        <i class="fa fa-star-o bg-orange"></i>
                      <?php } else if($timeline->notification_for == "faqs") { ?>
                        <i class="fa fa-umbrella bg-fuchsia"></i>
                      <?php } else if($timeline->notification_for == "delete") { ?>
                        <i class="fa fa-close bg-purple"></i>
                      <?php } else { ?>
                        <i class="fa fa-circle bg-maroon"></i>
                      <?php } ?> 
                        <div class="timeline-item">
                          <span class="time">
                            <i class="fa fa-clock-o"></i>
                            <?php 
                            $currentdatetime = date('Y-m-d H:i:s');
                            $notificationdate = $timeline->datetime;                      
                            $from = new DateTime($notificationdate);
                            $to   = new DateTime($currentdatetime);

                            if($from->diff($to)->d > 0) {
                              echo $i." Day ago";
                            } else if($from->diff($to)->i > 59) {
                              $age  = $from->diff($to)->h;
                              echo $age." Hour ago";
                            } else if($from->diff($to)->i < 59) {            
                              $age  = $from->diff($to)->i;
                              echo $age." mins ago";
                            } ?>
                          </span>
                          <h3 class="timeline-header">
                            <a href="#"><?php if(!empty($timeline->subject)) echo $timeline->subject; ?></a><?php if(!empty($timeline->messag)) echo $timeline->message; ?>
                          </h3>
                        </div>
                      </li>
                      <?php } } } ?>
                      <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                      </li>
                    </ul>
                  </div>


                  <div class="tab-pane <?php if ($data['active'] == "password") echo "active"; ?>" id="password">
                    <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/admin/updateUserPasswordInfo"
                      method="POST">
                      <input type="hidden" name="party_id"
                      value="<?php if (!empty($data['partyid'])) echo $data['partyid']; ?>">
                      <div class="form-group">
                        <label class="col-sm-2 control-label asterisk">New Password</label>
                        <div class="col-md-10">
                          <input type="password" class="form-control" name="new_password" required="required">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label asterisk">Confirm New Password</label>
                        <div class="col-md-10">
                          <input type="password" class="form-control" name="con_new_password" required="required">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" onclick='' class="btn btn-primary">Update</button>
                      </div>
                    </form>
                  </div>


                  <div class="tab-pane <?php if ($data['active'] == "setting") echo "active"; ?>" id="settings">
                    <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/admin/updateUserInfo"
                      method="POST">
                      <input type="hidden" name="party_id"
                      value="<?php if (!empty($data['partyid'])) echo $data['partyid']; ?>">
                      <input type="hidden" name="email_mech_id"
                      value="<?php if (!empty($data['partyEmailInfo']->contact_mech_id)) echo $data['partyEmailInfo']->contact_mech_id; ?>">
                      <input type="hidden" name="telecom_mech_id"
                      value="<?php if (!empty($data['partyTelecomInfo']->contact_mech_id)) echo $data['partyTelecomInfo']->contact_mech_id; ?>">
                      <input type="hidden" name="postal_mech_id"
                      value="<?php if (!empty($data['partyAddressInfo']->contact_mech_id)) echo $data['partyAddressInfo']->contact_mech_id; ?>">

                      <div class="form-group">
                        <label class="col-sm-2 control-label asterisk">User Name</label>
                        <div class="col-md-10">
                          <?php if (isset($data['partyUserNameInfo'])) { ?>
                          <input type="text" class="form-control" name="user_login_id"
                          value="<?php if (!empty($data['partyUserNameInfo']->user_login_id)) echo $data['partyUserNameInfo']->user_login_id; ?>"
                          required="required"/>
                          <?php } else { ?>
                          <input type="text" class="form-control" name="user_login_id" required="required"/>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label asterisk">First Name</label>
                        <div class="col-md-10">
                          <?php if (isset($data['adminNameInfo']->first_name)) { ?>
                          <input type="text" class="form-control" name="first_name"
                          value="<?php if (!empty($data['adminNameInfo']->first_name)) echo $data['adminNameInfo']->first_name; ?>"
                          required="required">
                          <?php } else { ?>
                          <input type="text" class="form-control" name="first_name" required="required">
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label asterisk">Last Name</label>
                        <div class="col-md-10">
                          <?php if (isset($data['adminNameInfo']->last_name)) { ?>
                          <input type="text" class="form-control" name="last_name"
                          value="<?php if (!empty($data['adminNameInfo']->last_name)) echo $data['adminNameInfo']->last_name; ?>">
                          <?php } else { ?>
                          <input type="text" class="form-control" name="last_name">
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label asterisk">Email</label>
                        <div class="col-md-10">
                          <?php if (isset($data['partyEmailInfo']->info_string)) { ?>
                          <input type="email" class="form-control" name="info_string"
                          value="<?php if (!empty($data['partyEmailInfo']->info_string)) echo $data['partyEmailInfo']->info_string; ?>"
                          required="required">
                          <?php } else { ?>
                          <input type="email" class="form-control" name="info_string">
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label asterisk">Phone</label>
                        <div class="col-md-4">
                          <?php if (isset($data['partyTelecomInfo'])) { ?>
                          <input type="text" class="form-control" name="area_code"
                          value="<?php if (!empty($data['partyTelecomInfo']->area_code)) echo $data['partyTelecomInfo']->area_code; ?>"
                          required="required">
                          <?php } else { ?>
                          <input type="text" class="form-control" name="area_code">
                          <?php } ?>
                        </div>
                        <div class="col-md-6">
                          <?php if (isset($data['partyTelecomInfo'])) { ?>
                          <input type="text" class="form-control" name="contact_number"
                          value="<?php if (!empty($data['partyTelecomInfo']->contact_number)) echo $data['partyTelecomInfo']->contact_number; ?>"
                          required="required">
                          <?php } else { ?>
                          <input type="text" class="form-control" name="contact_number">
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label asterisk">Mobile</label>
                        <div class="col-md-10">
                          <?php if (isset($data['partyTelecomInfo'])) { ?>
                          <input type="text" class="form-control" name="mobile_number"
                          value="<?php if (!empty($data['partyTelecomInfo']->mobile_number)) echo $data['partyTelecomInfo']->mobile_number; ?>"
                          required="required">
                          <?php } else { ?>
                          <input type="text" class="form-control" name="mobile_number">
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label asterisk">Alt Mobile</label>
                        <div class="col-md-10">
                          <?php if (isset($data['partyTelecomInfo'])) { ?>
                          <input type="text" class="form-control" name="alt_mobile_number"
                          value="<?php if (!empty($data['partyTelecomInfo']->alt_mobile_number)) echo $data['partyTelecomInfo']->alt_mobile_number; ?>"
                          required="required">
                          <?php } else { ?>
                          <input type="text" class="form-control" name="alt_mobile_number">
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label asterisk">Address Name</label>
                        <div class="col-md-10">
                          <?php if (isset($data['partyAddressInfo']->to_name)) { ?>
                          <input type="text" class="form-control" name="to_name"
                          value="<?php if (!empty($data['partyAddressInfo']->to_name)) echo $data['partyAddressInfo']->to_name; ?>"
                          required="required">
                          <?php } else { ?>
                          <input type="text" class="form-control" name="to_name">
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label asterisk">Address Line 1</label>
                        <div class="col-md-10">
                          <?php if (isset($data['partyAddressInfo']->address1)) { ?>
                          <input type="text" class="form-control" name="address1"
                          value="<?php if (!empty($data['partyAddressInfo']->address1)) echo $data['partyAddressInfo']->address1; ?>">
                          <?php } else { ?>
                          <input type="text" class="form-control" name="address1">
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label asterisk">Address Line 2</label>
                        <div class="col-md-10">
                          <?php if (isset($data['partyAddressInfo']->address2)) { ?>
                          <input type="text" class="form-control" name="address2"
                          value="<?php if (!empty($data['partyAddressInfo']->address2)) echo $data['partyAddressInfo']->address2; ?>">
                          <?php } else { ?>
                          <input type="text" class="form-control" name="address2">
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label asterisk">city</label>
                        <div class="col-md-10">
                          <?php if (isset($data['partyAddressInfo']->city)) { ?>
                          <input type="text" class="form-control" name="city"
                          value="<?php if (!empty($data['partyAddressInfo']->city)) echo $data['partyAddressInfo']->city; ?>"
                          required="required">
                          <?php } else { ?>
                          <input type="text" class="form-control" name="city" required="required">
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label asterisk">state</label>
                        <div class="col-md-10">
                          <?php if (isset($data['partyAddressInfo']->state_province_geo_id)) { ?>
                          <input type="text" class="form-control"
                          value="<?php if (!empty($data['partyAddressInfo']->state_province_geo_id)) echo $data['partyAddressInfo']->state_province_geo_id; ?>"
                          name="state" required="required">
                          <?php } else { ?>
                          <input type="text" class="form-control" name="state" required="required">
                          <?php } ?>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label asterisk">Postal Code</label>
                        <div class="col-md-10">
                          <?php if (isset($data['partyAddressInfo']->postal_code)) { ?>
                          <input type="text" class="form-control"
                          value="<?php if (!empty($data['partyAddressInfo']->postal_code)) echo $data['partyAddressInfo']->postal_code; ?>"
                          name="postal_code" required="required">
                          <?php } else { ?>
                          <input type="text" class="form-control" name="postal_code" required="required">
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
                   <form class="form-horizontal" action="<?php echo base_url(); ?>index.php/admin/updateUserPictureInfo"
                    method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="party_id"
                    value="<?php if (!empty($data['partyid'])) echo $data['partyid']; ?>">
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