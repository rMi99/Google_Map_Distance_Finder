
<!DOCTYPE html>
<html>
<head>
    <title>Location and Distance Display</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuUT2d-fhhfhfhvhvddik-qClVL_8njV7s&libraries=geometry"></script>
   
   <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>

    <h1>Location and Distance Display</h1>

    <label for="lat1">Latitude 1:</label>
    <input type="text" id="lat1" placeholder="Enter Latitude 1">

    <label for="lng1">Longitude 1:</label>
    <input type="text" id="lng1" placeholder="Enter Longitude 1">

    <label for="lat2">Latitude 2:</label>
    <input type="text" id="lat2" placeholder="Enter Latitude 2">

    <label for="lng2">Longitude 2:</label>
    <input type="text" id="lng2" placeholder="Enter Longitude 2">

    <button onclick="showDistance()">Show Distance</button>

    <div id="map"></div>
    <div id="distance"></div>

    <script>
        function showDistance() {
            var lat1 = parseFloat(document.getElementById('lat1').value);
            var lng1 = parseFloat(document.getElementById('lng1').value);
            var lat2 = parseFloat(document.getElementById('lat2').value);
            var lng2 = parseFloat(document.getElementById('lng2').value);

            var location1 = new google.maps.LatLng(lat1, lng1);
            var location2 = new google.maps.LatLng(lat2, lng2);

            var map = new google.maps.Map(document.getElementById('map'), {
                center: location1,
                zoom: 10
            });

            var marker1 = new google.maps.Marker({
                position: location1,
                map: map,
                title: 'Location 1'
            });

            var marker2 = new google.maps.Marker({
                position: location2,
                map: map,
                title: 'Location 2'
            });

            var distance = google.maps.geometry.spherical.computeDistanceBetween(
                location1,
                location2
            );

            document.getElementById('distance').innerHTML = 'Distance between locations: ' + (distance / 1000).toFixed(2) + ' km';
        }
    </script>
</body>
</html>

