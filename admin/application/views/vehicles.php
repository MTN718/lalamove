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
<style type="text/css">
  .select2-selection {
    border: none !important;
    background: none !important;
}
</style>
<!-- vehicleType.php starts -->
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
        <h1>Vehicles</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active">Vehicles List</li>
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
                                <h2 class="box-title floatalign_text_left">Vehicle Type List</h2>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <a href="" data-toggle="modal" data-target="#addVehicleDialog" class="btn btn-primary floatalign_text_right"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Vehicle No.</th>
                                    <th>Driver Name</th>
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
                                        <select class="form-control select2 editable-col" col-index='0' data-placeholder="Select Vehicle Type" name="PARTY_ID" style="width: 100%">
                                        <?php foreach ($data['partyDriverList'] as $partyDriver) { 
                                            $str_flag = "";
                                            if($partyDriver->PARTY_ID == $vehicle->PARTY_ID)
                                                $str_flag = "selected"; 
                                        ?>
                                        <option value="<?php echo $partyDriver->PARTY_ID; ?>" <?php echo $str_flag; ?> > <?php echo $partyDriver->FIRST_NAME; ?> <?php echo $partyDriver->LAST_NAME; ?> </option>
                                        <?php } ?>
                                        </select>
                                    </td>
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
            <form id='addVehicleForm' method="post" action="<?php echo base_url();?>index.php/home/addVehicleInfo" enctype="multipart/form-data"> 
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
                                <select class="form-control select2" col-index='0' data-placeholder="Select Vehicle Type" name="PARTY_ID">
                                <?php foreach ($data['partyDriverList'] as $partyDriver) { ?>
                                    <option value="<?php echo $partyDriver->PARTY_ID; ?>"> <?php echo $partyDriver->FIRST_NAME; ?> <?php echo $partyDriver->LAST_NAME; ?> </option>
                                <?php } ?>
                                </select>
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