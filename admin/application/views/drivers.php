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
      <div class="alert alert-warning alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successfully</strong> <?php echo $this->session->flashdata('success_msg'); ?>
      </div>
    <?php } ?>
    <?php if ($this->session->flashdata('error_msg') != "") { ?>
      <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warnig!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
      </div>
    <?php } ?>
  <section class="content-header">
    <h1>Drivers</h1>
    <ol class="breadcrumb">
      <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i>
          Home</a></li>
      <li class="active">Drivers</li>
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
                <h2 class="box-title floatalign_text_left">Driver List</h2>
              </div>
              <div class="col-sm-6 col-md-6">
                <a href="<?php echo base_url(); ?>index.php/home/addPartyDriver"
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
                <!-- <th>Last Invoice Date</th> -->
                <th>Status</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              <?php foreach ($data['partyDriverList'] as $driver) { ?>
                <tr data-row-id="<?php echo $driver->PARTY_ID; ?>">
                  <td>
                      <?php if ($driver->PERSON_IMAGE_URL == 'NULL' || $driver->PERSON_IMAGE_URL == '') { ?>
                        <img class="profile-user-img img-responsive img-circle user__img"
                             src="<?php echo base_url(); ?>images/profile_img.jpg">
                      <?php } else { ?>
                        <img class="profile-user-img img-responsive img-circle user__img"
                             src='<?php echo base_url(); ?>images/<?php echo $driver->PERSON_IMAGE_URL; ?>'/>
                      <?php } ?>
                  </td>
                  <td>
                    <a href="<?php echo base_url(); ?>index.php/home/driverOverview?PARTY_ID=<?php echo $driver->PARTY_ID; ?>">
                        <?php if (!empty($driver->FIRST_NAME)) echo $driver->FIRST_NAME; ?><?php if (!empty($driver->LAST_NAME)) echo $driver->LAST_NAME; ?>
                    </a>
                  </td>
                  <td><?php if (!empty($driver->USER_LOGIN_ID)) echo $driver->USER_LOGIN_ID; ?></td>
                  <!-- <td></td> -->
                  <td><?php if (!empty($driver->STATUS_ID)) echo $driver->STATUS_ID; ?></td>
                  <td class="text__align__right">
                    <?php if($driver->STATUS_ID == "Active") { ?>                          
                      <a href="javascript:void(0)" class="btn btn-primary editable-action" col-index='4' data="Inactive"><i class="fa fa-thumbs-up"></i></a>
                    <?php } else { ?>                          
                      <a href="javascript:void(0)" class="btn btn-default editable-action" col-index='4' data="Active"><i class="fa fa-thumbs-down"></i></a>
                    <?php } ?>
                    <a href="<?php echo base_url(); ?>index.php/home/driverOverview?PARTY_ID=<?php echo $driver->PARTY_ID; ?>"
                       class="btn btn-info"><i class="fa fa-pencil"></i></a>
                    <a href="<?php echo base_url(); ?>index.php/home/partyDelete?PARTY_ID=<?php echo $driver->PARTY_ID; ?>"
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
      $('.editable-action').on('click', function() {
        data = {};
        data['val'] = $(this).attr('data');
        data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
        data['index'] = $(this).attr('col-index');
        
        $.ajax({   

            type: "POST",  
            url: "<?php echo base_url(); ?>/index.php/home/updateInline/drivers",  
            cache:false,  
            data: data,
            dataType: "json",       
            success: function(response)  
            {   
               // $("#vehicleAction").load(location.href + " #vehicleAction");
              location.reload();
           }   
       });
    });
  });
</script>