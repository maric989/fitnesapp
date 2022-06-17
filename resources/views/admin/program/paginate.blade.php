@extends('admin.structure.admin-container')
@section('admin-container')
    @include('admin/common/search-bar', ['placeholder' => 'Search Programs..'])
    @include('admin/common/title-bar', ['title' => 'Programs', 'view' => $view, 'view_route' => 'admin.program.paginate', 'new_route' => 'admin.program.store.get', 'new_title' => '+ New program'])

    @if($programs)
        <div class="flex flex-wrap space-between program-list-container">
            @if($view == 'list')
                @include('admin/program/list-list', ['programs' => $programs])
            @else
                @include('admin/program/card-list', ['programs' => $programs])
            @endif
        </div>
        {{ $programs->links('admin/structure/paginate') }}
    @endif
@endsection
