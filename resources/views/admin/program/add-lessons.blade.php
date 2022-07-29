@extends('admin.structure.admin-container')
@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/program-list-list.css') }}" />
    <link rel="stylesheet" href="{{ mix('/css/admin/manage-form.css') }}" />
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
                        <div class="table-cell v-align-middle">
                            <div class="plus-circle flex v-align-center h-align-center pointer add-lesson-action" data-lesson-id="{{ $lesson->id }}"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{ $lessons->links('admin/structure/paginate') }}
    @endif
    <div class="add-lesson-container fixed flex v-align-center h-align-center hide" id="add-lesson-popup">
        <div class="add-lesson-box relative">
            <div class="add-lesson-close pointer absolute" id="add-lesson-close"></div>
            <div class="add-lesson-box-content">
                <div class="title bold">Select Allocation</div>
                <div class="add-lesson-form">
                    <form method="POST" action="{{ route('admin.program.add-lesson.store', ['program_id' => $program->id]) }}">
                        <input type="hidden" name="lesson_id" id="add-lesson-id" />
                        @csrf
                        <div class="form-element form-duration-container" data-current-value="1" data-max-value="{{ $program->duration }}" data-available-values="{{ $free_days }}" data-field-id="day" data-handle-id="day-handle">
                            <div class="form-duration">
                                <div class="ui-slider-handle form-duration-handle" id="day-handle"></div>
                            </div>
                            <input name="day" id="day" value="1" />
                        </div>
                        <div class="button-container flex h-align-right">
                            <input type="submit" value="Save" class="button cancel" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
