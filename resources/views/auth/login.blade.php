@extends('structure/auth-container')
@section('auth-container')
    <div class="auth-form-title center">Sign in to your account</div>
    <div>
        @if($errors->any())
            <div class="error-message">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email" class="form-label block">Username or email</label>
            <div class="form-element">
                <input name="email" id="email" placeholder="Enter username or email" class="@error('password') error @enderror" />
            </div>
            <label for="password" class="form-label block">Password</label>
            <div class="form-element">
                <input type="password" id="password" name="password" placeholder="Enter password" class="@error('password') error @enderror" />
            </div>
            <div class="auth-option flex space-between">
                <div>
                    <div class="flex">
                        <div class="form-element">
                            <input type="checkbox" id="remember_me" name="remember_me" />
                        </div>
                        <label for="remember_me" class="remember block">Remember me</label>
                    </div>
                </div>
                <div>
                    <a href="">Forgot password?</a>
                </div>
            </div>
            <div class="auth-option auth-button">
                <input type="submit" value="Log in" class="button" />
            </div>
            <div class="auth-option center">
                New user? <a href="{{ route('register') }}">Register</a>
            </div>
        </form>
    </div>
@endsection
