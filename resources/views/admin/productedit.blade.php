@include('admin/headlayout')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Products</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>

            <div class="card mb-4">
                @if (Session::has('message'))
                    <div class="alert alert-primary" role="alert">
                        {{ session::get('message') }}
                    </div>
                @endif
                <form action="{{ route('product.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 p-3">
                        <label for="title2" class="col-form-label">Card Title:</label>
                        <input type="text" name="title2" class="form-control" value="{{ $data->title2 }}">

                        <label for="description2" class="col-form-label">Card Text:</label>
                        <input type="text" name="description2" class="form-control"
                            value="{{ $data->description2 }}">

                        <label class="col-form-label" for="image2">Upload an image:</label>
                        <input type="file" id="imageUpload" name="image2" accept="image/*">
                        <img src="{{ asset('storage/' . $data->image2) }}" width='70px' alt="Image">

                        <label for="contact" class="col-form-label">Contact</label>
                        <input type="text" name="contact" class="form-control" id="recipient-contact" value="{{ $data->contact }}">

                        <label for="Packege" class="col-form-label">Packeges</label>
                        <input type="text" name="packege" class="form-control" id="packege" value="{{ $data->packege }}">

                        <label for="location" class="col-form-label">Location</label>
                        <input type="text" name="location" class="form-control" id="location" value="{{ $data->location }}">

                        <label for="location" class="col-form-label">Amenities</label>
                        <input type="text" name="amenity" class="form-control" id="amenity" value="{{ $data->amenity }}">

                        <label class="form-label">Latitude</label>
                        <input class="form-control" type="text" name="latitude" id="latitude"
                            value="{{ $profileData->latitude ?? '' }}" placeholder="Click map to select">

                         <label class="form-label">Longitude</label>
                        <input class="form-control" type="text" name="longitude" id="longitude"
                                value="{{ $profileData->longitude ?? '' }}" placeholder="Click map to select">

                         <!-- Optional: Locate Me button -->
                         <button type="button" class="btn btn-outline-primary mb-3" id="locateMeBtn">
                            📍 Locate Me
                        </button>

                        <!-- Map container -->
                        <div id="map" style="height: 300px; margin-bottom: 20px;"></div>

                        
                    </div>
                    <button type="submit" class="btn btn-primary w-25">Update</button>

                </form>
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        var defaultLat = {{ $profileData->latitude ?? 28.3949 }};
                        var defaultLng = {{ $profileData->longitude ?? 84.124 }};

                        var map = L.map('map').setView([defaultLat, defaultLng], 10);
                        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

                        var marker = L.marker([defaultLat, defaultLng]).addTo(map);

                        map.on('click', function(e) {
                            let lat = e.latlng.lat;
                            let lng = e.latlng.lng;
                            marker.setLatLng([lat, lng]);
                            document.getElementById('latitude').value = lat;
                            document.getElementById('longitude').value = lng;
                        });

                        document.getElementById('locateMeBtn').addEventListener('click', function() {
                            if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(function(position) {
                                    let lat = position.coords.latitude;
                                    let lng = position.coords.longitude;
                                    map.setView([lat, lng], 13);
                                    marker.setLatLng([lat, lng]);
                                    document.getElementById('latitude').value = lat;
                                    document.getElementById('longitude').value = lng;
                                });
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </main>
    @include('admin/footerlayout')
