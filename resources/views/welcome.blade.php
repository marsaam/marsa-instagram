<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head></head>

<body>
    <h1>register</h1>
    <button class="btn btn-primary"> Tes </button>
    <form action="" method="post">
        @csrf
        <div>
            <label for="">nama lengkap</label>
            <input type="text" name="" id="">
        </div>
        <div>
            <label for="">email</label>
            <input type="text" name="" id="">
        </div>
        <div>
            <label for="">username</label>
            <input type="text" name="" id="">
        </div>
        <div>
            <label for="">password</label>
            <input type="password" name="" id="">
        </div>
        <div>
            <label for="">Foto Profil</label>
            <input type="file" name="" id="">
        </div>
        <button type="submit">Masuk</button>
    </form>
</body>

</html>
