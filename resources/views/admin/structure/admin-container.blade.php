@extends('structure.container')
@section('main-container')
    <div>
        <div>
            @include('admin.structure.left-menu')
        </div>
        <div>
            @yield('admin-container')
        </div>
    </div>
@endsection
