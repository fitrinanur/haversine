@extends('layouts.master')

@section('content')

@stop
@push('javascript')
<script>
    $(document).ready(function () {
        getLocation();
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

        window.location = 'https://haversine.test/nearly-page?latitude=' + position.coords.latitude + '&longitude=' + position.coords.longitude;

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
