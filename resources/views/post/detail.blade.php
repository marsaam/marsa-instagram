@extends('layout.navbar')
@section('content')
    <h1 class="text-center mb-4">{{(isset($detailPosts) ? 'Edit Postingan' : 'Tambah Postingan')}}</h1>
    <form action="{{ isset($detailPosts) ? route('edit.post', $detailPosts->id) : route('add.post') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @if (isset($detailPosts))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="photo" class="form-label">Pilih Foto</label>
            <input type="file" class="form-control" name="photo" id="photo" accept="image/*,video/*"
                onchange="previewFile()">
        </div>
        <div id="preview" class="mb-3 text-center">
            @if (isset($detailPosts->photo))
                <img src="{{ asset('storage/' . $detailPosts->photo) }}" id="previewImage"
                    style="max-width: 100%; height: auto;">
            @else
                <img id="previewImage" style="max-width: 100%; height: auto; display: none;">
            @endif
        </div>
        <div class="mb-3">
            <label for="caption" class="form-label">Caption</label>
            <textarea class="form-control" name="caption" id="caption" rows="5" placeholder="Tambahkan caption...">{{ old('caption', isset($detailPosts) ? $detailPosts->caption : '') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">{{(isset($detailPosts) ? 'Simpan Edit' : 'Tambah Postingan')}}</button>
    </form>

    <script>
        function previewFile() {
            const file = document.getElementById('photo').files[0];
            const preview = document.getElementById('preview');

            // Clear previous preview
            preview.innerHTML = '';

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const fileType = file.type;
                    let mediaElement;

                    if (fileType.startsWith('image/')) {
                        mediaElement = document.createElement('img');
                        mediaElement.src = e.target.result;
                        mediaElement.width = 900; // Set width for preview
                    } else if (fileType.startsWith('video/')) {
                        mediaElement = document.createElement('video');
                        mediaElement.src = e.target.result;
                        mediaElement.controls = true;
                        mediaElement.width = 900; // Set width for preview
                    }

                    if (mediaElement) {
                        preview.appendChild(mediaElement);
                    }
                };

                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
