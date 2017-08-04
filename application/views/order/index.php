<!-- left one panel -->
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
<div id="menu-ctn" class="bdr-right">
  <input id="searchTextField" address-id="" address="" placeholder="Enter a query" autocomplete="off" type="text">
  <div id="place-order-section" class="open">
    <div class="normal-request-ctn bdr-btm">
      <div class="jcarousel-control-ctn" style="height: 80px;"> <a class="jcarousel-prev" href="#">‹</a> </div>
      <div class="jcarousel vehicle-type-select">
        <ul>
          <li> <a id="motorcycle-btn" class="vehicle-type-select-btn lgt-gry active" href="javascript:void(0);" data-type="LOAD_PARCEL"> <span class="vehicle-type-select-icon"> <img class="off" src="<?php echo base_url('assets/images/map/moto_v2_off.png'); ?>" height="55"> <img class="on" src="<?php echo base_url('assets/images/map/moto_v2.png'); ?>" height="55"> </span> <br>
            Motorcycle </a> </li>
          <li> <a id="van-btn" class="vehicle-type-select-btn lgt-gry " href="javascript:void(0);" data-type="VAN"> <span class="vehicle-type-select-icon"> <img class="off" src="<?php echo base_url('assets/images/map/van_v2_off.png'); ?>" height="55"> <img class="on" src="<?php echo base_url('assets/images/map/van_v2.png'); ?>" height="55"> </span> <br>
            Van </a> </li>
          <li> <a id="5.5-ton-btn" class="vehicle-type-select-btn lgt-gry " href="javascript:void(0);" data-type="TON55"> <span class="vehicle-type-select-icon"> <img class="off" src="<?php echo base_url('assets/images/map/truck_v2_off.png'); ?>" height="55"> <img class="on" src="<?php echo base_url('assets/images/map/truck_v2.png'); ?>" height="55"> </span> <br>
            5.5 Ton </a> </li>
        </ul>
      </div>
      <div class="jcarousel-control-ctn" style="height: 80px;"> <a class="jcarousel-next" href="#">›</a> </div>
    </div>
    <div id="motorcycle-vehicle-type-select" class="vehicle-type-detail-select bdr-btm active">
      <ul>
        <li> <a id="document-vechicle-type-detail-select" class="vehicle-type-detail-select-link lgt-gry active" data-type="DOCUMENT" href="javascript:void(0);"> Document </a> </li>
        <li> <a id="parcel-vechicle-type-detail-select" class="vehicle-type-detail-select-link lgt-gry " data-type="PARCEL" href="javascript:void(0);"> Parcel </a> </li>
        <li> <a id="food-vechicle-type-detail-select" class="vehicle-type-detail-select-link lgt-gry " data-type="FOOD" href="javascript:void(0);"> Food </a> </li>
      </ul>
    </div>
    <div class="place-order-inputs">
      <div class="place-order-input-wrapper alg-r mg-btm-10"> <a id="more-info-link" class="oge-link-btn" href="javascript:void(0);"> More Info </a> </div>
      <ul class="sortable bdr-all" data-sortable-id="0" aria-dropeffect="move">
        <li id="location-list-1" class="location-list" data-item-sortable-id="0" role="option" aria-grabbed="false">
          <div class="place-order-input-wrapper wht-bg"> 
          <a class="from-location-icon from-to-location-icon" href="javascript:void(0);" draggable="true"> <span class="location-drag-icon"></span> <span class="location-drag-tips">Drag To Reorder</span> </a> <span class="location-input-wrapper bdr-btm">
            <!-- <input id="location-1" class="location-input ellipsis" tabindex="1" data-placeid="" data-lat="" data-lng="" data-address="" placeholder="Select Origin" type="text"> -->
            <input id="location-1" class="controls location-input ellipsis" type="text" placeholder="Select Origin">
            <span class="input-right-icon recipient-info-icon"></span> </span> <span id="location-1-predict" class="predict-ctn" style="display: none;"></span> </div>
          <div id="location-1-recipient" class="location-recipient-wrapper bdr-all">
            <div class="overlay-input-wrapper">
              <div class="overlay-title-ctn"> <span class="dft-gry flt-l"> Recipient Info </span> </div>
              <div class="location-recipient-input-wrapper bdr-all wht-bg">
                <input id="location-1-recipient-name" tabindex="1" class="order-recipient-name-input recipient-overlay-input" placeholder="Recipient Name" type="text">
              </div>
              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">
                <input id="location-1-recipient-number" tabindex="1" class="order-recipient-phone-input recipient-overlay-input" placeholder="Recipient Phone Number" type="text">
              </div>
              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">
                <input id="location-1-recipient-block" tabindex="1" class="order-recipient-block-input recipient-overlay-input recipient-overlay-address-input" placeholder="Block" type="text">
              </div>
              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">
                <div class="location-recipient-input-wrapper-1-2 bdr-right">
                  <input id="location-1-recipient-floor" tabindex="1" class="order-recipient-floor-input recipient-overlay-input recipient-overlay-address-input" placeholder="Floor" type="text">
                </div>
                <div class="location-recipient-input-wrapper-1-2">
                  <input id="location-1-recipient-room" tabindex="1" class="order-recipient-room-input recipient-overlay-input recipient-overlay-address-input" placeholder="Room" type="text">
                </div>
              </div>
            </div>
          </div>
        </li>
          <div class="input_fields_wrap">

  </div>
       <!--  <li id="location-list-2" class="location-list" data-item-sortable-id="0" role="option" aria-grabbed="false">
          <div class="place-order-input-wrapper waypoint waypoint-2 wht-bg"> <a class="from-location-icon from-to-location-icon" href="javascript:void(0);" draggable="true"> <span class="location-drag-icon"></span> <span class="location-drag-tips">Drag To Reorder</span> </a> <span class="location-input-wrapper bdr-btm">
          
            <input id="location-1" class="waypoints-input controls location-input ellipsis" type="text" placeholder="Select Stop">
            <span class="input-right-icon recipient-info-icon"></span> </span> <span id="location-1-predict" class="predict-ctn" style="display: none;"></span> </div>
          <div id="location-1-recipient" class="location-recipient-wrapper bdr-all">
            <div class="overlay-input-wrapper">
              <div class="overlay-title-ctn"> <span class="dft-gry flt-l"> Recipient Info </span> </div>
              <div class="location-recipient-input-wrapper bdr-all wht-bg">
                <input id="location-1-recipient-name" tabindex="1" class="order-recipient-name-input recipient-overlay-input" placeholder="Recipient Name" type="text">
              </div>
              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">
                <input id="location-1-recipient-number" tabindex="1" class="order-recipient-phone-input recipient-overlay-input" placeholder="Recipient Phone Number" type="text">
              </div>
              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">
                <input id="location-1-recipient-block" tabindex="1" class="order-recipient-block-input recipient-overlay-input recipient-overlay-address-input" placeholder="Block" type="text">
              </div>
              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">
                <div class="location-recipient-input-wrapper-1-2 bdr-right">
                  <input id="location-1-recipient-floor" tabindex="1" class="order-recipient-floor-input recipient-overlay-input recipient-overlay-address-input" placeholder="Floor" type="text">
                </div>
                <div class="location-recipient-input-wrapper-1-2">
                  <input id="location-1-recipient-room" tabindex="1" class="order-recipient-room-input recipient-overlay-input recipient-overlay-address-input" placeholder="Room" type="text">
                </div>
              </div>
            </div>
          </div>
        </li> -->
        <li id="location-list-3" class="location-list" data-item-sortable-id="0" role="option" aria-grabbed="false">
          <div class="place-order-input-wrapper wht-bg"> <a class="from-to-location-icon to-location-icon" href="javascript:void(0);" draggable="true"> <span class="location-drag-icon"></span> <span class="location-drag-tips">Drag To Reorder</span> </a> <span class="location-input-wrapper">
            <!-- <input id="location-2" class="location-input ellipsis" tabindex="2" data-placeid="" data-lat="" data-lng="" data-address="" placeholder="Select Destination" type="text"> -->
            <input id="location-2" class="controls location-input ellipsis" tabindex="2" type="text" placeholder="Enter a destination location">
            <span class="input-right-icon recipient-info-icon"></span> </span> <span id="location-2-predict" class="predict-ctn" style="display: none;"></span> </div>
          <div id="location-2-recipient" class="location-recipient-wrapper bdr-all">
            <div class="overlay-input-wrapper">
              <div class="overlay-title-ctn"> <span class="dft-gry flt-l"> Recipient Info </span> </div>
              <div class="location-recipient-input-wrapper bdr-all wht-bg">
                <input id="location-2-recipient-name" tabindex="2" class="order-recipient-name-input recipient-overlay-input" placeholder="Recipient Name" type="text">
              </div>
              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">
                <input id="location-2-recipient-number" tabindex="2" class="order-recipient-phone-input recipient-overlay-input" placeholder="Recipient Phone Number" type="text">
              </div>
              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">
                <input id="location-2-recipient-block" tabindex="2" class="order-recipient-block-input recipient-overlay-input recipient-overlay-address-input" placeholder="Block" type="text">
              </div>
              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">
                <div class="location-recipient-input-wrapper-1-2 bdr-right">
                  <input id="location-2-recipient-floor" tabindex="2" class="order-recipient-floor-input recipient-overlay-input recipient-overlay-address-input" placeholder="Floor" type="text">
                </div>
                <div class="location-recipient-input-wrapper-1-2">
                  <input id="location-2-recipient-room" tabindex="2" class="order-recipient-room-input recipient-overlay-input recipient-overlay-address-input" placeholder="Room" type="text">
                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
      <div class="place-order-input-wrapper alg-r mg-top-10 mg-btm-10"> 
        <a id="clear-all-stops-link" class="extra-stops-link oge-link-btn clear-all-directions" href="javascript:void(0);"> Clear All Stops </a> 
        <a id="add-extra-stop-link" class="add_field_button extra-stops-link oge-link-btn" href="javascript:void(0);"> Add Stop </a> 
        <!-- <button id="add-extra-stop-link" class="add_field_button extra-stops-link oge-link-btn"> Add Stop </button> -->
        <a id="remove-extra-stop-link" class="extra-stops-link oge-link-btn remove-last" href="javascript:void(0);"> Remove Last Stop </a> 
      </div>
      <div id="importMultipleAddress" class="place-order-input-wrapper alg-r">
        <div class="place-order-input-wrapper-1-2 flt-l mg-top-2"> <a href="javascript:void(0);" id="optimizeRouteCheckBox"></a> <span class="optimizeRouteBtn">Optimize Route <a id="optimize-route-annoucement" class="oge" href="javascript:void(0);"><img class="va-m" src="http://pro.lalamove.com/assets/img/side-menu/more.png" width="17" height="17"></a> </span> </div>
        <div class="place-order-input-wrapper-1-2 flt-r"> <a id="importAddresses" href="javascript:void(0);"> Import Stops From List <span class="arrow"></span> </a> </div>
        <div class="place-order-input-wrapper hide" id="multiple-address-area">
          <textarea id="multiple-address-input-textarea" class="comment-textarea-input bdr-all hide" placeholder="Copy and paste your route addresses. One address per line (20 addresses max.) "></textarea>
          <div id="multiple-address-input-div" class="bdr-all hide" data-ph="Copy and paste your route addresses. One address per line (20 addresses max.) " contenteditable="true"></div>
          <div id="add-address-btn-ctn" class="alg-c"> <a id="add-address-btn" href="javascript:void(0);"> Create Route </a> </div>
        </div>
      </div>
      <div class="place-order-input-wrapper"> <a id="toll-tunnels-btn" class="additional-service-input bdr-all alg-c lgt-gry" href="javascript:void(0);"> Toll Tunnels <span id="tunnel-edit" class="oge-link-btn flt-r hide"> Edit </span> </a> </div>
      <div class="place-order-input-wrapper mg-btm-15">
        <div id="tunnel-selected-list" class="bdr-left bdr-btm bdr-right"></div>
      </div>
      <div class="place-order-input-wrapper"> <a id="additional-service-btn" class="additional-service-input bdr-all alg-c lgt-gry" > Additional Services <span id="additional-service-edit" class="oge-link-btn flt-r hide"> Edit </span> </a> </div>
      
      <!-- mg 15-->
      <div class="place-order-input-wrapper mg-btm-15"> </div>
      <div class="place-order-input-wrapper mg-btm-15">
        <textarea id="comment-input" class="comment-textarea-input bdr-all" placeholder="Enter a remark or comment for this order"></textarea>
      </div>
      <div class="place-order-input-wrapper mg-btm-15">
        <input id="promo-input" class="promo-code-input bdr-all" placeholder="Promo Code" value="" type="text">
        <div class="flt-r"> <span class="total-text dft-gry">Total</span> <span id="price-total" class="total-number dft-gry bld" data-price="0">$0</span> </div>
      </div>
    </div>
    <div class="place-order-button-ctn"> <a id="advanced-order-btn" class="btn-1-2" href="javascript:void(0);"> Advanced Order </a> <a id="immediate-order-btn" class="btn-1-2" href="javascript:void(0);"> Immediate Order (&lt;20 Min) </a> </div>
  </div>
  <div id="on-going-orders-section"></div>
</div>

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
  
  <!-- click box 2 -->
  <div id="toll-tunnels-overlay" class="overlay-menu">
    <div class="back-btn-ctn mg-btm-15"> <a id="ongoing-order-back-btn" class="overlay-back-btn dft-gry flt-r" href="javascript:void(0);"> Hide </a> </div>
    <div id="tunnel-item-ctn">
      <div class="tunnel-item bdr-btm" data-type="tunnel_any" data-itemid="1" data-name="Any Tunnel"> <span class="tunnel-item-desc cursor-ptr"> <b>Any Tunnel</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_any" data-itemid="1" data-name="Any Tunnel"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_hongham" data-itemid="2" data-name="Cross Harbour"> <span class="tunnel-item-desc cursor-ptr"> <b>Cross Harbour</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_hongham" data-itemid="2" data-name="Cross Harbour"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_eastern" data-itemid="3" data-name="Eastern"> <span class="tunnel-item-desc cursor-ptr"> <b>Eastern</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_eastern" data-itemid="3" data-name="Eastern"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_western" data-itemid="4" data-name="Western"> <span class="tunnel-item-desc cursor-ptr"> <b>Western</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_western" data-itemid="4" data-name="Western"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_tates_cairn" data-itemid="5" data-name="Tate's Cairn"> <span class="tunnel-item-desc cursor-ptr"> <b>Tate's Cairn</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_tates_cairn" data-itemid="5" data-name="Tate's Cairn"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_lion_rock" data-itemid="6" data-name="Lion Rock"> <span class="tunnel-item-desc cursor-ptr"> <b>Lion Rock</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_lion_rock" data-itemid="6" data-name="Lion Rock"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_shing_mun" data-itemid="7" data-name="Shing Mun"> <span class="tunnel-item-desc cursor-ptr"> <b>Shing Mun</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_shing_mun" data-itemid="7" data-name="Shing Mun"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_eagles_nest" data-itemid="8" data-name="Eagles's Nest"> <span class="tunnel-item-desc cursor-ptr"> <b>Eagles's Nest</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_eagles_nest" data-itemid="8" data-name="Eagles's Nest"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_tai_lam" data-itemid="9" data-name="Tai Lam"> <span class="tunnel-item-desc cursor-ptr"> <b>Tai Lam</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_tai_lam" data-itemid="9" data-name="Tai Lam"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_tseung_kuan_o" data-itemid="10" data-name="Tseung Kwan O"> <span class="tunnel-item-desc cursor-ptr"> <b>Tseung Kwan O</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_tseung_kuan_o" data-itemid="10" data-name="Tseung Kwan O"></a> </div>
      <div class="tunnel-item bdr-btm" data-type="tunnel_aberdeen" data-itemid="11" data-name="Aberdeen"> <span class="tunnel-item-desc cursor-ptr"> <b>Aberdeen</b> </span> <a class="tunnel-checkbox" href="javascript:void(0);" data-type="tunnel_aberdeen" data-itemid="11" data-name="Aberdeen"></a> </div>
    </div>
  </div>
  
  <!-- payment order box -->
  <div id="payment-order-overlay" class="overlay-menu" data-showwallet="1">
    <div class="back-btn-ctn mg-btm-15"> <a id="payment-order-back-btn" class="overlay-back-btn dft-gry flt-r" href="javascript:void(0);"> Hide </a> </div>
    <div class="overlay-title-ctn dft-gry"> Payment - <span class="total-desc-hk">Does not include extra fee e.g. toll or parking fee</span> </div>
    <div id="top-up-your-wallet-btn-ctn" class="top-up-your-wallet-ctn-on ellipsis"> <a id="top-up-your-wallet-btn" class="dft-gry bdr-all" href="javascript:void(0);"> <span class="arrow-right"></span>Add Value To Account <span id="wallet-balance-ctn" class="ellipsis">(Balance: <span id="wallet-balance">$0</span>)</span> </a> </div>
    <div class="wallet-detail-ctn bdr-btm"> <span class="wallet-item-1-2 alg-l"> Basic Fare </span> <span id="payment-basic-fee" class="wallet-item-1-2 alg-r">$ 0</span> <span class="wallet-item-1-2 alg-l"> Additional Services </span> <span id="payment-additional-service" class="wallet-item-1-2 alg-r">$ 0</span> <span class="wallet-item-1-2 alg-l"> Discount </span> <span id="payment-discount" class="wallet-item-1-2 alg-r">$ 0</span> <span class="wallet-item-1-2 alg-l"> Surcharge </span> <span id="payment-surcharge" class="wallet-item-1-2 alg-r">$ 0</span> <span id="payment-free-credit-txt" class="wallet-item-1-2 alg-l oge"> Rewards </span> <span id="payment-free-credit" class="wallet-item-1-2 alg-r oge">-$ 0</span> <span class="wallet-item-1-2 alg-l bld"> Total </span> <span id="payment-total" class="wallet-item-1-2 alg-r bld">$ 0</span> </div>
    <div class="overlay-title-ctn dft-gry mg-btm-15"> Pay By </div>
    <div class="payment-btn-ctn bdr-all "> <span class="wallet-item-1-2 alg-c bdr-right"> <a id="cash-btn" class="payment-btn dft-gry active" href="javscript:void(0);"> Cash </a> </span> <span class="wallet-item-1-2 alg-c"> <a id="pre-payment-btn" class="payment-btn dft-gry" href="javscript:void(0);"> My Wallet </a> </span> </div>
    <div id="prepayment-overlay-warning" class="overlay-btn-ctn mg-btm-15 alg-c oge fnt-13"> <span class="warning-logo"></span> <br>
      Not enough prepayment credit on your account, please pay by cash or top-up your account </div>
    <div id="free-credit-overlay-warning" class="overlay-btn-ctn mg-btm-15 alg-c oge fnt-13"> <span class="warning-logo"></span> <br>
      You have enough free credits to cover the cost of this ride </div>
    <div class="overlay-btn-ctn"> <a id="payment-overlay-confirm-btn" class="overlay-submit-btn" href="javascript:void(0);" data-ordertype="" data-prepaymentpossible="" data-paymenttype=""> Confirm </a> </div>
  </div>
  
  <!-- add priority fee red left box on map -->
  <div id="priority-fee-sticker" style="display:none;"> Add Priority Fee </div>
  
  <!-- add priority fee -->
  <div id="priority-fee-ctn" style="display:block">
    <!-- <div class="top oge"> <a id="add-prority-fee-btn" class="oge flt-r" href="javascript:void(0);"> Add Priority Fee <span id="add-prority-fee-arrow" class="right-arrow flt-r" href="javascript:void(0);"></span> </a> </div> -->
    <div class="btm">
      <div class="priority-fee-desc"> Adding tips to an assigning order will increase your chances to get matched with a driver. </div>
      <div class="priority-fee-title lgt-gry mg-top-10"> Select An Order </div>
      <div id="priority-fee-list-selected" class="mg-top-10"> <a id="priority-fee-list-selected-btn" class="oge" href="javascript:void(0);" data-orderno="" data-orderid="" data-cost=""> Order #<span id="priority-fee-orderno"> ...</span> <span id="priority-fee-list-selected-arrow" class="right-arrow flt-r"></span> </a> </div>
      <div id="priority-fee-list"></div>
      <div class="priority-fee-title lgt-gry mg-top-10"> Select An Amount </div>
      <div class="priority-fee-increment-ctn mg-top-10"> <span class="priority-fee-decrease-ctn"> <a id="priority-fee-decrease" class="priority-fee-increase-decrease-btn" href="javascript:void(0);"></a> </span> <span id="priority-fee-total-ctn"> $<span id="priority-fee-total" data-total="">5</span> </span> <span class="priority-fee-increase-ctn"> <a id="priority-fee-increase" class="priority-fee-increase-decrease-btn" href="javascript:void(0);"></a> </span> </div>
      <div class="priority-fee-title lgt-gry mg-top-10"> Total Amount </div>
      <div id="priority-fee-display-ctn" class="mg-top-10"> </div>
      <input id="priority-fee-confirm" class="mg-top-10 alg-c cursor-ptr" value="Confirm" type="submit">
    </div>
  </div>
</div>

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
