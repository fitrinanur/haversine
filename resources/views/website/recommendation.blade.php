<div class="container row-fluid">
    <div class="card" style="margin-top:10px;">
        <div class="card-body">
            Lokasi anda saat ini :<br />
            <strong>Latitude : </strong> {{$latitude}}<br />
            <strong>Longitude :</strong> {{$longitude}}<br>

            <iframe width="100%" height="300" marginwidth="0"
                src="https://maps.google.com/maps?q={{ $latitude }},{{ $longitude }}&hl=es;z=16&amp;output=embed">
            </iframe>
        </div>
    </div>
    <div class="card" style="margin-top:10px;">
        <div class="card-body">
            <h3 class="card-title">Rekomendasi Wisata Disekitar Anda</h3>
            @foreach ($attractions as $attraction)
            <h4 class="card-title">{{ $attraction->name }}</h4>
            <div class="row">
                <div class="col-md-6">
                    <p class="card-text">{{ $attraction->description}}</p>
                    <p>Alamat : <br/>
                        {{$attraction->address}}<br>
                        <small style="color:deepskyblue">nomor telepon : </small>{{$attraction->phone_number}}
                    </p>

                </div>
                <div class="col-md-6">


                    @foreach($attraction->pictures->take(2) as $picture )
                    <img class="d-block img-fluid img-thumbnail rounded" src="{{ $picture->path() }}" /><br>
                    @endforeach
                </div>
            </div>


            <p class="card-text">
                <small class="text-muted">{{ $attraction->created_at->diffForHumans()}}</small>
            </p>
            @endforeach
        </div>
    </div>
</div>
</div>
