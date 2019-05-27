@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="margin-top:20px;">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">

                    @foreach($user->pictures->take(2) as $picture )
                    <img class="d-block img-fluid img-thumbnail rounded" src="{{ $picture->path() }}" /><br>
                    @endforeach

                </div>
                <div class="col-lg-8">
                    <h3 class="card-title">{{ $user->name }}</h3>
                    <table class="table table-sm">
                        <tbody>
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>{{ $user->name }}</th>
                                </tr>
                            </thead>
                        <tbody>
                            <tr>
                                <td>Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td>{{ $user->phone_number }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>{{ $user->address }}</td>
                            </tr>
                            <tr>
                                <td>Birthday</td>
                                <td>{{ $user->birthday }}</td>
                            </tr>
                        </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <a href="{{ route('user.index') }}" class="btn btn-secondary btn-inverse" style="float:right"> <span
                    uk-icon="icon: arrow-left"></span> Back</a> </button>
        </div>
    </div>



    @stop
