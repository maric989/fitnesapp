@extends('admin.structure.admin-container')
@section('admin-container')
    @include('admin/common/search-bar', ['placeholder' => 'Search Programs..'])
    @include('admin/common/title-bar', ['title' => 'Users', 'view' => 'list', 'view_route' => 'admin.users.paginate'])

    @if($users)
        <div class="flex flex-wrap space-between program-list-container">
            @include('admin/users/list-list', ['users' => $users])
        </div>
        {{ $users->links('admin/structure/paginate') }}
    @endif
@endsection
