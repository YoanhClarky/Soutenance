<!DOCTYPE html>
<html>
<head>
    <title>Map with User Location</title>
    <style>
        #map {
            height: 400px;
            width: 800px;
        }
    </style>
</head>
<body>
<div class="content">
    <form action="/store" method="post">
        @csrf
        <div class="mapform">
            <div class="row">
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="lat" name="lat" id="lat">
                </div>
                <div class="col-5">
                    <input type="text" class="form-control" placeholder="lng" name="lng" id="lng">
                </div>
            </div>

            <div id="map" class="my-3"></div>
            <button type="button" class="btn btn-secondary" onclick="getUserLocation()">Recentrer sur ma position</button>

            <script>
                let map;
                let marker;

                function initMap() {
                    map = new google.maps.Map(document.getElementById("map"), {
                        zoom: 8,
                        scrollwheel: true,
                    });

                    marker = new google.maps.Marker({
                        map: map,
                        draggable: true
                    });

                    getUserLocation();

                    google.maps.event.addListener(marker, 'position_changed',
                        function () {
                            let lat = marker.position.lat();
                            let lng = marker.position.lng();
                            document.getElementById('lat').value = lat;
                            document.getElementById('lng').value = lng;
                        });

                    google.maps.event.addListener(map, 'click',
                        function (event) {
                            pos = event.latLng;
                            marker.setPosition(pos);
                        });
                }

                function getUserLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function (position) {
                            const userLatLng = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude
                            };

                            map.setCenter(userLatLng);
                            marker.setPosition(userLatLng);
                        });
                    }
                }
            </script>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"
                    type="text/javascript"></script>
        </div>

        <input type="submit" class="btn btn-primary">
    </form>
</div>
</body>
</html>
