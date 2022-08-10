@extends('admin.structure.admin-container')
@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/manage-form.css') }}" />
@endsection
@section('admin-container')
    @include('admin/common/search-bar', ['placeholder' => 'Search Programs..', 'action' => route('admin.program.paginate')])
    @include('admin/common/title-bar', ['title' => 'Edit banners', 'back_link' => 'admin.settings.index', 'back_link_title' => 'Back to Settings'])

    <div class="admin-manage-form-container">
        <div class="admin-manage-form">
            @if($errors->any())
                <div class="error-message">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <form action="" method="POST">
                @csrf
                <div class="flex space-between">
                    <div class="admin-manage-form-side">
                        <div class="admin-manage-form-side-title semi-bold">Footer CTA banner</div>
                        <label for="headline_text" class="form-label block">Headline text</label>
                        <div class="form-element">
                            <input name="headline_text" id="headline_text" placeholder="Insert headline text " value="{{ old('headline_text', $banners['footer_cta_banner']['headline_text'] ?? null) }}" class="@error('headline_text') error @enderror" />
                        </div>
                        <label for="body_text" class="form-label block">Body text</label>
                        <div class="form-element">
                            <textarea name="body_text" id="body_text" class="admin-small-textarea @error('body_text') error @enderror" placeholder="Insert body text">{{ old('body_text', $banners['footer_cta_banner']['body_text'] ?? null) }}</textarea>
                        </div>
                        <label for="button_text" class="form-label block">Button text</label>
                        <div class="form-element">
                            <input name="button_text" id="button_text" placeholder="Insert button text" value="{{ old('button_text', $banners['footer_cta_banner']['button_text'] ?? null) }}" class="@error('headline_text') error @enderror" />
                        </div>
                        <label for="button_link" class="form-label block">Button link</label>
                        <div class="form-element">
                            <input name="button_link" id="button_link" placeholder="Insert button link" value="{{ old('button_link', $banners['footer_cta_banner']['button_link'] ?? null) }}" class="@error('button_link') error @enderror" />
                        </div>
                    </div>
                    <div class="admin-manage-form-side">
                        <div class="admin-manage-form-side-title semi-bold">Frontpage banner subtext</div>
                        <label for="banner_subtext_left" class="form-label block">Banner subtext (left)</label>
                        <div class="form-element">
                            <input name="banner_subtext_left" id="banner_subtext_left" placeholder="Insert text" value="{{ old('banner_subtext_left', $banners['frontpage_banner']['banner_subtext_left'] ?? null) }}" class="@error('banner_subtext_left') error @enderror" />
                        </div>
                        <label for="banner_subtext_right" class="form-label block">Banner subtext (right)</label>
                        <div class="form-element">
                            <input name="banner_subtext_right" id="banner_subtext_right" placeholder="Insert text" value="{{ old('banner_subtext_right', $banners['frontpage_banner']['banner_subtext_right'] ?? null) }}" class="@error('banner_subtext_right') error @enderror" />
                        </div>
                    </div>
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
