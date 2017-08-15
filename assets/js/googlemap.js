// This example requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          mapTypeControl: false,
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });
        // var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;

        new AutocompleteDirectionsHandler(map);
        // new lati(geocoder);
      }

       /**
        * @constructor
       */

      function AutocompleteDirectionsHandler(map) {
        this.map = map;
        this.originPlaceId = null;
        this.destinationPlaceId = null;
        this.travelMode = 'DRIVING';
        var originInput = document.getElementById('origin-input');
        var destinationInput = document.getElementById('destination-input');
        var modeSelector = document.getElementById('mode-selector');        
        this.directionsService = new google.maps.DirectionsService;
        this.directionsDisplay = new google.maps.DirectionsRenderer;
        this.directionsDisplay.setMap(map);


        var originAutocomplete = new google.maps.places.Autocomplete(
            originInput, {placeIdOnly: true});
        var destinationAutocomplete = new google.maps.places.Autocomplete(
            destinationInput, {placeIdOnly: true});

// var placeId = originInput;
        // console.log(directionsDisplay);
      /*geocoder.geocode({'placeId': placeId}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
              console.log(results[0].geometry.location);
              // console.log(results[0].geometry.location.lat);
          }    
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });*/


        // console.log(originAutocomplete.geometry.location.lat);
        // console.log(destinationAutocomplete);
        this.setupClickListener('changemode-walking', 'WALKING');
        this.setupClickListener('changemode-transit', 'TRANSIT');
        this.setupClickListener('changemode-driving', 'DRIVING');

        this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
        this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
        console.log(originAutocomplete);
      }
/*
      function lati(geocoder){

          var placeId = originInput;
        geocoder.geocode({'placeId': placeId}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
              console.log(results);
              console.log(results[0].geometry.location.lat);
          }    
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });
      }*/

      // Sets a listener on a radio button to change the filter type on Places
      // Autocomplete.
      AutocompleteDirectionsHandler.prototype.setupClickListener = function(id, mode) {
        var radioButton = document.getElementById(id);
        var me = this;
        radioButton.addEventListener('click', function() {
          me.travelMode = mode;
          me.route();
        });
      };

      AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
        var me = this;
        autocomplete.bindTo('bounds', this.map);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          if (!place.place_id) {
            window.alert("Please select an option from the dropdown list.");
            return;
          }
          if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
            
          } else {
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

        this.directionsService.route({
          origin: {'placeId': this.originPlaceId},
          destination: {'placeId': this.destinationPlaceId},
          travelMode: this.travelMode
        }, function(response, status) {
          if (status === 'OK') {
            me.directionsDisplay.setDirections(response);
          } else {
            window.alert('Directions request failed due to ' + status);
          }
        });
      };




 
/*  var address = "New Delhi"
$.ajax({
  url:"https://maps.googleapis.com/maps/api/geocode/json?address="+address+"&sensor=false&key=AIzaSyCgf4koP2rKWwdNatZvK1foprSqOdHRlVw",
  type: "POST",
  success:function(res){
     console.log(res.results[0].geometry.location.lat);
     console.log(res.results[0].geometry.location.lng);
  }
});*/