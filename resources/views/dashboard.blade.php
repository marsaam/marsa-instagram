@extends('layout.navbar')
@section('content')
    <div class="row">

        @foreach ($users as $user)
            <div class="col-md-4">
                <img src="{{ $user->avatar }}" alt="Profile" class="img-fluid rounded-circle" />
            </div>
            <div class="col-md-6">
                <h3 class="username">{{ $user->username }}</h3>
                @foreach ($bios as $bio)
                    <p class="bio">{{ $bio->bio }}</p>
                @endforeach
            </div>
        @endforeach
        <div class="col-md-2 text-right">
            <a href="{{ route('profile') }}">
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
                    <img src="OIP.jpeg"
                    class="img-fluid rounded" style="padding-bottom: 20px;">
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
