@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="margin:30px">
        <div class="card-body">
            <h3 class="card-title">Tambah Data User</h3>
                <form action="{{ route('user.update', $user)}}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" id="exampleFormControlInput1" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Password</label>
                    <input type="text" name="password" value="{{ $user->password }}" class="form-control" id="exampleFormControlInput1" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nomor Telepon</label>
                    <input type="text" name="phone_number" value="{{ $user->phone_number }}" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Alamat</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address">{{ $user->address }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Confirm identity</button>
            </form>
        </div>
    </div>
</div>
@stop