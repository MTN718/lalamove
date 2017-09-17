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
    <link href="<?php echo base_url();?>assets/admin/css/jquery.multiselect.css" rel="stylesheet" type="text/css">

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                order
                <small>#00<?php if(!empty($data['orderInfo']->order_id)) echo $data['orderInfo']->order_id; ?></small>
                <label id="order_id" style="display: none;"><?php echo $data['orderInfo']->order_id; ?></label>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> admin</a></li>
                <li><a href="#">order</a></li>
                <li class="active">View order</li>
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
                        $extraChargePerStop = 0;
                        $totalFare = 0;
                        $orderdate = strtotime ( $data['orderInfo']->order_date ) ;
                        $orderdate = date ( 'd-M-Y' , $orderdate );
                        ?>
                        <small class="pull-right">order Date: <?php echo $orderdate; ?></small>
                    </h2>
                </div>
            </div>
            <div class="row invoice-info">
                <div class="col-sm-3 invoice-col">
                    <span style="color: #f86634;font-weight: 600;font-size: 18px;">CUSTOMER:</span>
                    <address>
                        <strong>
                            <?php if (!empty($data['customerNameInfo']->first_name)) echo $data['customerNameInfo']->first_name; ?>
                            &nbsp;<?php if (!empty($data['customerNameInfo']->last_name)) echo $data['customerNameInfo']->last_name; ?>
                        </strong><br>
                        <?php if (!empty($data['customerAddressInfo']->address1)) echo $data['customerAddressInfo']->address1; ?>,
                        <?php if (!empty($data['customerAddressInfo']->address2)) echo $data['customerAddressInfo']->address2; ?><br>
                        <?php if (!empty($data['customerAddressInfo']->city)) echo $data['customerAddressInfo']->city; ?>,
                        <?php if (!empty($data['customerAddressInfo']->state_province_geo_id)) echo $data['customerAddressInfo']->state_province_geo_id; ?>
                        ,
                        <?php if (!empty($data['customerAddressInfo']->postal_code)) echo $data['customerAddressInfo']->postal_code; ?><br>
                        Phone: <?php if (!empty($data['customerTelecomInfo']->mobile_number)) echo $data['customerTelecomInfo']->mobile_number; ?><br>
                        Email: <?php if (!empty($data['customerEmailInfo']->info_string)) echo $data['customerEmailInfo']->info_string; ?>
                    </address>
                </div>










                <div class="col-sm-3 invoice-col">
                    <span style="color: #f86634;font-weight: 600;font-size: 18px;">BUSINESS:</span><br>
                    <select class="editable-business-col" col-index="13" order_data="<?php echo $data['orderInfo']->order_id; ?>" style="border: 1px solid #ddd;background: none;width: 50%;font-weight:600;" required="required">
                        <option value="">Select Business Owner</option>
                        <?php foreach ($data['partyBusinessList'] as $partyBusiness) { 
                            $str_flag = "";
                            if($partyBusiness->party_id == $data['orderInfo']->business_id)
                                $str_flag = "selected"; 
                            ?>
                            <option value="<?php echo $partyBusiness->party_id; ?>" <?php echo $str_flag; ?>> <?php echo $partyBusiness->first_name; ?> <?php echo $partyBusiness->last_name; ?> </option>
                        <?php } ?>
                    </select><br>
                    <address id="businessAddress">
                        <?php if(!empty($data['businessNameInfo'])) { ?> 
                            <?php if (!empty($data['businessAddressInfo']->address1)) echo $data['businessAddressInfo']->address1; ?>,
                            <?php if (!empty($data['businessAddressInfo']->address2)) echo $data['businessAddressInfo']->address2; ?><br>
                            <?php if (!empty($data['businessAddressInfo']->city)) echo $data['businessAddressInfo']->city; ?>,
                            <?php if (!empty($data['businessAddressInfo']->state_province_geo_id)) echo $data['businessAddressInfo']->state_province_geo_id; ?>
                            ,
                            <?php if (!empty($data['businessAddressInfo']->postal_code)) echo $data['businessAddressInfo']->postal_code; ?><br>
                            Phone: <?php if (!empty($data['businessTelecomInfo']->mobile_number)) echo $data['businessTelecomInfo']->mobile_number; ?><br>
                            Email: <?php if (!empty($data['businessEmailInfo']->info_string)) echo $data['businessEmailInfo']->info_string; ?>
                        <?php } else { ?>
                            N/A
                        <?php } ?>
                    </address>
                </div>







                <div class="col-sm-3 invoice-col">
                    <span style="color: #f86634;font-weight: 600;font-size: 18px;">DRIVER:</span><br>
                    <select id="driver" class="editable-driver-col" col-index="8" order_data="<?php echo $data['orderInfo']->order_id; ?>" style="border: 1px solid #ddd;background: none;width: 50%;font-weight:600;" required="required">
                        <?php if(empty($data['orderInfo']->business_id)) { ?>
                            <option value="">Select Business Owner first</option>
                        <?php } else { ?>
                            <option value="">Select Driver</option>
                            <?php foreach ($data['availablepartyDriverList'] as $partyDriver) { 
                                $str_flag = "";
                                if($partyDriver->party_id == $data['orderInfo']->driver_id)
                                    $str_flag = "selected"; 
                                ?>
                                <option value="<?php echo $partyDriver->party_id; ?>" <?php echo $str_flag; ?>> <?php echo $partyDriver->first_name; ?> <?php echo $partyDriver->last_name; ?> </option>
                            <?php } 
                        } ?>
                    </select><br>
                    <address id="driverAddress">
                        <?php if(!empty($data['driverNameInfo'])) { ?> 
                            <?php if (!empty($data['driverAddressInfo']->address1)) echo $data['driverAddressInfo']->address1; ?>,
                            <?php if (!empty($data['driverAddressInfo']->address2)) echo $data['driverAddressInfo']->address2; ?><br>
                            <?php if (!empty($data['driverAddressInfo']->city)) echo $data['driverAddressInfo']->city; ?>,
                            <?php if (!empty($data['driverAddressInfo']->state_province_geo_id)) echo $data['driverAddressInfo']->state_province_geo_id; ?>
                            ,
                            <?php if (!empty($data['driverAddressInfo']->postal_code)) echo $data['driverAddressInfo']->postal_code; ?><br>
                            Phone: <?php if (!empty($data['driverTelecomInfo']->mobile_number)) echo $data['driverTelecomInfo']->mobile_number; ?><br>
                            Email: <?php if (!empty($data['driverEmailInfo']->info_string)) echo $data['driverEmailInfo']->info_string; ?>
                        <?php } else { ?>
                            N/A
                        <?php } ?>
                    </address>
                </div>










                <div class="col-sm-3 invoice-col">
                <address id="drivervehicle">
                    <span style="color: #f86634;font-weight: 600;font-size: 18px;">vehicle INFO:</span><br>
                    <span style="font-weight: 600;font-size: 29px;"><?php if(!empty($data['vehicleData']->vehicle_no)) echo $data['vehicleData']->vehicle_no; else echo "N/A"; ?></span><br>
                    <b>vehicle Type:</b> <?php if(!empty($data['vehicleData']->vehicle_type_name)) echo $data['vehicleData']->vehicle_type_name; else echo "N/A"; ?><br>  
                    <b>Item Type:</b> N/A<br>   
                    <b>order Date/Time:</b> 
                        <?php if(!empty($data['orderInfo']->order_date)) echo date('d-m-Y', strtotime ( $data['orderInfo']->order_date )); ?>
                        <?php if(!empty($data['orderInfo']->order_date)) echo " / ".date('H:i', strtotime ( $data['orderInfo']->order_date )); ?>
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
                                <th>Location (room-floor-BLock)</th>
                                <th>Location Address</th>
                                <th>person Name</th>
                                <th>Location Mobile</th>
                                <th>Stop Time(Min)</th>
                                <th>Extra Charge Per Stop</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data['orderLocationInfo'] as $orderStartLocation) { if($orderStartLocation->location_type == 'START') { ?>
                            <tr data-row-id="<?php echo $orderStartLocation->order_location_id;?>" >
                                <td style="padding-bottom: 0px;">
                                    <div style="color: #58595b; line-height: 20px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                        <i class="record-from-location from-to-location-icon" href="javascript:void(0);" draggable="true"></i>       
                                    </div>       
                                </td>
                                <td><?php if (!empty($orderStartLocation->location_name)) echo $orderStartLocation->location_name; ?></td>
                                <td>
                                    <input type="number" class="editable-col-input" col-index='5' value="<?php if (!empty($orderStartLocation->room)) echo $orderStartLocation->room; ?>" style="width: 40px;height: 25px;">-
                                    <input type="number" class="editable-col-input" col-index='6' value="<?php if (!empty($orderStartLocation->floor)) echo $orderStartLocation->floor; ?>" style="width: 40px;height: 25px;">-
                                    <input type="text" class="editable-col-input" col-index='7' value="<?php if (!empty($orderStartLocation->building_block)) echo $orderStartLocation->building_block; ?>" style="width: 100px;height: 25px;">
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='1' oldVal ="<?php echo $orderStartLocation->contact_address; ?>">
                                    <?php if (!empty($orderStartLocation->contact_address)) echo $orderStartLocation->contact_address; else echo "-"; ?>
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $orderStartLocation->contact_name; ?>">
                                    <?php if (!empty($orderStartLocation->contact_name)) echo $orderStartLocation->contact_name; else echo "-"; ?>
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='3' oldVal ="<?php echo $orderStartLocation->contact_mobile; ?>">
                                    <?php if (!empty($orderStartLocation->contact_mobile)) echo $orderStartLocation->contact_mobile; else echo "-"; ?>
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='4' oldVal ="<?php echo $orderStartLocation->stop_time; ?>">
                                    <?php if (!empty($orderStartLocation->stop_time)) echo $orderStartLocation->stop_time; else echo "-"; ?>
                                </td>
                                <td id="<?php echo "extraChargePerStop".$orderStartLocation->order_location_id;?>">
                                    <?php if (!empty($orderStartLocation->stop_time_charge)) echo $orderStartLocation->stop_time_charge; else echo "-"; ?>
                                    <?php if (!empty($orderStartLocation->stop_time_charge)) $extraChargePerStop += $orderStartLocation->stop_time_charge; ?>
                                </td>
                            </tr>
                            <?php } } foreach ($data['orderLocationInfo'] as $orderStopLocation) { if($orderStopLocation->location_type == 'STOP') { ?>
                            <tr data-row-id="<?php echo $orderStopLocation->order_location_id;?>" >
                                <td style="padding: 0px 8px;">
                                    <div style="color: #f16622; line-height: 20px; font-size: 12px;"> 
                                        <i class="record-extra-location from-to-location-icon" href="javascript:void(0);" draggable="true"></i>
                                    </div>
                                </td>
                                <td><?php if (!empty($orderStopLocation->location_name)) echo $orderStopLocation->location_name; ?></td>
                                <td>
                                    <input type="number" class="editable-col-input" col-index='5' value="<?php if (!empty($orderStopLocation->room)) echo $orderStopLocation->room; ?>" style="width: 40px;height: 25px;">-
                                    <input type="number" class="editable-col-input" col-index='6' value="<?php if (!empty($orderStopLocation->floor)) echo $orderStopLocation->floor; ?>" style="width: 40px;height: 25px;">-
                                    <input type="text" class="editable-col-input" col-index='7' value="<?php if (!empty($orderStopLocation->building_block)) echo $orderStopLocation->building_block; ?>" style="width: 100px;height: 25px;">
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='1' oldVal ="<?php echo $orderStopLocation->contact_address; ?>">
                                    <?php if (!empty($orderStopLocation->contact_address)) echo $orderStopLocation->contact_address; else echo "-"; ?>
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $orderStopLocation->contact_name; ?>">
                                    <?php if (!empty($orderStopLocation->contact_name)) echo $orderStopLocation->contact_name; else echo "-"; ?>
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='3' oldVal ="<?php echo $orderStopLocation->contact_mobile; ?>">
                                    <?php if (!empty($orderStopLocation->contact_mobile)) echo $orderStopLocation->contact_mobile; else echo "-"; ?>
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='4' oldVal ="<?php echo $orderStopLocation->stop_time; ?>">
                                    <?php if (!empty($orderStopLocation->stop_time)) echo $orderStopLocation->stop_time; else echo "-"; ?>
                                </td>
                                <td id="<?php echo "extraChargePerStop".$orderStopLocation->order_location_id;?>">
                                    <?php if (!empty($orderStopLocation->stop_time_charge)) echo $orderStopLocation->stop_time_charge; else echo "-"; ?>
                                    <?php if (!empty($orderStopLocation->stop_time_charge)) $extraChargePerStop += $orderStopLocation->stop_time_charge; ?>
                                </td>
                            </tr>
                            <?php } } foreach ($data['orderLocationInfo'] as $orderEndLocation) { if($orderEndLocation->location_type == 'END') { ?>
                            <tr data-row-id="<?php echo $orderEndLocation->order_location_id;?>" >
                                <td style="padding-top: 0px;">
                                    <div style="color: #58595b; line-height: 20px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"> 
                                        <i class="record-to-location from-to-location-icon" href="javascript:void(0);" draggable="true"></i> 
                                    </div>
                                </td>
                                <td><?php if (!empty($orderEndLocation->location_name)) echo $orderEndLocation->location_name; ?></td>
                                <td>
                                    <input type="number" class="editable-col-input" col-index='5' value="<?php if (!empty($orderEndLocation->room)) echo $orderEndLocation->room; ?>" style="width: 40px;height: 25px;">-
                                    <input type="number" class="editable-col-input" col-index='6' value="<?php if (!empty($orderEndLocation->floor)) echo $orderEndLocation->floor; ?>" style="width: 40px;height: 25px;">-
                                    <input type="text" class="editable-col-input" col-index='7' value="<?php if (!empty($orderEndLocation->building_block)) echo $orderEndLocation->building_block; ?>" style="width: 100px;height: 25px;">
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='1' oldVal ="<?php echo $orderEndLocation->contact_address; ?>">
                                    <?php if (!empty($orderEndLocation->contact_address)) echo $orderEndLocation->contact_address; else echo "-"; ?>
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='2' oldVal ="<?php echo $orderEndLocation->contact_name; ?>">
                                    <?php if (!empty($orderEndLocation->contact_name)) echo $orderEndLocation->contact_name; else echo "-"; ?>
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='3' oldVal ="<?php echo $orderEndLocation->contact_mobile; ?>">
                                    <?php if (!empty($orderEndLocation->contact_mobile)) echo $orderEndLocation->contact_mobile; else echo "-"; ?>
                                </td>
                                <td class="editable-col" contenteditable="true" col-index='4' oldVal ="<?php echo $orderEndLocation->stop_time; ?>">
                                    <?php if (!empty($orderEndLocation->stop_time)) echo $orderEndLocation->stop_time; else echo "-"; ?>
                                </td>
                                <td id="<?php echo "extraChargePerStop".$orderEndLocation->order_location_id;?>">
                                    <?php if (!empty($orderEndLocation->stop_time_charge)) echo $orderEndLocation->stop_time_charge; else echo "-"; ?>
                                    <?php if (!empty($orderEndLocation->stop_time_charge)) $extraChargePerStop += $orderEndLocation->stop_time_charge; ?>
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
                    <div class="col-xs-12">
                        <p class="lead">order Services and description:</p>
                        <select class="form-control" name="orderService[]" multiple id="orderService" order_id="<?php echo $data['orderInfo']->order_id; ?>" required="required">    
                            <?php foreach ($data['orderServiceList'] as $orderService) { 
                                $str_flag = "";                              
                                    if(isset($data['selectedServiceList']) and $data['selectedServiceList'] != NULL) {
                                        foreach ($data['selectedServiceList'] as $selectedService) {
                                            if($orderService->service_id == $selectedService->service_id) {
                                                $str_flag = "selected"; 
                                                $totalFare += $orderService->price;
                                            break;
                                            }
                                            else $str_flag="";
                                        }
                                    }  
                                ?>
                                <option value="<?php echo $orderService->service_id; ?>" <?php echo $str_flag; ?> >
                                    <?php echo $orderService->services_title; ?> [$<?php echo $orderService->price; ?>]
                                </option>
                            <?php } ?>
                        </select>
                        <br>
                        <textarea class="well well-sm no-shadow editable-order-input" col-index="9" order_data="<?php echo $data['orderInfo']->order_id; ?>" style="width: 100%;height: 100px;"><?php if(!empty($data['orderInfo']->description)) echo $data['orderInfo']->description; ?></textarea>
                    </div>                    
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                    <p class="lead">Amount Due</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:43%">Base Fare:</th>
                                <td id="basefare">
                                    $<?php 
                                        $totalFare += $data['orderInfo']->base_fare;
                                        echo $data['orderInfo']->base_fare; 
                                    ?>
                                </td>
                                <td style="float: left;">[ Base Fare Limit: 
                                    <?php 
                                        echo $data['orderInfo']->base_fare_limit; 
                                    ?> KM ]
                                </td>
                            </tr>
                            <tr>
                                <th>Extra Fare (Base Limit < Total KM ):</th>
                                <td id="subtotal">
                                    $<?php 
                                    if($data['orderInfo']->base_fare_limit < $data['orderInfo']->order_distance) { 
                                        $extrafare = ($data['orderInfo']->order_distance - $data['orderInfo']->base_fare_limit) * $data['orderInfo']->rent_per_km ;
                                        $totalFare += $extrafare;
                                    }else
                                        $extrafare = 0;
                                    echo $extrafare; ?>
                                </td>
                                <td> 
                                    <input type="number" class="editable-order-input" col-index='10' order_data="<?php echo $data['orderInfo']->order_id; ?>" value="<?php if (!empty($data['orderInfo']->order_distance)) echo $data['orderInfo']->order_distance; ?>" style="height: 25px;"> KM
                                </td>
                            </tr>
                            <tr>
                                <th>Load/Unload extra charge:</th>
                                <td id="Loadunloadcharge">
                                $<?php 
                                    $totalFare += $extraChargePerStop;
                                    echo $extraChargePerStop; 
                                ?>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <th>Discount :</th>
                                <td id="discountPromoCode">
                                    -$<?php 
                                    if(!empty($data['selectedDiscountPromoCode']->price)) {
                                        $totalFare -= $data['selectedDiscountPromoCode']->price;
                                        echo $data['selectedDiscountPromoCode']->price; 
                                    } else
                                        echo "0";
                                    ?>
                                </td>
                                <td>
                                    <select class="editable-driver-col" col-index="11" order_data="<?php echo $data['orderInfo']->order_id; ?>" style="border: 1px solid #ddd;background: none;font-weight:600;" required="required">
                                        <option value="NULL">Select Discount Procode</option>
                                        <?php foreach ($data['discountPromoCode'] as $promoCode) { 
                                            $str_flag = "";
                                            if($promoCode->discount_promocode_id == $data['orderInfo']->discount_promocode_id) {
                                                $str_flag = "selected";
                                            }
                                            ?>
                                            <option value="<?php echo $promoCode->discount_promocode_id; ?>" <?php echo $str_flag; ?>> <?php echo $promoCode->promo_code; ?> [$<?php echo $promoCode->price; ?>] </option>
                                        <?php } ?>
                                    </select> Promocode
                                </td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td id="totalFare">$<?php echo $totalFare; ?></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <a href="#" class="btn btn-default" onclick="printFunction()"><i class="fa fa-print"></i> Print</a>




                    <span class="dropdown pull-right" id="order_action" >
                        <button class="btn btn-success dropdown-toggle" id="menu1" type="button" data-toggle="dropdown"><i class="fa fa-cart-arrow-down"></i> Order 
                            <?php if (!empty($data['orderInfo']->order_status_id) AND $data['orderInfo']->order_status_id == "matched") { ?>
                                Matched
                            <?php } else if (!empty($data['orderInfo']->order_status_id) AND $data['orderInfo']->order_status_id == "cancel") { ?>
                                Cancelled
                            <?php } else if (!empty($data['orderInfo']->order_status_id) AND $data['orderInfo']->order_status_id == "confirm") { ?>
                                Confirm
                            <?php } else if (!empty($data['orderInfo']->order_status_id) AND $data['orderInfo']->order_status_id == "complete") { ?>
                                Complete
                            <?php } else if (!empty($data['orderInfo']->order_status_id) AND $data['orderInfo']->order_status_id == "bidding") { ?>
                                Bidding
                            <?php } else if (!empty($data['orderInfo']->order_status_id) AND $data['orderInfo']->order_status_id == "active") { ?>
                                Active
                            <?php } ?>
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1" style="min-width: 150px;">
                            <li role="presentation"><a role="menuitem" class="orderAction" col-index='12' action-data="cancel">Cancel</a></li>
                            <?php if (!empty($data['orderInfo']->order_status_id) AND $data['orderInfo']->order_status_id == "active") { ?>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" class="orderAction" col-index='12' action-data="bidding">On Bidding</a></li> 
                            <?php } if (!empty($data['orderInfo']->driver_id) AND $data['orderInfo']->driver_id != 0) { ?>
                            <li role="presentation" class="divider"></li>
                            <li role="presentation"><a role="menuitem" class="orderAction" col-index='12' action-data="complete">Complete</a></li> 
                            <?php } ?>
                        </ul>
                    </span>








                </div>
            </div>
        </section>
    <div class="clearfix"></div>
    </div>

<script src="<?php echo base_url();?>assets/admin/js/jquery.multiselect.js"></script>
<script>
    function printFunction() {
        window.print();
    }

    function orderTotal() {     
        data = {};
        data['order_id'] = $("#order_id").text();
        data['total'] = $("#totalFare").text();
        $.ajax({
            type:'POST',
            url:'<?php echo base_url();?>index.php/admin/orderTotalUpdate',
            data: data,
            success:function(total) {                
            }
        });
    }
</script>

<script type="text/javascript">
    $('#orderService').multiselect({
        columns: 1,
        placeholder: 'Select order Services'
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('change','.ms-options-wrap', function() {
        
        data = {};
        data['vals'] = $('#orderService').val();
        data['id'] = $('#orderService').attr('order_id');

        $.ajax({ 
            type: "POST",  
            url: "<?php echo base_url(); ?>/index.php/admin/orderServiceInlineUpdate",  
            cache:false,  
            data: data,
            dataType: "json",       
            success: function(response)  
            {   
                $("#Loadunloadcharge").load(location.href + " #Loadunloadcharge");
                $("#totalFare").load(location.href + " #totalFare");
                $("#subtotal").load(location.href + " #subtotal");
                orderTotal();
            }   
        });
    });
});
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
            url: "<?php echo base_url(); ?>index.php/admin/orderInlineUpdate",  
            cache:false,  
            data: data,
            dataType: "json",       
            success: function(response)  
            {   
                $("#extraChargePerStop"+data['id']).load(location.href + " #extraChargePerStop"+data['id']);
                $("#Loadunloadcharge").load(location.href + " #Loadunloadcharge");
                $("#totalFare").load(location.href + " #totalFare");
                $("#subtotal").load(location.href + " #subtotal");
                orderTotal();
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
            url: "<?php echo base_url(); ?>index.php/admin/orderInlineUpdate",  
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
        $(document).on('click','.editable-business-col', function() {
            data = {};
            data['val'] = $(this).val();
            data['id'] = $(this).attr('order_data');
            data['index'] = $(this).attr('col-index');

            $.ajax({   

                type: "POST",  
                url: "<?php echo base_url(); ?>index.php/admin/orderInlineUpdate",
                cache:false,  
                data: data,
                dataType: "json",       
                success: function(response)  
                {   
                    $("#businessAddress").load(location.href + " #businessAddress");
                    $("#driverAddress").load(location.href + " #driverAddress");
                    $("#drivervehicle").load(location.href + " #drivervehicle");
                    $("#order_action").load(location.href + " #order_action");
                    if(data['val']){
                        $.ajax({
                            type:'POST',
                            url:'<?php echo base_url();?>index.php/admin/driverList',
                            data: data,
                            success:function(html){
                                $('#driver').html(html);
                            }
                        }); 
                    }else{
                        $('#driver').html('<option value="">Select Business Owner first</option>');
                    }



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

        $.ajax({   

            type: "POST",  
            url: "<?php echo base_url(); ?>index.php/admin/orderInlineUpdate",
            cache:false,  
            data: data,
            dataType: "json",       
            success: function(response)  
            {   
                $("#driverAddress").load(location.href + " #driverAddress");
                $("#drivervehicle").load(location.href + " #drivervehicle");
                $("#discountPromoCode").load(location.href + " #discountPromoCode");
                $("#totalFare").load(location.href + " #totalFare");
                $("#order_action").load(location.href + " #order_action");
                orderTotal();
           }   
       });
    });
  });
</script>

<script type="text/javascript">
    $(document).ready(function(){      
      $(document).on('focusout','.editable-order-input', function() {
        data = {};
        data['val'] = $(this).val();
        data['id'] = $(this).attr('order_data');
        data['index'] = $(this).attr('col-index');

        $.ajax({   

            type: "POST",  
            url: "<?php echo base_url(); ?>index.php/admin/orderInlineUpdate",
            cache:false,  
            data: data,
            dataType: "json",       
            success: function(response)  
            {   
                $("#Loadunloadcharge").load(location.href + " #Loadunloadcharge");
                $("#totalFare").load(location.href + " #totalFare");
                $("#subtotal").load(location.href + " #subtotal");
                orderTotal();
            }   
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){      
      $(document).on('click','.orderAction', function() {

        if(confirm('Are you sure you want to perform this Action?')) {
            data = {};
            data['id'] = $("#order_id").text();
            data['val'] = $(this).attr('action-data');
            data['index'] = $(this).attr('col-index');            

            $.ajax({   
                type: "POST",  
                url: "<?php echo base_url(); ?>index.php/admin/orderInlineUpdate",
                cache:false,  
                data: data,
                dataType: "json",       
                success: function(response)  
                {   
                    $("#order_action").load(location.href + " #order_action");
                }   
            });
        }
        $("#order_action").load(location.href + " #order_action");
      });
  });
</script>