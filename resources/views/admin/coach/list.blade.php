@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/program-list-list.css') }}" />
@endsection
<div class="table full data-grid">
    <div class="table-row head bold">
        <div class="table-cell program-list-image-column"></div>
        <div class="table-cell semi-bold">Name</div>
        <div class="table-cell semi-bold">About</div>
        <div class="table-cell semi-bold">Bio</div>
        <div class="table-cell semi-bold">Experience</div>
    </div>
    @foreach($coaches as $coach)
        <a class="table-row body program-list-link" href="{{ route('admin.lesson.edit', ['lesson_id' => 2]) }}">
            <div class="table-cell program-list-image-column">
                <div style="background-image: url('{{ $coach->profileImage->full_path }}')" class="program-list-image"></div>
            </div>
            <div class="table-cell v-align-middle">{{ $coach->first_name }} {{ $coach->last_name }}</div>
            <div class="table-cell v-align-middle">{{ $coach->about }}</div>
            <div class="table-cell v-align-middle">{{ $coach->bio }}</div>
            <div class="table-cell v-align-middle">{{ $coach->experience }}</div>
        </a>
    @endforeach
</div>
