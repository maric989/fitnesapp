@extends('structure/auth-container')
@section('auth-container')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input name="email" />
        <input type="password" name="password" />

        <input type="submit" value="Log in" />
    </form>
@endsection
