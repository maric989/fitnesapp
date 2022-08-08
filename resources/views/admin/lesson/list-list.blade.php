@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/program-list-list.css') }}" />
@endsection
<div class="table full data-grid">
    <div class="table-row head bold">
        <div class="table-cell program-list-image-column"></div>
        <div class="table-cell semi-bold">Title</div>
        <div class="table-cell semi-bold">Difficulty</div>
        <div class="table-cell semi-bold">Intensity</div>
        <div class="table-cell semi-bold">Lesson Belongs To</div>
    </div>
    @foreach($lessons as $lesson)
        <a class="table-row body program-list-link" href="{{ route('admin.lesson.show', ['lesson_id' => $lesson->id]) }}">
            <div class="table-cell program-list-image-column">
                <div style="background-image: url('{{ $lesson->coverImage->full_path }}')" class="program-list-image"></div>
            </div>
            <div class="table-cell v-align-middle">{{ $lesson->title }}</div>
            <div class="table-cell v-align-middle">{{ $lesson->difficulty->name }}</div>
            <div class="table-cell v-align-middle">{{ $lesson->intensity->name }}</div>
            <div class="table-cell v-align-middle">{{ implode(',', $lesson->programsTitle()) }}</div>
        </a>
    @endforeach
</div>
