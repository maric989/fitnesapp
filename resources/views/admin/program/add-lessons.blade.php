@extends('admin.structure.admin-container')
@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/program-list-list.css') }}" />
@endsection
@section('admin-container')
    @include('admin/common/search-bar', ['placeholder' => 'Search Programs..'])
    @include('admin/common/title-bar', ['title' => 'Select from available lessons', 'back_link' => 'admin.program.get.single', 'back_link_title' => 'Back to Program', 'back_link_parameters' => $program->id])

    @if($lessons->count() > 0)
        <div class="flex flex-wrap space-between program-list-container">
            <div class="table full data-grid">
                <div class="table-row head bold">
                    <div class="table-cell program-list-image-column"></div>
                    <div class="table-cell semi-bold">Title</div>
                    <div class="table-cell semi-bold">Difficulty</div>
                    <div class="table-cell semi-bold">Intensity</div>
                    <div class="table-cell semi-bold"></div>
                </div>
                @foreach($lessons as $lesson)
                    <div class="table-row body program-list-link">
                        <div class="table-cell program-list-image-column">
                            <div style="background-image: url('{{ $lesson->coverImage->full_path }}')" class="program-list-image"></div>
                        </div>
                        <div class="table-cell v-align-middle">{{ $lesson->title }}</div>
                        <div class="table-cell v-align-middle">{{ $lesson->difficulty->name }}</div>
                        <div class="table-cell v-align-middle">{{ $lesson->intensity->name }}</div>
                        <div class="table-cell v-align-middle"></div>
                    </div>
                @endforeach
            </div>
        </div>
        {{ $lessons->links('admin/structure/paginate') }}
    @endif
@endsection
