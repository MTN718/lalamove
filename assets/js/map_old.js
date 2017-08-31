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
      var finalduration;
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
      var test = 1;
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
            var data = {};            
            startLat = place.geometry.location.lat();
            startLng = place.geometry.location.lng();
            var name = place.formatted_address;
            data.type = "START";
            data.temp = "start";
            data.name = name;
            data.lat = startLat;
            data.lng = startLng;
            // data.contact = $("#addDeliveryInfoOrigin : input"); 

            waypointsLatLng.push(data);
          } else if(mode === 'WAYP') {
            test++;
            var data = {};
            me.wayPlaceId = place.place_id;            
            var stop = "STOP";
            var temp = test;
            var lat = place.geometry.location.lat();
            var lng = place.geometry.location.lng();
            var name = place.formatted_address;
            data.type = stop;
            data.name = name;
            data.lat = lat;
            data.lng = lng;
            data.temp = 'stop_'+temp;
            var name1 = data.temp;            
            $('.remove_field_'+temp).attr("data-info", name1);            
            waypointsLatLng.push(data);
          }else {
            var data = {};
            me.destinationPlaceId = place.place_id;  
            endLat = place.geometry.location.lat();
            endLng = place.geometry.location.lng();          
            var name = place.formatted_address;
            data.type = "END";
            data.temp = "end";
            data.name = name;
            data.lat = endLat;
            data.lng = endLng;
            waypointsLatLng.push(data);
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
            var duration= 0;
            //console.log(route);
            for (var i = 0; i < route.legs.length; i++) {                
                  totdistance = parseFloat(totdistance) + parseFloat(route.legs[i].distance.text);
                  duration = parseInt(duration) + parseInt(route.legs[i].duration.text);
            }
            finalduration = duration;
            finaldistance = totdistance.toFixed(2);
            var baseFare = $('.bike').data('basefare');
            var rentKm = $('.bike').data('rentkm');
            final_rate = finaldistance*rentKm + parseInt(baseFare);
            final_rate = Math.round(final_rate);
            $('.total_rate').html('$'+ final_rate);
            $('.additional-service-input').removeClass('pointer_event');
            $('.opa_add').removeClass('opacity_additional');
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      };

       AutocompleteDirectionsHandler.prototype.showLocations = function(locations) {       
        var me = this;
        var waypts = [];
        var geocoder = new google.maps.Geocoder();

        for (var i = 0; i < locations.length; i++) {
            if(i==0){
              startPoint = locations[i];
              geocoder.geocode({'address': startPoint}, function(results, status) {
                if (status === 'OK') {
                  var data = {};
                  startLat = results[0].geometry.location.lat();
                  startLng = results[0].geometry.location.lng();
                  var name = results[0].formatted_address;
                  $('.origin_input').val(name);
                  data.type = "START";
                  data.temp = "start";
                  data.name = name;
                  data.lat = startLat;
                  data.lng = startLng;
                  waypointsLatLng.push(data);
                } else {
                  alert('Geocode was not successful for the following reason: ' + status);
                }
              });
            }else if((i+1) == locations.length){
              endPoint = locations[i];
              geocoder.geocode({'address': endPoint}, function(results, status) {
                  if (status === 'OK') {
                    var data = {};
                    endLat = results[0].geometry.location.lat();
                    endLng = results[0].geometry.location.lng();          
                    var name = results[0].formatted_address;
                    $('.destination_input').val(name);
                    data.type = "END";
                    data.temp = "end";
                    data.name = name;
                    data.lat = endLat;
                    data.lng = endLng;
                    waypointsLatLng.push(data);            
                  } else {
                    alert('Geocode was not successful for the following reason: ' + status);
                  }
                });
            }else{
              var stop = locations[i];
              waypts.push({location: stop,stopover: true});
              geocoder.geocode({'address': stop}, function(results, status) {
                if (status === 'OK') {
                  test++;
                  var data = {};
                  var stop = "STOP";
                  var temp = test;
                  var lat = results[0].geometry.location.lat();
                  var lng = results[0].geometry.location.lng();
                  var name = results[0].formatted_address;
                  data.type = stop;
                  data.name = name;
                  data.lat = lat;
                  data.lng = lng;
                  data.temp = 'stop_'+temp;
                  var name = data.temp;            
                  waypointsLatLng.push(data);
                  $('.remove_field_'+temp).attr("data-info", name);
                  } else {
                  alert('Geocode was not successful for the following reason: ' + status);
                }
              });
            }
        }
        
        this.directionsService.route({
          origin: startPoint,
          waypoints: waypts,
          destination: endPoint,
          travelMode: 'DRIVING'
        }, function(response, status) {
          if (status === 'OK') {
            me.directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var totdistance=0.0;
            var duration= 0;
            //console.log(route);
            for (var i = 0; i < route.legs.length; i++) {                
                  totdistance = parseFloat(totdistance) + parseFloat(route.legs[i].distance.text);
                  duration = parseInt(duration) + parseInt(route.legs[i].duration.text);
            }
            finalduration = duration;
            finaldistance = totdistance.toFixed(2);
            var baseFare = $('.bike').data('basefare');
            var rentKm = $('.bike').data('rentkm');
            final_rate = finaldistance*rentKm + parseInt(baseFare);
            final_rate = Math.round(final_rate);
            $('.total_rate').html('$'+ final_rate);
            $('.additional-service-input').removeClass('pointer_event');
            $('.opa_add').removeClass('opacity_additional');
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });

      }

  /*  var x = 1; //initlal text box count
  function addStop(){
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
          
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><li id="location-list-2" class="location-list" data-item-sortable-id="0" role="option" aria-grabbed="false">          <div class="place-order-input-wrapper wht-bg"> <a class="from-to-location-icon waypoint waypoint-'+x+'" href="javascript:void(0);" draggable="true"> <span class="location-drag-icon"></span> <span class="location-drag-tips">Drag To Reorder</span> </a> <span class="location-input-wrapper bdr-btm">                      <input id="location-1" class="waypoints-input controls location-input ellipsis waypoints_input" type="text" placeholder="Select Stop">            <span class="input-right-icon recipient-info-icon"></span> </span> <span id="location-1-predict" class="predict-ctn" style="display: none;"></span> </div>          <div id="location-1-recipient" class="location-recipient-wrapper bdr-all">            <div class="overlay-input-wrapper">              <div class="overlay-title-ctn"> <span class="dft-gry flt-l"> Recipient Info </span> </div>              <div class="location-recipient-input-wrapper bdr-all wht-bg">                <input id="location-1-recipient-name" tabindex="1" class="order-recipient-name-input recipient-overlay-input" placeholder="Recipient Name" type="text">              </div>              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">                <input id="location-1-recipient-number" tabindex="1" class="order-recipient-phone-input recipient-overlay-input" placeholder="Recipient Phone Number" type="text">              </div>              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">                <input id="location-1-recipient-block" tabindex="1" class="order-recipient-block-input recipient-overlay-input recipient-overlay-address-input" placeholder="Block" type="text">              </div>              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">                <div class="location-recipient-input-wrapper-1-2 bdr-right">                  <input id="location-1-recipient-floor" tabindex="1" class="order-recipient-floor-input recipient-overlay-input recipient-overlay-address-input" placeholder="Floor" type="text">                </div>                <div class="location-recipient-input-wrapper-1-2">                  <input id="location-1-recipient-room" tabindex="1" class="order-recipient-room-input recipient-overlay-input recipient-overlay-address-input" placeholder="Room" type="text">                </div>              </div>            </div>          </div>        </li></div> '); //add input box
            addEventOnDynamicField();
        }
    }*/
var y = 1;
  $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
      y++;
        $(this).attr('d')
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><li id="location-list-2" class="location-list" data-item-sortable-id="0" role="option" aria-grabbed="false">          <div class="place-order-input-wrapper wht-bg"> <a  class="from-to-location-icon waypoint waypoint-'+x+'" href="javascript:void(0);" draggable="true"> <span class="location-drag-icon"></span> <span class="location-drag-tips">Drag To Reorder</span> </a> <span class="location-input-wrapper bdr-btm">                      <input data-info="10" id="location-1" class="waypoints-input controls location-input ellipsis waypoints_input remove_field_'+y+'" type="text" placeholder="Select Stop"><span class="input-right-text  add_delivery_info" id="input-right-text-origin" data-panel="stop_'+y+'">+ Add Delivery Info</span>            <span class="input-right-icon recipient-info-icon"></span> </span> <span id="location-1-predict" class="predict-ctn" style="display: none;"></span> </div>          <div id="location-1-recipient" class="location-recipient-wrapper bdr-all">            <div class="overlay-input-wrapper">              <div class="overlay-title-ctn"> <span class="dft-gry flt-l"> Recipient Info </span> </div>              <div class="location-recipient-input-wrapper bdr-all wht-bg">                <input id="location-1-recipient-name" tabindex="1" class="order-recipient-name-input recipient-overlay-input" placeholder="Recipient Name" type="text">              </div>              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">                <input id="location-1-recipient-number" tabindex="1" class="order-recipient-phone-input recipient-overlay-input" placeholder="Recipient Phone Number" type="text">              </div>              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">                <input id="location-1-recipient-block" tabindex="1" class="order-recipient-block-input recipient-overlay-input recipient-overlay-address-input" placeholder="Block" type="text">              </div>              <div class="location-recipient-input-wrapper bdr-left bdr-right bdr-btm wht-bg">                <div class="location-recipient-input-wrapper-1-2 bdr-right">                  <input id="location-1-recipient-floor" tabindex="1" class="order-recipient-floor-input recipient-overlay-input recipient-overlay-address-input" placeholder="Floor" type="text">                </div>                <div class="location-recipient-input-wrapper-1-2">                  <input id="location-1-recipient-room" tabindex="1" class="order-recipient-room-input recipient-overlay-input recipient-overlay-address-input" placeholder="Room" type="text">                </div>              </div>            </div>          </div>        </li></div> '); //add input box
            addEventOnDynamicField();
        }
    });


   
    $('.remove-last').click(function(e){
        e.preventDefault();
        var temp = $('.remove_field_'+y).data('info');
        $('.input_fields_wrap').children().last().remove();x--;
       
        for (var i = 0; i < waypointsLatLng.length; i++) {
          if(waypointsLatLng[i]['temp'] == temp){
            waypointsLatLng.splice([i],1);            
          }
        }
        // waypointsLatLng=[];
        directionsService.route();
    });

    $('.clear-all-directions').click(function(e){
      waypointsLatLng=[];
      $('.add_ser').html('Additional Services');
        $('.additional-service-input').addClass('pointer_event');
        $('.opa_add').addClass('opacity_additional');
        $('#location-1').val('');
        $('.waypoints-input').val('');
        $('#location-2').val('');         
        initMap();
    });

      $('.submit-txtarea').click(function(){
            var lines = $('#cities').val().split(/\n/);
            var locations = [];
            if(lines.length<2){
              alert('Please enter two or more addresses');
              return;              
            }
            for (var i=0; i < lines.length; i++) {
              // only push this line if it contains a non whitespace character.
              if (/\S/.test(lines[i])) {
                locations.push($.trim(lines[i]));
                
              }
            }
            setLocations(locations);
            locations=[];
            $('#importAddress').removeClass('open');
            // alert($('textarea#cities').val());
      });

      function setLocations(locations){
        //alert(locations[0]);
        directionsService.showLocations(locations);
      }

            
 
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
      var vehicleType = $('ul.tabs').find('a.active').data('vehicletype');
      
       var additionalServices = [];
        $('.add-cls:checked').each(function(i){
          arr = $(this).val().split('_');
          additionalServices.push(arr[2]);
        });

      var order_price = Math.round(final_rate);
      if(order_by == "DRIVER"){
        alert('Driver cannot place order! Please log in as Customer or Corporate');
        return false;
      }

console.log(waypointsLatLng);
      $(waypointsLatLng).each(function(index,value){

        var contact = {};
        contact.contact_name = $("#contact_name_"+value.temp).val();
        contact.contact_phone = $("#contact_phone_"+value.temp).val();
        contact.contact_block = $("#contact_block_"+value.temp).val();
        contact.contact_floor = $("#contact_floor_"+value.temp).val();
        contact.contact_room = $("#contact_room_"+value.temp).val();
        
        value.contact = contact;
      });



   /*   contact = $("#addDeliveryInfoOrigin input"); 
      data.contact = contact;*/
       var path = base_url+'/lalamove/order/placeOrder';
    
                $.ajax({
                    url:path,
                    type:'POST',
                    data: {Description: Description, order_price: order_price, party_id: party_id, order_by: order_by, waypointsLatLng: waypointsLatLng,
                    vehicleType: vehicleType,itemType: itemType, orderMobile: orderMobile, orderName: orderName, deliveryDate: deliveryDate,
                    finalduration: finalduration, finaldistance: finaldistance,additionalServices: additionalServices
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

 /***********Check PROMO CODE************/
  $('.checkPromo').click(function(){
    var party_id    = document.getElementById('party_id').value;
    var promo_code    = document.getElementById('promo-code-input').value;
    
    var path = base_url+'/lalamove/order/checkPromo';
        
        $.ajax({
            url: path,
            type:'POST',
            data: {party_id: party_id, promo_code: promo_code},
            dataType: 'JSON',
            success: function(data){     
             if(data.status == 'success'){ 
              $('#promoCode').modal('hide');              
              $('.discount_div').removeClass('total_rate');
              $('.disc_d').removeClass('hide');
              $('.discount_div').addClass('orignal_rate');              
              var orignal_rate = final_rate;
              $('.orignal_rate').html('$'+ orignal_rate);
              $('.discount').html('$'+ data['price']);
              final_rate = parseInt(final_rate) - parseInt(data['price']);
              $('.total_rate').html('$'+ final_rate);
              alert(data['message']);
             }else{
                $('#promoCode').modal('hide');
                alert(data['error']);                
             }
            } // End of success function of ajax form
        }); // End of ajax call
    });
  
$('.bike').addClass("active"); 
      $('.bike').click(function(){
        $('.van').removeClass("active");
        $('.truck').removeClass("active");
        $('.bike').addClass("active"); 
        $('.item_type_hide').show();
        var baseFare = $('.bike').data('basefare');
        var rentKm = $('.bike').data('rentkm');
        $('#item_type_val').val(1);
        final_rate = finaldistance*rentKm + parseInt(baseFare);
        $('.total_rate').html('$'+ Math.round(final_rate));
    });
    $('.van').click(function(){
        $('.item_type_hide').hide();
        $('.bike').removeClass("active");
        $('.truck').removeClass("active");
        $('.van').addClass("active");
        var baseFare = $('.van').data('basefare');
        var rentKm = $('.van').data('rentkm');
        $('#parcel-vechicle-type-detail-select').removeClass("active");
        $('#food-vechicle-type-detail-select').removeClass("active");
        $('#document-vechicle-type-detail-select').addClass("active");
        $('#item_type_val').val('');
        final_rate = finaldistance*rentKm + parseInt(baseFare);
        $('.total_rate').html('$'+ Math.round(final_rate));
    });
    $('.truck').click(function(){
        $('.van').removeClass("active");
        $('.bike').removeClass("active");
        $('.truck').addClass("active");
        $('.item_type_hide').hide();
        var baseFare = $('.truck').data('basefare');
        var rentKm = $('.truck').data('rentkm');
        $('#item_type_val').val('');
        final_rate = finaldistance*rentKm + parseInt(baseFare);
        $('.total_rate').html('$'+ Math.round(final_rate));
    });

           $(".add-cls").click(function(){
            var favorite = [];
            var isChecked = $(this).is(":checked");
            var arr = $(this).val().split('_');
            if(isChecked){
              final_rate = parseInt(final_rate) + parseInt(arr[1]);
            }else{
              final_rate = parseInt(final_rate) - parseInt(arr[1]);
            }
            
            $('.total_rate').html('$'+ Math.round(final_rate));
            $.each($("input[name='additionalServices[]']:checked"), function(){            
                var name = $(this).val();
                var arr = name.split('_');                
                favorite.push(arr[0]);
                var addPrice = $('.price_addservic').data('servicePrice');
                $('.add_ser').html(favorite.join(", "));
            });
            if(favorite == ''){
              $('.add_ser').html('Additional Services');
            }                        
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

    $('.origin_input').click(function(){
        $('.input-right-text').removeClass('hide');
    });
    $('.additional-service-input').click(function(){
        $('#additionalServices').addClass('open');
    });
    $('.close-additionalService').click(function(){
        $('#additionalServices').removeClass('open');
    });

    $('.import_address').click(function(){      
        $('#importAddress').addClass('open');
    });

    $('.close-importAddresses').click(function(){
      $('#importAddress').removeClass('open');
    });

   /* $('#input-right-text-origin').click(function(){
      $('#addDeliveryInfoOrigin').addClass('open');
    });*/

    /*$('.close-deliverOrigin').click(function(){*/
    $('body').on('click' , '.close-deliverOrigin' , function(){
      $('#addDelivery_'+$(this).data('close')).remove(); 
       $('.add_delivery_info').each(function(index,value){
              $(this).removeClass('disable-link');
        });
    });

    /*var hasFocus = $('.origin_input').is(':focus');
      if(hasFocus){
          //logic here
      }else{
        $('#input-right-text-origin').addClass('hide');
      }*/


 

      $('body').on('click' , '.add_delivery_info' , function(){

         $('.add_delivery_info').each(function(index,value){
              $(this).addClass('disable-link');
        });

        var panel = $(this).data('panel');
        
        if($('#addDelivery_'+panel).length == 1){
          $('#addDelivery_'+panel).addClass('open');
         
        }else{

        var deliveryZoneHtml = '<div class="overlay-menu open" id="addDelivery_'+panel+'">'+
                                  '<div class="overlay-title-ctn">'+
                                    '<div class="back-btn-ctn mg-btm-15">'+
                                        '<span class="asd-title ads-text">DELIVERY INFO</span>'+
                                        '<button type="button" class="close close-deliverOrigin" aria-label="Close" data-close="'+panel+'">'+
                                            '<span class="glyphicon glyphicon-remove"></span>'+
                                        '</button>'+        
                                    '</div>'+
                                   '<div class="location-recipient-input-wrapper wht-bg">'+ 
                                      '<i id="records-icon" class="icon-profile fnt-16" style="color: #58595B; padding-left: 10px; padding-right: 10px; position: absolute; top: 10px; z-index: 10; left: 0px;"></i> '+
                                        '<input name="contact_name" id="contact_name_'+panel+'" class="order-recipient-name-input originName recipient-overlay-input" placeholder="Name" type="text">'+
                                    '</div>'+
                                    '<div class="location-recipient-input-wrapper wht-bg">'+
                                    
                                      '<input name="contact_phone" id="contact_phone_'+panel+'" class="order-recipient-phone-input originPhone recipient-overlay-input" placeholder="Phone Number" type="text"> '+
                                    '</div>'+
                                    '<div class="location-recipient-input-wrapper wht-bg">'+
                                      '<div class="location-recipient-subtitle">Building / Block</div> '+
                                        '<input name="contact_block" id="contact_block_'+panel+'" class="order-recipient-block-input originBldng recipient-overlay-input recipient-overlay-address-input" placeholder="Enter here.." type="text"> '+
                                    '</div>'+
                                    '<div class="location-recipient-input-wrapper wht-bg" style="margin-bottom: 50px;">  '+
                                      '<div class="location-recipient-input-wrapper-1-2"> '+
                                        '<div class="location-recipient-subtitle">Floor</div> '+
                                          '<input name="contact_floor" id="contact_floor_'+panel+'" class="order-recipient-floor-input originFloor recipient-overlay-input recipient-overlay-address-input" placeholder="Enter here.." type="text"> '+
                                      '</div>  '+
                                      '<div class="location-recipient-input-wrapper-1-2">'+
                                       '<div class="location-recipient-subtitle">Room</div>'+
                                        '<input name="contact_room" id="contact_room_'+panel+'" class="order-recipient-room-input originRoom recipient-overlay-input recipient-overlay-address-input" placeholder="Enter here.." type="text">'+
                                      '</div> '+
                                    '</div>'+
                                    '<div id="add-address-btn-ctn" class="alg-c"> <a id="add-address-btn" href="javascript:void(0);" onClick=closeContactForm("'+panel+'")> Save </a> </div>'+
                                  '</div>'+
                                '</div>';

        $('.delivery_info_div').append(deliveryZoneHtml);
         }
      });
   
function closeContactForm(id){
   $('.add_delivery_info').each(function(index,value){
              $(this).removeClass('disable-link');
        });
$('#addDelivery_'+id).removeClass('open'); 
}
function saveServices(){
  $('#additionalServices').removeClass('open');
}