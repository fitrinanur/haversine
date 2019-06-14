@extends('layouts.master')

@section('content')
@push('styles')
    @mapstyles
@endpush

<div class="container">
    <div class="card" style="margin:10px;">
        <div class="card-body">
            <h3>Rute Wisata</h3>
            <hr>
            <div class="row">
                <div class="col-lg-6">
                    <form action="{{route('direction.store')}}" method="POST">
                        @csrf
                        <label for="exampleInputEmail1">Lokasi Awal</label><br>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control start_location" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Lokasi Awal" name="start_location">
                                <small id="emailHelp" class="form-text text-muted">Masukan lokasi awal yang anda inginkan</small>
                            </div>
                            <div class="col">
                               <button type="button" class="btn btn-info" id="get-mylocation">Ambil Lokasi Saat Ini</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jenis Input Destinasi</label><br>
                            <select class="custom-select destinationType" name="type">
                                <option selected>Pilih</option>
                                @foreach ($directionTypes as $key => $directionType)
                                    <option value="{{$key}}" name="type">{{$directionType}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group address-box">
                            <label for="exampleInputEmail1">Alamat</label><br>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Masukkan Alamat">
                        </div>
                        <div class="form-group coordinat-box">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Latitude</label>
                                    <input type="text" name="latitude" id="latitude" class="form-control" placeholder="Ex : -8.000696">
                                   
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputEmail1">Longitude</label>
                                    <input type="text" name="longitude" id="longitude" class="form-control" placeholder="Ex : 110.3539">
                                </div>
                            </div>
                           
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@push('javascript')
<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyCBCAjJsVHTyMD9msfS2a8QQUeRGLLimtA&ver=3.exp"></script>
<script>
    $(document).ready(function () {
        $('.address-box').hide();
        $('.coordinat-box').hide();

        $('.destinationType').on('change', function() {
            if($('.destinationType').val() == 1){
               $('.address-box').show();
               $('.coordinat-box').hide();
            }else{
                $('.coordinat-box').show();
                $('.address-box').hide();
            }
        });
        $( "#get-mylocation" ).click( function(e) {
            e.preventDefault();
    
            /* Chrome need SSL! */
            var is_chrome = /chrom(e|ium)/.test( navigator.userAgent.toLowerCase() );
            var is_ssl    = 'https:' == document.location.protocol;
            if( is_chrome && ! is_ssl ){return false;}
 
        /* HTML5 Geolocation */
            navigator.geolocation.getCurrentPosition(
                function( position ){ // success cb
    
                    /* Current Coordinate */
                    var lat = position.coords.latitude;
                    // console.log(lat);
                    var lng = position.coords.longitude;
                    var google_map_pos = new google.maps.LatLng( lat, lng );
    
                    /* Use Geocoder to get address */
                    var google_maps_geocoder = new google.maps.Geocoder();
                    google_maps_geocoder.geocode(
                        { 'latLng': google_map_pos },
                        function( results, status ) {
                            if ( status == google.maps.GeocoderStatus.OK && results[0] ) {
                                $('.start_location').val(results[0].formatted_address);
                                // calculate();
                                console.log( results[0].formatted_address );
                            }
                        }
                    );
                },
            );
        });
    });
</script>
@endpush

