<style type="text/css">
  .select2-selection {
    border: none !important;
    background: none !important;
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
      <li><a href="<?php echo base_url(); ?>index.php/business/drivers"><i class="fa fa-dashboard"></i> admin</a></li>
      <li class="active">Driver Overview</li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Basic Information</h3>
        <div class="box-tools pull-right">
          <a href="<?php echo base_url(); ?>index.php/business/partyBasicInfoEdit/<?php echo $data['status']; ?>?party_id=<?php echo $data['partyUserNameInfo']->party_id; ?>"
             type="button" class="btn btn-info"><i class="fa fa-pencil"></i></a>

          <?php if($data['status'] == "business") { ?>
            <a href="<?php echo base_url(); ?>index.php/business/businessOverview?party_id=<?php echo $data['partyNameInfo']->external_id; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a>
          <?php } else { ?>
            <a href="<?php echo base_url(); ?>index.php/business/drivers" class="btn btn-default"><i class="fa fa-reply"></i></a>
          <?php } ?>        


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
              <label>License No.</label>
            </div>
            <div class="col-md-6">
                <?php if (!empty($data['partyNameInfo']->license_number)) echo $data['partyNameInfo']->license_number; ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="col-md-6">
              <label>Criminal Case</label>
            </div>
            <div class="col-md-6">
                <?php 
                  if (!empty($data['partyNameInfo']->criminal_case_status)) echo $data['partyNameInfo']->criminal_case_status;

                  if (!empty($data['partyNameInfo']->criminal_case_clearance_no) AND $data['partyNameInfo']->criminal_case_status == 'Yes') echo " [ Clearance No: ".$data['partyNameInfo']->criminal_case_clearance_no." ]";;  
                ?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="col-md-6">
              <label>It Self Owner</label>
            </div>
            <div class="col-md-6">
                <?php 
                  if (!empty($data['partyNameInfo']->external_id)) {
                    $this->db->select('*');
                    $this->db->from('party');
                    $this->db->join('person', 'person.party_id = party.party_id');
                    $this->db->where('party.party_id', $data['partyNameInfo']->external_id);
                    $ownerData = $this->db->get()->row();
                    echo "No [Owner: '";
                    if (!empty($ownerData->first_name)) echo " ".$ownerData->first_name;
                    if (!empty($ownerData->last_name)) echo " ".$ownerData->last_name." ']";
                  } else {
                    echo "Yes";
                } ?>
            </div>
          </div>
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
                <div class="box box-primary">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <h2 class="box-title floatalign_text_left">vehicle Info</h2>
                            </div>
                            <!-- <div class="col-sm-6 col-md-6">
                              <?php if(empty($data['vehiclesList'])) { ?>
                                <a href="" data-toggle="modal" data-target="#addvehicleDialog" class="btn btn-primary floatalign_text_right" style="margin-top: -13px;margin-right: -10px;"><i class="fa fa-plus"></i></a>
                              <?php } ?>
                            </div> -->
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">


                        <table id="example123456" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>vehicle No.</th>
                                    <th>vehicle Type</th>
                                    <th>Registration No.</th>
                                    <th>Permit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['vehiclesList'] as $vehicle) { ?>
                                <tr data-row-id="<?php echo $vehicle->no;?>" <?php if($vehicle->no == $data['status']) echo "style='background:#ffbfbf'";;?>>
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
                <h2 class="box-title">order List</h2>
              </div>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-hover">
                      <thead>
                        <tr>
                          <th>order id</th>
                          <th>Time/Date</th>
                          <th>Route</th>
                          <th>vehicle No</th>
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
                                <a href="<?php echo base_url(); ?>index.php/business/vehicle/<?php echo $order->no ?>" style="color:#f16622;">
                                  <?php
                                  if (!empty($vehicle_data->vehicle_no)) echo $vehicle_data->vehicle_no;
                                  ?>
                                </a>
                                <?php } else { 
                                  echo "N/A";
                                } ?>
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
                                      <li role="presentation"><a role="menuitem" href="<?php echo base_url(); ?>index.php/business/orderInfoEdit?order_id=<?php echo $order->order_id; ?>">Open</a></li> 
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
    </div>
  </section>
</div>

<script type="text/javascript">
    $(document).ready(function(){      
      $('.editable-col').on('focusout', function() {
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
            url: "<?php echo base_url(); ?>/index.php/business/updateInline/vehicle",  
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