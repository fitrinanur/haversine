@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card" style="margin-top:30px;">
        <div class="card-body">
            <h3 class="card-title">Card title</h3>
            <a href="{{ route('attraction-type.create') }}" class="btn btn-sm btn-info" style="float:right;margin-bottom:10px;">Tambah Tipe</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tipe</th>
                        <th colspan="3" style="text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attractionTypes as $key => $attractionType)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $attractionType->name }}</td>
                        <td>
                            <a href="{{ route('attraction-type.show', $attractionType->id)}}" class="btn btn-success" uk-icon="icon: file-text"></a>
                            <a href="{{ route('attraction-type.edit', $attractionType->id)}}" class="btn btn-primary" uk-icon="icon: pencil"></a>
                            <form action="{{ route('attraction-type.destroy', $attractionType->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" class="btn btn-danger" uk-icon="icon: trash"></button>
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
