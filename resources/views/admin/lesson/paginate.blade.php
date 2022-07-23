@extends('admin.structure.admin-container')
@section('admin-container')
    @include('admin/common/search-bar', ['placeholder' => 'Search Programs..'])
    @include('admin/common/title-bar', ['title' => 'Lessons', 'view' => 'list', 'view_route' => 'admin.lessons.paginate', 'new_route' => 'admin.lesson.create', 'new_title' => '+ New lesson'])

    @if($lessons)
        <div class="flex flex-wrap space-between program-list-container">
                @include('admin/lesson/list-list', ['lessons' => $lessons])
        </div>
        {{ $lessons->links('admin/structure/paginate') }}
    @endif
@endsection
