

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
            <h3 class="card-title">Rekomendasi Wisata Disekitar Anda</h3>
            @foreach ($attractions as $attraction)
            <div class="col-lg-12">
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
                            </tbody>
                        </table>
                        <hr/>
                        @foreach($attraction->pictures->take(2) as $picture )
                        <img class="d-block img-fluid img-thumbnail rounded" src="{{ $picture->path() }}"/><br>
                        @endforeach
                    </div>
                    <div class="col-md-4">
                        <iframe width="100%" height="300" marginwidth="0"
                            src="https://maps.google.com/maps?q={{ $attraction->latitude }},{{ $attraction->longitude }}&hl=es;z=16&amp;output=embed">
                        </iframe><br>
                        <div class="header-info">
                            <ul class="header-social">
                                <li style="background-color:tomato"><a href="{{$attraction->instagram_link}}"
                                        title="Instagram" target="_blank" ><i class="fa fa-instagram"
                                            aria-hidden="true"></i></a>
                                </li>
                                <li style="background-color:firebrick"><a href="{{$attraction->youtube_link}}" title="Youtube"
                                        target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div><!-- .header-info -->
                    </div>
                </div>

            </div>
            {{-- <h4 class="card-title">{{ $attraction->name }}</h4>
            <div class="row">
                <div class="col-md-6">
                    <p class="card-text">{{ $attraction->description}}</p>
                    <p>Alamat : <br />
                        {{$attraction->address}}<br>
                        <small style="color:deepskyblue">nomor telepon : </small>{{$attraction->phone_number}}
                    </p>
                </div>
                <div class="col-md-6">
                    @foreach($attraction->pictures->take(2) as $picture )
                    <img class="d-block img-fluid img-thumbnail rounded" src="{{ $picture->path() }}" /><br>
                    @endforeach
                </div> --}}
                {{-- </div> --}}
                <p class="card-text">
                    <small class="text-muted">{{ $attraction->created_at->diffForHumans()}}</small>
                </p>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
