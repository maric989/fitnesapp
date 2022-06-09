@extends('structure/container')
@section('head-css')
    <link rel="stylesheet" href="{{ mix('/css/auth/auth.css') }}" />
    <link rel="stylesheet" href="{{ mix('/css/general/form.css') }}" />
@endsection
@section('main-container')
    <div class="auth-container h-full fixed full">
        <div class="auth-content">
            <div class="flex space-between h-full">
                <div class="h-full">
                    <a href="/">
                        <img src="{{ asset('/images/auth-logo.png') }}" class="block" alt="My Aura" />
                    </a>
                    <div class="auth-left flex flex-column h-align-center">
                        <div class="auth-left-title bold">
                            Welcome to a healthier you
                        </div>
                        <div class="auth-left-text">
                            Nice to see you! Go ahead, log in to continue your journey.
                        </div>
                    </div>
                </div>
                <div class="h-full flex v-align-center">
                    <div class="auth-container-form">
                        @yield('auth-container')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
