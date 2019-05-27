@extends('layouts.master')


@section('content')
<div id=recommendation></div>
@stop
    @push('javascript')
    <script type="application/javascript">
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
            if (position === undefined) {
                alert('Your Position Undefined')
            } else {
                let lat = position.coords.latitude;
                let lon = position.coords.longitude;
                console.log(lat);
                console.log(lon);

                $.ajax({
                    url: '/recommendation',
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'lat': lat,
                        'lon': lon,
                    },
                    success: function (response) {
                        $('#recommendation').html(response)
                    }
                })
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
