@extends('layouts.master')

@section('content')
@push('scripts')
<style>
    .wrapper {
        background-color : #75A353;
        margin-top: 10px;
    }
    .slider{
        margin: 0px !important;
        padding: 0px !important;
    }

    .setting{
        background-color: darkgray;
    }
    .vision, .mission {
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
    .left{
        padding: 10px;
        margin: 10px;
    }
    .right{
        padding: 10px;
        margin: 10px;
    }
</style>
@endpush
<div class="slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block slider-image" src="{{ asset('img/1.jpg')}}" alt="First slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Pantai Senggigi</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel itaque sit incidunt natus
                        necessitatibus sapiente magnam odio atque ipsa nobis.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block slider-image" src="{{ asset('img/1.jpg')}}" alt="Second slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Pantai Senggigi</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel itaque sit incidunt natus
                        necessitatibus sapiente magnam odio atque ipsa nobis.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block slider-image" src="{{ asset('img/1.jpg')}}" alt="Third slide">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Pantai Senggigi</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel itaque sit incidunt natus
                        necessitatibus sapiente magnam odio atque ipsa nobis.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
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
<div class="row">
    <div class="col-lg-6 left">
        <h3>Tinggalkan Pesan Anda</h3>
    </div>
    <div class="col-lg-6 right">
            <h3>Buku Tamu</h3>
            <form action="post" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Pesan Anda :</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                </div>
                <button class="btn btn-primary" type="submit">Kirim</button>
            </form>
    </div>
</div>

{{-- <div class="uk-section-secondary uk-background-bottom-right uk-background-norepeat footer">
    <div class="uk-container">
        <div class="uk-grid-match uk-child-width-1-3@m" uk-grid>
            <div class="uk-text-left">
                <h3>Haversine</h3>
                <div class="uk-child-width" uk-grid>
                    <ul class="uk-list">
                        <li>&copy; {{ date('Y') }}</li>
                    </ul>
                </div>
            </div>
            <div class="uk-text-right">
                <h3>Bussiness & Marketing</h3>
            </div>
        </div>
    </div>
</div> --}}
@stop
