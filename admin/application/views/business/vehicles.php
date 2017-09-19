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


    <div id="successvehicle1" class="alert alert-success alert-dismissable" style="display: none;">
        <strong>Successfully</strong> Action completed...
    </div>


    <div id="errorvehicle1" class="alert alert-warning alert-dismissable" style="display: none;">
        <strong>Warnig!</strong> Vehicle have incomplete order, Can not Deactivate...
    </div>


    <div id="successvehicletrash" class="alert alert-success alert-dismissable" style="display: none;">
        <strong>Successfully</strong> Vehicle Deleted...
    </div>


    <div id="errorvehicletrash" class="alert alert-warning alert-dismissable" style="display: none;">
        <strong>Warnig!</strong> Vehicle have incomplete order, Can not Delete...
    </div>


    <section class="content-header">
        <h1>vehicles</h1>
        <ol class="breadcrumb">
            <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i>admin</a></li>
            <li class="active">vehicles</li>
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
                                <h2 class="box-title floatalign_text_left">vehicle List</h2>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <a href="" data-toggle="modal" data-target="#addvehicleDialog" class="btn btn-primary floatalign_text_right"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>vehicle No.</th>
                                    <th>Owner Name</th>
                                    <th style="background-color: #FFBFBF; width: 20%">
                                        Driver Name
                                        <small id="success" style="color: green; display: none;float: right;"> Driver Allocated Successfully </small>
                                        <small id="error" style="color: red; display: none;float: right;"> opps! Driver Already Allocated </small>
                                    </th>
                                    <th>vehicle Type</th>
                                    <th>Registration No.</th>
                                    <th>Permit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['vehiclesList'] as $vehicle) { ?>
                                <tr data-row-id="<?php echo $vehicle->no;?>" <?php if($vehicle->no == $data['status']) echo "style='background:#ffbfbf'";;?>>
                                    <td><?php echo $vehicle->vehicle_no; ?></td>
                                    <td>
                                        <?php if (!empty($vehicle->first_name)) echo $vehicle->first_name; ?> <?php if (!empty($vehicle->last_name)) echo $vehicle->last_name; ?>
                                    </td>






                                    <td class="driverList" style="background-color: #FFBFBF;">             
                                        <select class="form-control select2 editable-col" col-index='6' data-placeholder="Select vehicle Type" name="driver_id" style="width: 100%">
                                            <option value="0">Select Driver</option>
                                            <?php foreach ($data['partyDriverList'] as $partyDriver) { 
                                                $str_flag = "";
                                                if($partyDriver->party_id == $vehicle->driver_id)
                                                    $str_flag = "selected"; 
                                                ?>
                                                <option value="<?php echo $partyDriver->party_id; ?>" <?php echo $str_flag; ?> > <?php echo $partyDriver->first_name; ?> <?php echo $partyDriver->last_name; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </td>







                                        <td>             
                                            <select class="form-control select2 editable-col" col-index='1' data-placeholder="Select vehicle Type" name="vehicle_type_id" style="width: 100%">
                                                <?php foreach ($data['vehicleTypeList'] as $vehicleType) { 
                                                    $str_flag = "";
                                                    if($vehicleType->vehicle_type_id == $vehicle->vehicle_type_id)
                                                       $str_flag = "selected"; 
                                                   ?>
                                                   <option value="<?php echo $vehicleType->vehicle_type_id; ?>" <?php echo $str_flag; ?> > <?php echo $vehicleType->vehicle_type_name; ?> </option>
                                                   <?php } ?>
                                               </select>
                                           </td>
                                           <td>                  	
                                            <input type="text" class="form-control editable-col" col-index='2' name="registration_no" value="<?php echo $vehicle->registration_no; ?>" style="width: 100%">
                                        </td>
                                        <td>                  	
                                            <select class="form-control select2 editable-col" col-index='3' data-placeholder="Select vehicle Type" name="permit" style="width: 100%">
                                                <option value="intrastate" <?php if($vehicle->permit == "intrastate") echo "selected"; ?> > intrastate </option>
                                                <option value="interstate" <?php if($vehicle->permit == "interstate") echo "selected"; ?> > interstate </option>
                                            </select>
                                        </td>
                                        <td id="vehicleAction<?php echo $vehicle->no;?>">
                                            <?php if($vehicle->vehicle_status == 1) { ?>                          
                                            <a href="javascript:void(0)" class="btn btn-primary editable-action" col-index='4' data="0"><i class="fa fa-thumbs-up"></i></a>
                                            <?php } else { ?>                          
                                            <a href="javascript:void(0)" class="btn btn-default editable-action" col-index='4' data="1"><i class="fa fa-thumbs-down"></i></a>
                                            <?php } ?>                    
                                            <a href="javascript:void(0)" class="btn btn-danger editable-action" col-index='5' data="1"><i class="fa fa-trash"></i></a> 
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
    <div class="modal fade" id="addvehicleDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">                        
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Add vehicle</h4>
                </div>                        
                <form id='addvehicleForm' method="post" action="<?php echo base_url();?>index.php/business/addvehicleInfo" enctype="multipart/form-data"> 
                    <input type="hidden" name="party_id" value="<?php echo $data['adminNameInfo']->party_id; ?>">
                    <input type="hidden" name="driver_id" value="">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="color" class="control-label">vehicle No:</label>
                                    <input type="text" class="form-control" name="vehicle_no" value="" required="required">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label for="gender" class="control-label">vehicle Type:</label>             
                                    <select class="form-control select2" col-index='1' data-placeholder="Select vehicle Type" name="vehicle_type_id">
                                        <?php foreach ($data['vehicleTypeList'] as $vehicleType) { ?>
                                        <option value="<?php echo $vehicleType->vehicle_type_id; ?>"> <?php echo $vehicleType->vehicle_type_name; ?> </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <label for="bitter" class="control-label">Permit:</label>          	
                                <select class="form-control select2 editable-col" col-index='3' data-placeholder="Select vehicle Type" name="permit" style="width: 100%">
                                    <option value="intrastate"> intrastate </option>
                                    <option value="interstate"> interstate </option>
                                </select>
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="form-group">
                                    <label for="bitter" class="control-label">Registration No:</label>
                                    <input type="text" class="form-control" col-index='2' name="registration_no" value="" required="required">
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
            $(document).on('focusout','.editable-col', function() {
                data = {};
                data['val'] = $(this).val();
                data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
                data['index'] = $(this).attr('col-index');

                $.ajax({   
                    type: "POST",  
                    url: "<?php echo base_url(); ?>/index.php/business/updateInline/vehicle",  
                    cache:false,  
                    data: data,
                    dataType: "json",       
                    success: function(response)  
                    {   
                        if(response.msg == "success") {
                            $('#success').css("display", "block");
                            $(window).load(setTimeout(function(){
                                $('#success').fadeOut('slow',function(){$(this).remove();});
                            }, 2000));
                        } else {
                            $('#error').css("display", "block");
                            $(window).load(setTimeout(function(){
                                $('#error').fadeOut('slow',function(){$(this).remove();});
                            }, 2000));
                        }

                        $(window).load(setTimeout(function(){
                            location.reload();
                        }, 2000));
                    }   
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){      
            $(document).on('click','.editable-action', function() {
                data = {};
                data['val'] = $(this).attr('data');
                data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
                data['index'] = $(this).attr('col-index');
                
                $.ajax({   

                    type: "POST",  
                    url: "<?php echo base_url(); ?>/index.php/business/updateInline/vehicle",  
                    cache:false,  
                    data: data,
                    dataType: "json",       
                    success: function(response)  
                    {   
                     if(data['index'] == 5){

                        $.ajax({   

                            type: "POST",
                            url: "<?php echo base_url(); ?>/index.php/business/updateInline/vehicle", 
                            cache:false,  
                            data: data,
                            dataType: "json",       
                            success: function(response)  
                            { 
                                if(response.msg == "success") {

                                    $('#successvehicletrash').css("display", "block");
                                    $(window).load(setTimeout(function(){
                                        location.reload();
                                    }, 400));

                                } else {

                                    $('#errorvehicletrash').css("display", "block");
                                    $(window).load(setTimeout(function(){
                                        location.reload();
                                    }, 400));
                                }  
                            }   
                        });

                    } else if(data['index'] == 4) {

                        $.ajax({   

                            type: "POST",
                            url: "<?php echo base_url(); ?>/index.php/business/updateInline/vehicle",   
                            cache:false,  
                            data: data,
                            dataType: "json",       
                            success: function(response)  
                            {   
                                if(response.msg == "success") {

                                    $('#successvehicle1').css("display", "block");
                                    $(window).load(setTimeout(function(){
                                        location.reload();
                                    }, 400));

                                } else {

                                    $('#errorvehicle1').css("display", "block");
                                    $(window).load(setTimeout(function(){
                                        location.reload();
                                    }, 400));

                                } 
                            }   
                        });

                    } else {

                        $.ajax({   

                            type: "POST",  
                            url: "<?php echo base_url(); ?>/index.php/business/updateInline/vehicle",  
                            cache:false,  
                            data: data,
                            dataType: "json",       
                            success: function(response)  
                            {   
                             location.reload();
                         }   
                     });
                    }
                }   
            });
            });
        });
    </script>



