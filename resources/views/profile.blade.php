{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head></head>

<body>
    <h1>Ubah Profil</h1>
    <form action="" method="post">
        <div>
            <label for="">username</label>
            <input type="text" name="" id="">
        </div>
        <div>
            <label for="">bio</label>
            <input type="text" name="" id="">
        </div>
        <div>
            <label for="">foto profil</label>
            <input type="file" name="" id="">
        </div>
        <button type="submit">simpan</button>
    </form>
</body>
</html> --}}


@extends('layout.navbar')
@section('content')
    <h1>Profile Setting</h1>
    <div class="profile-section">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
            </div>
            <div class="mb-3">
                <label for="bio" class="form-label">Bio</label>
                <input type="text" class="form-control" id="bio" name="bio" placeholder="Enter bio">
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Foto Profil</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

@endsection
