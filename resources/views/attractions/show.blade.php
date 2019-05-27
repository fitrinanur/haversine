@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="margin-top:20px;">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                        
                    @foreach($attraction->pictures->take(2) as $picture )
                        <img class="d-block img-fluid img-thumbnail rounded" src="{{ $picture->path() }}"/><br>
                    @endforeach
                            
                    <div class="slider">
                        {{-- start slider --}}
                        {{-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @foreach( $attraction->pictures() as $picture )
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                @endforeach
                            </ol>
                            <div class="carousel-inner" role="listbox">
                                @foreach( $attraction->pictures() as $picture )
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img class="d-block img-fluid" src="{{ $picture->path() }}" />
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div> --}}
                        {{-- end of slider --}}
                    </div>
                </div>
                <div class="col-lg-8">
                    <h3 class="card-title">{{ $attraction->name }}</h3>
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>{{ $attraction->name }}</td>
                            </tr>
                            <tr>
                                <td>Tipe Wisata</td>
                                <td>{{ $attraction->attractionType->name }}</td>
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
                                <td>Number</td>
                                <td>{{ $attraction->phone_number }}</td>
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
                    <iframe width="100%" height="300"
                        marginwidth="0"
                        src = "https://maps.google.com/maps?q={{ $attraction->latitude }},{{ $attraction->longitude }}&hl=es;z=16&amp;output=embed">
                    </iframe>
                </div>
            </div>
                <a href="{{ route('attraction.index') }}" class="btn btn-secondary btn-inverse" style="float:right">  <span uk-icon="icon: arrow-left"></span> Back</a> </button>
        </div>
    </div>

    @stop
