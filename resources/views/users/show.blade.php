@extends('layouts.layout')

@section('content')
    <h3>Datos del usuario {{ $user->email }}</h3>
    <table class="table">
        <tr>
            <th>Nombre: </th>
            <th>{{ $user->name }}</th>
        </tr>
        <tr>
            <th>Roles: </th>
            <th></th>
        </tr>
        <tr>
            <th>Creado: </th>
            <th>{{ $user->created_at }}</th>
        </tr>
    </table>
@endsection
