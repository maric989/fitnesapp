@extends('admin.structure.admin-container')
@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/program-view.css') }}" />
@endsection
@section('admin-container')
    <div class="program-view-header" style="background-image: url('{{ $program->coverPhoto->full_path }}');">
        <div class="program-view-header-bg">
            @include('admin/common/search-bar', ['placeholder' => 'Search Programs..', 'theme_color' => 'white'])
            @include('admin/common/title-bar',
                [
                    'title' => $program->title,
                    'theme_color' => 'white',
                    'new_route' => 'admin.lesson.create',
                    'new_title' => '+ New  Lesson',
                    'new_route_params' => ['program_id' => $program->id],
                    'title_options' => [
                        ['title' => 'Edit', 'route' => 'admin.program.edit.single', 'route_parameters' => ['program_id' =>  $program->id]],
                    ]
                ])
            <div class="program-view-data">
                <div class="program-view-data-top flex">
                    <div class="program-view-data-top-option time semi-bold">{{ $program->duration }}</div>
                    <div class="program-view-data-top-option level semi-bold">{{ $program->difficulty->name }}</div>
                </div>
                <div class="program-view-data-short-description">{{ $program->short_description }}</div>
                <div class="program-view-data-bottom flex">
                    <div class="program-view-data-bottom-option font-medium-weight flex v-align-center">{{ $program->focuses->name }}</div>
                    <div class="program-view-data-bottom-option font-medium-weight flex v-align-center">{{ $program->intensity->name }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="program-view-content">
        <div class="program-view-description">
            <div class="title semi-bold">Full program description</div>
            <div class="description">{{ $program->full_description }}</div>
        </div>
    </div>

@endsection