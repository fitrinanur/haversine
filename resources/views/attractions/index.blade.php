@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="margin-top:30px;">
        <div class="card-body">
            <h3 class="card-title">Card title</h3>
            <a href="{{ route('attraction.create') }}" class="btn btn-sm btn-info" style="float:right;margin-bottom:10px;">Tambah
                Wisata</a>
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
                    @foreach($attractions as $key => $attraction)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $attraction->name }}</td>
                        <td>{{ $attraction->attractionType->name }}</td>
                        <td>{{ $attraction->address }}</td>
                        <td>
                            <a href="{{ route('attraction.show', $attraction->id)}}" class="btn btn-success" uk-icon="icon: file-text"></a>
                            <a href="{{ route('attraction.edit', $attraction->id)}}" class="btn btn-primary" uk-icon="icon: pencil"></a>
                            <form action="{{ route('attraction.destroy', $attraction->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    <span uk-icon="icon: trash"></span>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
