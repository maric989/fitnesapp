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
                    'action_buttons' => [
                        ['title' => 'Add Lessons', 'route' => route('admin.program.add-lesson.get', ['program_id' => $program->id])]
                    ],
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

    @if($program->lessons->count() > 0)
        <div class="program-view-lessons">
            <div class="title semi-bold">Lessons</div>
            <div class="lessons-list">
                <div class="flex space-between">
                    <a class="first-lesson relative" href="{{ route('admin.lesson.edit', $program->lessons[0]->id) }}">
                        <img src="{{ $program->lessons[0]->coverImage->full_path }}" class="block full lesson-list-image" />
                        <div class="images-lesson-overlay absolute flex v-align-center h-align-center">
                            <div class="play-normal"></div>
                        </div>
                        <div class="lesson-data-top absolute">
                            <div class="flex">
                                <div class="additional-info-item font-medium-weight flex v-align-center pointer">
                                    {{ $program->lessons[0]->intensity->name }}
                                </div>
                                <div class="additional-info-item font-medium-weight flex v-align-center pointer">
                                    {{ $program->lessons[0]->difficulty->name }}
                                </div>
                            </div>
                        </div>
                        <div class="lesson-data-bottom absolute">
                            <div class="lesson-day">Day {{ $program->lessons[0]->pivot->day }}</div>
                            <div class="lesson-title font-medium-weight">{{ $program->lessons[0]->title }}</div>
                            <div class="lesson-description">{{ $program->lessons[0]->short_description }}</div>
                        </div>
                    </a>
                    @if ($program->lessons->count() > 1)
                        <div class="second-lessons">
                            <div class="second-lesson">
                                <a href="{{ route('admin.lesson.edit', $program->lessons[1]->id) }}" class="relative block">
                                    <img src="{{ $program->lessons[1]->coverImage->full_path }}" class="block full lesson-list-image" />
                                    <div class="images-lesson-overlay absolute flex v-align-center h-align-center">
                                        <div class="play-normal second"></div>
                                    </div>
                                    <div class="lesson-data-top second absolute">
                                        <div class="lesson-day">Day {{ $program->lessons[1]->pivot->day }}</div>
                                    </div>
                                    <div class="lesson-data-bottom second absolute">
                                        <div class="lesson-title font-medium-weight">{{ $program->lessons[1]->title }}</div>
                                    </div>
                                </a>
                            </div>
                            @if ($program->lessons->count() > 2)
                                <div class="second-lesson">
                                    <a href="{{ route('admin.lesson.edit', $program->lessons[2]->id) }}" class="relative block">
                                        <img src="{{ $program->lessons[2]->coverImage->full_path }}" class="block full lesson-list-image" />
                                        <div class="images-lesson-overlay absolute flex v-align-center h-align-center">
                                            <div class="play-normal second"></div>
                                        </div>
                                        <div class="lesson-data-top second absolute">
                                            <div class="lesson-day">Day {{ $program->lessons[2]->pivot->day }}</div>
                                        </div>
                                        <div class="lesson-data-bottom second absolute">
                                            <div class="lesson-title font-medium-weight">{{ $program->lessons[2]->title }}</div>
                                        </div>
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
                @if ($program->lessons->count() > 3)
                    <div class="flex flex-wrap space-between more-lessons">
                        @foreach($program->lessons as $key => $lesson)
                            @if($key > 2)
                                <a class="other-lesson relative" href="{{ route('admin.lesson.edit', $lesson->id) }}">
                                    <img src="{{ $lesson->coverImage->full_path }}" class="block full lesson-list-image" />
                                    <div class="images-lesson-overlay absolute flex v-align-center h-align-center">
                                        <div class="play-normal other"></div>
                                    </div>
                                    <div class="lesson-data-top absolute">
                                        <div class="flex">
                                            <div class="additional-info-item font-medium-weight flex v-align-center pointer">
                                                {{ $lesson->intensity->name }}
                                            </div>
                                            <div class="additional-info-item font-medium-weight flex v-align-center pointer">
                                                {{ $lesson->difficulty->name }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lesson-data-bottom absolute">
                                        <div class="lesson-day">Day {{ $lesson->pivot->day }}</div>
                                        <div class="lesson-title font-medium-weight">{{ $lesson->title }}</div>
                                    </div>
                                </a>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    @endif

@endsection
