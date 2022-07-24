@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/program-list-list.css') }}" />
@endsection
<div class="table full data-grid">
    <div class="table-row head bold">
        <div class="table-cell program-list-image-column"></div>
        <div class="table-cell semi-bold">Name</div>
        <div class="table-cell semi-bold">Email</div>
        <div class="table-cell semi-bold">Country</div>
        <div class="table-cell semi-bold">Gender</div>
        <div class="table-cell semi-bold">Action</div>
    </div>
    @foreach($users as $user)
        <a class="table-row body program-list-link" href="{{ route('admin.user.edit', ['user_id' => $user->id]) }}">
            <div class="table-cell v-align-middle">{{ $user->first_name }} {{ $user->last_name }}</div>
            <div class="table-cell v-align-middle">{{ $user->email }}</div>
            <div class="table-cell v-align-middle">{{ $user->country->name }}</div>
            <div class="table-cell v-align-middle"></div>
        </a>
    @endforeach
</div>
