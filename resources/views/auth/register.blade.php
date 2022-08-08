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
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <label for="first_name" class="form-label block">First name</label>
            <div class="form-element">
                <input name="first_name" id="first_name" value="{{ old('first_name') }}" class="@error('first_name') error @enderror" />
            </div>
            <label for="last_name" class="form-label block">Last name</label>
            <div class="form-element">
                <input name="last_name" id="last_name" value="{{ old('last_name') }}" class="@error('last_name') error @enderror" />
            </div>
            <label for="gender" class="form-label block">Gender</label>
            <div class="form-element">
                <select name="gender" id="gender" class="@error('gender') error @enderror">
                    @foreach($genders as $gender)
                        <option value="{{$gender}}">{{ucfirst($gender)}}</option>
                    @endforeach
                </select>
            </div>
            <label for="country_id" class="form-label block">Country</label>
            <div class="form-element">
                <select name="country_id" id="country_id" class="@error('country_id') error @enderror">
                    @foreach($countries as $country)
                        <option value="{{$country->id}}">{{ucfirst($country->name)}}</option>
                    @endforeach
                </select>
            </div>
            <label for="birthday" class="form-label block">Birthday</label>
            <div class="form-element">
                <input type="date" name="birthday" id="birthday" value="{{ old('birthday') }}" class="@error('birthday') error @enderror" />
            </div>
            <label for="email" class="form-label block">Email</label>
            <div class="form-element">
                <input name="email" id="email" value="{{ old('email') }}" placeholder="Enter username or email" class="@error('password') error @enderror" />
            </div>
            <label for="password" class="form-label block">Password</label>
            <div class="form-element">
                <input type="password" id="password" name="password" placeholder="Enter password" class="@error('password') error @enderror" />
            </div>
            <label for="password_confirmation" class="form-label block">Password Repeat</label>
            <div class="form-element">
                <input type="password_confirmation" id="password_confirmation" name="password_confirmation" placeholder="Enter password" class="@error('password_confirmation') error @enderror" />
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
