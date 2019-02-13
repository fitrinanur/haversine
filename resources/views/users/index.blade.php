@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="margin-top:30px;">
        <div class="card-body">
            <h3 class="card-title">Card title</h3>
            <a href="{{ route('user.create') }}" class="btn btn-sm btn-info" style="float:right;margin-bottom:10px;">Tambah user</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th colspan="3" style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->address }}</td>
                            <td>
                                <a href="{{ route('user.show', $user->id)}}" class="btn btn-success" uk-icon="icon: file-text"></a>
                                <a href="{{ route('user.edit', $user->id)}}" class="btn btn-primary" uk-icon="icon: pencil"></a>
                                <form action="{{ route('user.destroy', $user->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit" uk-icon="icon: trash"></button>
                                </form>
                        
                            
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@stop