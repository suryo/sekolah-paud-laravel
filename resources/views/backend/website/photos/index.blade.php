@extends('layouts.backend.app')


@section('content')
    <a href="{{ route('photos.create') }}" class="btn btn-primary">Tambah Foto</a>
    <table class="table">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        @foreach($photos as $photo)
        <tr>
            <td>{{ $photo->title }}</td>
            <td>{{ $photo->description }}</td>
            <td><img src="{{ asset('images/'.$photo->image) }}" width="100"></td>
            <td>
                <a href="{{ route('photos.edit', $photo->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
@endsection
