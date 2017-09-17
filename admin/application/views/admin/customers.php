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
<style type="text/css">  
    td {
      vertical-align: middle !important;
    }
</style>
<!-- admin_customers.php starts -->
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
  <section class="content-header">
    <h1>Customers</h1>
    <ol class="breadcrumb">
      <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i>
          admin</a></li>
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
                <a href="<?php echo base_url(); ?>index.php/admin/addpartyCustomer"
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
                <th>Phone</th>
                <th>Mobile</th>
                <th>Email</th>
                <th style="width:1%">Wallet Balance</th>
                <th>Total Order</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($data['partyCustomerList'] as $customer) { ?>
                <tr data-row-id="<?php echo $customer->party_id;?>">
                  <td>
                      <?php if ($customer->person_image_url == 'NULL' || $customer->person_image_url == '') { ?>
                        <img class="profile-user-img img-responsive img-circle user__img"
                             src="<?php echo base_url(); ?>images/profile_img.jpg">
                      <?php } else { ?>
                        <img class="profile-user-img img-responsive img-circle user__img"
                             src='<?php echo base_url(); ?>images/<?php echo $customer->person_image_url; ?>'/>
                      <?php } ?>
                  </td>
                  <td>
                    <a href="<?php echo base_url(); ?>index.php/admin/customerOverview?party_id=<?php echo $customer->party_id ?>" style="color:#f16622;">
                        <?php if (!empty($customer->first_name)) echo $customer->first_name; ?> <?php if (!empty($customer->last_name)) echo $customer->last_name; ?>
                    </a>
                  </td>
                  <td><?php if (!empty($customer->area_code)) echo $customer->area_code; ?> <?php if (!empty($customer->contact_number)) echo $customer->contact_number; ?></td>
                  <td><?php if (!empty($customer->area_code)) echo $customer->area_code; ?> <?php if (!empty($customer->mobile_number)) echo $customer->mobile_number; ?></td>


                  <td>
                    <?php
                      $partyEmail = $this->adminmodel->getPartyEmailAddress($customer->party_id); 
                      if (!empty($partyEmail->info_string)) echo $partyEmail->info_string; 
                    ?>
                  </td>
                  <td>
                    <?php
                      $partywallet = $this->adminmodel->getPartyWallet($customer->party_id);
                    ?>
                    <input type="text" class="editable-col" col-index='1' value="<?php if (!empty($partywallet->amount)) echo $partywallet->amount; ?>">
                  </td>            
                  <td>
                    <?php
                      $partyTotalOrder = $this->adminmodel->getCustomerTotalOrder($customer->party_id); 
                      if (!empty($partyTotalOrder)) echo $partyTotalOrder; 
                    ?>
                  </td>

                  <td class="text__align__right">
                    <a href="<?php echo base_url(); ?>index.php/admin/customerOverview?party_id=<?php echo $customer->party_id ?>"
                       class="btn btn-info"><i class="fa fa-pencil"></i></a>
                    <a href="<?php echo base_url(); ?>index.php/admin/partyDelete?party_id=<?php echo $customer->party_id; ?>"
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

<script type="text/javascript">
        $(document).ready(function(){      
          $(document).on('focusout','.editable-col', function() {
            data = {};
            data['index'] = $(this).attr('col-index');
            data['val'] = $(this).val();
            data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');

            $.ajax({   

                type: "POST",  
                url: "<?php echo base_url(); ?>/index.php/admin/updateInline/wallet",  
                cache:false,  
                data: data,
                dataType: "json",       
                success: function(response)  
                {   
                }   
            });
        });
      });
  </script>