<div id="container">
  <script>
    function initMap() {
      <?php $center = locate_center($markers); ?>
      var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: <?=$center['lat']?>, lng: <?=$center['lng']?>},
        zoom: 13,
        rotateControl: true
      });

      var infowindow = new google.maps.InfoWindow();
      var service = new google.maps.places.PlacesService(map);

      var icons = [
        'http://maps.google.com/mapfiles/ms/icons/green-dot.png',
        'http://maps.google.com/mapfiles/ms/icons/orange-dot.png',
        'http://maps.google.com/mapfiles/ms/icons/yellow-dot.png',
        'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
        'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
      ]
      <?php foreach ($markers as $location): ?>
        var myLatLng = {lat: <?php echo $location['lat'];?>,lng: <?php echo $location['lng'];?>};
        var card = document.getElementById('pac-card');
        card.style.visibility = 'hidden';
        var marker = new google.maps.Marker({
          map: map,
          position: myLatLng,
          icon: icons[<?=$location['severity'] - 1?>]
        });
        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent('<div><strong> Name :' + "<?php echo $location['name'];?>" + '</strong><br>' + 
            'Severity ' + "<?php echo $location['severity'];?>" + '</div>');
          infowindow.open(map, this);
        });

        var safeZoneCircle;
        google.maps.event.addListener(marker, 'mouseover', function() {
          safeZoneCircle = new google.maps.Circle({
            strokeColor: '#FF0000',
            strokeOpacity: 0.8,
            strokeWeight: 2,
            fillColor: '#FF0000',
            fillOpacity: 0.35,
            map: map,
            center: {lat: <?php echo $location['lat'];?>,lng: <?php echo $location['lng'];?>},
            radius: 500
          });
        });
        google.maps.event.addListener(marker, 'mouseout', function() {
          safeZoneCircle.setMap(null);
        });
      <?php endforeach ?>
      <?php $center = locate_center($markers); ?>
      var marker = new google.maps.Marker({
        map: map,
        position: {lat: <?=$center['lat']?>, lng: <?=$center['lng']?>},
        icon: icons[4]
      });

      var card = document.getElementById('pac-card');
      map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
      var submission = document.getElementById('new_entry_submit').onclick = function(event){
        var severity = document.getElementById('severity');
        var name = document.getElementById('pac-input');
        if (severity.value != null && name.value != ""){
          var card = document.getElementById('pac-card');
          card.style.visibility = 'hidden';
          document.getElementById("new_entry_form").submit();
        }
      }

      google.maps.event.addListener(map, 'click', function(event) {
        var card = document.getElementById('pac-card');
        card.style.visibility = 'visible';

        google.maps.event.addDomListener(window, 'resize', function() {
          var card = document.getElementById('pac-card');
          card.style.visibility = 'visible';
        });

        document.getElementById('lat').value = event.latLng.lat();
        document.getElementById('lng').value = event.latLng.lng();
      });
    }

  </script>
  <form method="post" id="new_entry_form">
    <input name="lat" id="lat" form="new_entry_form" hidden/>
    <input name="lng" id="lng" form="new_entry_form" hidden/>
    
    <div class="pac-card" id="pac-card">
      <div>
        <div id="title">
          New Entry
        </div>
        <div id="type-selector" class="pac-controls">
          <input name="severity" type="range" list="serevities" id="severity" min="1" max="4" form="new_entry_form"/>
          <datalist id="serevities">
            <option value="1" label="1">
            <option value="2" label="2">
            <option value="3" label="3">
            <option value="4" label="4">
          </datalist>
        </div>
      </div>
      <div id="pac-container">
        <label for="pac-input">Name</label>
        <input name="name" id="pac-input" type="text" placeholder="Mother Teressa" form="new_entry_form" required>
        <input type='submit' id="new_entry_submit" value='Create'/>
      </div>
    </div>
  </form>
  <div id="map"></div>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2BqREzlNk3f2NuW0mMnwt5U42c0Upyvw&libraries=places&callback=initMap">
  </script>
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</div>
