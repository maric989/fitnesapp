@extends('admin.structure.admin-container')
@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/settings-index.css') }}" />
@endsection
@section('admin-container')
    @include('admin/common/search-bar', ['placeholder' => 'Search Programs..', 'action' => route('admin.program.paginate')])
    @include('admin/common/title-bar', ['title' => 'Settings'])
    <div class="settings-container flex space-between">
        <div class="settings-side">
            <div class="settings-option admin active">
                <div class="setting-option-option flex v-align-center bold">Admin settings</div>
            </div>
            <div class="settings-option user">
                <div class="setting-option-option flex v-align-center bold">User Management</div>
            </div>
        </div>
        <div class="settings-side">
            <div class="setting-data">
                <div class="settings-data-title bold">Admin setting</div>
                <div class="settings-data-options">
                    <a href="{{ route('admin.settings.filters.edit') }}" class="settings-data-option flex space-between v-align-center">
                        <div>
                            <div class="settings-data-option-title bold">Edit filters</div>
                            <div class="settings-data-option-description">You can edit filters</div>
                        </div>
                        <div class="settings-data-option-more"></div>
                    </a>
                    <a href="{{ route('admin.settings.banners.edit') }}" class="settings-data-option flex space-between v-align-center">
                        <div>
                            <div class="settings-data-option-title bold">Edit banners</div>
                            <div class="settings-data-option-description">You can edit frontpage header and footer CTA banner</div>
                        </div>
                        <div class="settings-data-option-more"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
