 // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      var current;
      var directionsService;
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
            originInput, {placeIdOnly: true});

        var destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput, {placeIdOnly: true});
        

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');

        // this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        // this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);        
        
      }

      function addEventOnDynamicField(){
        var waypointInput = document.getElementsByClassName('waypoints-input');        
        /*var place = autocomplete.getPlace();*/
        for (var i = 0; i < waypointInput.length; i++) {
            var waypointAutocomplete = new google.maps.places.Autocomplete(waypointInput[i], {placeIdOnly: true});
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
          } else if(mode === 'WAYP') {
            me.wayPlaceId = place.place_id;
          }else {
            me.destinationPlaceId = place.place_id;
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
        
            // console.log(location.lat() + ',' + location.lng() + ',' +stop);
              geocoder.geocode({'address': stop}, function(results, status) {
                if (status === 'OK') {
                  var location = results[0].geometry.location;
                }
              });
          }
        }

          /*geocoder.geocode({'address': originInputValue}, function(results, status) {
                if (status === 'OK') {
                  var location = results[0].geometry.location;
                  console.log(location.lat() + ',' + location.lng() + ',' +originInputValue);
                } 
              });
          geocoder.geocode({'address': destinationInputValue}, function(results, status) {
                if (status === 'OK') {
                  var location = results[0].geometry.location;
                  console.log(location.lat() + ',' + location.lng() + ',' +destinationInputValue);
                } 
              });*/
        
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
            
            for (var i = 0; i < route.legs.length; i++) {                
                  totdistance = parseFloat(totdistance) + parseFloat(route.legs[i].distance.text);
            }
            var finaldistance = totdistance.toFixed(2);
            console.log(finaldistance);
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
            $(wrapper).append('<div><li id="location-list-2" class="location-list" data-item-sortable-id="0" role="option" aria-grabbed="false">          <div class="place-order-input-wrapper wht-bg"> <a class="from-to-location-icon waypoint waypoint-'+x+'" href="javascript:void(0);" draggable="true"> <span class="location-drag-icon"></span> <span class="location-drag-tips">Drag To Reorder</span> </a> <span class="location-input-wrapper bdr-btm">                      <input id="location-1" class="waypoints-input controls location-input ellipsis" type="text" placeholder="Select Stop">            <span class="input-right-icon recipient-info-icon"></span> </span> <span id="location-1-predict" class="predict-ctn" style="display: none;"></span> </div>          <div id="location-1-recipient" class="location-recipient-wrapper bdr-all">            <div class="overlay-input-wrapper">              <div class="overlay-title-ctn"> <span class="dft-gry flt-l"> Recipient Info </span> </div>              <div class="location-recipient-input-wrapper bdr-all wht-bg">                <input id="location-1-recipient-name" tabindex="1" class="order-recipient-name-input recipient-overlay-input" placeholder="Recipient Name" type="text">              </div>              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">                <input id="location-1-recipient-number" tabindex="1" class="order-recipient-phone-input recipient-overlay-input" placeholder="Recipient Phone Number" type="text">              </div>              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">                <input id="location-1-recipient-block" tabindex="1" class="order-recipient-block-input recipient-overlay-input recipient-overlay-address-input" placeholder="Block" type="text">              </div>              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">                <div class="location-recipient-input-wrapper-1-2 bdr-right">                  <input id="location-1-recipient-floor" tabindex="1" class="order-recipient-floor-input recipient-overlay-input recipient-overlay-address-input" placeholder="Floor" type="text">                </div>                <div class="location-recipient-input-wrapper-1-2">                  <input id="location-1-recipient-room" tabindex="1" class="order-recipient-room-input recipient-overlay-input recipient-overlay-address-input" placeholder="Room" type="text">                </div>              </div>            </div>          </div>        </li></div> '); //add input box
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