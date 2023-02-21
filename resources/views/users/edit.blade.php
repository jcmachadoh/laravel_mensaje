@extends('layouts.layout')
@section('content')
    <h3>Editar el usuario con email: {{ $user->email }}</h3>
    @if (session()->has('info'))
        <div class="alert alert-success">{{session('info')}}</div>
    @endif
    <form class="form" action="{{ route('usuarios.update', $user->id) }}" method="POST">
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <p>
            <label for="nombre">username
                <input class="form-control" type="text" name="name" id="" value="{{$user->name}}" />
                {!! $errors->first('name', '<span class="error">:message</span>') !!}
            </label>
        </p>
        <p>
            <label for="email">email
                <input class="form-control" type="email" name="email" id="" value="{{$user->email}}" />
                {!! $errors->first('email', '<span class="error">:message</span>') !!}
            </label>
        </p>
        <input class="btn btn-primary" type="submit" value="enviar" />
    </form>
@endsection
