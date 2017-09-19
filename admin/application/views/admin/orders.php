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
    <!-- super_customers.php starts -->
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
            <h1>orders</h1>
            <ol class="breadcrumb">
                <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i> admin</a></li>
                <li class="active">orders</li>
            </ol>
        </section>

         <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <div class="row">
                                <div class="col-sm-6 col-md-6" style="text-align:left;float: left;">
                                    <h2 class="box-title">order List</h2>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>order id</th>
                                        <th>Time/Date</th>
                                        <th>Route</th>
                                        <th>vehicle No</th>
                                        <th>Driver</th>
                                        <th>Business</th>
                                        <th>Customer</th>
                                        <th>Bid Amount</th>
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
                                            <?php if(!empty($order->business_id)) { ?>
                                            <a href="<?php echo base_url(); ?>index.php/admin/businessOverview?party_id=<?php echo $order->business_id ?>" style="color:#f16622;">
                                            <?php                                            
                                                $this->db->select('*');
                                                $this->db->from('person');
                                                $this->db->where('party_id', $order->business_id);
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


                                        <td><?php if (!empty($order->order_id)) echo $order->bid_amount; ?></td>


                                        <td><?php if (!empty($order->order_price)) echo $order->order_price; ?></td>
                                        <td>
                                            <?php if (!empty($order->order_status_id) AND $order->order_status_id == "matched") { ?>
                                                <div class="order-status-icon order-matched-status"> Matched </div>
                                            <?php } else if (!empty($order->order_status_id) AND $order->order_status_id == "cancel") { ?>
                                                <div class="order-status-icon order-cancelled-status"> Cancelled </div>
                                            <?php } else if (!empty($order->order_status_id) AND $order->order_status_id == "confirm") { ?>
                                                <div class="order-status-icon order-confirm-status"> Confirm </div>
                                            <?php } else if (!empty($order->order_status_id) AND $order->order_status_id == "active") { ?>
                                                <div class="order-status-icon order-confirm-status"> Active </div>
                                            <?php } else if (!empty($order->order_status_id) AND $order->order_status_id == "bidding") { ?>
                                                <div class="order-status-icon order-confirm-status"> On Bidding </div>
                                            <?php } else if (!empty($order->order_status_id) AND $order->order_status_id == "complete") { ?>
                                                <div class="order-status-icon order-confirm-status"> Complete </div>
                                            <?php } ?>
                                        </td>                                 
                                        
                                        <td>
                                            <?php $bid_data = $this->businessmodel->getBiddingOrderData($order->order_id); ?>
                                            <span class="dropdown pull-right">
                                                <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown" style="padding: 3px 12px;font-size: 12px;border-radius: 0px;border: 1px solid #3c8dbc;background: none;color: #3c8dbc;font-weight: 600;">Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style="min-width: 116px;">

                                                    <li role="presentation"><a role="menuitem" href="<?php echo base_url(); ?>index.php/admin/orderInfoEdit?order_id=<?php echo $order->order_id; ?>">Open</a></li>
                                                    <?php if(!empty($bid_data) AND empty($order->business_id)) { ?>
                                                        <li role="presentation" class="divider"></li>
                                                        <li role="presentation"><a role="menuitem" href="<?php echo base_url(); ?>index.php/admin/orderAllocation?order_id=<?php echo $order->order_id; ?>" >Process Allocation</a></li>
                                                    <?php } ?> 
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