@extends('admin.structure.admin-container')
@section('admin-container')
    @include('admin/common/search-bar', ['placeholder' => 'Search Programs..'])
    @include('admin/common/title-bar', ['title' => 'Programs', 'view' => $view, 'view_route' => 'admin.program.paginate', 'new_route' => 'admin.program.store.get'])
@endsection
