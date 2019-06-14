@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3" style="margin-top:50px">
            <div class="card">
                <div class="card-header">
                    <h5>Halaman Admin</h5>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <p style="text-align:center;color:gray;font-size:11px;">Jumlah Wisata</p>
                                    <h3 style="text-align:center">{{$attractions->count()}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <p style="text-align:center;color:gray;font-size:11px;">Jumlah Jenis Wisata</p>
                                    <h3 style="text-align:center">{{$attractionTypes->count()}}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <p style="text-align:center;color:gray;font-size:11px;">Jumlah User</p>
                                    <h3 style="text-align:center">{{$users->count()}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
