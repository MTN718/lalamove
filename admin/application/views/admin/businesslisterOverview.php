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
    .from-to-location-icon {
        box-sizing: border-box;
        display: inline-block;
        float: left;
        width: 7%;
    }
    .record-from-location {
        background: url(<?php echo base_url(); ?>/assets/images/stops.png) -3px -13px no-repeat;
        background-size: auto auto;
        background-size: 28px;
        height: 20px;
        width: 20px !important;
    }
    .record-extra-location {
        background: url(<?php echo base_url(); ?>/assets/images/stops.png) -3px -57px repeat-y;
        background-size: 28px;
        height: 20px;
        width: 20px !important;
    }
    .record-to-location {
        background: url(<?php echo base_url(); ?>/assets/images/stops.png) -3px -101px no-repeat;
        background-size: 28px;
        height: 20px;
        width: 20px !important;
    }
    .order-cancelled-status {
        background-color: #d8534f;
        border-color: #d8534f;
        font-size: 12px;
    }
    .order-matched-status {
        background-color: #d88e4f;
        border-color: #d88e4f;
        font-size: 12px;
    }
    .order-confirm-status {
        background-color: #049600;
        border-color: #049600;
        font-size: 12px;
    }

    .order-status-icon {
        border: 1px solid;
        color: #fff;
        width: 73px;
        text-align: center;
        height: 24px;
        padding-top: 2px;
    }
    .dropdown-menu {
        font-size: 12px;
        top: 100%;
        left: 0;
        z-index: 1000;
        display: none;
        background-color: #3c8dbc;
      }
      .dropdown-menu > li > a {
        color: #fff;
      }
        td {
          vertical-align: middle !important;
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
        <h1>Business Overview</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>index.php/admin/business"><i class="fa fa-dashboard"></i> admin</a></li>
            <li class="active">Business Overview</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Basic Information</h3>
                <div class="box-tools pull-right">
                    <a href="<?php echo base_url(); ?>index.php/admin/partyBasicInfoEdit?party_id=<?php echo $data['partyUserNameInfo']->party_id; ?>" type="button" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                    <a href="<?php echo base_url(); ?>index.php/admin/business" class="btn btn-default"><i class="fa fa-reply"></i></a>
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
                            <?php if (!empty($data['partyUserNameInfo']->user_login_id)) echo $data['partyUserNameInfo']->user_login_id; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <label>Name</label>
                        </div>
                        <div class="col-md-6">
                            <?php if (!empty($data['partyNameInfo']->first_name)) echo $data['partyNameInfo']->first_name; ?>
                            &nbsp;<?php if (!empty($data['partyNameInfo']->last_name)) echo $data['partyNameInfo']->last_name; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <label>Email</label>
                        </div>
                        <div class="col-md-6">
                            <?php if (!empty($data['partyEmailInfo']->info_string)) echo $data['partyEmailInfo']->info_string; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <label>Phone</label>
                        </div>
                        <div class="col-md-6">
                            <?php if (!empty($data['partyTelecomInfo']->area_code)) echo $data['partyTelecomInfo']->area_code; ?>
                            - <?php if (!empty($data['partyTelecomInfo']->contact_number)) echo $data['partyTelecomInfo']->contact_number; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <label>Mobile</label>
                        </div>
                        <div class="col-md-6">
                            <?php if (!empty($data['partyTelecomInfo']->mobile_number)) echo $data['partyTelecomInfo']->mobile_number; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <label>Alt Mobile</label>
                        </div>
                        <div class="col-md-6">
                            <?php if (!empty($data['partyTelecomInfo']->alt_mobile_number)) echo $data['partyTelecomInfo']->alt_mobile_number; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <label>Address</label>
                        </div>
                        <div class="col-md-6">
                            <?php if (!empty($data['partyAddressInfo']->address1)) echo $data['partyAddressInfo']->address1; ?>,
                            <?php if (!empty($data['partyAddressInfo']->address2)) echo $data['partyAddressInfo']->address2; ?><br>
                            <?php if (!empty($data['partyAddressInfo']->city)) echo $data['partyAddressInfo']->city; ?>,
                            <?php if (!empty($data['partyAddressInfo']->state_province_geo_id)) echo $data['partyAddressInfo']->state_province_geo_id; ?>
                            ,
                            <?php if (!empty($data['partyAddressInfo']->postal_code)) echo $data['partyAddressInfo']->postal_code; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12">


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


                <div class="box box-primary">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <h2 class="box-title floatalign_text_left">vehicle List</h2>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <a href="" data-toggle="modal" data-target="#addvehicleDialog" class="btn btn-primary floatalign_text_right" style="margin-top: -13px;margin-right: -10px;"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>vehicle No.</th>
                                    <th>vehicle Type</th>
                                    <th>Registration No.</th>
                                    <th>Permit</th>
                                    <th style="background-color: #FFBFBF; width: 20%">
                                        Driver Name
                                        <small id="success" style="color: green; display: none;float: right;"> Driver Allocated Successfully </small>
                                        <small id="error" style="color: red; display: none;float: right;"> opp! Driver Already Allocated </small>
                                    </th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['vehiclesList'] as $vehicle) { ?>
                                <tr data-row-id="<?php echo $vehicle->no;?>">
                                    <td><?php echo $vehicle->vehicle_no; ?></td>
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
                                    <td style="background-color: #FFBFBF;">             
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
                                    <td class="text__align__right">
                                        <?php if($vehicle->vehicle_status == 1) { ?>                          
                                        <a href="javascript:void(0)" class="btn btn-primary editable-action-vehicle" col-index='4' data="0"><i class="fa fa-thumbs-up"></i></a>
                                        <?php } else { ?>                          
                                        <a href="javascript:void(0)" class="btn btn-default editable-action-vehicle" col-index='4' data="1"><i class="fa fa-thumbs-down"></i></a>
                                        <?php } ?>                    
                                        <a href="javascript:void(0)" class="btn btn-danger editable-action-vehicle" col-index='5' data="1" ><i class="fa fa-trash"></i></a> 
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
            <div class="col-xs-12">



            <div id="success1" class="alert alert-success alert-dismissable" style="display: none;">
                <strong>Successfully</strong> Action completed...
            </div>


            <div id="error1" class="alert alert-warning alert-dismissable" style="display: none;">
                <strong>Warnig!</strong> Driver have incomplete order, Can not Deactivate...
            </div>


            <div id="successtrash" class="alert alert-success alert-dismissable" style="display: none;">
                <strong>Successfully</strong> Driver Deleted...
            </div>


            <div id="errortrash" class="alert alert-warning alert-dismissable" style="display: none;">
                <strong>Warnig!</strong> Driver have incomplete order, Can not Delete...
            </div>


                <div class="box box-primary">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <h2 class="box-title floatalign_text_left">Driver List</h2>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <a href="<?php echo base_url(); ?>index.php/admin/addpartyDriver/business/<?php echo $data['partyUserNameInfo']->party_id; ?>" class="btn btn-primary floatalign_text_right"  style="margin-top: -13px;margin-right: -10px;"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                       <table id="example5" class="table table-bordered table-hover">
                          <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
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
                          <tr data-row-id="<?php echo $driver->party_id; ?>" id="driverAction<?php echo $driver->party_id;?>">
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
                            <a href="javascript:void(0)" class="btn btn-primary editable-action-driver" col-index='4' data="Inactive"><i class="fa fa-thumbs-up"></i></a>
                            <?php } else { ?>                          
                            <a href="javascript:void(0)" class="btn btn-default editable-action-driver" col-index='4' data="Active"><i class="fa fa-thumbs-down"></i></a>
                            <?php } ?>
                            <a href="<?php echo base_url(); ?>index.php/admin/driverOverview?party_id=<?php echo $driver->party_id; ?>"
                               class="btn btn-info"><i class="fa fa-pencil"></i></a>
                               <a href="javascript:void(0)" class="btn btn-danger editable-action-driver" col-index='5' data="<?php echo $driver->party_id; ?>"><i class="fa fa-trash"></i></a> 
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
            <div class="col-xs-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <h2 class="box-title floatalign_text_left">Order List</h2>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example4" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>order id</th>
                                    <th>Time/Date</th>
                                    <th>Route</th>
                                    <th>vehicle No</th>
                                    <th>Driver</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['orderList'] as $order) { ?>

                                    <tr>
                                        <td>order#00<?php if (!empty($order->order_id)) echo $order->order_id; ?></td>
                                        <td>
                                            <?php if (!empty($order->order_date)) echo date('H:i',strtotime($order->order_date)); ?><br>
                                            <span style="color: #f16622 ;"><?php if (!empty($order->order_date)) echo date('d-m-Y',strtotime($order->order_date)); ?></span>
                                        </td>
                                        <td>  
                                            <?php 
                                                $this->db->select('location_name');
                                                $this->db->from('order_location'); 
                                                $this->db->where('order_id',$order->order_id);
                                                $this->db->where('location_type','START');                                                
                                                $this->db->where('order_location.location_type','START');
                                                $start_location = $this->db->get()->row();

                                                $this->db->select('*');
                                                $this->db->from('order_location'); 
                                                $this->db->where('order_id',$order->order_id);
                                                $this->db->where('location_type','STOP');
                                                $stop_number = $this->db->get()->num_rows();

                                                $this->db->select('location_name');
                                                $this->db->from('order_location'); 
                                                $this->db->where('order_id',$order->order_id);
                                                $this->db->where('location_type','END');
                                                $this->db->where('order_location.location_type','END');
                                                $end_location = $this->db->get()->row();
                                            ?>       
                                            <div style="color: #58595b; line-height: 20px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                <i class="record-from-location from-to-location-icon" href="javascript:void(0);" draggable="true"></i> 
                                                <?php if (!empty($start_location->location_name)) echo $start_location->location_name; ?>
                                            </div>
                                            <?php if(!empty($stop_number)) { ?>
                                            <div style="color: #f16622; line-height: 20px; font-size: 12px;"> 
                                                <i class="record-extra-location from-to-location-icon" href="javascript:void(0);" draggable="true"></i> 
                                                <?php echo $stop_number; ?> Stops
                                            </div>
                                            <?php } ?>
                                            <div style="color: #58595b; line-height: 20px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"> 
                                                <i class="record-to-location from-to-location-icon" href="javascript:void(0);" draggable="true"></i> 
                                                <?php if (!empty($end_location->location_name)) echo $end_location->location_name; ?>
                                            </div>
                                        </td>


                                        <td>
                                            <?php if(!empty($order->no)) { 
                                                $this->db->select('*');
                                                $this->db->from('vehicle');
                                                $this->db->where('no', $order->no);
                                                $vehicle_data = $this->db->get()->row();
                                            ?>
                                            <a href="<?php echo base_url(); ?>index.php/admin/vehicle/<?php echo $order->no ?>" style="color:#f16622;">
                                            <?php
                                            if (!empty($vehicle_data->vehicle_no)) echo $vehicle_data->vehicle_no;
                                            ?>
                                            </a>
                                            <?php } else { 
                                                echo "N/A";
                                            } ?>
                                        </td>


                                        <td>
                                            <?php if(!empty($order->driver_id)) { ?>
                                            <a href="<?php echo base_url(); ?>index.php/admin/driverOverview?party_id=<?php echo $order->driver_id ?>" style="color:#f16622;">
                                            <?php                                            
                                                $this->db->select('*');
                                                $this->db->from('person');
                                                $this->db->where('party_id', $order->driver_id);
                                                $driver_data = $this->db->get()->row();
                                                if (!empty($driver_data->first_name)) echo $driver_data->first_name;
                                                if (!empty($driver_data->last_name)) echo " ".$driver_data->last_name; 
                                            ?></a>
                                            <?php } else {
                                                echo "N/A";
                                            }
                                            ?>
                                        </td>


                                        <td>
                                            <a href="<?php echo base_url(); ?>index.php/admin/customerOverview?party_id=<?php echo $order->party_id ?>" style="color:#f16622;">
                                            <?php
                                            if (!empty($order->first_name)) echo $order->first_name;
                                            if (!empty($order->last_name)) echo " ".$order->last_name; 
                                            ?>
                                            </a>
                                        </td>


                                        


                                        <td>$<?php if (!empty($order->order_price)) echo $order->order_price; ?></td>
                                        <td>
                                            <?php if (!empty($order->order_status_id) AND $order->order_status_id == "matched") { ?>
                                                <div class="order-status-icon order-matched-status"> Matched </div>
                                            <?php } else if (!empty($order->order_status_id) AND $order->order_status_id == "cancel") { ?>
                                                <div class="order-status-icon order-cancelled-status"> Cancelled </div>
                                            <?php } else if (!empty($order->order_status_id) AND $order->order_status_id == "confirm") { ?>
                                                <div class="order-status-icon order-confirm-status"> Confirm </div>
                                            <?php } else if (!empty($order->order_status_id) AND $order->order_status_id == "active") { ?>
                                                <div class="order-status-icon order-confirm-status"> Active </div>
                                            <?php } else if (!empty($order->order_status_id) AND $order->order_status_id == "complete") { ?>
                                                <div class="order-status-icon order-confirm-status"> Complete </div>
                                            <?php } ?>
                                        </td>                                 
                                        
                                        <td>
                                            <span class="dropdown pull-right">
                                                <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown" style="padding: 3px 12px;font-size: 12px;border-radius: 0px;border: 1px solid #3c8dbc;background: none;color: #3c8dbc;font-weight: 600;">Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style="min-width: 116px;">
                                                    <!-- <li role="presentation"><a role="menuitem" href="">Email</a></li> -->
                                                    <!-- <li role="presentation" class="divider"></li> -->
                                                    <!-- <li role="presentation"><a role="menuitem" href="" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></li> -->
                                                    <!-- <li role="presentation" class="divider"></li> -->
                                                    <li role="presentation"><a role="menuitem" href="<?php echo base_url(); ?>index.php/admin/orderInfoEdit?order_id=<?php echo $order->order_id; ?>">Open</a></li> 
                                                </ul>
                                            </span>
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
            <form id='addvehicleForm' method="post" action="<?php echo base_url();?>index.php/admin/addvehicleInfo/business" enctype="multipart/form-data"> 
                <input type="hidden" name="party_id" value="<?php echo $data['partyUserNameInfo']->party_id; ?>">
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
                url: "<?php echo base_url(); ?>/index.php/admin/updateInline/vehicle",  
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
        $(document).on('click','.editable-action-vehicle', function() {
            data = {};
            data['val'] = $(this).attr('data');
            data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
            data['index'] = $(this).attr('col-index');

            if(data['index'] == 5){

                    $.ajax({   

                        type: "POST",
                        url: "<?php echo base_url(); ?>/index.php/admin/updateInline/vehicle", 
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
                    url: "<?php echo base_url(); ?>/index.php/admin/updateInline/vehicle",   
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
                    url: "<?php echo base_url(); ?>/index.php/admin/updateInline/vehicle",  
                    cache:false,  
                    data: data,
                    dataType: "json",       
                    success: function(response)  
                    {   
                     location.reload();
                    }   
                });
            }
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){      
        $(document).on('click','.editable-action-driver', function() {
            data = {};
            data['val'] = $(this).attr('data');
            data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
            data['index'] = $(this).attr('col-index');

            if(data['index'] == 5){
                    $.ajax({   

                        type: "POST",
                        url: "<?php echo base_url(); ?>index.php/admin/updateInline/drivers", 
                        cache:false,  
                        data: data,
                        dataType: "json",       
                        success: function(response)  
                        { 
                            if(response.msg == "success") {

                                $('#successtrash').css("display", "block");
                                $("#driverAction"+data['id']).load(location.href + " #driverAction"+data['id']);

                            } else {

                                $('#errortrash').css("display", "block");
                                $(window).load(setTimeout(function(){
                                location.reload();
                                }, 400));
                            }  
                        }   
                    });
            } else {
                $.ajax({   

                    type: "POST",
                    url: "<?php echo base_url(); ?>/index.php/admin/updateInline/drivers",  
                    cache:false,  
                    data: data,
                    dataType: "json",       
                    success: function(response)  
                    {   
                        if(response.msg == "success") {

                            $('#success1').css("display", "block");
                            $(window).load(setTimeout(function(){
                                location.reload();
                            }, 400));

                        } else {

                            $('#error1').css("display", "block");
                            $(window).load(setTimeout(function(){
                                location.reload();
                            }, 400));

                        } 
                    }   
                });
            }
        });
    });
</script>