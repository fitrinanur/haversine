@extends('layouts.app')

@section('content')
<div class="uk-container">
    <div class="uk-card uk-card-default uk-grid-collapse uk-table-divider uk-margin uk-padding" uk-grid style="margin-top:20px;">
        <div>
            <div class="uk-card-body">
                <h3 class="uk-card-title">Data User </h3>
                <table class="uk-table uk-table-hover uk-table-divider  uk-table-condensed">
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
                </table>
            </div>
            <button class="uk-button uk-button-secondary" style="float:right"><a href="{{ route('user.index') }}" uk-icon="icon :arrow-left"></a> Back</button>

        </div>
    </div>
</div>

@stop
