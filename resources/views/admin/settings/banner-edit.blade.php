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
            <form action="{{ route('admin.settings.banners.update') }}" method="POST">
                @csrf
                <div class="flex space-between">
                    <div class="admin-manage-form-side">
                        <div class="admin-manage-form-side-title semi-bold">Footer CTA banner</div>
                        <label for="footer_headline_text" class="form-label block">Headline text</label>
                        <div class="form-element">
                            <input name="footer_headline_text" id="footer_headline_text" placeholder="Insert headline text " value="{{ old('footer_headline_text', $banners['footer_cta_banner']['headline_text'] ?? null) }}" class="@error('headline_text') error @enderror" />
                        </div>
                        <label for="footer_body_text" class="form-label block">Body text</label>
                        <div class="form-element">
                            <textarea name="footer_body_text" id="body_text" class="admin-small-textarea @error('footer_body_text') error @enderror" placeholder="Insert body text">{{ old('footer_body_text', $banners['footer_cta_banner']['body_text'] ?? null) }}</textarea>
                        </div>
                        <label for="footer_button_text" class="form-label block">Button text</label>
                        <div class="form-element">
                            <input name="footer_button_text" id="footer_button_text" placeholder="Insert button text" value="{{ old('footer_button_text', $banners['footer_cta_banner']['button_text'] ?? null) }}" class="@error('footer_button_text') error @enderror" />
                        </div>
                        <label for="footer_button_link" class="form-label block">Button link</label>
                        <div class="form-element">
                            <input name="footer_button_link" id="footer_button_link" placeholder="Insert button link" value="{{ old('footer_button_link', $banners['footer_cta_banner']['button_link'] ?? null) }}" class="@error('footer_button_link') error @enderror" />
                        </div>
                    </div>
                    <div class="admin-manage-form-side">
                        <div class="admin-manage-form-side-title semi-bold">Frontpage banner subtext</div>
                        <label for="frontpage_banner_subtext_left" class="form-label block">Banner subtext (left)</label>
                        <div class="form-element">
                            <input name="frontpage_banner_subtext_left" id="frontpage_banner_subtext_left" placeholder="Insert text" value="{{ old('frontpage_banner_subtext_left', $banners['frontpage_banner']['banner_subtext_left'] ?? null) }}" class="@error('frontpage_banner_subtext_left') error @enderror" />
                        </div>
                        <label for="frontpage_banner_subtext_right" class="form-label block">Banner subtext (right)</label>
                        <div class="form-element">
                            <input name="frontpage_banner_subtext_right" id="frontpage_banner_subtext_right" placeholder="Insert text" value="{{ old('frontpage_banner_subtext_right', $banners['frontpage_banner']['banner_subtext_right'] ?? null) }}" class="@error('frontpage_banner_subtext_right') error @enderror" />
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
