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

<!-- admin_customers.php starts -->
<div class="content-wrapper">
    <?php if ($this->session->flashdata('success_msg') != "") { ?>
      <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successfully</strong> <?php echo $this->session->flashdata('success_msg'); ?>
      </div>
    <?php } ?>
    <?php if ($this->session->flashdata('error_msg') != "") { ?>
      <div class="alert alert-WARNING alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warnig!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
      </div>
    <?php } ?>
  <section class="content-header">
    <h1>Customers</h1>
    <ol class="breadcrumb">
      <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i>
          Home</a></li>
      <li class="active">Customers</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header">
            <div class="row">
              <div class="col-sm-6 col-md-6">
                <h2 class="box-title floatalign_text_left">Customer List</h2>
              </div>
              <div class="col-sm-6 col-md-6">
                <a href="<?php echo base_url(); ?>index.php/home/addPartyCustomer"
                   class="btn btn-primary text__align__right floatalign_text_right"><i class="fa fa-plus"></i></a>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Username</th>
                <th>Last Invoice Date</th>
                <th>Last Invoice Status</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($data['partyCustomerList'] as $customer) { ?>
                <tr>
                  <td>
                      <?php if ($customer->PERSON_IMAGE_URL == 'NULL' || $customer->PERSON_IMAGE_URL == '') { ?>
                        <img class="profile-user-img img-responsive img-circle user__img"
                             src="<?php echo base_url(); ?>images/profile_img.jpg">
                      <?php } else { ?>
                        <img class="profile-user-img img-responsive img-circle user__img"
                             src='<?php echo base_url(); ?>images/<?php echo $customer->PERSON_IMAGE_URL; ?>'/>
                      <?php } ?>
                  </td>
                  <td>
                    <a href="<?php echo base_url(); ?>index.php/home/customerOverview?PARTY_ID=<?php echo $customer->PARTY_ID ?>">
                        <?php if (!empty($customer->FIRST_NAME)) echo $customer->FIRST_NAME; ?><?php if (!empty($customer->LAST_NAME)) echo $customer->LAST_NAME; ?>
                    </a>
                  </td>
                  <td><?php if (!empty($customer->USER_LOGIN_ID)) echo $customer->USER_LOGIN_ID; ?></td>
                  <td></td>
                  <td></td>
                  <td class="text__align__right">
                    <a href="<?php echo base_url(); ?>index.php/home/customerOverview?PARTY_ID=<?php echo $customer->PARTY_ID ?>"
                       class="btn btn-info"><i class="fa fa-pencil"></i></a>
                    <a href="<?php echo base_url(); ?>index.php/home/partyDelete?PARTY_ID=<?php echo $customer->PARTY_ID; ?>"
                       class="btn btn-danger"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>    