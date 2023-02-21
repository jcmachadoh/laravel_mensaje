@extends('layouts.layout')

@section('content')
    <h3>Usuarios</h3>
    @if (session()->has('info'))
        <div class="alert alert-success">{{ session('info') }}</div>
    @endif
    <a class="btn btn-primary" href="{{ route('usuarios.create') }}">Adicionar Usuario</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Role</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <th>{{ $user->name }}</th>
                    <th><a href="{{ route('usuarios.show', $user->id) }}">{{ $user->email }}
                        </a></th>
                    <th>
                        @foreach ($user->roles as $role)
                            {{ $role->display_name }}
                        @endforeach
                    </th>
                    <th>
                        <a class="btn btn-info btn-sm" href="{{ route('usuarios.edit', $user->id) }}">editar</a>
                        <form class="form-inline" action="{{ route('usuarios.destroy', $user->id) }}" method="POST">
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
