@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/program-card-list.css') }}" />
@endsection
@extends('admin.structure.admin-container')

<div class="flex flex-wrap space-between program-list-container">
    @foreach($lessons as $lesson)
        <a class="program-card relative block" href="#">
            <img src="{{ $lesson->coverImage->full_path }}" class="block full program-image" />
            <div class="program-card-overlay absolute"></div>
            <div class="program-data-top absolute semi-bold">
                <div class="flex">
                    <div class="program-data-duration">
                        {{ $lesson->duration }} Days
                    </div>
                    <div class="program-data-level">
                        {{ $lesson->difficulty->name }}
                    </div>
                </div>
            </div>
            <div class="program-data-bottom absolute">
                <div class="program-data-title semi-bold">{{ $lesson->title }}</div>
                <div class="program-data-description">{{ $lesson->short_description }}</div>
                <div class="program-additional-info flex">
                    <div class="program-additional-info-item font-medium-weight flex v-align-center">{{ $lesson->intensity->name }}</div>
                </div>
            </div>
        </a>
    @endforeach
</div>
