@extends('admin.structure.admin-container')
@section('admin-container')
    @include('admin/common/search-bar', ['placeholder' => 'Search Programs..'])
    @include('admin/common/title-bar', ['title' => 'Coaches', 'view' => 'list', 'view_route' => 'admin.coach.paginate', 'new_route' => 'admin.coach.create', 'new_title' => '+ New coach'])

    @if($coaches)
        <div class="flex flex-wrap space-between program-list-container">
            @include('admin/coach/list', ['coaches' => $coaches])
        </div>
        {{ $coaches->links('admin/structure/paginate') }}
    @endif
@endsection
