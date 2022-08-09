@extends('admin.structure.admin-container')
@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/coach-view.css') }}" />
@endsection
@section('admin-container')
    @include('admin/common/search-bar', ['placeholder' => 'Search Coaches..'])
    @include('admin/common/title-bar', [
        'title' => $manage_title,
        'back_link' => 'admin.coach.paginate',
        'back_link_title' => 'Back to Coaches',
        'title_options' => [
            ['title' => 'Edit', 'route' => 'admin.coach.edit', 'route_parameters' => ['coach_id' =>  $coach->id]],
        ]
    ])
    <div class="flex space-between coach-view-container">
        <div class="image">
            <img src="{{ $coach->profileImage->full_path }}" class="block full" />
        </div>
        <div class="coach-data">
            <div class="coach-option">
                <div class="coach-option-title bold">{{ $coach->experience }} years</div>
                <div class="coach-option-description">Trainer experience</div>
            </div>
            <div class="coach-text">
                @if($coach->about)
                    <div class="coach-about bold">{{ $coach->about }}</div>
                @endif
                @if($coach->bio)
                    <div class="coach-bio">{{ $coach->bio }}</div>
                @endif
            </div>
        </div>
    </div>
    @if($coach->lessons->count() > 0)
        <div class="program-view-lessons">
            <div class="title semi-bold">Lessons</div>
            <div class="lessons-list">
                <div class="flex space-between">
                    <a class="first-lesson relative" href="{{ route('admin.lesson.show', $coach->lessons[0]->id) }}">
                        <img src="{{ $coach->lessons[0]->coverImage->full_path }}" class="block full lesson-list-image" />
                        <div class="images-lesson-overlay absolute flex v-align-center h-align-center">
                            <div class="play-normal"></div>
                        </div>
                        <div class="lesson-data-top absolute">
                            <div class="flex">
                                <div class="additional-info-item font-medium-weight flex v-align-center pointer">
                                    {{ $coach->lessons[0]->intensity->name }}
                                </div>
                                <div class="additional-info-item font-medium-weight flex v-align-center pointer">
                                    {{ $coach->lessons[0]->difficulty->name }}
                                </div>
                            </div>
                        </div>
                        <div class="lesson-data-bottom absolute">
{{--                            <div class="lesson-day">Day {{ $coach->lessons[0]->pivot->day }}</div>--}}
                            <div class="lesson-title font-medium-weight">{{ $coach->lessons[0]->title }}</div>
                            <div class="lesson-description">{{ $coach->lessons[0]->short_description }}</div>
                        </div>
                    </a>
                    @if ($coach->lessons->count() > 1)
                        <div class="second-lessons">
                            <div class="second-lesson">
                                <div class="second-lesson-content-top">
                                    <a href="{{ route('admin.lesson.show', $coach->lessons[1]->id) }}" class="second-lesson-data relative block" style="background-image: url('{{ $coach->lessons[1]->coverImage->full_path }}')">
                                        <div class="images-lesson-overlay absolute flex v-align-center h-align-center">
                                            <div class="play-normal second"></div>
                                        </div>
                                        <div class="lesson-data-top second absolute">
{{--                                            <div class="lesson-day">Day {{ $coach->lessons[1]->pivot->day }}</div>--}}
                                        </div>
                                        <div class="lesson-data-bottom second absolute">
                                            <div class="lesson-title font-medium-weight">{{ $coach->lessons[1]->title }}</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            @if ($coach->lessons->count() > 2)
                                <div class="second-lesson">
                                    <div class="second-lesson-content-bottom">
                                        <a href="{{ route('admin.lesson.show', $coach->lessons[2]->id) }}" class="second-lesson-data relative block" style="background-image: url('{{ $coach->lessons[2]->coverImage->full_path }}')">
                                            <div class="images-lesson-overlay absolute flex v-align-center h-align-center">
                                                <div class="play-normal second"></div>
                                            </div>
                                            <div class="lesson-data-top second absolute">
{{--                                                <div class="lesson-day">Day {{ $coach->lessons[2]->pivot->day }}</div>--}}
                                            </div>
                                            <div class="lesson-data-bottom second absolute">
                                                <div class="lesson-title font-medium-weight">{{ $coach->lessons[2]->title }}</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
                @if ($coach->lessons->count() > 3)
                    <div class="flex flex-wrap space-between more-lessons">
                        @foreach($coach->lessons as $key => $lesson)
                            @if($key > 2)
                                <a class="other-lesson relative" href="{{ route('admin.lesson.show', $lesson->id) }}">
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
{{--                                        <div class="lesson-day">Day {{ $lesson->pivot->day }}</div>--}}
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
