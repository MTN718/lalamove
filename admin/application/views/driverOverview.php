<style type="text/css">
  .select2-selection {
    border: none !important;
    background: none !important;
}
</style>

<div class="content-wrapper">

    <?php if ($this->session->flashdata('error_msg') != "") { ?>
      <div class="alert alert-warning alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Warnig!</strong> <?php echo $this->session->flashdata('error_msg'); ?>
      </div>
    <?php } ?>
    <?php if ($this->session->flashdata('success_msg') != "") { ?>
      <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> <?php echo $this->session->flashdata('success_msg'); ?>
      </div>
    <?php } ?>

  <section class="content-header">
    <h1>Driver Overview</h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo base_url(); ?>index.php/home/drivers"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Driver Overview</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Basic Information</h3>
        <div class="box-tools pull-right">
          <a href="<?php echo base_url(); ?>index.php/home/partyBasicInfoEdit?PARTY_ID=<?php echo $data['partyUserNameInfo']->PARTY_ID; ?>"
             type="button" class="btn btn-info"><i class="fa fa-pencil"></i></a>
          <a href="<?php echo base_url(); ?>index.php/home/drivers" class="btn btn-default"><i class="fa fa-reply"></i></a>
        </div>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="col-md-6">
              <label>User Name</label>
            </div>
            <div class="col-md-6">
                <?php if (!empty($data['partyUserNameInfo']->USER_LOGIN_ID)) echo $data['partyUserNameInfo']->USER_LOGIN_ID; ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="col-md-6">
              <label>Name</label>
            </div>
            <div class="col-md-6">
                <?php if (!empty($data['partyNameInfo']->FIRST_NAME)) echo $data['partyNameInfo']->FIRST_NAME; ?>
              &nbsp;<?php if (!empty($data['partyNameInfo']->LAST_NAME)) echo $data['partyNameInfo']->LAST_NAME; ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="col-md-6">
              <label>Email</label>
            </div>
            <div class="col-md-6">
                <?php if (!empty($data['partyEmailInfo']->INFO_STRING)) echo $data['partyEmailInfo']->INFO_STRING; ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="col-md-6">
              <label>Phone</label>
            </div>
            <div class="col-md-6">
                <?php if (!empty($data['partyTelecomInfo']->AREA_CODE)) echo $data['partyTelecomInfo']->AREA_CODE; ?>
              - <?php if (!empty($data['partyTelecomInfo']->CONTACT_NUMBER)) echo $data['partyTelecomInfo']->CONTACT_NUMBER; ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="col-md-6">
              <label>Mobile</label>
            </div>
            <div class="col-md-6">
                <?php if (!empty($data['partyTelecomInfo']->MOBILE_NUMBER)) echo $data['partyTelecomInfo']->MOBILE_NUMBER; ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="col-md-6">
              <label>Alt Mobile</label>
            </div>
            <div class="col-md-6">
                <?php if (!empty($data['partyTelecomInfo']->ALT_MOBILE_NUMBER)) echo $data['partyTelecomInfo']->ALT_MOBILE_NUMBER; ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="col-md-6">
              <label>License No.</label>
            </div>
            <div class="col-md-6">
                <?php if (!empty($data['partyNameInfo']->LICENSE_NUMBER)) echo $data['partyNameInfo']->LICENSE_NUMBER; ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="col-md-6">
              <label>Criminal Case</label>
            </div>
            <div class="col-md-6">
                <?php 
                  if (!empty($data['partyNameInfo']->CRIMINAL_CASE_STATUS)) echo $data['partyNameInfo']->CRIMINAL_CASE_STATUS;

                  if (!empty($data['partyNameInfo']->CRIMINAL_CASE_CLEARANCE_NO) AND $data['partyNameInfo']->CRIMINAL_CASE_STATUS == 'Yes') echo " [ Clearance No: ".$data['partyNameInfo']->CRIMINAL_CASE_CLEARANCE_NO." ]";;  
                ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="col-md-6">
              <label>Address</label>
            </div>
            <div class="col-md-6">
                <?php if (!empty($data['partyAddressInfo']->ADDRESS1)) echo $data['partyAddressInfo']->ADDRESS1; ?>,
                <?php if (!empty($data['partyAddressInfo']->ADDRESS2)) echo $data['partyAddressInfo']->ADDRESS2; ?><br>
                <?php if (!empty($data['partyAddressInfo']->CITY)) echo $data['partyAddressInfo']->CITY; ?>,
                <?php if (!empty($data['partyAddressInfo']->STATE_PROVINCE_GEO_ID)) echo $data['partyAddressInfo']->STATE_PROVINCE_GEO_ID; ?>
              ,
                <?php if (!empty($data['partyAddressInfo']->POSTAL_CODE)) echo $data['partyAddressInfo']->POSTAL_CODE; ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
            <div class="col-xs-6">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <h2 class="box-title floatalign_text_left">Vehicle List</h2>
                            </div>
                            <div class="col-sm-6 col-md-6">
                              <?php if(empty($data['vehiclesList'])) { ?>
                                <a href="" data-toggle="modal" data-target="#addVehicleDialog" class="btn btn-primary floatalign_text_right" style="margin-top: -13px;margin-right: -10px;"><i class="fa fa-plus"></i></a>
                              <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example123456" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Vehicle No.</th>
                                    <th>Vehicle Type</th>
                                    <th>Registration No.</th>
                                    <th>Permit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data['vehiclesList'] as $vehicle) { ?>
                                <tr data-row-id="<?php echo $vehicle->VEHICLE_ID;?>">
                                    <td><?php echo $vehicle->VEHICLE_NO; ?></td>
                                    <td>             
                                        <select class="form-control select2 editable-col" col-index='1' data-placeholder="Select Vehicle Type" name="VEHICLE_TYPE_ID" style="width: 100%">
                                        <?php foreach ($data['vehicleTypeList'] as $vehicleType) { 
                                            $str_flag = "";
                                            if($vehicleType->VEHICLE_TYPE_ID == $vehicle->VEHICLE_TYPE_ID)
                                               $str_flag = "selected"; 
                                        ?>
                                        <option value="<?php echo $vehicleType->VEHICLE_TYPE_ID; ?>" <?php echo $str_flag; ?> > <?php echo $vehicleType->VEHICLE_TYPE_NAME; ?> </option>
                                        <?php } ?>
                                       </select>
                                    </td>
                                    <td>                    
                                        <input type="text" class="form-control editable-col" col-index='2' name="REGISTRATION_NO" value="<?php echo $vehicle->REGISTRATION_NO; ?>" style="width: 100%">
                                    </td>
                                    <td>                    
                                        <select class="form-control select2 editable-col" col-index='3' data-placeholder="Select Vehicle Type" name="PERMIT" style="width: 100%">
                                            <option value="INTRASTATE" <?php if($vehicle->PERMIT == "INTRASTATE") echo "selected"; ?> > INTRASTATE </option>
                                            <option value="INTERSTATE" <?php if($vehicle->PERMIT == "INTERSTATE") echo "selected"; ?> > INTERSTATE </option>
                                        </select>
                                    </td>
                                    <td id="vehicleAction">
                                        <?php if($vehicle->VEHICLE_STATUS == 1) { ?>                          
                                        <a href="javascript:void(0)" class="btn btn-primary editable-action" col-index='4' data="0"><i class="fa fa-thumbs-up"></i></a>
                                        <?php } else { ?>                          
                                        <a href="javascript:void(0)" class="btn btn-default editable-action" col-index='4' data="1"><i class="fa fa-thumbs-down"></i></a>
                                        <?php } ?>                    
                                        <a href="javascript:void(0)" class="btn btn-danger editable-action" col-index='5' data="0" onclick="return confirm('Are you sure you want to delete this Vehicle?');"><i class="fa fa-trash"></i></a> 
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <div class="row">
              <div class="col-sm-6 col-md-6" style="text-align:left;float: left;">
                <h2 class="box-title">Order List</h2>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example6" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Order ID</th>
                  <th>User Name</th>
                  <th>Order Date</th>
                  <th>Amount Paid</th>
                  <th>Amount Due</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <!-- <?php
                foreach ($invoices as $invoice) { ?>
                  <tr>
                        <td><?php echo $invoice->invoice_id; ?></td>
                        <td>
                          <?php
                    $this->db->select('*');
                    $this->db->from('users');
                    $this->db->where('user_id', $invoice->user_id);
                    $row = $this->db->get()->row();
                    echo $row->fname . " " . $row->lname;
                    ?>
                        </td>
                        <td><?php echo $invoice->invoice_from_date; ?></td>
                        <td><?php echo $invoice->invoice_to_date; ?></td>
                        <td>$<?php echo $invoice->amount; ?></td>
                        <td>
                        <?php
                    if ($invoice->amount == 0) {
                        $this->db->select('sum(billing_charge) as total');
                        $this->db->from('walk');
                        $this->db->join('invoice_walk_conn', 'walk.walk_id = invoice_walk_conn.walk_id');
                        $this->db->where('invoice_walk_conn.invoice_id', $invoice->invoice_id);
                        $revenue = $this->db->get()->row();
                        echo "$" . $revenue->total;
                    } else {
                        echo "-";
                    }
                    ?>
                        </td>
                        <td>
                          <?php
                    $this->db->select('*');
                    $this->db->from('invoice_status');
                    $this->db->where('status_id', $invoice->invoice_status);
                    $row = $this->db->get()->row();
                    echo $row->title;
                    ?>
                        </td> 
                        <td class="text__align__right">                                                                             
                            <a href="<?php echo base_url(); ?>index.php/admin_controller/invoiceoverview?id=<?php echo $invoice->invoice_id; ?>" class="btn btn-primary"><i class="fa fa-thumbs-up"></i> View Invoice</a>
                          <?php if ($invoice->admin_status == 0) { ?>
                            <a href="<?php echo base_url(); ?>index.php/admin_controller/invoiceapproved/active?id=<?php echo $invoice->invoice_id; ?>" class="btn btn-success"><i class="fa fa-check-square-o"></i> Approve</a>
                            <a href="<?php echo base_url(); ?>index.php/admin_controller/invoicedelete/active?id=<?php echo $invoice->invoice_id; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                          <?php } ?>                      
                        </td>                      
                      </tr>
                  <?php } ?> -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Modal for creating customer starts -->
<div class="modal fade" id="addVehicleDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">                        
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Add Vehicle</h4>
            </div>                        
            <form id='addVehicleForm' method="post" action="<?php echo base_url();?>index.php/home/addVehicleInfo/active" enctype="multipart/form-data"> 
                <input type="hidden" name="PARTY_ID" value="<?php if (!empty($data['partyUserNameInfo']->PARTY_ID)) echo $data['partyUserNameInfo']->PARTY_ID; ?>">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="color" class="control-label">Vehicle No:</label>
                                <input type="text" class="form-control" name="VEHICLE_NO" value="">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="breedtype" class="control-label">Driver:</label>
                                <input type="text" class="form-control" value="<?php if (!empty($data['partyNameInfo']->FIRST_NAME)) echo $data['partyNameInfo']->FIRST_NAME; ?> <?php if (!empty($data['partyNameInfo']->LAST_NAME)) echo $data['partyNameInfo']->LAST_NAME; ?>" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="gender" class="control-label">Vehicle Type:</label>             
                                <select class="form-control select2" col-index='1' data-placeholder="Select Vehicle Type" name="VEHICLE_TYPE_ID">
                                <?php foreach ($data['vehicleTypeList'] as $vehicleType) { ?>
                                    <option value="<?php echo $vehicleType->VEHICLE_TYPE_ID; ?>"> <?php echo $vehicleType->VEHICLE_TYPE_NAME; ?> </option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label for="bitter" class="control-label">Permit:</label>           
                            <select class="form-control select2 editable-col" col-index='3' data-placeholder="Select Vehicle Type" name="PERMIT" style="width: 100%">
                                <option value="INTRASTATE"> INTRASTATE </option>
                                <option value="INTERSTATE"> INTERSTATE </option>
                            </select>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="bitter" class="control-label">Registration No:</label>
                                <input type="text" class="form-control" col-index='2' name="REGISTRATION_NO" value="">
                            </div>
                        </div>
                    </div>  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" onclick='' class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- create customer modal ends -->  

<script type="text/javascript">
    $(document).ready(function(){      
      $('.editable-col').on('focusout', function() {
        data = {};
        data['val'] = $(this).val();
        data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
        data['index'] = $(this).attr('col-index');
        
        $.ajax({   

            type: "POST",  
            url: "<?php echo base_url(); ?>/index.php/home/updateInline/vehicle",  
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

<script type="text/javascript">
    $(document).ready(function(){      
      $('.editable-action').on('click', function() {
        data = {};
        data['val'] = $(this).attr('data');
        data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
        data['index'] = $(this).attr('col-index');
        
        $.ajax({   

            type: "POST",  
            url: "<?php echo base_url(); ?>/index.php/home/updateInline/vehicle",  
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