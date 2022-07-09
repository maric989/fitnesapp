<form action="{{ route('admin.coach.store') }}" enctype="multipart/form-data" method="POST">
    @csrf
    <input type="text" name="first_name">
    <input type="text" name="last_name">
    <input type="text" name="about">
    <input type="number" name="experience">
    <input type="text" name="bio">
    <input type="file" name="profile_picture">

    <button type="submit"> Save </button>
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
