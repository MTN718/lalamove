<!-- left one panel -->
<input type="hidden" class="country_code" name="country_code" value="<?php if(isset($country) AND !empty($country)){ echo $country; }else{ echo "th"; } ?>">

<nav class="bdr-right">
  <ul>
    <li class="sidemenu-list"> <a href="#" id="place-order-btn" class="sidemenu-btn cursor-ptr dft-gry active" href="map.html"> <span id="place-order-icon" class="place-order-icon"></span> <br>
      Place Order </a> </li>
    <li class="sidemenu-list"> <a href="#" id="on-going-orders-btn" class="sidemenu-btn cursor-ptr dft-gry"> <span id="on-going-orders-icon" class="on-going-orders-icon"> <span id="on-going-orders-counter" class="notification-counter hide"></span> </span> <br>
      Ongoing Orders </a> </li>
    <li class="sidemenu-list"> <a href="#" id="records-btn" class="sidemenu-btn cursor-ptr dft-gry"> <span id="records-icon" class="records-icon"> <span id="records-counter" class="notification-counter hide"></span> </span> <br>
      Records </a>
      <ul>
        <li>
          <div id="records-menu" class="slide-menu"></div>
        </li>
      </ul>
    </li>
    <li class="sidemenu-list"> <a href="#model-id" id="my-fleet-btn" class="sidemenu-btn cursor-ptr dft-gry" data-toggle="modal"> <span id="my-fleet-icon" class="my-fleet-icon"></span> <br>
      Manage My Driver </a> </li>
    <li class="sidemenu-list"> <a href="#model-id2"  id="user-wallet" class="sidemenu-btn cursor-ptr dft-gry" data-toggle="modal"> <span id="my-wallet-icon" class="my-wallet-icon"></span> <br>
      My Wallet </a> </li>
    <li class="sidemenu-list"> </li>
  </ul>
</nav>

<!-- left two panel -->
<div id="menu-ctn" class="bdr-right first_panel">
  <input id="searchTextField" address-id="" address="" placeholder="Enter a query" autocomplete="off" type="text">
  <div id="place-order-section" class="open">
    <div class="normal-request-ctn bdr-btm">
      <div class="jcarousel-control-ctn" style="height: 80px;"> <a class="jcarousel-prev" href="#">‹</a> </div>
      <div class="jcarousel vehicle-type-select">
        <ul class="tabs">
        <?php $vehicle_type = $this->order_model->getVehicleType(); 
        foreach ($vehicle_type as $key => $value) {
          $image1 = $value['IMAGE1'];
$image2 = $value['IMAGE2'];

          ?>
            <li> 
              <a data-basefare="<?php echo $value['BASE_FARE'] ?>" data-rentkm="<?php echo $value['RENT_PER_KM']; ?>" id="<?php echo strtolower($value['VEHICLE_TYPE_NAME']); ?>-btn" class="vehicle-type-select-btn lgt-gry <?php echo $value['VEHICLE_TYPE_CLASS']; ?>" href="javascript:void(0);" data-vehicletype="<?php echo $value['VEHICLE_TYPE_ID']; ?>"> 
                <span class="vehicle-type-select-icon">
                 <img class="off" src="<?php echo base_url('assets/images/map/');echo $image1; ?>" height="55">
                 <img class="on" src='<?php  echo base_url('assets/images/map/');echo $image2; ?>' height="55">
                </span> <br>
            <?php echo ucfirst($value['VEHICLE_TYPE_NAME']); ?> </a> </li>
           
        <?php }
        ?>
      </ul>
      </div>
      <div class="jcarousel-control-ctn" style="height: 80px;"> <a class="jcarousel-next" href="#">›</a> </div>
    </div>
    <div id="motorcycle-vehicle-type-select" class="vehicle-type-detail-select bdr-btm active item_type_hide">
      <ul>
      <?php $item_type = $this->order_model->getItmeType(); 

      foreach ($item_type as $value) {
        $active='';
      $active = !empty($value['NAME']=='Document')?'active':''; ?>
        <li> <a id="<?php echo strtolower($value['NAME']); ?>-vechicle-type-detail-select" class="vehicle-type-detail-select-link lgt-gry <?php echo $active; ?>" data-type="<?php echo strtoupper($value['NAME']); ?>" href="javascript:void(0);"> <?php echo ucfirst($value['NAME']); ?> </a> </li>
      <?php }
      ?>
      <input type="hidden" name="item_type" id="item_type_val" value="1">
    </ul>
    </div>
    <div class="place-order-inputs">
      <div class="place-order-input-wrapper alg-r mg-btm-10"> <a id="more-info-link" class="oge-link-btn" href="javascript:void(0);"> More Info </a> </div>
      <ul class="sortable bdr-all" data-sortable-id="0" aria-dropeffect="move">
        <li id="location-list-1" class="location-list" data-item-sortable-id="0" role="option" aria-grabbed="false">
          <div class="place-order-input-wrapper wht-bg"> 
          <a class="from-location-icon from-to-location-icon" href="javascript:void(0);" draggable="true"> <span class="location-drag-icon"></span> <span class="location-drag-tips">Drag To Reorder</span> </a> <span class="location-input-wrapper bdr-btm">
            <!-- <input id="location-1" class="location-input ellipsis" tabindex="1" data-placeid="" data-lat="" data-lng="" data-address="" placeholder="Select Origin" type="text"> -->
            <input id="location-1" class="controls location-input ellipsis origin_input" type="text" placeholder="Select Origin" value="">
            <span class="input-right-text hide add_delivery_info add_delivery_info_start" id="input-right-text-origin" data-panel="start">+ Add Delivery Info</span>
            <span class="text-danger origin-err"></span>
            <span class="input-right-icon recipient-info-icon"></span> </span> <span id="location-1-predict" class="predict-ctn" style="display: none;"></span> </div>
         
        </li>
          <div class="input_fields_wrap">

  </div>
      
        <li id="location-list-3" class="location-list" data-item-sortable-id="0" role="option" aria-grabbed="false">
          <div class="place-order-input-wrapper wht-bg"> <a class="from-to-location-icon to-location-icon" href="javascript:void(0);" draggable="true"> <span class="location-drag-icon"></span> <span class="location-drag-tips">Drag To Reorder</span> </a> <span class="location-input-wrapper">
            <!-- <input id="location-2" class="location-input ellipsis" tabindex="2" data-placeid="" data-lat="" data-lng="" data-address="" placeholder="Select Destination" type="text"> -->
            <input id="location-2" class="controls location-input ellipsis destination_input" tabindex="2" type="text" placeholder="Enter a destination location" value="">
            <span class="input-right-text hide add_delivery_info add_delivery_info_end" id="input-right-text-destination" data-panel="end">+ Add Delivery Info</span>
            <span class="text-danger destination-err"></span>
            <span class="input-right-icon recipient-info-icon"></span> </span> <span id="location-2-predict" class="predict-ctn" style="display: none;"></span> </div>
          <div id="location-2-recipient" class="location-recipient-wrapper bdr-all">
         
          </div>
        </li>
      </ul>
      <div class="place-order-input-wrapper alg-r mg-top-10 mg-btm-10"> 
        <a id="clear-all-stops-link" class="extra-stops-link oge-link-btn clear-all-directions" href="javascript:void(0);"> Clear All Stops </a> 
        <a id="add-extra-stop-link" class="add_field_button extra-stops-link oge-link-btn" href="javascript:void(0);"> Add Stop </a> 
        <!-- <button id="add-extra-stop-link" class="add_field_button extra-stops-link oge-link-btn"> Add Stop </button> -->
        <a id="remove-extra-stop-link" class="extra-stops-link oge-link-btn remove-last" href="javascript:void(0);"> Remove Last Stop </a> 
      </div><br>
      <div id="importMultipleAddress" class="place-order-input-wrapper alg-r">
        <!-- <div class="place-order-input-wrapper-1-2 flt-l mg-top-2"> <a href="javascript:void(0);" id="optimizeRouteCheckBox"></a> <span class="optimizeRouteBtn">Optimize Route <a id="optimize-route-annoucement" class="oge" href="javascript:void(0);"><img class="va-m" src="http://pro.lalamove.com/assets/img/side-menu/more.png" width="17" height="17"></a> </span> </div> -->
        <div class="place-order-input-wrapper-1-2 flt-r"> <a id="importAddresses" class="import_address"> Import <span class="arrow"></span> </a> </div>
        <div class="place-order-input-wrapper hide" id="multiple-address-area">
          <textarea id="multiple-address-input-textarea" class="comment-textarea-input bdr-all hide" placeholder="Copy and paste your route addresses. One address per line (20 addresses max.) "></textarea>
          <div id="multiple-address-input-div" class="bdr-all hide" data-ph="Copy and paste your route addresses. One address per line (20 addresses max.) " contenteditable="true"></div>
          <div id="add-address-btn-ctn" class="alg-c"> <a id="add-address-btn" href="javascript:void(0);"> Create Route </a> </div>
        </div>
      </div>
      
      <div class="place-order-input-wrapper mg-btm-15">
        <div id="tunnel-selected-list" class="bdr-left bdr-btm bdr-right"></div>
      </div>
      <br>
      <br>
      <br>
      <br>
      <!-- <div class="place-order-input-wrapper"> <a id="additional-service-btn" class="additional-service-input bdr-all alg-c lgt-gry" > Additional Services <span id="additional-service-edit" class="oge-link-btn flt-r hide"> Edit </span> </a> </div> -->
      <div class="place-order-input-wrapper opa_add opacity_additional"><a class="pointer_event additional-service-input bdr-all alg-c lgt-gry"><span class="add_ser">Additional Services</span></a> 
       <!-- <button type="button" class="btn btn-info btn-lg" >Open Small Modal</button> -->
      </div>
      
   
      <!-- mg 15-->
      <div class="place-order-input-wrapper mg-btm-15"> </div>
      <div class="place-order-input-wrapper mg-btm-15">
        <textarea id="comment-input" class="comment-textarea-input bdr-all" name="description" placeholder="Enter a remark or comment for this order"></textarea>
      </div>
      <div class="place-order-input-wrapper mg-btm-15">
        <!-- <input id="promo-input" class="promo-code-input bdr-all" placeholder="Promo Code" value="" type="text"> -->
        <!-- <div class="flt-r"> <span class="total-text dft-gry">Total</span> <span id="price-total" class="total-number dft-gry bld total_rate" data-price="0">$0</span> </div> -->
      </div>
    </div>
    <input type="hidden" name="waypoints[]" id="waylatlng" value="">
    <div class="place-order-button-ctn"> 
    <a id="immediate-order-btn" class="btn-1-2" href="javascript:void(0);" onclick="immediateOrder()"> Schedule (&lt;20 Min) </a> 
    <a id="advanced-order-btn" class="btn-1-2" href="javascript:void(0);" onclick="deliverNow()"> Deliver Now </a> 
    </div>
  </div>
  <div id="on-going-orders-section"></div>
</div>

<!-- Hidden Session value start -->
<?php if(!empty($this->session->user_id)) {
  $wallet = $this->user_model->walletTopUp($this->session->user_id); ?>
<input type="hidden" class="remaining_wallet_amt" id="remaining_wallet_amt" name="remaining_wallet_amt" value="<?php echo $wallet->AMOUNT; ?>">
<?php } ?>
<input type="hidden" class="party_id" id="party_id" name="party_id" value="<?php echo $this->session->user_id; ?>">
<input type="hidden" class="order_by" id="order_by" name="order_by" value=" <?php echo $this->session->user_type; ?>">
<!-- Hidden Session value end -->
<!-- second page start -->
<div id="menu-ctn" class="bdr-right second_panel" style="display: none;">
  <input id="searchTextField" address-id="" address="" placeholder="Enter a query" autocomplete="off" type="text">
  <div id="place-order-section" class="open">
   <div class="overlay-input-wrapper">
               <div class=" order-overlay-datetime ">
                  <div class="order-overlay-top-title noto-sans">DATE & TIME</div>
                  <div class="place-order-input-wrapper bdr-all wht-bg mg-btm-15 order-overlay-datetime-inner">
                     <input id="immediate-datetime-input" class="datetime-input overlay-input cmn-cls-width" type="text" value="" /> 
                     <div id="order-overlay-time-immed" class="order-overlay-time">
                        <div id="order-overlay-time-month-immed" class="order-overlay-time-month"></div>
                        <div id="order-overlay-time-day-immed" class="order-overlay-time-day"></div>
                        <div id="order-overlay-time-other-immed" class="order-overlay-time-other"></div>
                     </div>
                  </div>
               </div>
               <div class="order-overlay-info">
                  <div class="order-overlay-top-title noto-sans">CONTACT INFO</div>
                  <div class="place-order-input-wrapper bdr-btm wht-bg">  <input id="order-username-input" class="order-username-input overlay-input cmn-cls-width" type="text" placeholder="Name" value="<?php echo $this->session->name; ?>" /> </div>
                  <div class="place-order-input-wrapper bdr-btm wht-bg">  <input id="order-user-phone-input" class="order-user-phone-input overlay-input cmn-cls-width" type="text" placeholder="Phone" value="<?php echo $this->session->mobile; ?>" /> </div>
               </div>
    <div class="order-overlay-passenger">  
      <i style="float: left; color: #F16622; margin: 11px 12px;" class="icon-passenger fnt-15"></i>
        <span class="passenger-total-ctn"> 
          <span data-passenger="1" class="order-passenger-total">1</span>&nbsp;
            <span class="order-passenger-text">Passenger(s)</span>
            <br> 
              <span class="order-passenger-total-text hide">Max:5</span> 
        </span>
        <span class="passenger-increase-ctn"> 
          <a data-type="increase" href="javascript:void(0);" class="order-passenger-increase passenger-increase-decrease-btn"> 
            <i style="float: left; color: #B4B4B4; margin: 5px 15px;" class="icon-plus fnt-15"></i> 
          </a> 
        </span> 
        <span class="passenger-decrease-ctn"> 
          <a data-type="decrease" href="javascript:void(0);" class="order-passenger-decrease passenger-increase-decrease-btn"> 
            <i style="float: left; color: #B4B4B4; margin: 5px 11px;" class="icon-minus fnt-15"></i> 
          </a> 
        </span> 
    </div>
  </div>
    <div class="overlay-title-ctn order-overlay-top-title noto-sans dft-gry mg-btm-15"> PAYMENT METHOD </div>
    <div class="payment-btn-ctn bdr-all ">
      <span style="padding-left: 30%;" class="wallet-item-1-2 alg-c">
        <a href="#"  type="pre-payment" class="pre-payment-btn payment-btn dft-gry wallet-check">
          <i style="font-size: 24px;" class="icon-wallet_mgmt"></i>
           <div>Wallet</div>
        </a> 
      </span> 
      <span style="padding-right: 30%;" class="wallet-item-1-2 alg-c ">
        <a href="javscript:void(0);" type="cash" class="cash-btn payment-btn dft-gry active">
          <i style="font-size: 24px;" class="icon-cash"></i> <div>Cash</div>
        </a> </span>
    </div>

    <div class="place-order-inputs">
      
     
    
      
      <!-- mg 15-->
      
      <div class="place-order-input-wrapper mg-btm-15">
        <input id="promo-input" class="promo-code-input bdr-all" data-toggle="modal" data-target="#promoCode" placeholder="Promo Code" value="" type="text">
        
         <!--  <div class="flt-r discount_div hide"> 
            <span class="total-text dft-gry">Total</span> 
            <span id="price-total" class="total-number dft-gry bld orignal_rate" data-price="0">$0</span><br>-
            <span id="price-total" class="total-number dft-gry bld discount" data-price="0">$0</span>
           </div>   -->
        
      <!--   <div class="flt-r"> <span class="total-text dft-gry">Total</span> 
                <span id="price-total" class="total-number dft-gry bld discount_div total_rate final_rate_before_discount" data-price="0">$0</span> 
                <div class="disc_d hide"><span class="total-text dft-gry">After discount</span> 
                <span id="price-total" class="total-number dft-gry bld total_rate final_rate_after_discount" data-price="0">$0</span> 
                </div>
        </div> -->
        <div class="overlay-title-ctn order-overlay-top-title noto-sans dft-gry mg-btm-15"> PRICE BREAKDOWN </div>

        <div class="wallet-detail-ctn"> 
          <span class="wallet-item-1-2 alg-l"> Fee </span> 
            <span class="wallet-item-1-2 alg-r total-number dft-gry bld discount_div total_rate final_rate_before_discount" id="price-total">$0</span>  
              <div id="not-include">does NOT including extra fee (e.g. toll or parking fee)</div>   
            <!-- <div class="wallet-detail-as hide">
                <span class="wallet-item-1-2 alg-l"> Additional Services </span>
                <span class="wallet-item-1-2 alg-r" id="payment-additional-service">0</span> 
            </div>   -->
            <div class="disc_d hide wallet-detail-dis">
                <span class="wallet-item-1-2 alg-l dft-gry">After discount</span> 
                <span id="price-total" class="wallet-item-1-2 alg-r total-number dft-gry bld total_rate final_rate_after_discount" data-price="0">$0</span> 
            </div>
            <!-- <div class="wallet-detail-dis"> 
                <span class="wallet-item-1-2 alg-l"> Discount </span> 
                <span class="wallet-item-1-2 alg-r" id="payment-discount">-103</span> 
            </div> -->
            <!-- <div class="wallet-detail-sur">
             <span class="wallet-item-1-2 alg-l"> Surcharge </span>
              <span class="wallet-item-1-2 alg-r" id="payment-surcharge">30</span>
            </div>  -->
            <!-- <div class="wallet-detail-promo hide">
             <span class="wallet-item-1-2 alg-l"> Promo Code </span>
              <span class="payment-promo-code wallet-item-1-2 alg-r">0</span>
            </div>   -->
            <!-- <div class="wallet-detail-rewards" style="display: none;"> 
              <span class="wallet-item-1-2 alg-l"> Rewards </span> 
                <span class="payment-rewards wallet-item-1-2 alg-r">$ 0</span> 
            </div> -->
        </div>

      </div>

      <div class="modal fade" id="promoCode" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">PROMO CODE</h4>
              </div>        
              <input id="promo-code-input" class="form-input-2" name="promocode" placeholder="Your promocode" type="text"> 
              <div id="not-include" style="color: black;">Note : Once applied can not be revert back</div>
              <div class="fnt-15 form-input-ctn dft-gry alg-c mg-btm-15 modal-footer"> 
                <a id="closePromo" class="lightbox-btn-pwd dismisss-btn" data-dismiss="modal" href="javascript:void(0);" style="text-decoration: none;"> Dismiss </a> 
                <a id="submitPromo" class="checkPromo lightbox-btn-pwd" href="javascript:void(0);" style="background-color: #f16622;text-decoration: none; color: white;" > Apply </a> 
              </div>     
              
              <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Dismiss</button>
                <button type="submit" class="btn btn-default" onclick="checkPromo()">Submit</button>
              </div> -->
            </div>
            
          </div>
      </div>

      <div class="modal fade" id="walletAmt" role="dialog">
          <div class="modal-dialog">
          
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Wallet</h4>
              </div>        <div class="form-input-ctn"><br>
              <span class="form-input-2">You have 
              <span id="wallet-input"></span> in your wallet account. You want to use it? </span> </div>
              <div class="fnt-15 form-input-ctn dft-gry alg-c mg-btm-15 modal-footer"> 
                <a id="" class="lightbox-btn-pwd dismisss-btn" data-dismiss="modal" style="text-decoration: none;" href="javascript:void(0);"> Dismiss </a> 
                <a id="" class="lightbox-btn-pwd useWallet" href="javascript:void(0);" style="background-color: #f16622;text-decoration: none; color: white;"> Submit </a> 
              </div>     
              <!-- <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Dismiss</button>
                <button type="submit" class="btn btn-default" onclick="checkPromo()">Submit</button>
              </div> -->
            </div>
            
          </div>
      </div>

    </div>
    <input type="hidden" name="waypoints[]" id="waylatlng" value="">
    <div class="place-order-button-ctn"> <a id="advanced-order-btn" class="btn-1-2" href="javascript:void(0);" onclick="backOrder()"> Back </a> <a id="immediate-order-btn" class="btn-1-2" href="javascript:void(0);" onclick="placeOrder()"> Place Order </a> </div>
  </div>
  <div id="on-going-orders-section"></div>
</div>
<!-- second page -->

<!-- map panel -->
<div id="map-ctn"> 
  <!-- google map area -->
  <!-- <div class="maparea"> -->
   <div id="map"></div>
  <!-- <img src="<?php echo base_url('assets/images/map.jpg'); ?>" class="img-responsive" style="width:100%; height:auto;"> -->
   <!-- </div> -->
  
  <!-- click box 1-->
  <div id="service-type-info-overlay" class="overlay-menu">
    <div class="back-btn-ctn mg-btm-15"> <a id="service-type-back-btn" class="overlay-back-btn dft-gry flt-r" href="javascript:void(0);"> Hide </a> </div>
    <div id="service-type-info-ctn" class="ovf-y-hd">
      <div class="service-type-info-text">
        <iframe class="web-content" src="https://www.lalamove.com/hk-chi/easyvan-business-price?inapp=1" sandbox="allow-scripts allow-same-origin" scrolling="yes" seamless frameborder="0"></iframe>
      </div>
    </div>
  </div>
 

 <div class="overlay-menu" id="importAddress">
    <div class="back-btn-ctn mg-btm-15">
        <span class="asd-title ads-text">Import Address</span>
        <button type="button" class="close close-importAddresses" aria-label="Close">
            <span class="glyphicon glyphicon-remove"></span>
        </button>        
    </div>
    <div id="additional-service-item-ctn">
        <br>
            <textarea name="cities" id="cities" placeholder="Please copy and paste your route addresses. One address per line" class="comment-textarea-input bdr-top bdr-btm"></textarea>
            
            <div class="alg-c" id="add-address-btn-ctn"> <a href="javascript:void(0);" class="submit-txtarea" id="add-address-btn"> Create Route </a> </div>
        <div class="additional-service-item-tips-text bdr-btm">  </div>
</div>
</div> 

<div class="overlay-menu" id="additionalServices">
    <div class="back-btn-ctn mg-btm-15">
        <span class="asd-title ads-text">Additional Services</span>
        <button type="button" class="close close-additionalService" aria-label="Close">
            <span class="glyphicon glyphicon-remove"></span>
        </button>        
    </div>
    <div id="additional-service-item-ctn">
        <br>
        <?php $additional_Services = $this->order_model->getAdditionalServices(); 
        foreach ($additional_Services as $key => $value) { ?>
        <div class="additional-service-item bdr-btm show">            
                <span class="additional-service-item-checkbx cursor-ptr"> 
                <input class="add-cls"  type="checkbox" name="additionalServices[]" id="<?php echo $value['SERVICES_ID']; ?>" value="<?php echo $value['SERVICES_TITLE'].'_'.$value['PRICE'].'_'.$value['SERVICES_ID']; ?>">
                  <label for="<?php echo $value['SERVICES_ID']; ?>"><?php echo $value['SERVICES_TITLE']; ?>
                  </label> 
                    <label for="<?php echo $value['SERVICES_ID']; ?>" class="asit-price" style="float: right;">+$
                      <label class="price_addservic" data-servicePrice="<?php echo $value['PRICE']; ?>" ><?php echo $value['PRICE']; ?></label>
                    </label>                    
                </span> 
                <span class="additional-service-tips-ctn">  </span> 
        </div>          
        
        <?php } ?>
        <div id="add-address-btn-ctn" class="alg-c"> <a onclick="saveServices()" id="add-address-btn" href="javascript:void(0);"> Submit </a> </div>
        <div class="additional-service-item-tips-text bdr-btm">  </div>
</div>
</div>

<div class="delivery_info_div">

</div>

<!-- <div class="overlay-menu" id="addDeliveryInfoOrigin">
  <div class="overlay-title-ctn">
    <div class="back-btn-ctn mg-btm-15">
        <span class="asd-title ads-text">DELIVERY INFO</span>
        <button type="button" class="close close-deliverOrigin" aria-label="Close">
            <span class="glyphicon glyphicon-remove"></span>
        </button>        
    </div>
    <div class="location-recipient-input-wrapper wht-bg"> 
      <i id="records-icon" class="icon-profile fnt-16" style="color: #58595B; padding-left: 10px; padding-right: 10px; position: absolute; top: 10px; z-index: 10; left: 0px;"></i> 
        <input id="location-1-recipient-name" class="order-recipient-name-input originName recipient-overlay-input" placeholder="Name" type="text">
    </div>
    <div class="location-recipient-input-wrapper wht-bg">
     
       <input id="location-1-recipient-number" class="order-recipient-phone-input originPhone recipient-overlay-input" placeholder="Phone Number" type="text"> 
    </div>
    <div class="location-recipient-input-wrapper wht-bg">
      <div class="location-recipient-subtitle">Building / Block</div> 
        <input id="location-1-recipient-block" class="order-recipient-block-input originBldng recipient-overlay-input recipient-overlay-address-input" placeholder="Enter here.." type="text"> 
    </div>
    <div class="location-recipient-input-wrapper wht-bg" style="margin-bottom: 50px;">  
      <div class="location-recipient-input-wrapper-1-2"> 
        <div class="location-recipient-subtitle">Floor</div> 
          <input id="location-1-recipient-floor" class="order-recipient-floor-input originFloor recipient-overlay-input recipient-overlay-address-input" placeholder="Enter here.." type="text"> 
      </div>  
      <div class="location-recipient-input-wrapper-1-2">
       <div class="location-recipient-subtitle">Room</div>
        <input id="location-1-recipient-room" class="order-recipient-room-input originRoom recipient-overlay-input recipient-overlay-address-input" placeholder="Enter here.." type="text">
      </div> 
    </div>
  </div>
</div> -->
 


<!-- light box my driver -->
<div id="model-id" class="modal fade ogBox" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="width:auto;height:auto;overflow: auto;position:relative; background:#f6f6f3">
        <button type="button" class="close closeCross" data-dismiss="modal" aria-hidden="true">×</button>
        <div id="my-fleet-box" class="topPad">
          <div class="title dft-gry bld mg-lr-20 mg-btm-15">Manage My Drivers</div>
          <div class="desc dft-gry mg-lr-20 mg-btm-15">Satisfied by your drivers? Add or ban drivers from your list.</div>
          <div id="add-driver-btn-ctn" class="alg-c"> <a id="add-driver-btn" href="javascript:void(0);"> Add Driver </a> </div>
          <div id="driver-license-ctn" class="alg-c"> <span class="mg-btm-10"> Enter the driver license number. </span>
            <form id="my-fleet-form" action="javascript:void(0);">
              <span class="my-fleet-input-ctn">
              <input id="add-driver-license" class="bdr-left bdr-top bdr-btm mg-btm-30 validate[required]" placeholder="Driver's License Number" type="text">
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
                <p>Favoright content start here </p>
              </div>
              <div class="tab-pane" id="tab2">
                <p>Banned Content Start here </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- my wallet -->
<div id="model-id2" class="modal fade ogBox mybulletPanel" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div style="width:auto;height:auto;overflow: auto;position:relative; background:#f6f6f3;">
        <button type="button" class="close closeCross" data-dismiss="modal" aria-hidden="true">×</button>
        <div id="wallet-box" class="topPad">
          <div class="title dft-gry bld mg-btm-15 alg-c">My Wallet</div>
          <div class="desc dft-gry mg-btm-15">CURRENT BALANCE</div>
          <div id="credits-ctn" class="desc dft-gry mg-btm-30" style="visibility: visible;"> <span id="prepaid-dollars" class="bld">$0</span> Cash Rewards&nbsp;<span id="free-credits">$0</span>&nbsp;pts </div>
          <div class="desc">
            <div id="wallet-recharge-btn" class="full tab-1-2 cursor-ptr active">Recharge</div>
          </div>
          <div id="wallet-transaction">
            <ul id="wallet-transaction-list">
            </ul>
          </div>
          <div id="wallet-recharge" class="open">
            <div class="desc mg-btm-30"> Payment in app will be soon available. In the meantime, we invite you to get in touch with our customer service team in order to recharge your account. </div>
            <form id="wallet-enquiry-form" action="javascript:void(0);">
              <input id="recharge-subject" class="recharge-input mg-btm-2 validate[required]" placeholder="Subject" type="text">
              <textarea id="recharge-enquiry" class="recharge-input validate[required]" placeholder="Your Enquiry"></textarea>
              <div class="recharge-btn-ctn mg-btm-15">
                <input id="recharge-send-btn" class="dft-gry flt-r cursor-ptr" value="Send" type="submit">
              </div>
            </form>
            <div class="contact"> Customer Service <br>
              3701 3701 </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
