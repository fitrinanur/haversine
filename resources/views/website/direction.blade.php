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
                    <form action="#" method="GET">
                        @csrf
                        <label for="exampleInputEmail1">Lokasi Awal</label><br>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Lokasi Awal" name="start_location">
                                <small id="emailHelp" class="form-text text-muted">Masukan lokasi awal yang anda inginkan</small>
                            </div>
                            <div class="col">
                               <button class="btn btn-info">Ambil Lokasi Saat Ini</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Lokasi Tujuan</label>
                            <input type="text" name="end_location" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                placeholder="Lokasi Tujuan">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Metode Perjalanan</label><br>
                            @foreach ($rides as $key => $ride)
                            <input type="radio" id="" name="method_rides" class="">  {{$ride}}        
                            @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reser" class="btn btn-warning">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @map([
    'lat' => $start_location,
    'lng' => $end_location,
    'zoom' => '25',
    'markers' => [[
        'title' => 'title',
        'lat' => $start_location,
        'lng' => $end_location,
    ]],
])
    @mapscripts
@stop


