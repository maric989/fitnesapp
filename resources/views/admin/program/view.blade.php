@extends('admin.structure.admin-container')
@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/program-view.css') }}" />
@endsection
@section('admin-container')
    <div class="program-view-header" style="background-image: url('{{ $program->coverPhoto->full_path }}');">
        @include('admin/common/search-bar', ['placeholder' => 'Search Programs..'])
        @include('admin/common/title-bar', ['title' => $program->title])
    </div>

@endsection
