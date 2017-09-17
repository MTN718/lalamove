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
  .party-inactive-status {
    background-color: #D8534F;
    border-color: #D8534F;
    font-size: 12px;
}
.party-active-status {
    background-color: #049600;
    border-color: #049600;
    font-size: 12px;
}
.party-status-icon {
    border: 1px solid;
    color: #fff;
    width: 73px;
    text-align: center;
    height: 24px;
    padding-top: 2px;
}
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


    <div id="success" class="alert alert-success alert-dismissable" style="display: none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successfully</strong> Action completed...
    </div>


    <div id="error" class="alert alert-warning alert-dismissable" style="display: none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warnig!</strong> Driver have incomplete order, Can not Deactivate...
    </div>


    <div id="successtrash" class="alert alert-success alert-dismissable" style="display: none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Successfully</strong> Driver Deleted...
    </div>


    <div id="errortrash" class="alert alert-warning alert-dismissable" style="display: none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warnig!</strong> Driver have incomplete order, Can not Delete...
    </div>



<section class="content-header">
    <h1>Drivers</h1>
    <ol class="breadcrumb">
      <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i>
        admin</a></li>
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
              <a href="<?php echo base_url(); ?>index.php/admin/addpartyDriver"
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
            <th>Owner Name</th>
            <th>Lience No</th>
            <th>Phone</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Vehicle No</th>
            <th>Completed Order</th>
            <th>Current Order</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
      <?php foreach ($data['partyDriverList'] as $driver) { ?>
      <tr data-row-id="<?php echo $driver->party_id; ?>">
        <td>
          <?php if ($driver->person_image_url == 'NULL' || $driver->person_image_url == '') { ?>
          <img class="profile-user-img img-responsive img-circle user__img"
          src="<?php echo base_url(); ?>images/profile_img.jpg">
          <?php } else { ?>
          <img class="profile-user-img img-responsive img-circle user__img"
          src='<?php echo base_url(); ?>images/<?php echo $driver->person_image_url; ?>'/>
          <?php } ?>
      </td>
      <td>
          <a href="<?php echo base_url(); ?>index.php/admin/driverOverview?party_id=<?php echo $driver->party_id; ?>" style="color:#f16622;">
            <?php if (!empty($driver->first_name)) echo $driver->first_name; ?> <?php if (!empty($driver->last_name)) echo $driver->last_name; ?>
        </a>
    </td>

    <td>
        <?php if(!empty($driver->external_id)) { ?>
        <a href="<?php echo base_url(); ?>index.php/admin/businessOverview?external_id=<?php echo $driver->external_id ?>" style="color:#f16622;">
            <?php                                            
            $this->db->select('*');
            $this->db->from('person');
            $this->db->where('party_id', $driver->external_id);
            $driver_data = $this->db->get()->row();
            if (!empty($driver_data->first_name)) echo $driver_data->first_name;
            if (!empty($driver_data->last_name)) echo " ".$driver_data->last_name; 
            ?></a>
            <?php } else {
                echo "N/A";
            }
            ?>
        </td>


        <td><?php if (!empty($driver->license_number)) echo $driver->license_number; ?></td>


        <td><?php if (!empty($driver->area_code)) echo $driver->area_code; ?> <?php if (!empty($driver->contact_number)) echo $driver->contact_number; ?></td>
        <td><?php if (!empty($driver->area_code)) echo $driver->area_code; ?> <?php if (!empty($driver->mobile_number)) echo $driver->mobile_number; ?></td>


        <td>
            <?php
            $partyEmail = $this->adminmodel->getPartyEmailAddress($driver->party_id); 
            if (!empty($partyEmail->info_string)) echo $partyEmail->info_string; 
            ?>
        </td>
        <td>
            <?php
            $partyVehicle = $this->adminmodel->getDriverVehicleNo($driver->party_id); 
            if (!empty($partyVehicle->vehicle_no)) echo $partyVehicle->vehicle_no." [".$partyVehicle->vehicle_type_name."]"; else echo "N/A";
            ?>
        </td>            
        <td>
            <?php
            $partyTotalOrder = $this->adminmodel->getDriverTotalOrder($driver->party_id,"complete"); 
            if (!empty($partyTotalOrder)) echo $partyTotalOrder; else echo "0";
            ?>
        </td>          
        <td>
            <?php
            $partyTotalOrder = $this->adminmodel->getDriverTotalOrder($driver->party_id); 
            if (!empty($partyTotalOrder)) echo $partyTotalOrder; else echo "0";
            ?>
        </td>



        <td>
            <?php if (!empty($driver->status_id) AND $driver->status_id == "Inactive") { ?>
            <div class="party-status-icon party-inactive-status"> 
              <?php if (!empty($driver->status_id)) echo $driver->status_id; ?> 
          </div>
          <?php } else { ?>
          <div class="party-status-icon party-active-status"> 
              <?php if (!empty($driver->status_id)) echo $driver->status_id; ?> 
          </div>
          <?php } ?>
      </td>


      <td class="text__align__right">
        <?php if($driver->status_id == "Active") { ?>                          
        <a href="javascript:void(0)" class="btn btn-primary editable-action" col-index='4' data="Inactive"><i class="fa fa-thumbs-up"></i></a>
        <?php } else { ?>                          
        <a href="javascript:void(0)" class="btn btn-default editable-action" col-index='4' data="Active"><i class="fa fa-thumbs-down"></i></a>
        <?php } ?>
        <a href="<?php echo base_url(); ?>index.php/admin/driverOverview?party_id=<?php echo $driver->party_id; ?>"
           class="btn btn-info"><i class="fa fa-pencil"></i></a>
           <a href="<?php echo base_url(); ?>index.php/admin/partyDelete?party_id=<?php echo $driver->party_id; ?>"
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
          url: "<?php echo base_url(); ?>/index.php/admin/updateInline/drivers",  
          cache:false,  
          data: data,
          dataType: "json",       
          success: function(response)  
          {   
              if(data['index'] == 5) {

                if(response.msg == "success") {

                  $('#successtrash').css("display", "block");

                  $(window).load(setTimeout(function(){
                  location.reload();
                  }, 1000));

                } else {

                  $('#errortrash').css("display", "block");

                  $(window).load(setTimeout(function(){
                  location.reload();
                  }, 1000));
                }

              } else {

                if(response.msg == "success") {

                  $('#success').css("display", "block");

                  $(window).load(setTimeout(function(){
                  location.reload();
                  }, 1000));

                } else {

                  $('#error').css("display", "block");

                  $(window).load(setTimeout(function(){
                  location.reload();
                  }, 1000));
                }

              }
          }   
      });
    });
  });
</script>