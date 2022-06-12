@extends('admin.structure.admin-container')
@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/manage-form.css') }}" />
@endsection
@section('admin-container')
    @include('admin/common/search-bar', ['placeholder' => 'Search Programs..'])
    @include('admin/common/title-bar', ['title' => 'Create Program', 'back_link' => 'admin.program.paginate', 'back_link_title' => 'Back to Programs'])
    <div class="admin-manage-form-container">
        <div class="admin-manage-form">
            <form action="{{ route('admin.program.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex space-between">
                    <div class="admin-manage-form-side">
                        <label for="title" class="form-label block">Title</label>
                        <div class="form-element">
                            <input name="title" id="title" placeholder="Insert program title" />
                        </div>
                        <label for="focus_id" class="form-label block">Focus</label>
                        <div class="form-element">
                            <select name="focus_id" id="focus_id">
                                <option value="">Select program focus</option>
                                @foreach($focuses as $focus)
                                    <option value="{{ $focus->id }}">{{ $focus->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="trailer_id" class="form-label block">Enter video ID</label>
                        <div class="form-element">
                            <input name="trailer_id" id="trailer_id" placeholder="Insert program title" />
                        </div>
                        <label for="duration" class="form-label block">Duration (number of days)</label>
                        <div class="form-element">
                            <input name="duration" id="duration" />
                        </div>
                        <label for="difficulty_id" class="form-label block">Difficulty</label>
                        <div class="form-element">
                            <select name="difficulty_id" id="difficulty_id">
                                <option value="">Select program difficulty</option>
                                @foreach($difficulties as $difficult)
                                    <option value="{{ $difficult->id }}">{{ $difficult->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="admin-manage-form-side">
                        <label for="short_description" class="form-label block">Overview</label>
                        <div class="form-element">
                            <textarea name="short_description" id="short_description"  class="admin-small-textarea" placeholder="Insert program short description (max. 250 characters)"></textarea>
                        </div>
                        <label for="intensity_id" class="form-label block">Intensity</label>
                        <div class="form-element">
                            <select name="intensity_id" id="intensity_id">
                                <option value="">Select program intensity</option>
                                @foreach($intensities as $intensity)
                                    <option value="{{ $intensity->id }}">{{ $intensity->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <label for="cover_image" class="form-label block">Video cover image (16:9 image ratio)</label>
                        <div class="form-element">
                            <input type="file" name="cover_image" id="cover_image" />
                        </div>
                    </div>
                </div>
                <label for="full_description" class="form-label block">Full program description</label>
                <div class="form-element">
                    <textarea name="full_description" id="full_description" class="admin-big-textarea" placeholder="Insert program full description (max. 2000 characters)"></textarea>
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
