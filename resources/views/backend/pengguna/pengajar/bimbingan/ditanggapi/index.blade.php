{{-- @extends('layout.guru_layout') --}}
@extends('layouts.backend.app')

@section('title','Data BK Ditanggapi')

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2>Bimbingan Konseling Sudah Ditanggapi</h2>
                </div>
            </div>
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">BK Ditanggapi</li>
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
                    <h5 class="card-title">B&K Sudah Ditanggapi</h5>
                    <div class="table-responsive">
                        @if(count($data_bk) > 0)  
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor BK</th>
                                    <th>Nama Siswa</th>
                                    <th>Jenis BK</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($data_bk as $bk)  
                                <tr>
                                    <td>{{$bk->nomor_bk}}</td>
                                    <td>{{$bk->dibuat_oleh->nama}}</td>
                                    <td>{{trans(ucfirst($bk->jenis))}}</td>
                                    <td> <a href="{{route('bimbingan.ditanggapi.show',$bk->id)}}" title="Lihat" class="btn btn-md btn-info">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                </tr>
                                @endforeach
                            </tbody>
                           
                        </table>
                        @else
                            <h2 class="text-center p-3">Data BK Ditanggapi Kosong</h2>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection