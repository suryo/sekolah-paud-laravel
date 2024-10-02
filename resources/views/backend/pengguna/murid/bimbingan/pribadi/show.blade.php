
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
                            <h5 class="card-title">Konseling Pribadi &nbsp; <span
                                    class="@if ($data_bk->status == 'Belum Ditanggapi') {{ 'badge bg-danger text-white' }} @else {{ 'badge bg-success' }} @endif">{{ trans(ucfirst($data_bk->status)) }}</span>
                            </h5>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-lg-6">
                                    <label for="">Nomor BK</label>
                                    <p>{{ $data_bk->nomor_bk }}</p>
                                    <label for="">Dibuat Oleh</label>
                                    <p>{{ $data_bk->dibuat_oleh->username }}</p>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Tanggal</label>
                                    <p>{{ $data_bk->created_at }}</p>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="judul_bk">Judul</label>


                                <p>{{ $data_bk->judul_bk }}</p>
                            </div>
                            <div class="form-group">
                                <label for="pokok_pembahasan">Pokok Pembahasan</label>

                                <p>{{ $data_bk->pokok_pembahasan }}</p>
                            </div>

                            <button type="button" class="btn btn-md btn-secondary"
                                onclick="window.history.back()">Kembali</button>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Tanggapan Guru</h5>
                            <hr>

                            @if (isset($data_bk->judul_tanggapan))
                                <div class="form-group">
                                    <label for="">Nama Guru</label>
                                    <p>{{ $data_bk->ditanggapi_oleh->username }}</p>
                                </div>


                                <div class="form-group">
                                    <label for="judul_tanggapan">Judul</label>
                                    <p>{{ $data_bk->judul_tanggapan }}</p>

                                </div>
                                <div class="form-group">
                                    <label for="tanggapan">Tanggapan</label>
                                    <p>{{ $data_bk->tanggapan }}</p>
                                </div>
                            @else
                                <h2 class="p-3 text-center">Belum ditanggapi oleh guru</h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
         
        </div>
    </div>
@endsection
