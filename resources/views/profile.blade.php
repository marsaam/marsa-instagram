@extends('layout.navbar')
@section('content')
    <h1>Profile Setting</h1>
    <div class="profile-section">
        <form action="{{route('edit.profile', $users->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="user_id" value={{Auth::id()}}>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" value={{ old('username', isset($users) ? $users->username : '') }}>
            </div>
            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <input type="text" class="form-control" id="bio" name="bio" placeholder="Enter bio" >
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Foto Profil</label>
                <input type="file" class="form-control" id="photo" name="avatar">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

@endsection
