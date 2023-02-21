@extends('layouts.layout')

@section('content')
    <h3>Todos los mensajes</h3>
    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Mensaje</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
                <tr>
                    <th>
                        <a href="{{ route('messages.show', $message->id) }}">
                            {{ $message->nombre }}
                        </a>
                    </th>
                    <th>{{ $message->email }}</th>
                    <th>{{ $message->message }}</th>
                    <th>
                            <a class="btn btn-info btn-sm" href="{{ route('messages.edit', $message->id) }}">editar</a>
                        <form class="form-inline" action="{{ route('messages.destroy', $message->id) }}"
                            method="POST">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="btn btn-danger btn-sm" type="submit">eliminar</button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
