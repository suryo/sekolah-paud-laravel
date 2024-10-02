{{-- @extends('layout.guru_layout') --}}
@extends('layouts.backend.app')

@section('title','Lihat Data BK Masuk')

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2>Lihat Data BK</h2>
                </div>
            </div>
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Lihat Data BK</li>
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
                    <h5 class="card-title">{{$bk->jenis}}</h5>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-lg-6">
                                <label for="">Nomor BK</label>
                                <p>{{$bk->nomor_bk}}</p>
                                <label for="">Dibuat Oleh</label>
                                <p>{{$bk->dibuat_oleh->username}}</p>
                        </div>
                        <div class="col-lg-6">
                            <label for="">Tanggal</label>
                            <p>{{$bk->created_at}}</p>
                        </div>
                    </div>

                    @if(count($daftar_siswa) > 0)
                    <div class="row mb-3">
                        <div class="col-lg-12">
                            <p><strong>Daftar Nama Siswa</strong></p>
                            <ol>
                                @foreach($daftar_siswa as $siswa)
                                <li><p>{{$siswa->nama_siswa}} - [Kelas {{$siswa->kelas}}]</p></li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                    @endif
                    
                        <div class="form-group">
                            <label for="judul_bk">Judul</label>
                           
                            <p>{{$bk->judul_bk}}</p>
                        </div>
                        <div class="form-group">
                            <label for="pokok_pembahasan">Pokok Pembahasan</label>
                            
                            
                            <p>{{$bk->pokok_pembahasan}}</p>
                        </div>

                        <button type="button" class="btn btn-md btn-secondary" onclick="window.history.back()">Kembali</button>
                </div>
            </div>
        </div>
    </div>
 
</div>
</div>
@endsection