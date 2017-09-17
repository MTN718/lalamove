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
        <section class="content-header">
            <h1>orders</h1>
            <ol class="breadcrumb">
                <li><a href="javascript:void(0)"><i class="fa fa-dashboard"></i> admin</a></li>
                <li class="active">orders</li>
            </ol>
        </section>
        <div id="business_id" style="display: none;"><?php echo $data['adminNameInfo']->party_id; ?></div>
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
                                <div class="col-sm-6 col-md-6" style="text-align:right;float: right;">
                                    <h2 class="box-title" id="success" style="color: green; display: none;float: right;"> Your bid Applyed Successfully</h2>
                                    <h2 class="box-title" id="error" style="color: red; display: none;float: right;"> opps! Error, please try again later </h2>
                                    <h2 class="box-title" id="invalid" style="color: red; display: none;float: right;"> opps! Error, please Enter valid amount </h2>
                                    <h2 class="box-title" id="invalid2" style="color: red; display: none;float: right;"> opps! Error, please Enter valid amount </h2>
                                </div>



                            </div>
                        </div>
                        <!-- /.box-header -->
                        <?php $order_bidding_price = 0;?>
                        <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>order id</th>
                                        <th>status</th>
                                        <th>Time/Date</th>
                                        <th>Route</th>
                                        <th>Estimate Distance</th>
                                        <th>Max Amount ($)</th>
                                        <th style="width: 16% !important;">Enter Your Bid Here ($)</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($data['biddingOrderList'] as $order) { ?>

                                    <tr data-row-id="<?php echo $order->order_id; ?>">
                                        <td>#00<?php if (!empty($order->order_id)) echo $order->order_id; ?></td>
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

                                                $this->db->select('location_name');
                                                $this->db->from('order_location'); 
                                                $this->db->where('order_id',$order->order_id);
                                                $this->db->where('location_type','STOP');                                                
                                                $this->db->where('order_location.location_type','STOP');
                                                $stop_locations = $this->db->get()->result();

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
                                            <?php if(!empty($stop_locations)) { 
                                                foreach ($stop_locations as $stop_location) {
                                            ?>
                                            <div style="color: #f16622; line-height: 20px; font-size: 12px;"> 
                                                <i class="record-extra-location from-to-location-icon" href="javascript:void(0);" draggable="true"></i> 
                                                <?php if (!empty($stop_location->location_name)) echo $stop_location->location_name; ?>
                                            </div>
                                            <?php } } ?>
                                            <div style="color: #58595b; line-height: 20px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"> 
                                                <i class="record-to-location from-to-location-icon" href="javascript:void(0);" draggable="true"></i> 
                                                <?php if (!empty($end_location->location_name)) echo $end_location->location_name; ?>
                                            </div>
                                        </td>  
                                        <td style="font-size: 30px;">
                                            <?php if (!empty($order->order_distance)) echo $order->order_distance; ?> KM
                                        </td>                              
                                        <td style="font-size: 30px;">
                                            <?php 
                                                if (!empty($order->order_price)) {
                                                    $order_bidding_price = $order->order_price-100;
                                                } else
                                                    $order_bidding_price = 0;

                                                 echo $order_bidding_price;
                                            ?>
                                            <span class="max_amount" style="display: none;"><?php echo $order_bidding_price; ?></span>
                                        </td>   <!-- Company profit 100 --> 


                                        <td style="width: 16% !important;">
                                            <?php 
                                            $bidding_data = $this->businessmodel->getBiddingOrderData($order->order_id);
                                            if (!empty($bidding_data)) { ?>
                                                <input class="bidding_amount" type="number" col-index="0" style="height: 45px; width: 100%;font-size: 30px;" max="<?php echo $order_bidding_price; ?>" min="0" value="<?php echo $bidding_data->bid_amount; ?>" disabled="disabled">
                                            <?php } else { ?>
                                                <input class="bidding_amount" type="number" col-index="0" style="height: 45px; width: 100%;font-size: 30px;" max="<?php echo $order_bidding_price; ?>" min="0" value="">
                                            <?php } ?>
                                        </td>

                                        <td>
                                            <?php 
                                            $bidding_data = $this->businessmodel->getBiddingOrderData($order->order_id);
                                            if (!empty($bidding_data)) { ?>    
                                                <button class="btn btn-primary pull-right bidding_action" type="button" style="padding: 3px 12px;font-size: 12px;border-radius: 0px;border: 1px solid #3c8dbc;font-weight: 600;" disabled="disabled">Bid Submitted
                                                </button>
                                            <?php } else { ?>   
                                                <button class="btn btn-primary pull-right bidding_action" type="button" style="padding: 3px 12px;font-size: 12px;border-radius: 0px;border: 1px solid #3c8dbc;font-weight: 600;">Submit
                                                </button>
                                            <?php } ?>
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
      $(document).on('click','.bidding_action', function() {
        data = {};
        data['val'] = $('.bidding_amount').val();
        data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
        data['party_id'] = $('#business_id').text();
        data['max_amount'] = $('.max_amount').text();
        data['index'] = $('.bidding_amount').attr('col-index');

        if(data['val'] > data['max_amount']) {
            $('#invalid').css("display", "block");
                $(window).load(setTimeout(function(){
                $('#invalid').fadeOut('slow',function(){$(this).remove();});
            }, 2000)); 
            return false;
        }
        if(data['val'] < 0) {
            $('#invalid2').css("display", "block");
                $(window).load(setTimeout(function(){
                $('#invalid2').fadeOut('slow',function(){$(this).remove();});
            }, 2000)); 
            return false;
        }
        
        $.ajax({   

            type: "POST",  
            url: "<?php echo base_url(); ?>index.php/business/orderBiddingUpdate",  
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
                }, 1000));
            }   
        });
    });
  });
</script>