@extends('admin.structure.admin-container')
@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/manage-form.css') }}" />
@endsection
@section('admin-container')
    @include('admin/common/search-bar', ['placeholder' => 'Search Programs..'])
    @include('admin/common/title-bar', ['title' => $manage_title, 'back_link' => 'admin.program.paginate', 'back_link_title' => 'Back to Programs'])
    <div class="admin-manage-form-container">
        <div class="admin-manage-form">
            @if($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <form action="{{ route($action_route, $action_route_params) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex space-between">
                    <div class="admin-manage-form-side">
                        <label for="title" class="form-label block">Title</label>
                        <div class="form-element">
                            <input name="title" id="title" placeholder="Insert program title" value="{{ old('title', $program->title ?? null) }}" class="@error('title') error @enderror" />
                        </div>
                        <label for="focus_id" class="form-label block">Focus</label>
                        <div class="form-element">
                            <select name="focus_id" id="focus_id" class="@error('focus_id') error @enderror">
                                <option value="">Select program focus</option>
                                @foreach($focuses as $focus)
                                    <option value="{{ $focus->id }}" @if(old('focus_id', $program->focus_id ?? null) == $focus->id) selected @endif>{{ $focus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="trailer_id" class="form-label block">Enter video ID</label>
                        <div class="form-element">
                            <input name="trailer_id" id="trailer_id" placeholder="Enter Video ID" value="{{ old('trailer_id', $program->trailer_id ?? null) }}" class="@error('trailer_id') error @enderror" />
                        </div>
                        <label for="duration" class="form-label block">Duration (number of days)</label>
                        <div class="form-element form-duration-container" data-current-value="{{ old('duration', $program->duration ?? 1) }}" data-field-id="duration" data-handle-id="duration-handle">
                            <div class="form-duration">
                                <div class="ui-slider-handle form-duration-handle" id="duration-handle"></div>
                            </div>
                            <input name="duration" id="duration" value="{{ old('duration', $program->duration ?? 1) }}" />
                        </div>
                        <label for="difficulty_id" class="form-label block">Difficulty</label>
                        <div class="form-element">
                            <select name="difficulty_id" id="difficulty_id" class="@error('difficulty_id') error @enderror">
                                <option value="">Select program difficulty</option>
                                @foreach($difficulties as $difficult)
                                    <option value="{{ $difficult->id }}" @if(old('difficulty_id', $program->difficulty_id ?? null) == $difficult->id) selected @endif>{{ $difficult->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="admin-manage-form-side">
                        <label for="short_description" class="form-label block">Overview</label>
                        <div class="form-element">
                            <textarea name="short_description" id="short_description" class="admin-small-textarea @error('short_description') error @enderror" placeholder="Insert program short description (max. 250 characters)">{{ old('short_description', $program->short_description ?? null) }}</textarea>
                        </div>
                        <label for="intensity_id" class="form-label block">Intensity</label>
                        <div class="form-element">
                            <select name="intensity_id" id="intensity_id" class="@error('intensity_id') error @enderror">
                                <option value="">Select program intensity</option>
                                @foreach($intensities as $intensity)
                                    <option value="{{ $intensity->id }}" @if(old('intensity_id', $program->intensity_id ?? null) == $intensity->id) selected @endif>{{ $intensity->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="cover_image" class="form-label block">Video cover image (16:9 image ratio)</label>
                        <div class="form-element">
                            <div
                                class="upload-file-container flex v-align-center h-align-center pointer"
                            @if(isset($program) && !empty($program->coverPhoto)) style="background-image: url('{{ $program->coverPhoto->full_path }}')" @endif>
                                <input type="file" name="cover_image" id="cover_image" class="input-file" />
                                <div class="upload-file-content">
                                    Choose a file
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <label for="full_description" class="form-label block">Full program description</label>
                <div class="form-element">
                    <textarea name="full_description" id="full_description" class="admin-big-textarea @error('full_description') error @enderror" placeholder="Insert program full description (max. 2000 characters)">{{ old('full_description', $program->full_description ?? null) }}</textarea>
                </div>
                <div class="form-buttons flex h-align-center">
                    <div class="form-button-content">
                        <a href="{{ route('admin.program.paginate') }}" class="button cancel link-button flex v-align-center">Cancel</a>
                    </div>
                    <div class="form-button-content">
                        <input type="submit" value="Save" class="button" />
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
