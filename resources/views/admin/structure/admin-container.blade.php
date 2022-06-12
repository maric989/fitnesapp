@extends('structure.container')
@section('head-css')
    <link rel="stylesheet" href="{{ mix('/css/admin/general.css') }}" />
@endsection
@section('main-container')
    <div class="admin-container">
        <div class="admin-left-menu fixed">
            @include('admin.structure.left-menu')
        </div>
        <div class="admin-body">
            <div class="admin-content">
                @yield('admin-container')
            </div>
        </div>
    </div>
@endsection
