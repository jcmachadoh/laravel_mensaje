@extends('layouts.layout')

@section('content')
    <h3>Editar mensaje</h3>
    <form action="{{ route('messages.update', $message->id) }}" method="POST">
        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
        {{ method_field('PUT') }}
        {{ csrf_field() }}
        <p>
            <label for="nombre">nombre
                <input class="form-control" type="text" name="nombre" id="" value="{{ $message->nombre }}" />
                {!! $errors->first('nombre', '<span class="error">:message</span>') !!}
            </label>
        </p>
        <p>
            <label for="email">email
                <input class="form-control" type="email" name="email" id="" value="{{ $message->email }}" />
                {!! $errors->first('email', '<span class="error">:message</span>') !!}
            </label>
        </p>
        <p>
            <label for="mensaje">mensaje
                <textarea class="form-control" name="mensaje" id="" cols="40" rows="5">{{ $message->message }}</textarea>
                {!! $errors->first('mensaje', '<span class="error">:message</span>') !!}
            </label>
        </p>

        <input class="btn btn-warning" type="submit" value="actualizar" />
    </form>
@endsection
