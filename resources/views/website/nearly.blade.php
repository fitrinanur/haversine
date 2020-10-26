@extends('layouts.master')


@section('content')
@push('styles')
<style>
    .header-info>ul {
        list-style-type: none;
        display: inline-flex;
        padding: 3px;
    }

    .header-info>ul>li {
        padding: 2px 10px;
        margin-left: 10px;
        border-radius: 5px;
    }

    .header-info>ul>li>a {
        color: white;
        font-size: 25px;
    }


    .btn.filter {
        margin-top: 10px;
        background-color: #4FB99F;
        border: 1px solid #fff;
        color: #fff;
    }

    .btn.filter:hover {
        background-color: #45a089;
    }

    @media (max-width: 450px) {
        .gallery {
            -webkit-column-count: 1;
            -moz-column-count: 1;
            column-count: 1;
            -webkit-column-width: 100%;
            -moz-column-width: 100%;
            column-width: 100%;
        }
    }

    @media (max-width: 400px) {
        .btn.filter {
            padding-left: 1.1rem;
            padding-right: 1.1rem;

        }
    }

</style>
@endpush
<div class="container row-fluid">
    <div class="card" style="margin-top:10px;">
        <div class="card-body">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <p style="color:dodgerblue">Lokasi anda saat ini :</p>
                            <p> <strong>Latitude : </strong> {{$latitude}}<br />
                                <strong>Longitude :</strong> {{$longitude}}
                            </p>
                        </div>
                        <div class="col-md-4">
                            <iframe width="100%" height="300" marginwidth="0"
                                src="https://maps.google.com/maps?q={{ $latitude }},{{ $longitude }}&hl=es;z=16&amp;output=embed">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
            <br>

        </div>
    </div>
    <div class="card" style="margin-top:10px;">
        <div class="card-body">
            <div class="row">
                {{-- @dd(url()->full()); --}}
                <form action="{{ url()->current() }}" method="GET" class="form-inline">
                    @csrf
                    <div class="form-group mx-sm-4 mb-2">
                        <label for="staticEmail2">Kategori Wisata</label>
                    </div>
                    
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="hidden" name="latitude" value="{{$latitude}}">
                        <input type="hidden" name="longitude" value="{{$longitude}}">
                        <select class="form-control select2-single {{ $errors->has('attractionType') ? ' is-invalid' : '' }}"
                            name="attractionType" required>
                            @foreach ($attractionTypes as $attractionType)
                                <option value="{{$attractionType->id}}">{{$attractionType->name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('attractionType'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('attractionType') }}</strong>
                        </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary mb-2"> Filter</button>
                </form>
            </div>
        </div>
    </div>

    <div class="card" style="margin-top:10px;">
        <div class="card-body">
            <h3 class="card-title">Rekomendasi Wisata Disekitar Anda</h3>
            @if($category == '1')
                <p>Kategori = "Pantai"</p>
            @elseif($category == '2')
                <p>Kategori = "Museum"</p>
            @elseif($category == '3')
                <p>Kategori = "Desa Wisata"</p>
            @elseif($category == '4')
                <p>Kategori = "Sendang"</p>
            @elseif($category == '5')
                <p>Kategori = "Lainnya"</p>
            @else
                <p>Kategori = "Semua"</p>
            @endif
           
            @foreach ($attractions as $key=>$attraction)
            <div class="gallery" id="gallery">
                <div class="col-lg-12 mb-3 pics animation all {{ $attraction->attractionType->name }}">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="card-title">{{ $attraction->name }}</h3>
                            <table class="table table-sm">
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td>{{ $attraction->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>{{ $attraction->name }} - {{ $attraction->city->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Provinsi</td>
                                        <td>{{ $attraction->city->province->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Latitude</td>
                                        <td>{{ $attraction->latitude }}</td>
                                    </tr>
                                    <tr>
                                        <td>Longitude</td>
                                        <td>{{ $attraction->longitude }}</td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>{{ $attraction->description }}</td>
                                    </tr>
                                    <tr>
                                        <td>Jarak</td>
                                        <td>{{ round($attraction->distance,3) }} km</td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr />
                            @foreach($attraction->pictures->take(2) as $picture )
                            <img class="d-block img-fluid img-thumbnail rounded" src="{{ $picture->path() }}" /><br>
                            @endforeach
                            <p class="card-text">
                                <small class="text-muted">{{ $attraction->created_at->diffForHumans()}}</small>
                            </p>
                        </div>
                        <div class="col-md-4">
                            <div style="width: 350px; height: 400px;">
                                {!! Mapper::render($key) !!}
                            </div>
                            <div class="header-info">
                                <ul class="header-social">
                                    <li style="background-color:tomato"><a href="#" title="Instagram" target="_blank">
                                            <i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    </li>
                                    <li style="background-color:firebrick"><a href="#" title="Youtube" target="_blank">
                                            <i class="fa fa-youtube" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div><!-- .header-info -->

                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
@stop
@push('javascript')
<script type="application/javascript">
    $(document).ready(function () {
        getLocation();
        $(function ($) {
            var selectedClass = "";
            $(".filter").click(function () {
                selectedClass = $(this).attr("data-rel");
                jQuery("#gallery").fadeTo(100, 0.1);
                jQuery("#gallery div").not("." + selectedClass).fadeOut().removeClass(
                    'animation');
                setTimeout(function () {
                    jQuery("." + selectedClass).fadeIn().addClass('animation');
                    jQuery("#gallery").fadeTo(300, 1);
                }, 300);
            });
        });
    });

</script>
<script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(getRecommendation, showError);
        } else {
            alert("Geolocation is not supported by this browser.");
        }
    }

    function getRecommendation(position) {
        if (position === undefined) {
            alert('Your Position Undefined')
        } else {
            let lat = position.coords.latitude;
            let lon = position.coords.longitude;
            console.log(lat);
            console.log(lon);
        }
    }

    function showError(error) {
        switch (error.code) {
            case error.PERMISSION_DENIED:
                alert("Untuk rekomendasi wisata terbaik, izinkan aplikasi untuk mengakses lokasi anda");
                getRecommendation();
                break;
            case error.POSITION_UNAVAILABLE:
                alert("Informasi lokasi tidak tersedia.");
                getRecommendation();
                break;
            case error.TIMEOUT:
                alert("Permintaan akses lokasi user habis");
                getRecommendation();
                break;
            case error.UNKNOWN_ERROR:
                alert("Error tidak diketahui");
                break;
        }
    }

</script>
@endpush
