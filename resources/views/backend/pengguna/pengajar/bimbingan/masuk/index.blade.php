{{-- @extends('layout.guru_layout') --}}
@extends('layouts.backend.app')

@section('title','Data BK Masuk')

@section('content')
@if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <div class="alert-body">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        </div>
    @elseif($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
            <div class="alert-body">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        </div>
    @endif


    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2>Bimbingan Konseling Masuk</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <section>
                        <div class="row">
                            @if(count($data_bk) > 0)  
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header border-bottom">
                                            <h5 class="card-title">B&K Masuk</h5>
                                        </div>
                                        <div class="card-datatable">
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
                                    <td>
                                        @if(Auth::user()->role == 'Guru')
                                            <a href="{{route('guru.bimbingan.masuk.show',$bk->id)}}" title="Lihat" class="btn btn-sm btn-info">
                                        @elseif(Auth::user()->role == 'Admin')
                                         <a href="{{route('all.bimbingan.masuk.show',$bk->id)}}" title="Lihat" class="btn btn-sm btn-info">
                                        @endif 
                                        
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    @if(Auth::user()->role == 'Guru')
                                    <a href="{{route('guru.bimbingan.masuk.tanggapi',$bk->id)}}" title="Edit" class="btn btn-sm btn-primary text-white">
                                        @elseif(Auth::user()->role == 'Admin')
                                        <a href="{{route('all.bimbingan.masuk.tanggapi',$bk->id)}}" title="Edit" class="btn btn-sm btn-primary text-white">
                                        @endif
                                        <i class="fas fa-check-circle"></i> Tanggapi
                                    </a></td>
                                </tr>
                                @endforeach
                            </tbody>
                           
                        </table>
                        @else
                            <h2 class="text-center p-3">Data BK Masuk Kosong</h2>
                        @endif
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-12">
                                    <h3>Data Masih Kosong !</h3>
                                    <a href="{{ route('bimbingan.pribadi.create') }}" class="btn btn-md btn-primary">+
                                        Tambah</a>
                                </div>
                            @endif
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>






{{-- <div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Bimbingan Konseling Masuk</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">B&K Masuk</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div> --}}

{{-- <div class="container-fluid">
   
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">B&K Masuk</h5>
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
                                    <td> <a href="{{route('guru.bimbingan.masuk.show',$bk->id)}}" title="Lihat" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                    <a href="{{route('guru.bimbingan.masuk.tanggapi',$bk->id)}}" title="Edit" class="btn btn-sm btn-primary text-white">
                                        <i class="fas fa-check-circle"></i> Tanggapi
                                    </a></td>
                                </tr>
                                @endforeach
                            </tbody>
                           
                        </table>
                        @else
                            <h2 class="text-center p-3">Data BK Masuk Kosong</h2>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
   
</div> --}}
@endsection