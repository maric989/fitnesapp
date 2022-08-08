@extends('admin.structure.admin-container')
@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/lesson-view.css') }}" />
@endsection
@section('admin-container')
    @include('admin/common/search-bar', ['placeholder' => 'Search Lessons..'])
    @include('admin/common/title-bar', [
        'title' => $lesson->title,
        'back_link' => $back_route_name,
        'back_link_parameters' => $back_route_param,
        'back_link_title' => 'Back to Lessons',
        'title_options' => [
            ['title' => 'Edit', 'route' => 'admin.lesson.edit', 'route_parameters' => ['lesson_id' =>  $lesson->id]],
        ]
    ])

    <div class="flex space-between lesson-view-container">
        <div class="lesson-view-main-data">
            <div class="lesson-view-image relative">
                <img src="{{ $lesson->coverImage->full_path }}" class="full block" />
                <div class="images-overlay absolute flex v-align-center h-align-center">
                    <div class="play-button"></div>
                </div>
            </div>
            <div class="lesson-view-data">
                <div class="flex space-between">
                    <div class="flex v-align-center">
                        <div class="level-view flex v-align-center">
                            {{ $lesson->difficulty->name }}
                        </div>
                    </div>
                    <div class="flex">
                        <div class="tag-option flex v-align-center">{{ $lesson->difficulty->name }}</div>
                    </div>
                </div>
            </div>
            <div class="lesson-view-text">{{ $lesson->full_description }}</div>
        </div>
        <div class="lesson-side-data">
            @if (!empty($lesson->coach))
                <a class="lesson-coach table full" href="{{ route('admin.coach.show', ['coach_id' => $lesson->coach->id]) }}">
                    <div class="image table-cell">
                        <img src="{{ $lesson->coach->profileImage->full_path }}" class="block full" />
                    </div>
                    <div class="lesson-coach-data table-cell v-align-middle">
                        <div class="lesson-coach-data-info flex h-align-center v-align-center space-between">
                            <div class="lesson-coach-title">
                                <div class="lesson-coach-name bold">
                                    {{ $lesson->coach->first_name }} {{ $lesson->coach->last_name }}
                                </div>
                                <div>Coach</div>
                            </div>
                            <div class="lesson-coach-more-container">
                                <div class="lesson-coach-more"></div>
                            </div>
                        </div>
                    </div>
                </a>
            @endif
        </div>

    </div>

@endsection
