 // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      var current;
      var directionsService;
      var finaldistance;
      var final_rate;
      var startLat;
      var startLng;
      var endLat;
      var endLng;
      var waypointsLatLng = [];
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          // mapTypeControl: false,
          zoom: 13,
          center: {lat: 22.3964, lng: 114.1095},
          zoomControl: false,
          scaleControl: true
        });

        new AutocompleteDirectionsHandler(map);
      }

       /**
        * @constructor
       */
      function AutocompleteDirectionsHandler(map) {
        current = this;
        this.map = map;        
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.wayPlaceId = null;        
        var originInput = document.getElementById('location-1');
        var destinationInput = document.getElementById('location-2');
        // var waypointInput = document.getElementsByClassName('waypoints-input');
        
        
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);

        var originAutocomplete = new google.maps.places.Autocomplete(
            originInput /*, {placeIdOnly: true}*/);

        var destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput /*, {placeIdOnly: true}*/);
        

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

        // this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        // this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);        
        
      }

      function addEventOnDynamicField(){
        var waypointInput = document.getElementsByClassName('waypoints-input');        
        /*var place = autocomplete.getPlace();*/
        for (var i = 0; i < waypointInput.length; i++) {
            var waypointAutocomplete = new google.maps.places.Autocomplete(waypointInput[i] /*, {placeIdOnly: true}*/);
            current.setupPlaceChangedListener(waypointAutocomplete, 'WAYP');
            //current.map.controls[google.maps.ControlPosition.TOP_LEFT].push(waypointInput[i]);
        }
      }

      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
        var me = this;
        directionsService = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          if (!place.place_id) {
            window.alert("Please select an option from the dropdown list.");
            return;
          }
          if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
            startLat = place.geometry.location.lat();
            startLng = place.geometry.location.lng();    
          } else if(mode === 'WAYP') {
            me.wayPlaceId = place.place_id;
            var element = place.geometry.location.lat()+'_'+place.geometry.location.lng()+'__'+place.formatted_address;
            waypointsLatLng.push(element);
          }else {
            me.destinationPlaceId = place.place_id;
            endLat = place.geometry.location.lat();
            endLng = place.geometry.location.lng();
          }
          me.route();
        });

      };

      AutocompleteDirectionsHandler.prototype.route = function() {
        if (!this.originPlaceId || !this.destinationPlaceId) {
          return;
        }
        var me = this;
        var waypts = [];
        var waypointInput = document.getElementsByClassName('waypoints-input');
        var originInputValue = document.getElementById('location-1').value;
        var destinationInputValue = document.getElementById('location-2').value;
        var geocoder = new google.maps.Geocoder();
        
        for (var i = 0; i < waypointInput.length; i++) {
          var stop = waypointInput[i].value;
          if(stop === '' || stop == undefined){

          }else{
             waypts.push({location: stop,stopover: true});
          }
        }
        this.directionsService.route({
          origin: {'placeId': this.originPlaceId},
          waypoints: waypts,
          destination: {'placeId': this.destinationPlaceId},
          optimizeWaypoints: true,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            me.directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var totdistance=0.0;
            // console.log(route);
            for (var i = 0; i < route.legs.length; i++) {                
                  totdistance = parseFloat(totdistance) + parseFloat(route.legs[i].distance.text);
                  // console.log(totdistance);
            }
            finaldistance = totdistance.toFixed(2);
            final_rate = finaldistance*2;
            // console.log(Math.round(finaldistance));
            $('.total_rate').html('$'+ Math.round(final_rate));
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      };

  

  $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click

        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><li id="location-list-2" class="location-list" data-item-sortable-id="0" role="option" aria-grabbed="false">          <div class="place-order-input-wrapper wht-bg"> <a class="from-to-location-icon waypoint waypoint-'+x+'" href="javascript:void(0);" draggable="true"> <span class="location-drag-icon"></span> <span class="location-drag-tips">Drag To Reorder</span> </a> <span class="location-input-wrapper bdr-btm">                      <input id="location-1" class="waypoints-input controls location-input ellipsis waypoints_input" type="text" placeholder="Select Stop">            <span class="input-right-icon recipient-info-icon"></span> </span> <span id="location-1-predict" class="predict-ctn" style="display: none;"></span> </div>          <div id="location-1-recipient" class="location-recipient-wrapper bdr-all">            <div class="overlay-input-wrapper">              <div class="overlay-title-ctn"> <span class="dft-gry flt-l"> Recipient Info </span> </div>              <div class="location-recipient-input-wrapper bdr-all wht-bg">                <input id="location-1-recipient-name" tabindex="1" class="order-recipient-name-input recipient-overlay-input" placeholder="Recipient Name" type="text">              </div>              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">                <input id="location-1-recipient-number" tabindex="1" class="order-recipient-phone-input recipient-overlay-input" placeholder="Recipient Phone Number" type="text">              </div>              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">                <input id="location-1-recipient-block" tabindex="1" class="order-recipient-block-input recipient-overlay-input recipient-overlay-address-input" placeholder="Block" type="text">              </div>              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">                <div class="location-recipient-input-wrapper-1-2 bdr-right">                  <input id="location-1-recipient-floor" tabindex="1" class="order-recipient-floor-input recipient-overlay-input recipient-overlay-address-input" placeholder="Floor" type="text">                </div>                <div class="location-recipient-input-wrapper-1-2">                  <input id="location-1-recipient-room" tabindex="1" class="order-recipient-room-input recipient-overlay-input recipient-overlay-address-input" placeholder="Room" type="text">                </div>              </div>            </div>          </div>        </li></div> '); //add input box
            addEventOnDynamicField();
        }
    });
   
    $('.remove-last').click(function(e){
        e.preventDefault();
        $('.input_fields_wrap').children().last().remove();x--;
        directionsService.route();
    });

    $('.clear-all-directions').click(function(e){
        $('#location-1').val('');
        $('.waypoints-input').val('');
        $('#location-2').val('');         
        initMap();
    });
});

  function deliverNow(){
    var party_id    = document.getElementById('party_id').value;
    var order_by    = document.getElementById('order_by').value;
    var Origin      = document.getElementById('location-1').value;
    var Destination = document.getElementById('location-2').value;
    var Description = document.getElementById('comment-input').value;
    /*var Waypoints = document.getElementsByClassName('waypoints-input');
    var waylat = document.getElementById('waylatlng').value;*/

    $('.origin-err').html('');
    $('.destination-err').html('');
    
    if(party_id == '' || party_id == undefined){
      $("#model-signIn").modal('show');
      openLoginModal();
      return false;
    }
    if(Origin == '' || Origin == undefined){
      $('.origin-err').html('<p>Please select origin</p>');
      return false;
    }else if(Destination == '' || Destination == undefined){
      $('.destination-err').html('<p>Please select destination</p>');
      return false;
    }else{
      $('.first_panel').hide();
      $('.second_panel').show();
    }
  }

  function immediateOrder(){
    var party_id    = document.getElementById('party_id').value;
    var order_by    = document.getElementById('order_by').value;
    var Origin      = document.getElementById('location-1').value;
    var Destination = document.getElementById('location-2').value;
    var Description = document.getElementById('comment-input').value;
/*    var Waypoints = document.getElementsByClassName('waypoints-input');
    var waylat = document.getElementById('waylatlng').value;*/
    $('.origin-err').html('');
    $('.destination-err').html('');

    if(party_id == '' || party_id == undefined){
      $("#model-signIn").modal('show');
      openLoginModal();
      return false;
    }


    if(Origin == '' || Origin == undefined){
      $('.origin-err').html('<p>Please select origin</p>');
      return false;
    }else if(Destination == '' || Destination == undefined){
      $('.destination-err').html('<p>Please select destination</p>');
      return false;
    }else{
      $('.first_panel').hide();
      $('.second_panel').show();
    }
  }

  function backOrder(){
      $('.second_panel').hide();
      $('.first_panel').show();
  }

  function placeOrder(){
      var party_id    = document.getElementById('party_id').value;
      var order_by    = document.getElementById('order_by').value;
      var start_name  = document.getElementById('location-1').value;
      var stop_name   = document.getElementById('location-2').value;
      var Description = document.getElementById('comment-input').value;
      var deliveryDate = document.getElementById('immediate-datetime-input').value;
      var orderName = document.getElementById('order-username-input').value;
      var orderMobile = document.getElementById('order-user-phone-input').value;
      var itemType = document.getElementById('item_type_val').value;
      var vehicleType = document.getElementById('vehicle-type').value;
      
      var order_price = Math.round(final_rate);


       var path = base_url+'/lalamove/order/placeOrder';
    
                $.ajax({
                    url:path,
                    type:'POST',
                    data: {start_name: start_name, stop_name: stop_name, startLat: startLat, startLng: startLng, endLat: endLat, endLng: endLng,
                      Description: Description, order_price: order_price, party_id: party_id, order_by: order_by, waypointsLatLng: waypointsLatLng,
                    vehicleType: vehicleType,itemType: itemType, orderMobile: orderMobile, orderName: orderName, deliveryDate: deliveryDate,
                  },
                    dataType:'JSON',
                    success:function(data){
                            
                        if(data.status == 'success'){                            
                            $("#success-order-alert").fadeTo(2000, 500).slideUp(500, function(){
                            $("#success-order-alert").slideUp(500);
                        });
                        }else{
                            $('.fname-err').html(data['first_name']);
                            $('.lname-err').html(data['last_name']);
                            $('.email-err').html(data['email']);
                            $('.mobile-err').html(data['mobile']);
                            $('.pwd-err').html(data['password']);
                            $('.cnf-err').html(data['password_confirm']);
                        }                       
                    }
                });


  }

      $('.bike').click(function(){
        $('.van').removeClass("active");
        $('.truck').removeClass("active");
        $('.bike').addClass("active"); 
        $('.item_type_hide').show();
        $('#vehicle-type').val(1);
        $('#item_type_val').val(1);
        final_rate = finaldistance*2;
        $('.total_rate').html('$'+ Math.round(final_rate));
    });
    $('.van').click(function(){
        $('.item_type_hide').hide();
        $('.bike').removeClass("active");
        $('.truck').removeClass("active");
        $('.van').addClass("active");
        $('#vehicle-type').val(2);
        $('#parcel-vechicle-type-detail-select').removeClass("active");
        $('#food-vechicle-type-detail-select').removeClass("active");
        $('#document-vechicle-type-detail-select').addClass("active");
        $('#item_type_val').val('');
        final_rate = finaldistance*3;
        $('.total_rate').html('$'+ Math.round(final_rate));
    });
    $('.truck').click(function(){
        $('.van').removeClass("active");
        $('.bike').removeClass("active");
        $('.truck').addClass("active");
        $('.item_type_hide').hide();
        $('#vehicle-type').val(3);
        $('#item_type_val').val('');
        final_rate = finaldistance*4;
        $('.total_rate').html('$'+ Math.round(final_rate));
    });

    $('#document-vechicle-type-detail-select').click(function(){
        $('#parcel-vechicle-type-detail-select').removeClass("active");
        $('#food-vechicle-type-detail-select').removeClass("active");
        $('#document-vechicle-type-detail-select').addClass("active");
        $('#item_type_val').val(1);
    });
    $('#parcel-vechicle-type-detail-select').click(function(){
        $('#document-vechicle-type-detail-select').removeClass("active");
        $('#food-vechicle-type-detail-select').removeClass("active");
        $('#parcel-vechicle-type-detail-select').addClass("active");        
        $('#item_type_val').val(2);
    });
    $('#food-vechicle-type-detail-select').click(function(){
        $('#parcel-vechicle-type-detail-select').removeClass("active");
        $('#document-vechicle-type-detail-select').removeClass("active");
        $('#food-vechicle-type-detail-select').addClass("active");        
        $('#item_type_val').val(3);
    });

    var dt = new Date();
    $('#immediate-datetime-input').datetimepicker({
      defaultDate: dt,
      minDate: "-1970/01/01",
      maxDate: "+1970/01/30",
      format: "Y-m-d H:i",
      step: 10,
      minDate: 0,
      minDateTime: dt,
      timepickerScrollbar:false
    });