@extends('layouts.backend.app')

@section('content')
    <h1>Edit Foto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('photos.update', $photo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Judul Foto</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $photo->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Deskripsi Foto</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $photo->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Upload Gambar Baru (opsional)</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <div class="form-group">
            <label>Gambar Saat Ini:</label>
            <br>
            <img src="{{ asset('images/'.$photo->image) }}" alt="{{ $photo->title }}" width="150">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('photos.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection
``
