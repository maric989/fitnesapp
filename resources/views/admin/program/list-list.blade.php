@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/program-list-list.css') }}" />
@endsection
<div class="table full data-grid">
    <div class="table-row head bold">
        <div class="table-cell program-list-image-column"></div>
        <div class="table-cell semi-bold">Title</div>
        <div class="table-cell semi-bold">Focus</div>
        <div class="table-cell semi-bold">Difficulty</div>
        <div class="table-cell semi-bold">Intensity</div>
        <div class="table-cell semi-bold">Duration</div>
    </div>
    @foreach($programs as $program)
        <a class="table-row body program-list-link" href="{{ route('admin.program.get.single', ['program_id' => $program->id]) }}">
            <div class="table-cell program-list-image-column">
                <div style="background-image: url('{{ $program->coverPhoto->full_path }}')" class="program-list-image"></div>
            </div>
            <div class="table-cell v-align-middle">{{ $program->title }}</div>
            <div class="table-cell v-align-middle">{{ $program->focuses->name }}</div>
            <div class="table-cell v-align-middle">{{ $program->difficulty->name }}</div>
            <div class="table-cell v-align-middle">{{ $program->intensity->name }}</div>
            <div class="table-cell v-align-middle">{{ $program->duration }} Days</div>
        </a>
    @endforeach
</div>
