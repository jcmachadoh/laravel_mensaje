@extends('layouts.layout')

@section('content')
    <h3>Login</h3>
    <form class="form-inline" action="/login" method="POST">
        {{ csrf_field() }}
        <input class="form-control" type="email" placeholder="email" name="email" />
        <input class="form-control" type="password" placeholder="password" name="password" />
        <input class="btn btn-primary" type="submit" value="login" />
    </form>
@endsection
