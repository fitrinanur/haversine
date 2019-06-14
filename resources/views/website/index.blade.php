@extends('layouts.master')

@section('content')
@push('styles')
<style>
    .wrapper {
        background-color: #75A353;
        margin-top: 10px;
    }

    .slider {
        margin: 0px !important;
        padding: 0px !important;
    }

    .setting {
        background-color: darkgray;
    }

    .vision,
    .mission {
        margin: 10px;
    }

    .footer {
        margin: 0px !important;
    }

    .card-img-bottom {
        color: #fff;
        height: 20rem;
        background: url('img/1.jpg') center no-repeat;
        background-size: cover;
    }

    .left {
        padding: 10px;
        margin: 10px;
    }

    .right {
        padding: 10px;
        margin: 10px;
    }


    }

</style>

@endpush

<header class="masthead bg-primary text-white text-center" style="padding-top:6rem;padding-bottom: 6rem;">
    <div class="container">
        {{-- logo --}}
        <img class="img mb-5 d-block mx-auto" src="{{ asset('img/logo.png')}}" alt=""
            style="width: 175px; height:200px;">

        <h2 class="text-uppercase mb-0" style="color:#fff;font-size: 3rem;line-height: 3rem;">Sidang Akhir</h2>
        <hr>
        <h3 class="font-weight-light mb-0" style="font-size: 1.3rem;font-family: 'Lato';color: #fff;">
            Sistem Pencarian Wisata Terdekat dengan Haversine Formula
        </h3>
        <p class="font-weight-light mb-0">Your Name - 13.5.000xx</p>
        <p class="font-weight-light mb-0">STMIK SINAR NUSANTARA</p>
    </div>
</header>



<div class="row setting">
    <div class="col-lg-6">
        <div class="card text-center vision">
            <div class="card-header">
                Visi
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card-block">
                        <h4 class="card-title"></h4>
                        <p class="card-text">"Terwujudnya Yogyakarta sebagai salah satu destinasi terkemuka di Asia
                            Tenggara
                            pada
                            tahun 2025 berdasarkan keunggulan produk wisata yang berkualitas, berwawasan budaya,
                            berwawasan lingkungan, berkelanjutan dan menjadi salah satu pendorong tumbuhnya ekonomi
                            kerakyatan."</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-img-bottom">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card text-center mission">
            <div class="card-header">
                Misi
            </div>
            <div class="card-body">
                <img src="{{ asset('img/logo.png')}}" alt="" style="width:90px;height:100px;">
                <h4 class="card-title"></h4>
                <ol style="text-align: left" class="card-text">
                    <li>Mewujudkan destinasi pariwisata DIY yang berbasis budaya, lingkungan, kreatif dan
                        inovatif, maju berkembang dan mampu menggerakan peningkatan perekonomian masyarakat
                        yang berkelanjutan.</li>
                    <li>Mewujudkan destinasi pariwisata DIY yang berbasis budaya, lingkungan, kreatif dan
                        inovatif, maju berkembang dan mampu menggerakan peningkatan perekonomian masyarakat
                        yang berkelanjutan.</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row" >
    <div class="col-lg-8">
        <div class="card" style="margin: 10px 0px 10px 10px;">
            <div class="card-body">
                <h3>Buku Tamu</h3>
                <form action="{{ route('website.guestbook')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" name="email"
                        placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Pesan Anda :</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Kirim</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card" style="margin:10px 10px 10px 0;">
            <div class="card-body">
                <h3>Lorem ipsum dolor sit.</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id voluptatibus, porro error necessitatibus, impedit, recusandae hic iusto repellat minus expedita libero! Ipsa enim laboriosam, illo nisi suscipit optio iure eum velit nostrum vero minima accusantium recusandae beatae alias placeat, dicta ex assumenda. Voluptatem, iusto facere ex fuga minus in eligendi temporibus laudantium modi vitae quia quisquam autem quod nihil ratione unde aperiam libero ducimus? Placeat sint obcaecati incidunt quam nobis.</p>
            </div>
        </div>
    </div>
</div>
<div class="row" style="background-color:#222222;color:#f1f1f1">
    <div class="container">
        <p style="text-align: center;">Haversine &copy; 2019</p>
    </div>
</div>

@stop
{{-- @push('javascript')
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
@endpush --}}
