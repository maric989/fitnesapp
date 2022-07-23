@extends('admin.structure.admin-container')
@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/manage-form.css') }}" />
@endsection
@section('admin-container')
    @include('admin/common/search-bar', ['placeholder' => 'Search Coaches..'])
    @include('admin/common/title-bar', ['title' => $manage_title, 'back_link' => 'admin.coach.paginate', 'back_link_title' => 'Back to Coaches'])
    <div class="admin-manage-form-container">
        <div class="admin-manage-form">
            @if($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <form action="{{ route($action_route, $coach->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="flex space-between">
                    <div class="admin-manage-form-side">
                        <label for="first_name" class="form-label block">First name</label>
                        <div class="form-element">
                            <input name="first_name" id="first_name" value="{{ old('first_name', $coach->first_name ?? null) }}" class="@error('first_name') error @enderror" />
                        </div>
                        <label for="about" class="form-label block">Overview</label>
                        <div class="form-element">
                            <textarea name="about" id="about" class="admin-small-textarea @error('about') error @enderror" placeholder="Insert program short description (max. 250 characters)">{{ old('about', $coach->about ?? null) }}</textarea>
                        </div>
                        <label for="experience" class="form-label block">Experience</label>
                        <div class="form-element">
                            <input type="number" name="experience" id="experience" value="{{ old('experience', $coach->experience ?? null) }}" class="@error('experience') error @enderror" />
                        </div>
                    </div>
                    <div class="admin-manage-form-side">
                        <label for="last_name" class="form-label block">Last name</label>
                        <div class="form-element">
                            <input name="last_name" id="last_name" value="{{ old('last_name', $coach->last_name ?? null) }}" class="@error('last_name') error @enderror" />
                        </div>
                        <label for="profile_picture" class="form-label block">Coach profile image (16:9 image ratio)</label>
                        <div class="form-element">
                            <div
                                class="upload-file-container flex v-align-center h-align-center pointer"
                                @if(isset($coach) && !empty($coach->profileImage)) style="background-image: url('{{ $coach->profileImage->full_path }}')" @endif>
                                <input type="file" name="profile_picture" id="profile_picture" class="input-file" />
                                <div class="upload-file-content">
                                    Choose a file
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <label for="bio" class="form-label block">Biography</label>
                <div class="form-element">
                    <textarea name="bio" id="bio" class="admin-big-textarea @error('bio') error @enderror" placeholder="Insert Coach bio (max. 2000 characters)">{{ old('bio', $coach->bio ?? null) }}</textarea>
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
