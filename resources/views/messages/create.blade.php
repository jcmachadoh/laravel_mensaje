@extends('layouts.layout')

@section('content')
    <h3>Mensajes !!!!</h3>
    @if (session()->has('info'))
        <p>informacion:</p>
    @else
        <form class="form" action="{{ route('messages.store') }}" method="POST">
            {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
            {{ csrf_field() }}
            <p>
                <label for="nombre">nombre
                    <input class="form-control" type="text" name="nombre" id="" value="{{ old('nombre') }}" />
                    {!! $errors->first('nombre', '<span class="error">:message</span>') !!}
                </label>
            </p>
            <p>
                <label for="email">email
                    <input class="form-control" type="email" name="email" id="" value="{{ old('email') }}" />
                    {!! $errors->first('email', '<span class="error">:message</span>') !!}
                </label>
            </p>
            <p>
                <label for="mensaje">mensaje
                    <textarea class="form-control" name="mensaje" id="" cols="40" rows="5">{{ old('mensaje') }}</textarea>
                    {!! $errors->first('mensaje', '<span class="error">:message</span>') !!}
                </label>
            </p>

            <input class="btn btn-primary" type="submit" value="enviar" />
        </form>
    @endif
@endsection
