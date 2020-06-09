@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body" id="mapID2"></div>
</div>
@endsection

@section('head')
<style>
    #mapID2 { min-height: 500px; }
</style>
@endsection

@section('scripts')
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script>
    var map = L.map('mapID2').setView([28.2026, 83.985], 10);
    var baseUrl = "{{ url('/') }}";
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    // axios.get('')
    // .then(function (response) {
    //     console.log(response.data);
    //     L.geoJSON(response.data, {
    //         pointToLayer: function(geoJsonPoint, latlng) {
    //             return L.marker(latlng);
    //         }
    //     })
    //     .bindPopup(function (layer) {
    //         return layer.feature.properties.map_popup_content;
    //     }).addTo(map);
    // })
    // .catch(function (error) {
    //     console.log(error);
    // });
    {{-- @can('create', new App\Outlet) --}}
        var theMarker;
        map.on('click', function(e) {
            let latitude = e.latlng.lat.toString().substring(0, 15);
            let longitude = e.latlng.lng.toString().substring(0, 15);
            if (theMarker != undefined) {
                map.removeLayer(theMarker);
            };
            var popupContent = "Your location : " + latitude + ", " + longitude + ".";
            // popupContent += '<br><a href="?latitude=' + latitude + '&longitude=' + longitude + '">Add new outlet here</a>';
            theMarker = L.marker([latitude, longitude]).addTo(map);
            theMarker.bindPopup(popupContent)
            .openPopup();
        });
    {{-- @endcan --}}
</script>
@endsection