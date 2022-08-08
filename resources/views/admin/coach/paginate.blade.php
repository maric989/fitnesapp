@extends('admin.structure.admin-container')
@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/coach-list.css') }}" />
@endsection
@section('admin-container')
    @include('admin/common/search-bar', ['placeholder' => 'Search Coaches..', 'action' => route('admin.coach.paginate')])
    @include('admin/common/title-bar', ['title' => 'Coaches', 'new_route' => 'admin.coach.create', 'new_title' => '+ New coach'])

    @if($coaches)
        <div class="flex flex-wrap coach-list-container">
            @foreach($coaches as $coach)
                <a href="{{ route('admin.coach.show', ['coach_id' => $coach->id]) }}" class="block relative one-coach-list">
                    <div>
                        <img src="{{ $coach->profileImage->full_path }}" class="full block coach-list-image" />
                    </div>
                    <div class="flex space-between coach-list-bottom-data v-align-center">
                        <div class="coach-list-bottom-data-title semi-bold">{{ $coach->first_name }} {{ $coach->last_name }}</div>
                        <div class="coach-list-more"></div>
                    </div>
                    <div class="coach-list-over-data absolute flex v-align-center">
                        <div class="coach-list-over-data-content">
                            <div class="flex v-align-center">
                                <div class="coach-list-over-data-image-container">
                                    <img src="{{ $coach->profileImage->full_path }}" class="block coach-list-over-data-image" />
                                </div>
                                <div>
                                    <div class="coach-list-over-data-name semi-bold">{{ $coach->first_name }} {{ $coach->last_name }}</div>
                                    <div class="coach-list-over-data-title">Coach</div>
                                </div>
                            </div>
                            <div class="coach-list-over-data-about semi-bold center">{{ $coach->about }}</div>
                            <div class="coach-list-over-data-bio">{{ substr($coach->bio, 0, 300) }}</div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        {{ $coaches->links('admin/structure/paginate') }}
    @endif
@endsection
