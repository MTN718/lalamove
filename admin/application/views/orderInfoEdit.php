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
    input[type='number'] {
        -moz-appearance:textfield;
    }
    input::-webkit-outer-spin-button,input::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }
    .from-to-location-icon {
        box-sizing: border-box;
        display: inline-block;
        float: left;
        width: 7%;
    }
    .record-from-location {
        background: url(<?php echo base_url(); ?>/assets/images/stops.png) -3px -11px no-repeat;
        background-size: auto auto;
        background-size: 28px;
        height: 35px;
        width: 20px !important;
    }
    .record-extra-location {
        background: url(<?php echo base_url(); ?>/assets/images/stops.png) -3px -46px repeat-y;
        background-size: 28px;
        height: 40px;
        width: 20px !important;
    }
    .record-to-location {
        background: url(<?php echo base_url(); ?>/assets/images/stops.png) -3px -94px no-repeat;
        background-size: 28px;
        height: 31px;
        width: 20px !important;

    </style>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Order
                <small>#00<?php if(!empty($data['orderInfo']->ORDER_ID)) echo $data['orderInfo']->ORDER_ID; ?></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Order</a></li>
                <li class="active">View Order</li>
            </ol>
        </section>    

        <!-- Main content -->
        <section class="invoice">
            <div class="row">
                <div class="col-xs-12">
                    <div style="text-align: center;">
                        <img src="<?php echo base_url(); ?>images/logo.png">
                    </div>
                    <h2 class="page-header" style="margin: -15px 0 20px 0;">
                        <i class="fa fa-globe"></i>LalaMove
                        <?php
                        $orderdate = strtotime ( $data['orderInfo']->ORDER_DATE ) ;
                        $orderdate = date ( 'd-M-Y' , $orderdate );
                        ?>
                        <small class="pull-right">Order Date: <?php echo $orderdate; ?></small>
                    </h2>
                </div>
            </div>
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    <span style="color: #f86634;font-weight: 600;font-size: 18px;">CUSTOMER:</span>
                    <address>
                        <strong>
                            <?php if (!empty($data['customerNameInfo']->FIRST_NAME)) echo $data['customerNameInfo']->FIRST_NAME; ?>
                            &nbsp;<?php if (!empty($data['customerNameInfo']->LAST_NAME)) echo $data['customerNameInfo']->LAST_NAME; ?>
                        </strong><br>
                        <?php if (!empty($data['customerAddressInfo']->ADDRESS1)) echo $data['customerAddressInfo']->ADDRESS1; ?>,
                        <?php if (!empty($data['customerAddressInfo']->ADDRESS2)) echo $data['customerAddressInfo']->ADDRESS2; ?><br>
                        <?php if (!empty($data['customerAddressInfo']->CITY)) echo $data['customerAddressInfo']->CITY; ?>,
                        <?php if (!empty($data['customerAddressInfo']->STATE_PROVINCE_GEO_ID)) echo $data['customerAddressInfo']->STATE_PROVINCE_GEO_ID; ?>
                        ,
                        <?php if (!empty($data['customerAddressInfo']->POSTAL_CODE)) echo $data['customerAddressInfo']->POSTAL_CODE; ?><br>
                        Phone: <?php if (!empty($data['customerTelecomInfo']->MOBILE_NUMBER)) echo $data['customerTelecomInfo']->MOBILE_NUMBER; ?><br>
                        Email: <?php if (!empty($data['customerEmailInfo']->INFO_STRING)) echo $data['customerEmailInfo']->INFO_STRING; ?>
                    </address>
                </div>
                <div class="col-sm-4 invoice-col">
                    <span style="color: #f86634;font-weight: 600;font-size: 18px;">DRIVER:</span><br>
                    <select class="editable-driver-col" col-index="8" order_data="<?php echo $data['orderInfo']->ORDER_ID; ?>" style="border: 1px solid #ddd;background: none;width: 40%;font-weight:600;" required="required">
                        <?php foreach ($data['availablePartyDriverList'] as $partyDriver) { 
                            $str_flag = "";
                            if($partyDriver->PARTY_ID == $data['orderInfo']->DRIVER_ID)
                                $str_flag = "selected"; 
                            ?>
                            <option value="<?php echo $partyDriver->PARTY_ID; ?>" <?php echo $str_flag; ?>> <?php echo $partyDriver->FIRST_NAME; ?> <?php echo $partyDriver->LAST_NAME; ?> </option>
                        <?php } ?>
                    </select><br>
                    <address id="driverAddress">
                        <?php if(!empty($data['driverNameInfo'])) { ?> 
                            <?php if (!empty($data['driverAddressInfo']->ADDRESS1)) echo $data['driverAddressInfo']->ADDRESS1; ?>,
                            <?php if (!empty($data['driverAddressInfo']->ADDRESS2)) echo $data['driverAddressInfo']->ADDRESS2; ?><br>
                            <?php if (!empty($data['driverAddressInfo']->CITY)) echo $data['driverAddressInfo']->CITY; ?>,
                            <?php if (!empty($data['driverAddressInfo']->STATE_PROVINCE_GEO_ID)) echo $data['driverAddressInfo']->STATE_PROVINCE_GEO_ID; ?>
                            ,
                            <?php if (!empty($data['driverAddressInfo']->POSTAL_CODE)) echo $data['driverAddressInfo']->POSTAL_CODE; ?><br>
                            Phone: <?php if (!empty($data['driverTelecomInfo']->MOBILE_NUMBER)) echo $data['driverTelecomInfo']->MOBILE_NUMBER; ?><br>
                            Email: <?php if (!empty($data['driverEmailInfo']->INFO_STRING)) echo $data['driverEmailInfo']->INFO_STRING; ?>
                        <?php } else { ?>
                            N/A
                        <?php } ?>
                    </address>
                </div>
                <div class="col-sm-4 invoice-col">
                <address id="driverVehicle">
                    <span style="color: #f86634;font-weight: 600;font-size: 18px;">VEHICLE INFO:</span><br>
                    <span style="font-weight: 600;font-size: 29px;"><?php if(!empty($data['vehicleData']->VEHICLE_NO)) echo $data['vehicleData']->VEHICLE_NO; else echo "N/A"; ?></span><br>
                    <b>Vehicle Type:</b> <?php if(!empty($data['vehicleData']->VEHICLE_TYPE_NAME)) echo $data['vehicleData']->VEHICLE_TYPE_NAME; else echo "N/A"; ?><br>  
                    <b>Item Type:</b> N/A<br>   
                    <b>Order Date/Time:</b> 
                        <?php if(!empty($data['orderInfo']->ORDER_DATE)) echo date('d-m-Y', strtotime ( $data['orderInfo']->ORDER_DATE )); ?>
                        <?php if(!empty($data['orderInfo']->ORDER_DATE)) echo " / ".date('H:i', strtotime ( $data['orderInfo']->ORDER_DATE )); ?>
                    <br>  
                </address>           
                </div>
            </div>



            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Location</th>
                                <th>Location (Room-Floor-BLock)</th>
                                <th>Location Address</th>
                                <th>Person Name</th>
                                <th>Location Mobile</th>
                                <th>Stop Time(Min)</th>
                                <th>Extra Charge Per Stop</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['orderLocationInfo'] as $orderStartLocation) { if($orderStartLocation->LOCATION_TYPE == 'START') { 
                                $extraChargePerStop = 0;

                            ?>
                            <tr data-row-id="<?php echo $orderStartLocation->ORDER_LOCATION_ID;?>" >
                                <td style="padding-bottom: 0px;">
                                    <div style="color: #58595b; line-height: 20px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        <i class="record-from-location from-to-location-icon" href="javascript:void(0);" draggable="true"></i>       
                                    </div>       
                                </td>
                                <td><?php if (!empty($orderStartLocation->LOCATION_NAME)) echo $orderStartLocation->LOCATION_NAME; ?></td>
                                <td>
                                    <input type="number" class="editable-col-input" col-index='5' value="<?php if (!empty($orderStartLocation->ROOM)) echo $orderStartLocation->ROOM; ?>" style="width: 40px;height: 25px;">-
                                    <input type="number" class="editable-col-input" col-index='6' value="<?php if (!empty($orderStartLocation->FLOOR)) echo $orderStartLocation->FLOOR; ?>" style="width: 40px;height: 25px;">-
                                    <input type="text" class="editable-col-input" col-index='7' value="<?php if (!empty($orderStartLocation->BUILDING_BLOCK)) echo $orderStartLocation->BUILDING_BLOCK; ?>" style="width: 100px;height: 25px;">
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='1' oldVal ="<?php echo $orderStartLocation->CONTACT_ADDRESS; ?>">
                                    <?php if (!empty($orderStartLocation->CONTACT_ADDRESS)) echo $orderStartLocation->CONTACT_ADDRESS; else echo "-"; ?>
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $orderStartLocation->CONTACT_NAME; ?>">
                                    <?php if (!empty($orderStartLocation->CONTACT_NAME)) echo $orderStartLocation->CONTACT_NAME; else echo "-"; ?>
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='3' oldVal ="<?php echo $orderStartLocation->CONTACT_MOBILE; ?>">
                                    <?php if (!empty($orderStartLocation->CONTACT_MOBILE)) echo $orderStartLocation->CONTACT_MOBILE; else echo "-"; ?>
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='4' oldVal ="<?php echo $orderStartLocation->STOP_TIME; ?>">
                                    <?php if (!empty($orderStartLocation->STOP_TIME)) echo $orderStartLocation->STOP_TIME; else echo "-"; ?>
                                </td>
                                <td id="<?php echo "extraChargePerStop".$orderStartLocation->ORDER_LOCATION_ID;?>">
                                    <?php if (!empty($orderStartLocation->STOP_TIME_CHARGE)) echo $orderStartLocation->STOP_TIME_CHARGE; else echo "-"; ?>
                                    <?php if (!empty($orderStartLocation->STOP_TIME_CHARGE)) $extraChargePerStop += $orderStartLocation->STOP_TIME_CHARGE; ?>
                                </td>
                            </tr>
                            <?php } } foreach ($data['orderLocationInfo'] as $orderStopLocation) { if($orderStopLocation->LOCATION_TYPE == 'STOP') { ?>
                            <tr data-row-id="<?php echo $orderStopLocation->ORDER_LOCATION_ID;?>" >
                                <td style="padding: 0px 8px;">
                                    <div style="color: #f16622; line-height: 20px; font-size: 12px;"> 
                                        <i class="record-extra-location from-to-location-icon" href="javascript:void(0);" draggable="true"></i>
                                    </div>
                                </td>
                                <td><?php if (!empty($orderStopLocation->LOCATION_NAME)) echo $orderStopLocation->LOCATION_NAME; ?></td>
                                <td>
                                    <input type="number" class="editable-col-input" col-index='5' value="<?php if (!empty($orderStopLocation->ROOM)) echo $orderStopLocation->ROOM; ?>" style="width: 40px;height: 25px;">-
                                    <input type="number" class="editable-col-input" col-index='6' value="<?php if (!empty($orderStopLocation->FLOOR)) echo $orderStopLocation->FLOOR; ?>" style="width: 40px;height: 25px;">-
                                    <input type="text" class="editable-col-input" col-index='7' value="<?php if (!empty($orderStopLocation->BUILDING_BLOCK)) echo $orderStopLocation->BUILDING_BLOCK; ?>" style="width: 100px;height: 25px;">
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='1' oldVal ="<?php echo $orderStopLocation->CONTACT_ADDRESS; ?>">
                                    <?php if (!empty($orderStopLocation->CONTACT_ADDRESS)) echo $orderStopLocation->CONTACT_ADDRESS; else echo "-"; ?>
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $orderStopLocation->CONTACT_NAME; ?>">
                                    <?php if (!empty($orderStopLocation->CONTACT_NAME)) echo $orderStopLocation->CONTACT_NAME; else echo "-"; ?>
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='3' oldVal ="<?php echo $orderStopLocation->CONTACT_MOBILE; ?>">
                                    <?php if (!empty($orderStopLocation->CONTACT_MOBILE)) echo $orderStopLocation->CONTACT_MOBILE; else echo "-"; ?>
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='4' oldVal ="<?php echo $orderStopLocation->STOP_TIME; ?>">
                                    <?php if (!empty($orderStopLocation->STOP_TIME)) echo $orderStopLocation->STOP_TIME; else echo "-"; ?>
                                </td>
                                <td id="<?php echo "extraChargePerStop".$orderStopLocation->ORDER_LOCATION_ID;?>">
                                    <?php if (!empty($orderStopLocation->STOP_TIME_CHARGE)) echo $orderStopLocation->STOP_TIME_CHARGE; else echo "-"; ?>
                                    <?php if (!empty($orderStopLocation->STOP_TIME_CHARGE)) $extraChargePerStop += $orderStopLocation->STOP_TIME_CHARGE; ?>
                                </td>
                            </tr>
                            <?php } } foreach ($data['orderLocationInfo'] as $orderEndLocation) { if($orderEndLocation->LOCATION_TYPE == 'END') { ?>
                            <tr data-row-id="<?php echo $orderEndLocation->ORDER_LOCATION_ID;?>" >
                                <td style="padding-top: 0px;">
                                    <div style="color: #58595b; line-height: 20px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"> 
                                        <i class="record-to-location from-to-location-icon" href="javascript:void(0);" draggable="true"></i> 
                                    </div>
                                </td>
                                <td><?php if (!empty($orderEndLocation->LOCATION_NAME)) echo $orderEndLocation->LOCATION_NAME; ?></td>
                                <td>
                                    <input type="number" class="editable-col-input" col-index='5' value="<?php if (!empty($orderEndLocation->ROOM)) echo $orderEndLocation->ROOM; ?>" style="width: 40px;height: 25px;">-
                                    <input type="number" class="editable-col-input" col-index='6' value="<?php if (!empty($orderEndLocation->FLOOR)) echo $orderEndLocation->FLOOR; ?>" style="width: 40px;height: 25px;">-
                                    <input type="text" class="editable-col-input" col-index='7' value="<?php if (!empty($orderEndLocation->BUILDING_BLOCK)) echo $orderEndLocation->BUILDING_BLOCK; ?>" style="width: 100px;height: 25px;">
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='1' oldVal ="<?php echo $orderEndLocation->CONTACT_ADDRESS; ?>">
                                    <?php if (!empty($orderEndLocation->CONTACT_ADDRESS)) echo $orderEndLocation->CONTACT_ADDRESS; else echo "-"; ?>
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $orderEndLocation->CONTACT_NAME; ?>">
                                    <?php if (!empty($orderEndLocation->CONTACT_NAME)) echo $orderEndLocation->CONTACT_NAME; else echo "-"; ?>
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='3' oldVal ="<?php echo $orderEndLocation->CONTACT_MOBILE; ?>">
                                    <?php if (!empty($orderEndLocation->CONTACT_MOBILE)) echo $orderEndLocation->CONTACT_MOBILE; else echo "-"; ?>
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='4' oldVal ="<?php echo $orderEndLocation->STOP_TIME; ?>">
                                    <?php if (!empty($orderEndLocation->STOP_TIME)) echo $orderEndLocation->STOP_TIME; else echo "-"; ?>
                                </td>
                                <td id="<?php echo "extraChargePerStop".$orderEndLocation->ORDER_LOCATION_ID;?>">
                                    <?php if (!empty($orderEndLocation->STOP_TIME_CHARGE)) echo $orderEndLocation->STOP_TIME_CHARGE; else echo "-"; ?>
                                    <?php if (!empty($orderEndLocation->STOP_TIME_CHARGE)) $extraChargePerStop += $orderEndLocation->STOP_TIME_CHARGE; ?>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                    <p class="lead">Order Description:</p>
                    <textarea class="well well-sm no-shadow editable-order-description" col-index="9" order_data="<?php echo $data['orderInfo']->ORDER_ID; ?>" style="width: 100%;height: 150px;"><?php if(!empty($data['orderInfo']->DESCRIPTION)) echo $data['orderInfo']->DESCRIPTION; ?></textarea>
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                    <p class="lead">Amount Due 2/22/2014</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal (Load/Unload extra charge):</th>
                                <td id="subtotal">$<?php echo $extraChargePerStop; ?></td>
                            </tr>
                            <tr>
                                <th>Tax (9.3%)</th>
                                <td>$10.34</td>
                            </tr>
                            <tr>
                                <th>Shipping:</th>
                                <td>$5.80</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>$265.24</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                    <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
                    </button>
                    <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                        <i class="fa fa-download"></i> Generate PDF
                    </button>
                </div>
            </div>
        </section>
    <div class="clearfix"></div>
    </div>

<script>
    function printFunction() {
        window.print();
    }
</script>

<script type="text/javascript">
    $(document).ready(function(){      
      $(document).on('focusout','td.editable-col', function() {
        data = {};
        data['val'] = $(this).text();
        data['id'] = $(this).parent('tr').attr('data-row-id');
        data['index'] = $(this).attr('col-index');
        if($(this).attr('oldVal') === data['val'])
            return false;

        $.ajax({   

            type: "POST",  
            url: "<?php echo base_url(); ?>index.php/home/orderInlineUpdate",  
            cache:false,  
            data: data,
            dataType: "json",       
            success: function(response)  
            {
                $("#extraChargePerStop"+data['id']).load(location.href + " #extraChargePerStop"+data['id']);
                $("#subtotal").load(location.href + " #subtotal");
            }   
        });
    });
  });
</script>

<script type="text/javascript">
    $(document).ready(function(){      
      $(document).on('focusout','.editable-col-input', function() {
        data = {};
        data['val'] = $(this).val();
        data['id'] = $(this).parent('td').parent('tr').attr('data-row-id');
        data['index'] = $(this).attr('col-index');
        
        $.ajax({   

            type: "POST",  
            url: "<?php echo base_url(); ?>index.php/home/orderInlineUpdate",  
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
      $(document).on('click','.editable-driver-col', function() {
        data = {};
        data['val'] = $(this).val();
        data['id'] = $(this).attr('order_data');
        data['index'] = $(this).attr('col-index');
        if(data['val'] == "")
            return false;

        $.ajax({   

            type: "POST",  
            url: "<?php echo base_url(); ?>index.php/home/orderInlineUpdate",
            cache:false,  
            data: data,
            dataType: "json",       
            success: function(response)  
            {   
                $("#driverAddress").load(location.href + " #driverAddress");
                $("#driverVehicle").load(location.href + " #driverVehicle");
           }   
       });
    });
  });
</script>

<script type="text/javascript">
    $(document).ready(function(){      
      $(document).on('focusout','.editable-order-description', function() {
        data = {};
        data['val'] = $(this).val();
        data['id'] = $(this).attr('order_data');
        data['index'] = $(this).attr('col-index');
        if(data['val'] == "")
            return false;

        $.ajax({   

            type: "POST",  
            url: "<?php echo base_url(); ?>index.php/home/orderInlineUpdate",
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