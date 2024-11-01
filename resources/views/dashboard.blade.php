@extends('layout.navbar')
@section('content')
    <div class="row">

        @foreach ($users as $user)
            <div class="col-md-4">
                @if ($user->avatar)
                    <div class="profile-photo-wrapper"
                        style="width: 200px; height: 200px; overflow: hidden; border-radius: 50%;">
                        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('1.png') }}"
                            alt="Profile Photo" class="img-fluid" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                @else
                    <img src="{{ asset('1.png') }}" alt="Default Profile Photo" width="200" height="200"
                        class="img-fluid rounded-circle" style="object-fit: cover;">
                @endif
            </div>

            <div class="col-md-6">
                <h3 class="username">{{ $user->username }}</h3>
                @foreach ($bios as $bio)
                    <p class="bio">{{ $bio->bio ?? 'Belum ada bio. Tambahkan bio' }}</p>
                @endforeach
            </div>
        @endforeach
        <div class="col-md-2 text-right">
            <a href="{{ route('detail.profile', $user->id) }}">
                <button class="btn btn-dark">
                    <i class="bi bi-pencil-square"></i> Edit Profile</button>
            </a>
        </div>
    </div>

    <div class="row mt-5">
        @foreach ($posts as $post)
            <div class="col-md-4 mb-4">
                <a href="{{ route('detail.post', $post->id) }}">
                    @if (in_array(pathinfo($post->photo, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                        <img src="{{ asset('storage/' . $post->photo) }}" alt="Photo {{ $loop->index + 1 }}"
                            class="img-fluid rounded" style="padding-bottom: 20px;">
                    @elseif (in_array(pathinfo($post->photo, PATHINFO_EXTENSION), ['mp4', 'mov']))
                        <img src="OIP.jpeg" class="img-fluid rounded" style="padding-bottom: 20px;">
                        {{-- <video controls>
                            <source src="{{ asset('storage/' . $post->photo) }}"
                                type="video/{{ pathinfo($post->photo, PATHINFO_EXTENSION) }}"
                                alt="Video {{ $loop->index + 1 }}" class="img-fluid rounded" style="padding-bottom: 20px;">
                            Your browser does not support the video tag.
                        </video> --}}
                    @else
                        No media available
                    @endif
                </a>
            </div>
        @endforeach
    </div>
@endsection
