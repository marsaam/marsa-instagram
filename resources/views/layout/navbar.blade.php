<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marsa - Instagram</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset ('style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container mt-3">
        @yield('content')
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-bottom">
        <div class="container-fluid">
            <a class="navbar-brand mx-auto" href="#">Instagram</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            @php
            $currentRoute = Route::currentRouteName(); // Mendapatkan nama rute saat ini
            @endphp

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item {{ $currentRoute === 'dashboard' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="bi bi-house-fill" style="font-size: 2rem;"></i>
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $currentRoute === 'detail' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('detail') }}">
                            <i class="bi bi-plus-circle-fill" style="font-size: 2rem;"></i>
                        </a>
                    </li>
                    <li class="nav-item {{ $currentRoute === 'archive' ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('archive') }}">
                            <i class="bi bi-archive-fill" style="font-size: 2rem;"></i>
                        </a>
                    </li>
                </ul>
            </div>

    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
