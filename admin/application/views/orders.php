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
</style>
    <!-- super_customers.php starts -->
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Orders</h1>
            <ol class="breadcrumb">
                <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Orders</li>
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
                                    <h2 class="box-title">Order List</h2>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Time/Date</th>
                                        <th>Route</th>
                                        <th>Vehicle No</th>
                                        <th>Driver</th>
                                        <th>Customer</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($data['orderList'] as $order) { ?>

                                    <tr>
                                        <td>Order#00<?php if (!empty($order->ORDER_ID)) echo $order->ORDER_ID; ?></td>
                                        <td>
                                            <?php if (!empty($order->ORDER_TIME)) echo $order->ORDER_TIME; ?><br>
                                            <span style="color: #f16622 ;"><?php if (!empty($order->ORDER_DATE)) echo date('d-m-Y',strtotime($order->ORDER_DATE)); ?></span>
                                        </td>
                                        <td>         
                                            <div style="color: #58595b; line-height: 20px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                <i class="record-from-location from-to-location-icon" href="javascript:void(0);" draggable="true"></i> 
                                                <?php if (!empty($order->START_NAME)) echo $order->START_NAME; ?>
                                            </div>
                                            <div style="color: #f16622; line-height: 20px; font-size: 12px;"> 
                                                <i class="record-extra-location from-to-location-icon" href="javascript:void(0);" draggable="true"></i> 1 Stops 
                                            </div>
                                            <div style="color: #58595b; line-height: 20px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"> 
                                                <i class="record-to-location from-to-location-icon" href="javascript:void(0);" draggable="true"></i> 
                                                <?php if (!empty($order->STOP_NAME)) echo $order->STOP_NAME; ?>
                                            </div>
                                        </td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>index.php/home/customerOverview?PARTY_ID=<?php echo $order->PARTY_ID ?>" style="color:#f16622;">
                                            <?php
                                            $this->db->select('*');
                                            $this->db->from('PERSON');
                                            $this->db->where('PARTY_ID', $order->PARTY_ID);
                                            $party_data = $this->db->get()->row();
                                            if (!empty($party_data->FIRST_NAME)) echo $party_data->FIRST_NAME;
                                            if (!empty($party_data->LAST_NAME)) echo " ".$party_data->LAST_NAME; 
                                            ?>
                                            </a>
                                        </td>
                                        <td>$<?php if (!empty($order->ORDER_PRICE)) echo $order->ORDER_PRICE; ?></td>
                                        <td>
                                            <?php if (!empty($order->ORDER_STATUS_ID) AND $order->ORDER_STATUS_ID == "Matched") { ?>
                                                <div class="order-status-icon order-matched-status"> Matched </div>
                                            <?php } else if (!empty($order->ORDER_STATUS_ID) AND $order->ORDER_STATUS_ID == "Cancelled") { ?>
                                                <div class="order-status-icon order-cancelled-status"> Cancelled </div>
                                            <?php } else if (!empty($order->ORDER_STATUS_ID) AND $order->ORDER_STATUS_ID == "Confirm") { ?>
                                                <div class="order-status-icon order-confirm-status"> Confirm </div>
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
                                                    <li role="presentation"><a role="menuitem" href="<?php echo base_url(); ?>index.php/home/OrderInfoEdit?ORDER_ID=<?php echo $order->ORDER_ID; ?>">Open</a></li> 
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