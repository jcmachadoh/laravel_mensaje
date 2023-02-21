@extends('layouts.layout')

@section('content')
    <h3>Informacion de un mensaje</h3>
    <p>Enviado por {{ $message->nombre }} con email {{ $message->email }}</p>
    <p>Mensaje</p>
    {{$message->message}}
@endsection
