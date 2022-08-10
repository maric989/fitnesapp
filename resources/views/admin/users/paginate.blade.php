@extends('admin.structure.admin-container')
@section('head-css')
    @parent
    <link rel="stylesheet" href="{{ mix('/css/admin/program-list-list.css') }}" />
    <link rel="stylesheet" href="{{ mix('/css/admin/user-list-list.css') }}" />
@endsection
@section('admin-container')
    @include('admin/common/search-bar', ['placeholder' => 'Search Users..'])
    @include('admin/common/title-bar', ['title' => 'Users'])

    @if($users)
        <div class="user-list-container">
            <div class="flex flex-wrap space-between program-list-container">
                <div class="table full data-grid">
                    <div class="table-row head bold">
                        <div class="table-cell semi-bold">Name</div>
                        <div class="table-cell semi-bold">Email</div>
                        <div class="table-cell semi-bold">Country</div>
                        <div class="table-cell semi-bold">Gender</div>
                        <div class="table-cell semi-bold">Status</div>
                    </div>
                    @foreach($users as $user)
                        <a class="table-row body program-list-link" href="{{ route('admin.user.edit', ['user_id' => $user->id]) }}">
                            <div class="table-cell v-align-middle">{{ $user->first_name }} {{ $user->last_name }}</div>
                            <div class="table-cell v-align-middle">{{ $user->email }}</div>
                            <div class="table-cell v-align-middle">{{ $user->country->name }}</div>
                            <div class="table-cell v-align-middle">{{ $user->gender }}</div>
                            <div class="table-cell v-align-middle">{{ $user->roles[0]->name }}</div>
                        </a>
                    @endforeach
                </div>
            </div>
            {{ $users->links('admin/structure/paginate') }}
        </div>
    @endif
@endsection
