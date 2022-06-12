<form action="{{ route('admin.program.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title">
    <input type="text" name="short_description">
    <input type="text" name="full_description">
    <input type="number" name="duration">
    <input type="number" name="focus_id" value="1">
    <input type="number" name="intensity_id" value="1">
    <input type="number" name="difficulty_id" value="1">
    <input type="number" name="trailer_id" value="1">
    <input type="file" name="cover_image">

    <button type="submit">save</button>
</form>

@if($errors->any())
    <div class="alert alert-danger">
        <p><strong>Opps Something went wrong</strong></p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
