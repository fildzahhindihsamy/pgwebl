@extends('layout/template')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">

    <style>
        #map {
            width: 100%;
            height: calc(100vh - 56px);
        }
    </style>
@endsection

@section('content')
    <div id="map"></div>

    <!-- Modal Create Point-->
    <div class="modal fade" id="createpointModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Point</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('points.store') }}"enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <textarea class="form-control" id="name" name="name" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="geom_points" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_points" name="geom_points" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="image_point" name="image"
                                onchange="document.getElementById('preview-image-point').src = window.URL.createObjectURL(this.files[0])">
                            <img src="" alt="Preview" id="preview-image-point"
                                class="img-thumbnail mx-auto d-block"
                                style="max-width: 100%; height: auto; max-height: 400px;">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Create Polyline-->
    <div class="modal fade" id="createpolylinesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Polyline</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('polylines.store') }} "enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <textarea class="form-control" id="name" name="name" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="geom_polylines" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_polylines" name="geom_polylines" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="image_polylines" name="image"
                                onchange="document.getElementById('preview-image-polylines').src = window.URL.createObjectURL(this.files[0])">
                            <img src="" alt="Preview" id="preview-image-polylines"
                                class="img-thumbnail mx-auto d-block"
                                style="max-width: 100%; height: auto; max-height: 400px;">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Create Polygon-->
    <div class="modal fade" id="createpolygonsModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Polygon</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="POST" action="{{ route('polygons.store') }}"enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <textarea class="form-control" id="name" name="name" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="geom_polygons" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_polygons" name="geom_polygons" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class="form-control" id="image_polygons" name="image"
                                onchange="document.getElementById('preview-image-polygons').
                                src = window.URL.createObjectURL(this.files[0])">
                            <img src="" alt="Preview" id="preview-image-polygons"
                                class="img-thumbnail mx-auto d-block"
                                style="max-width: 100%; height: auto; max-height: 400px;">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>

    <script src="https://unpkg.com/@terraformer/wkt"></script>


    <script>
        var map = L.map('map').setView([-6.1753682, 106.8271708], 15);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        /* Digitize Function */
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: {
                position: 'topleft',
                polyline: true,
                polygon: true,
                rectangle: true,
                circle: false,
                marker: true,
                circlemarker: false
            },
            edit: false
        });

        map.addControl(drawControl);

        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;


            console.log(type);

            var drawnJSONObject = layer.toGeoJSON();
            var objectGeometry = Terraformer.geojsonToWKT(drawnJSONObject.geometry);

            console.log(drawnJSONObject);
            // console.log(objectGeometry);

            if (type === 'polyline') {
                console.log("Create " + type);
                $('#geom_polylines').val(objectGeometry);
                $('#createpolylinesModal').modal('show');

            } else if (type === 'polygon' || type === 'rectangle') {
                console.log("Create " + type);
                $('#geom_polygons').val(objectGeometry);
                $('#createpolygonsModal').modal('show');

            } else if (type === 'marker') {
                console.log("Create " + type);
                $('#geom_points').val(objectGeometry);
                $('#createpointModal').modal('show');

            } else {
                console.log('_undefined_');
            }

            drawnItems.addLayer(layer);
        });

// GeoJSON Points
var point = L.geoJson(null, {
    onEachFeature: function(feature, layer) {
        var routedelete = "{{ route('points.destroy', ':id') }}".replace(':id', feature.properties.id);
        var routeedit = "{{ route('points.edit', ':id') }}".replace(':id', feature.properties.id);

        var popupContent = `
            <table style="border-collapse: collapse; width: 100%; text-align: left; border: 1px solid black;">
                <thead>
                    <tr style="background-color: #FFB100; color: white;">
                        <th style="padding: 5px; border: 1px solid black;" colspan="2">Informasi Titik</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 5px; border: 1px solid black;"><b>Nama</b></td>
                        <td style="padding: 5px; border: 1px solid black;">${feature.properties.name}</td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border: 1px solid black;"><b>Deskripsi</b></td>
                        <td style="padding: 5px; border: 1px solid black;">${feature.properties.description}</td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border: 1px solid black;"><b>Dibuat</b></td>
                        <td style="padding: 5px; border: 1px solid black;">${feature.properties.created_at}</td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border: 1px solid black;"><b>Gambar</b></td>
                        <td style="padding: 5px; border: 1px solid black;">
                            <img src="/storage/images/${feature.properties.image}" width="200" alt="">
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row mt-3">
                <div class="col-6 text-end">
                    <a href="${routeedit}" class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                    </a>
                </div>
                <div class="col-6 text-start">
                    <form method="POST" action="${routedelete}" onsubmit="return confirm('BENERAN TITIKNYA MAU DIHAPUSSSS????')">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fa-solid fa-trash-can"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        `;

        layer.bindPopup(popupContent);
        layer.bindTooltip(feature.properties.name);
    }
});

$.getJSON("{{ route('api.points') }}", function(data) {
    point.addData(data);
    map.addLayer(point);
});


        //GeoJSON Polylines
        var polyline = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var routedelete = "{{ route('polylines.destroy', ':id') }}".replace(':id', feature.properties.id);
                var routeedit = "{{ route('polylines.edit', ':id') }}".replace(':id', feature.properties.id);

                var popupContent = `
            <table style="border-collapse: collapse; width: 100%; text-align: left; border: 1px solid black;">
                <thead>
                    <tr style="background-color: #FFB100; color: white;">
                        <th style="padding: 5px; border: 1px solid black;" colspan="2">Informasi Garis</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 5px; border: 1px solid black;"><b>Nama</b></td>
                        <td style="padding: 5px; border: 1px solid black;">${feature.properties.name}</td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border: 1px solid black;"><b>Panjang</b></td>
                        <td style="padding: 5px; border: 1px solid black;">${feature.properties.length_km.toFixed(2)} km</td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border: 1px solid black;"><b>Dibuat</b></td>
                        <td style="padding: 5px; border: 1px solid black;">${feature.properties.created_at}</td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border: 1px solid black;"><b>Gambar</b></td>
                        <td style="padding: 5px; border: 1px solid black;">
                        <img src="/storage/images/${feature.properties.image}" width="200" alt=''></td>
                    </tr>
                </tbody>
            </table>
            <div class="row mt-3">
                <div class="col-6 text-end">
                    <a href="${routeedit}" class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                    </a>
                </div>
                <div class="col-6 text-start">
                    <form method="POST" action="${routedelete}" onsubmit="return confirm('BENERAN GARISNYA MAU DIHAPUSSSS????')">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fa-solid fa-trash-can"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        `;
                        layer.bindPopup(popupContent);
                        layer.bindTooltip(feature.properties.name);
                    }
        });
        $.getJSON("{{ route('api.polylines') }}", function(data) {
            polyline.addData(data);
            map.addLayer(polyline);
        });

        //GeoJSON Polygon
        var polygon = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var routedelete = "{{ route('polygons.destroy', ':id') }}".replace(':id', feature.properties.id);
                var routeedit = "{{ route('polygons.edit', ':id') }}".replace(':id', feature.properties.id);

                var popupContent = `
            <table style="border-collapse: collapse; width: 100%; text-align: left; border: 1px solid black;">
                <thead>
                    <tr style="background-color: #FFB100; color: white;">
                        <th style="padding: 5px; border: 1px solid black;" colspan="2">Informasi Poligon</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 5px; border: 1px solid black;"><b>Nama</b></td>
                        <td style="padding: 5px; border: 1px solid black;">${feature.properties.name}</td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border: 1px solid black;"><b>Deskripsi</b></td>
                        <td style="padding: 5px; border: 1px solid black;">${feature.properties.description}</td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border: 1px solid black;"><b>Luas</b></td>
                        <td style="padding: 5px; border: 1px solid black;">${feature.properties.luas_hektar.toFixed(2)} hektar</td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border: 1px solid black;"><b>Dibuat</b></td>
                        <td style="padding: 5px; border: 1px solid black;">${feature.properties.created_at}</td>
                    </tr>
                    <tr>
                        <td style="padding: 5px; border: 1px solid black;"><b>Gambar</b></td>
                        <td style="padding: 5px; border: 1px solid black;">
                        <img src="/storage/images/${feature.properties.image}" width="200" alt=''></td>
                    </tr>
                </tbody>
            </table>
            <div class="row mt-3">
                <div class="col-6 text-end">
                    <a href="${routeedit}" class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                    </a>
                </div>
                <div class="col-6 text-start">
                    <form method="POST" action="${routedelete}" onsubmit="return confirm('BENERAN AREANYA MAU DIHAPUSSSS????')">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fa-solid fa-trash-can"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        `;
                layer.on({
                    click: function(e) {
                        layer.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        layer.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polygons') }}", function(data) {
            polygon.addData(data);
            map.addLayer(polygon);
        });
    </script>
@endsection
