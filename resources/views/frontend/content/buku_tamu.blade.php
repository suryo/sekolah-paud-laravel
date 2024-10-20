@extends('layouts.Frontend.app')
@section('title')
    Galery
@endsection
@section('content')
@section('gallery')

    
<div class="container">
    <h2 class="title-default-left">Buku Tamu</h2>
</div>
<div class="container">

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('buku_tamu.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label>No HP</label>
            <input type="text" name="no_hp" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Instansi</label>
            <input type="text" name="instansi" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Bidang</label>
            <input type="text" name="bidang" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Keperluan</label>
            <textarea name="keperluan" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-4">Submit</button>
    </form>
    <br>
</div>



@endsection
@endsection
