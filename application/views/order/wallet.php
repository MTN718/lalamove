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
    <li class="sidemenu-list"> <a href="<?php echo base_url('home/instantquote'); ?>" id="place-order-btn" class="sidemenu-btn cursor-ptr dft-gry active" href="map.html"> <span id="place-order-icon" class="place-order-icon"></span> <br>
      Place Order </a> </li>
    
    <li class="sidemenu-list"> <a href="#" id="records-btn" class="sidemenu-btn cursor-ptr dft-gry showRecords"> <span id="records-icon" class="records-icon"> <span id="records-counter" class="notification-counter hide"></span> </span> <br>
      Records </a>
      <ul>
        <li>
          <div id="records-menu" class="slide-menu"></div>
        </li>
      </ul>
    </li>
    <li class="sidemenu-list"> <a href="#fav-driver-modal" id="my-fleet-btn" class="sidemenu-btn cursor-ptr dft-gry fav-driver-modal" data-toggle="modal"> <span id="my-fleet-icon" class="my-fleet-icon"></span> <br>
      Manage My Driver </a> </li>
    <li class="sidemenu-list"> <a href="#model-id2"  id="user-wallet" class="sidemenu-btn cursor-ptr dft-gry my_wallet" data-toggle="modal"> <span id="my-wallet-icon" class="my-wallet-icon"></span> <br>
      My Wallet </a> </li>
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
                                        <th>Wallet Transaction ID</th>
                                        <th>Transaction Date</th>
                                        <th>Original Rate</th>
                                        <th>Discounted Rate</th>
                                        <th>Order Date</th>
                                        <th>Wallet Amount Used</th>
                                        <th>Vehicle Type</th>
                                        <th>Order Id</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                // echo "<pre>";print_r($walletDetails);die;
                                 foreach ($walletDetails as $wallet) { ?>

                                    <tr>
                                        <td>Wallet#00<?php if (!empty($wallet->wallet_trasaction_id)) echo $wallet->wallet_trasaction_id; ?></td>
                                        <td>
                                            <?php if (!empty($wallet->transaction_date)) echo date('H:i',strtotime($wallet->transaction_date)); ?><br>
                                            <span style="color: #f16622 ;"><?php if (!empty($wallet->transaction_date)) echo date('d-m-Y',strtotime($wallet->transaction_date)); ?></span>
                                        </td>
                                        <td>                                            
                                            <div style="color: #58595b; line-height: 20px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                <i class="record-from-location from-to-location-icon" href="javascript:void(0);" draggable="true"></i> 
                                                <?php 
                                                if (!empty($wallet->original_rate)) echo $wallet->original_rate; ?>
                                            </div>                                            
                                        </td>
                                        <td><?php if(!empty($wallet->discounted_rate)){                                           
                                         echo $wallet->discounted_rate; } ?></td>                                       
                                        <td>
                                            <?php if (!empty($wallet->order_date)) echo date('H:i',strtotime($wallet->order_date)); ?><br>
                                            <span style="color: #f16622 ;"><?php if (!empty($wallet->order_date)) echo date('d-m-Y',strtotime($wallet->order_date)); ?></span>
                                        </td>
                                        <td><?php if(!empty($wallet->discounted_rate) AND !empty($wallet->original_rate)){ 
                                        echo $final_rate =  $wallet->original_rate - $wallet->discounted_rate; 
                                            } ?></td>
                                        <td><?php if(!empty($wallet->vehicle_type_id)){
                                           $vehicle_name = $this->order_model->getVehicleName($wallet->vehicle_type_id);
                                         echo $vehicle_name->vehicle_type_name; } ?></td>
                                         <td><?php if(!empty($wallet->order_id)){                                           
                                         echo $wallet->order_id; } ?></td>
                                    </tr>               
                                <?php }  ?>
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