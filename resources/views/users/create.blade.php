@extends('layouts.layout')
@section('content')
    <h3>Adicionar Usuario</h3>
    {{-- @if (seccion()->get('info'))
        <div class="">{{}}</div>
    @endif --}}
    <form class="form" action="{{ route('usuarios.store') }}" method="post">
        {{ csrf_field() }}
        <p>
            <label for="nombre">username
                <input class="form-control" type="text" name="name" id="" value="{{ old('name') }}" />
                {!! $errors->first('name', '<span class="error">:message</span>') !!}
            </label>
        </p>
        <p>
            <label for="email">email
                <input class="form-control" type="email" name="email" id="" value="{{ old('email') }}" />
                {!! $errors->first('email', '<span class="error">:message</span>') !!}
            </label>
        </p>
        <p>
            <label for="password">password
                <input class="form-control" type="password" name="password" id="" />
                {!! $errors->first('password', '<span class="error">:message</span>') !!}
            </label>
        </p>
        <p>
            <label for="confirm-password">confirm password
                <input class="form-control" type="password" name="confirm-password" id="" />
                {!! $errors->first('confirm-password', '<span class="error">:message</span>') !!}
            </label>
        </p>
        <input class="btn btn-primary" type="submit" value="enviar" />
    </form>
@endsection
