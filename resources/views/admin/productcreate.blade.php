@include('admin/headlayout')


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Create</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active">Venue</li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
            <div class="card mb-4">
                @if(session('success'))
    <div style="color: green;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="color: red;">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div style="color: red;">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (Session::has('message'))
                        <div class="alert alert-primary" role="alert">
                            {{ session::get('message') }}
                        </div>
                    @endif
                    <div class="mb-3 p-3">
                        <label for="title2" class="col-form-label">Card Title:</label>
                        <input type="text" name="title2" class="form-control" id="recipient-name" placeholder="Venue name here" required >

                        <label for="description2" class="col-form-label">Card Text:</label>
                        <textarea name="description2" class="form-control" id="message-text"></textarea>

                        <label class="col-form-label" for="imageUpload2">Upload an image:</label>
                        <input type="file" id="imageUpload" name="imageUpload2" accept="image/*" required>
                        <div class="mb-3">
                            <label for="extra_images" class="form-label">Upload More Images</label>
                            <input type="file" name="extra_images[]" multiple class="form-control">
                        </div>
                        </br>

                        <label for="contact" class="col-form-label">Contact</label>
                        <input type="text" name="contact" class="form-control" id="recipient-contact" required>

                        <div class="mb-3">
                            <label class="col-form-label">Packages</label>
                            <div id="packages-wrapper">
                                <div class="input-group mb-2">
                                    <input type="text" name="packege[]" class="form-control"
                                        placeholder="Enter package">
                                    <button type="button" class="btn btn-success add-package-btn">Add</button>
                                </div>
                            </div>
                        </div>

                        <label for="location" class="col-form-label">Location</label>
                        <input type="text" name="location" class="form-control" id="location" required>

                        <div class="mb-3">
                            <label class="col-form-label">Amenities</label>
                            <div id="amenities-wrapper">
                                <div class="input-group mb-2">
                                    <input type="text" name="amenity[]" class="form-control"
                                        placeholder="Enter amenities">
                                    <button type="button" class="btn btn-success add-amenity-btn">Add</button>
                                </div>
                            </div>
                        </div>

                        <label for="events" class="col-form-label">Event types</label>
                        <input type="text" name="events" class="form-control" id="events">

                        <!-- Latitude -->
                        <div class="mb-3">
                            <label class="form-label">Latitude</label>
                            <input class="form-control" type="text" name="latitude" id="latitude"
                                value="{{ $profileData->latitude ?? '' }}" placeholder="Click map to select">
                        </div>

                        <!-- Longitude -->
                        <div class="mb-3">
                            <label class="form-label">Longitude</label>
                            <input class="form-control" type="text" name="longitude" id="longitude"
                                value="{{ $profileData->longitude ?? '' }}" placeholder="Click map to select">
                        </div>

                        <!-- Optional: Locate Me button -->
                        <button type="button" class="btn btn-outline-primary mb-3" id="locateMeBtn">
                            📍 Locate Me
                        </button>

                        <!-- Map container -->
                        <div id="map" style="height: 300px; margin-bottom: 20px;"></div>


                    </div>
                    <button type="submit" class="btn btn-primary w-25">Submit</button>
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

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // For Packages
                        const packagesWrapper = document.getElementById('packages-wrapper');

                        packagesWrapper.addEventListener('click', function(e) {
                            if (e.target.classList.contains('add-package-btn')) {
                                const inputGroup = document.createElement('div');
                                inputGroup.className = 'input-group mb-2';
                                inputGroup.innerHTML = `
                                    <input type="text" name="packege[]" class="form-control" placeholder="Enter package">
                                    <button type="button" class="btn btn-danger remove-package-btn">Remove</button>
                                `;
                                packagesWrapper.appendChild(inputGroup);
                            } else if (e.target.classList.contains('remove-package-btn')) {
                                e.target.parentElement.remove();
                            }
                        });

                        // For Amenities
                        const amenitiesWrapper = document.getElementById('amenities-wrapper');

                        amenitiesWrapper.addEventListener('click', function(e) {
                            if (e.target.classList.contains('add-amenity-btn')) {
                                const inputGroup = document.createElement('div');
                                inputGroup.className = 'input-group mb-2';
                                inputGroup.innerHTML = `
                                    <input type="text" name="amenity[]" class="form-control" placeholder="Enter amenities">
                                    <button type="button" class="btn btn-danger remove-amenity-btn">Remove</button>
                                `;
                                amenitiesWrapper.appendChild(inputGroup);
                            } else if (e.target.classList.contains('remove-amenity-btn')) {
                                e.target.parentElement.remove();
                            }
                        });
                    });
                </script>
            </div>
        </div>
    </main>

    @include('admin/footerlayout')
