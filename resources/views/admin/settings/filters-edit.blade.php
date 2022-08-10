@extends('admin.structure.admin-container')
@section('head-css')
    @parent
@endsection
@section('admin-container')
    @include('admin/common/search-bar', ['placeholder' => 'Search Programs..', 'action' => route('admin.program.paginate')])
    @include('admin/common/title-bar', ['title' => 'Edit filters', 'back_link' => 'admin.settings.index', 'back_link_title' => 'Back to Settings'])


@endsection
