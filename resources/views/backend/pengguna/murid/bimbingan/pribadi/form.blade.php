{{-- @extends('layout.siswa_layout') --}}
@extends('layouts.backend.app')

@section('title', 'Konseling Pribadi')

@section('content')
    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2> Konseling Pribadi</h2>
                    </div>
                </div>
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">B&K Pribadi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
      
       
        <div class="content-body">
           
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Konseling Pribadi</h5>
                            <hr>
                            <form action="{{ route($url) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Dibuat Oleh</label>
                                    <p>{{ Auth::user()->username }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="judul_bk">Judul</label>
                                    <input type="text" name="judul_bk" id="judul_bk"
                                        class="form-control @error('judul_bk') {{ 'is-invalid' }} @enderror"
                                        placeholder="Judul bimbingan">

                                    @error('judul_bk')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pokok_pembahasan">Pokok Pembahasan</label>
                                    <textarea name="pokok_pembahasan" cols="30" rows="10" id="pokok_pembahasan"
                                        placeholder="Tuliskan pokok pembahasan"
                                        class="form-control @error('pokok_pembahasan') {{ 'is-invalid' }} @enderror"></textarea>

                                    @error('pokok_pembahasan')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <button type="button" class="btn btn-md btn-secondary"
                                    onclick="window.history.back()">Kembali</button>
                                <input type="submit" value="{{ $button }}" class="btn btn-md btn-info">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
@endsection
