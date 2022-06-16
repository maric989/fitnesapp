@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/program-card-list.css') }}" />
@endsection
@foreach($programs as $program)
    <a class="program-card relative block" href="{{ route('admin.program.get.single', ['program_id' => $program->id]) }}">
        <img src="{{ $program->coverPhoto->full_path }}" class="block full program-image" />
        <div class="program-card-overlay absolute"></div>
        <div class="program-data-top absolute semi-bold">
            <div class="flex">
                <div class="program-data-duration">
                    {{ $program->duration }} Days
                </div>
                <div class="program-data-level">
                    {{ $program->difficulty->name }}
                </div>
            </div>
        </div>
        <div class="program-data-bottom absolute">
            <div class="program-data-title semi-bold">{{ $program->title }}</div>
            <div class="program-data-description">{{ $program->short_description }}</div>
            <div class="program-additional-info flex">
                <div class="program-additional-info-item font-medium-weight flex v-align-center">{{ $program->focuses->name }}</div>
                <div class="program-additional-info-item font-medium-weight flex v-align-center">{{ $program->intensity->name }}</div>
            </div>
        </div>
    </a>
@endforeach
