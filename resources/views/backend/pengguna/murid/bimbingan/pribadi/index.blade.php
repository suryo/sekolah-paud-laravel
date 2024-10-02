@extends('layouts.backend.app')

@section('title')
    Berita
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
                        <h2> Konseling Pribadi</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <section>
                        <div class="row">
                            @if ($data_bk->count() > 0)
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header border-bottom">
                                            <h4 class="card-title">Berita <a href=" {{ route('backend-berita.create') }} "
                                                    class="btn btn-primary">Tambah</a> </h4>
                                        </div>
                                        <div class="card-datatable">
                                            <table class="dt-responsive table">
                                                <thead>
                                                    <tr>
                                                        <th>Nomor BK</th>
                                                        <th>Judul</th>
                                                        <th>Jenis BK</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data_bk as $data)
                                                        <tr>
                                                            <td>{{ $data->nomor_bk }}</td>
                                                            <td>{{ $data->judul_bk }}</td>
                                                            <td>{{ trans(ucfirst($data->jenis)) }}</td>
                                                            <td><span
                                                                    class="@if ($data->status == 'Belum Ditanggapi') {{ 'badge bg-danger text-white' }} @else {{ 'badge bg-success' }} @endif">{{ trans(ucfirst($data->status)) }}</span>
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('bimbingan.pribadi.show', $data->id) }}"
                                                                    class="btn btn-md btn-info">
                                                                    <i class="fas fa-eye"></i> Lihat
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
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
@endsection
