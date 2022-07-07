@extends('admin.structure.admin-container')
@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/manage-form.css') }}" />
@endsection
@section('admin-container')
    @include('admin/common/search-bar', ['placeholder' => 'Search Lessons..'])
    @include('admin/common/title-bar', ['title' => $manage_title, 'back_link' => 'admin.program.get.single', 'back_link_parameters' => $program->id, 'back_link_title' => 'Back to Lessons'])
    <div class="admin-manage-form-container">
        <div class="admin-manage-form">
            @if($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <form action="{{ route($action_route) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex space-between">
                    <div class="admin-manage-form-side">
                        <label for="program_id" class="form-label block">Program</label>
                        <div class="form-element">
                            @if (!empty($program))
                                <input type="hidden" name="program_id" value="{{ $program->id }}" />
                                <input id="program_id" readonly value="{{ $program->title }}" />
                            @else
                                <select name="intensity_id" id="intensity_id" class="@error('intensity_id') error @enderror">
                                    <option value="">Select lesson intensity</option>
                                    @foreach($intensities as $intensity)
                                        <option value="{{ $intensity->id }}" @if(old('intensity_id', $lesson->intensity_id ?? null) == $intensity->id) selected @endif>{{ $intensity->name }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <label for="title" class="form-label block">Title</label>
                        <div class="form-element">
                            <input name="title" id="title" placeholder="Insert lesson title" value="{{ old('title', $lesson->title ?? null) }}" class="@error('title') error @enderror" />
                        </div>
                        <label for="video_id" class="form-label block">Full video</label>
                        <div class="form-element">
                            <input name="video_id" id="video_id" placeholder="Enter Video ID" value="{{ old('video_id', $lesson->trailer_id ?? null) }}" class="@error('video_id') error @enderror" />
                        </div>
                        <label for="intensity_id" class="form-label block">Intensity</label>
                        <div class="form-element">
                            <select name="intensity_id" id="intensity_id" class="@error('intensity_id') error @enderror">
                                <option value="">Select lesson intensity</option>
                                @foreach($intensities as $intensity)
                                    <option value="{{ $intensity->id }}" @if(old('intensity_id', $lesson->intensity_id ?? null) == $intensity->id) selected @endif>{{ $intensity->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="duration" class="form-label block">Allocation</label>
                        <div class="form-element form-duration-container" data-current-value="{{ old('day', $intensity->day ?? 1) }}" data-max-value="{{ $program->duration }}" data-available-values="{{ $days }}" data-field-id="day" data-handle-id="day-handle">
                            <div class="form-duration">
                                <div class="ui-slider-handle form-duration-handle" id="day-handle"></div>
                            </div>
                            <input name="day" id="day" value="{{ old('day', $intensity->day ?? 1) }}" />
                        </div>
                        <label for="difficulty_id" class="form-label block">Difficulty</label>
                        <div class="form-element">
                            <select name="difficulty_id" id="difficulty_id" class="@error('difficulty_id') error @enderror">
                                <option value="">Select lesson difficulty</option>
                                @foreach($difficulties as $difficult)
                                    <option value="{{ $difficult->id }}" @if(old('difficulty_id', $lesson->difficulty_id ?? null) == $difficult->id) selected @endif>{{ $difficult->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="admin-manage-form-side">
                        <label for="short_description" class="form-label block">Overview</label>
                        <div class="form-element">
                            <textarea name="short_description" id="short_description" class="admin-small-textarea @error('short_description') error @enderror" placeholder="Insert lesson short description (max. 250 characters)">{{ old('short_description', $lesson->short_description ?? null) }}</textarea>
                        </div>
                        <label for="cover_image" class="form-label block">Video cover image (16:9 image ratio)</label>
                        <div class="form-element">
                            <div
                                class="upload-file-container flex v-align-center h-align-center pointer"
                                @if(isset($lesson) && !empty($lesson->coverPhoto)) style="background-image: url('{{ $program->coverPhoto->full_path }}')" @endif>
                                <input type="file" name="cover_image" id="cover_image" class="input-file" />
                                <div class="upload-file-content">
                                    Choose a file
                                </div>
                            </div>
                        </div>
                        <label for="coach_id" class="form-label block">Coach</label>
                        <div class="form-element">
                            <select name="coach_id" id="coach_id" class="@error('coach_id') error @enderror">
                                <option value="">Select coach</option>
                                @foreach($coaches as $coach)
                                    <option value="{{ $coach->id }}" @if(old('coach_id', $lesson->coach_id ?? null) == $coach->id) selected @endif>{{ $coach->first_name }} {{ $coach->last_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <label for="full_description" class="form-label block">Full lesson description</label>
                <div class="form-element">
                    <textarea name="full_description" id="full_description" class="admin-big-textarea @error('full_description') error @enderror" placeholder="Insert lesson full description (max. 2000 characters)">{{ old('full_description', $lesson->full_description ?? null) }}</textarea>
                </div>
                <div class="form-buttons flex h-align-center">
                    <div class="form-button-content">
                        <a href="{{ route('admin.program.get.single', ['program_id' => $program->id]) }}" class="button cancel link-button flex v-align-center">Cancel</a>
                    </div>
                    <div class="form-button-content">
                        <input type="submit" value="Save" class="button" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
