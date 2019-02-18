@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card" style="margin:10px">
                <div class="card-body">
                    <h3 class="card-title">Tambah Data User</h3>
                    <form action="{{ route('user.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama</label>
                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Password</label>
                            <input type="text" name="password" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nomor Telepon</label>
                            <input type="text" name="phone_number" class="form-control" id="exampleFormControlInput1">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
