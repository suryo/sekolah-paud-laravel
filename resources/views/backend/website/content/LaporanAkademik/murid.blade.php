@extends('layouts.backend.app')

@section('title')
    Report
@endsection

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
                    <h2> Laporan Akademik</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">File</h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Tahun</th>
                                                <th>Siswa</th>
                                                <th>Kelompok</th>
                                                <th>Semester</th>
                                                <th>File</th>
                                               
                                                <th>title</th>
                                                <th>desc</th>
                                                <th>moral</th>
                                                <th>fisik_motorik</th>
                                                <th>kognitif</th>
                                                <th>bahasa</th>
                                                <th>sosial_emosional</th>
                                                <th>seni</th>

                                             
                                            </tr>
                                        </thead>    
                                        <tbody>
                                            @foreach ($file as $key => $files)
                                                <tr>
                                                    <td></td>
                                                    <td> {{$key+1}} </td>
                                                  
                                                    <td> {{$files->tahunajaran->tahunajaran}} </td>
                                                    <td> {{$files->murid->name}} </td>
                                                    <td> {{$files->kelompokbelajar->kelompokbelajar}} </td>
                                                    <td> {{$files->semester->semester}} </td>
                                                    <td> 
                                                        
                                                        <a href="{{ 'laporanakademik/' . $files->file }}">Raport PDF</a>
                                                    </td>
                                                  
                                                    <td>{{ $files->title}}</td>
                                                    <td>{{ $files->desc}}</td>
                                                    <td>{{ $files->moral}}</td>
                                                    <td>{{ $files->fisik_motorik}}</td>
                                                    <td>{{ $files->kognitif}}</td>
                                                    <td>{{ $files->bahasa}}</td>
                                                    <td>{{ $files->sosial_emosional}}</td>
                                                    <td>{{ $files->seni}}</td>
                                                  
                                                </tr>
                                            @endforeach
                                        </tbody>                                   
                                    </table>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
