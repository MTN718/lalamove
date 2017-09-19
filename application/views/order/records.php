<style type="text/css">
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
    
</style>
<input type="hidden" class="party_id" id="party_id" name="party_id" value="<?php echo $this->session->user_id; ?>">
<nav class="bdr-right">
  <ul>
    <li class="sidemenu-list"> <a href="<?php echo base_url('home/instantquote'); ?>" id="place-order-btn" class="sidemenu-btn cursor-ptr dft-gry active" href="map.html"> <span id="place-order-icon" class="place-order-icon"></span> <br>Place Order</a> </li>
    
    <li class="sidemenu-list"> <a href="#" id="records-btn" class="sidemenu-btn cursor-ptr dft-gry showRecords"> <span id="records-icon" class="records-icon"> <span id="records-counter" class="notification-counter hide"></span> </span> <br>Records</a>
      <ul>
        <li>
          <div id="records-menu" class="slide-menu"></div>
        </li>
      </ul>
    </li>
    <li class="sidemenu-list"> <a href="#fav-driver-modal" id="my-fleet-btn" class="sidemenu-btn cursor-ptr dft-gry fav-driver-modal" data-toggle="modal"> <span id="my-fleet-icon" class="my-fleet-icon"></span> <br>Manage Driver</a> </li>
    <li class="sidemenu-list"> <a href="#model-id2"  id="user-wallet" class="sidemenu-btn cursor-ptr dft-gry my_wallet" data-toggle="modal"> <span id="my-wallet-icon" class="my-wallet-icon"></span> <br>Wallet</a> </li>
    <li class="sidemenu-list"> </li>
  </ul>
</nav>
<div class="bdr-right first_panel menu-ctn" >
  <div class="content-wrapper">
       

         <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                      
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="myTable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Time/Date</th>
                                        <th>Route</th>
                                        <th>Type</th>
                                        <th>Vehicle No</th>
                                        <th>Driver</th>
                                        <th>Order By</th>
                                        <th>Comments</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                // echo "<pre>";print_r($orderDetails);die;
                                 foreach ($orderDetails as $order) { ?>

                                    <tr>
                                        <td>Order#00<?php if (!empty($order->order_id)) echo $order->order_id; ?></td>
                                        <td>
                                            <?php if (!empty($order->order_date)) echo date('H:i',strtotime($order->order_date)); ?><br>
                                            <span style="color: #f16622 ;"><?php if (!empty($order->order_date)) echo date('d-m-Y',strtotime($order->order_date)); ?></span>
                                        </td>
                                        <td>                                            
                                            <div style="color: #58595b; line-height: 20px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                <i class="record-from-location from-to-location-icon" href="javascript:void(0);" draggable="true"></i> 
                                                <?php 
                                                $locations = $this->user_model->getOrderStart($order->order_id); if (!empty($locations->location_name)) echo $locations->location_name; ?>
                                            </div>
                                            <?php $stop_number = $this->user_model->getOrderStop($order->order_id); if(!empty($stop_number)) { ?>
                                            <div style="color: #f16622; line-height: 20px; font-size: 12px;"> 
                                                <i class="record-extra-location from-to-location-icon" href="javascript:void(0);" draggable="true"></i> 
                                                <?php echo $stop_number; ?> Stops
                                            </div>
                                            <?php } ?>
                                            <div style="color: #58595b; line-height: 20px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"> 
                                                <i class="record-to-location from-to-location-icon" href="javascript:void(0);" draggable="true"></i> 
                                                <?php $end_location = $this->user_model->getOrderEnd($order->order_id); if (!empty($end_location->location_name)) echo $end_location->location_name; ?>
                                            </div>
                                        </td>
                                        <td><?php if(!empty($order->vehicle_type_id)){
                                           $vehicle_name = $this->order_model->getVehicleName($order->vehicle_type_id);
                                         echo $vehicle_name->vehicle_type_name; } ?></td>
                                        <?php if(!empty($order->no)){
                                            $driverDetails = $this->user_model->getDriverDetails($order->no);
                                        }
                                         ?>
                                        <td><?php if(!empty($driverDetails)){ echo $driverDetails->no;  }else{ echo "Assigining"; } ?></td>
                                        <td><?php if(!empty($driverDetails)){ echo $driverDetails->first_name;  }else{ echo "Assigining"; } ?></td>
                                        <td>
                                            <a href="#" style="color:#f16622;">
                                            <?php
                                            if (!empty($userDetails->first_name)) echo $userDetails->first_name;
                                            if (!empty($userDetails->last_name)) echo " ".$userDetails->last_name; 
                                            ?>
                                            </a>
                                        </td>
                                        <td><?php if (!empty($order->description)) echo $order->description; ?></td>
                                        <td>$<?php if (!empty($order->order_price)) echo $order->order_price; ?></td>
                                        <td>
                                            <?php if (!empty($order->order_status_id) AND ($order->order_status_id == "ACTIVE" OR $order->order_status_id == "Active" )) { ?>
                                                <div class="order-status-icon order-matched-status"> Assigining </div>
                                            <?php } else if (!empty($order->order_status_id) AND ($order->order_status_id == "CANCELLED" OR $order->order_status_id == "Cancelled")) { ?>
                                                <div class="order-status-icon order-cancelled-status"> Cancelled </div>
                                            <?php } else if (!empty($order->order_status_id) AND ($order->order_status_id == "CONFIRM" OR $order->order_status_id == "Confirm")) { ?>
                                                <div class="order-status-icon order-confirm-status"> Confirm </div>
                                            <?php } ?>
                                        </td>                                 
                                        
                                        <td>
                                            <span class="dropdown pull-right">
                                                <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown" style="padding: 3px 12px;font-size: 12px;border-radius: 0px;border: 1px solid #3c8dbc;background: none;color: #3c8dbc;font-weight: 600;">Action
                                                    <span class="caret"></span>
                                                </button>
                                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style="min-width: 116px;">                                              
                                                <li role="presentation"><a role="menuitem" href="#" onclick="cancelOrder(<?php echo $order->order_id; ?>)">Cancel Order</a></li> 
                                                <?php if(!empty($driverDetails)){ ?>
                                                <li role="presentation"><a role="menuitem" class="fav-driver" href="#" data-party_id="<?php echo $userDetails->party_id; ?>" data-driver_id="<?php echo $driverDetails->driver_id; ?>" data-order_id="<?php echo $order->order_id; ?>" data-no="<?php echo $driverDetails->no; ?>" onclick="favoriteDriver(<?php echo $driverDetails->driver_id; ?>)">Add as favorite driver</a></li> 
                                                <?php } ?>
                                            </ul>
                                            </span>
                                        </td>                                        
                                    </tr>               
                                <?php unset($driverDetails); }  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<!-- light box my driver -->
<div id="fav-driver-modal" class="modal fade ogBox" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="width:auto;height:auto;overflow: auto;position:relative; background:#f6f6f3">
        <button type="button" class="close closeCross" data-dismiss="modal" aria-hidden="true">×</button>
        <div id="my-fleet-box" class="topPad">
          <div class="title dft-gry bld mg-lr-20 mg-btm-15">Manage My Drivers</div>
          <div class="desc dft-gry mg-lr-20 mg-btm-15">Satisfied by your drivers? Add or ban drivers from your list.</div>
          <div id="add-driver-btn-ctn" class="alg-c"> <a id="add-driver-btn" class="addDriver" href="javascript:void(0);"> Add Driver </a> </div>
          <div id="driver-license-ctn" class="alg-c inputDriver"> <span class="mg-btm-10"> Enter the driver license number. </span>
            <form id="my-fleet-form" action="javascript:void(0);">
              <span class="my-fleet-input-ctn">
              <input id="add-driver-license" class="bdr-left bdr-top bdr-btm mg-btm-30 license_no validate[required]" required="required" name="license_no" placeholder="ab-07az1111" type="text">
              <input id="add-driver-license-ok-btn" class="cursor-ptr" value="OK" type="submit">
              </span>
            </form>
          </div>
          <div class="tabbable">
            <ul class="nav desc">
              <li class="tab-1-2 cursor-ptr active"><a href="#tab1" data-toggle="tab">Favorite</a></li>
              <li class="tab-1-2 cursor-ptr"><a href="#tab2" data-toggle="tab">Banned</a></li>
            </ul>
            <div class="tab-content">
            <div class="tab-pane active" id="tab1">
                <table style="width:100%" id="favorite-driver">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Vehicle No</th>
                            <th>Vehicle Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
              </div>
              <div class="tab-pane" id="tab2">
                <table style="width:100%" id="banned-driver">
               <thead>
                  <tr>
                    <th>Name</th>
                    <th>Vehicle No</th>
                    <th>Vehicle Type</th>
                    <th>Action</th>
                  </tr>
               </thead>
               <tbody>
               </tbody>
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</div>