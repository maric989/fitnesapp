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
                <div class="">{{ $coach->experience }} years</div>
                <div>Trainer experience</div>
            </div>
        </div>
    </div>
@endsection
