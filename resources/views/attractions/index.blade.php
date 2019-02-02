@extends('layouts.app')

@section('content')
<div class="uk-container">
    <div class="uk-card uk-card-default uk-grid-collapse uk-table-divider uk-margin uk-padding" uk-grid style="margin-top:20px;">
        <div>
            <div class="uk-card-body">
                <h3 class="uk-card-title">Data User</h3>
                <table class="uk-table uk-table-divider  uk-table-condensed">
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
                                <button class="uk-button-default" type="button">
                                    <a href="{{ route('attraction.show', $attraction->id)}}" uk-icon="icon: file-text"></a>
                                </button>
                            </td>
                            <td>
                                <button class="uk-button-primary" type="button">
                                    <a href="{{ route('attraction.edit', $attraction->id)}}" uk-icon="icon: pencil"></a>
                                </button>
                            </td>
                            <td>
                                <form action="{{ route('attraction.destroy', $attraction->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="uk-button-danger" type="submit" >
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
</div>    
@endsection