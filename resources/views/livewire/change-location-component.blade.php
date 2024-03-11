<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Map</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        .c-central {
            background-color: #f7f7f7;
            padding: 20px;
            border-radius: 10px;
        }
        .content_info {
            margin-top: 20px;
        }
        .addLocation {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .addLocation h4 {
            margin-bottom: 20px;
        }
        .addLocation address {
            font-size: 16px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn2 {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }
        .btn2:hover {
            background-color: #0056b3;
        }
        .alert {
            margin-top: 20px;
        }
        #map {
            margin-top: 20px;
            height: 400px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="c-central" style="margin: 20px auto;">
        <div class="text-center">
            <img src="" alt="">
        </div>
        <div class="content_info">
            <div class="paddings-mini">
                <div class="container6">
                    <div class="row6">
                        <form wire:submit.prevent="changeLocation">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                            @endif
                            <div class="col-md-8">
                                <p class="lead"></p>
                                <div id="map"></div>
                            </div>
                            <div class="col-md-4">
                                <aside class="addLocation">
                                <input type="submit" class="btn2 btn-primary pull-right" name="submit" value="Add Location">
                                    <div class="addLocation">
                                        <h4>Search Location</h4>
                                        <div class="form-group">
                                            <label for="locationSearch" class="col-form-label">Location:</label>
                                            <input type="text" class="form-control" id="locationSearch" name="locationSearch">
                                        </div>
                                        <button type="button" class="btn2 btn-primary" id="searchButton" style="display: flex;width: 90px;">Search</button>
                                    </div> 
                                    <div class="addLocation">
                                        <h4>Location Details</h4>
                                            <address>
                                                <div class="form-group">
                                                    <label for="street" class="col-form-label">Street:</label>
                                                    <input type="text" class="form-control" id="street_number" name="streetnumber" wire:model="street">
                                                </div>
                                                <div class="form-group">
                                                    <label for="city" class="col-form-label">City:</label>
                                                    <input type="text" class="form-control" id="city" name="city" wire:model="city">
                                                </div>
                                                <div class="form-group">
                                                    <label for="country" class="col-form-label">Country:</label>
                                                    <input type="text" class="form-control" id="country" name="country" wire:model="country">
                                                </div>
                                                <div class="form-group">
                                                    <label for="longitude" class="col-form-label">Longitude:</label>
                                                    <input type="text" class="form-control" id="longitude" name="longitude" wire:model="longitude">
                                                </div>
                                                <div class="form-group">
                                                    <label for="latitude" class="col-form-label">Latitude:</label>
                                                    <input type="text" class="form-control" id="latitude" name="latitude" wire:model="latitude">
                                                </div>
                                            </address>
                                        </aside>
                                    </div>  
                                </form>                          
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        var map = L.map('map').setView([51.505, -0.09], 13);
        var marker;

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        function updateMapWithUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var lat = position.coords.latitude;
                    var lng = position.coords.longitude;

                    map.setView([lat, lng], 13);
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function addMarkerToMap(e) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker(e.latlng).addTo(map);
            document.getElementById('latitude').value = e.latlng.lat.toFixed(6); 
            document.getElementById('longitude').value = e.latlng.lng.toFixed(6); 
        }

        updateMapWithUserLocation();

        map.on('click', function(e) {
            addMarkerToMap(e);
            getAddressFromCoordinates(e.latlng.lat, e.latlng.lng);
        });

        document.getElementById('searchButton').addEventListener('click', function() {
            var locationSearch = document.getElementById('locationSearch').value;
            searchLocation(locationSearch);
        });

        function searchLocation(locationSearch) {
            fetch('https://nominatim.openstreetmap.org/search?format=json&q=' + locationSearch)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    var lat = parseFloat(data[0].lat);
                    var lon = parseFloat(data[0].lon);
                    map.setView([lat, lon], 13);
                    addMarkerToMap({latlng: {lat: lat, lng: lon}});
                } else {
                    alert('Location not found.');
                }
            })
            .catch(error => console.error('Error:', error));
        }
        function getAddressFromCoordinates(latitude, longitude) {
            fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('street_number').value = data.address.road || '';
                document.getElementById('city').value = data.address.city || '';
                document.getElementById('country').value = data.address.country || '';
            })
            .catch(error => console.error('Error:', error));
        }
        document.addEventListener('livewire:load', function () {
        Livewire.on('locationChanged', function (data) {
            // Update map marker
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker([data.latitude, data.longitude]).addTo(map);

            // Update location details
            document.getElementById('street_number').value = data.street || '';
            document.getElementById('city').value = data.city || '';
            document.getElementById('country').value = data.country || '';
        });
    });
    </script>
</body>
</html>
