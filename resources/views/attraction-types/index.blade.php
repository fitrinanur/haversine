@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="card" style="margin-top:30px;">
                <div class="card-body">
                    <h3 class="card-title">Card title</h3>
                    <a href="#" class="btn btn-sm btn-info" style="float:right;margin-bottom:10px;" data-toggle="modal"
                        data-target="#createType">Tambah Tipe</a>
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
                                    {{-- <a href="{{ route('attraction-type.show', $attractionType->id)}}" class="btn btn-sm btn-success"
                                        uk-icon="icon: file-text"></a><br> --}}
                                    {{-- <a href="{{ route('attraction-type.edit', $attractionType->id)}}" class="btn btn-sm btn-primary"
                                        uk-icon="icon: pencil"></a> --}}
                                    <button href="#" class="btn btn-sm btn-primary" uk-icon="icon: pencil" data-toggle="modal"
                                        data-target="#editType{{ $attractionType->id }}" data-toggle="tooltip"
                                        data-placement="right" title="Edit">
                                    </button>
                                    {{-- Modal Edit --}}
                                    <div class="modal fade" id="editType{{$attractionType->id}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tipe Penginapan</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('attraction-type.update', $attractionType)}}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="exampleFormControlInput1">Tipe Wisata</label>
                                                            <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                                                value="{{$attractionType->name}}">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Modal Edit --}}
                                    <form action="{{ route('attraction-type.destroy', $attractionType->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit" uk-icon="icon: trash"
                                            data-method="delete" data-toggle="tooltip" data-placement="right" title="Hapus"
                                            data-confirm="Anda yakin menghapus data ini?">
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
    </div>
</div>

<div class="modal fade" id="createType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tipe Penginapan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('attraction-type.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tipe Wisata</label>
                        <input type="text" name="name" class="form-control" id="exampleFormControlInput1">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


@stop
