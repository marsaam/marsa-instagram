
@extends('layout.navbar')
@section('content')

<h2 class="text-center mb-4">Daftar Postingan</h2>
<table class="table table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">No</th>
            <th scope="col">Date</th>
            <th scope="col">Photo</th>
            <th scope="col">Caption</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>1</td>
            <td>{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
            {{-- <td><img src="{{ asset('storage/' . $post->photo) }}" alt="Photo 1" width="50"></td> --}}
            <td>
                @if (in_array(pathinfo($post->photo, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']))
                    <img src="{{ asset('storage/' . $post->photo) }}" alt="Photo" width="50">
                @elseif (in_array(pathinfo($post->photo, PATHINFO_EXTENSION), ['mp4', 'mov']))
                    <video width="50" controls>
                        <source src="{{ asset('storage/' . $post->photo) }}" type="video/{{ pathinfo($post->photo, PATHINFO_EXTENSION) }}">
                        Your browser does not support the video tag.
                    </video>
                @else
                    No media available
                @endif
            </td>
            <td>{{$post->caption}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
