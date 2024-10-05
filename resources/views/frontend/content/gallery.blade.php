@extends('layouts.Frontend.app')
@section('title')
    Galery
@endsection
@section('content')
@section('gallery')


     <div class="gallery-container">
        @foreach($photos as $photo)
            <div class="photo">
                <img src="{{ asset('images/' . $photo->image) }}" alt="{{ $photo->title }}">
                <h3>{{ $photo->title }}</h3>
                <p>{{ $photo->description }}</p>
            </div>
        @endforeach
    </div>


@endsection
@endsection
