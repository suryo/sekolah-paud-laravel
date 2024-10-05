@extends('layouts.backend.app')

@section('title')
    Edit Laporan Akademik
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
                    <h2> Edit Laporan Akademik</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <section>
                    <div class="row">
                        {{-- <div class="col-6">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Image Slider</h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>    
                                        <tbody>
                                            @foreach ($image as $key => $images)
                                                <tr>
                                                    <td></td>
                                                    <td> {{$key+1}} </td>
                                                    <td> <img src="{{asset('storage/images/slider/' .$images->image)}}" class="img-responsive" style="max-width: 50px; max-height:50px"> </td>
                                                    <td> {{$images->is_active == '0' ? 'Aktif' : 'Tidak Aktif'}} </td>
                                                    <td>
                                                        <a href="" class="btn btn-success btn-sm">Edit</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>                                   
                                    </table>
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header header-bottom">
                                    <h4>Edit Laporan Akademik</h4>
                                </div>
                                <div class="card-body">
                                    <form action=" {{route('backend-laporanakademik.update', $file->id)}} " method="post" enctype="multipart/form-data">
                                        @csrf
                                        {{-- @method('PUT') --}}
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="basicInput">File</label>
                                                    <input type="file" name="filelaporanakademik" placeholder="filelaporanakademik" />
                                                    
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="basicInput">Murid</label> <span class="text-danger">*</span>
                                                    <select name="murid" class="form-control @error('murid') is-invalid @enderror" id="muridSelect">
                                                        <option value="">Pilih Murid</option>
                                                        @foreach($students as $student)
                                                            <option value="{{ $student->id }}" @if(isset($file) && $file->id_murid == $student->id) selected @endif>
                                                                {{ $student->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('murid')
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="basicInput">Kelompok Belajar</label> <span class="text-danger">*</span>
                                                    <select name="kelompokbelajar" class="form-control @error('kelompokbelajar') is-invalid @enderror" id="kelompokbelajarSelect">
                                                        <option value="">Pilih kelompokbelajar</option>
                                                        @foreach($kelompokbelajar as $kelompokbelajar)
                                                            <option value="{{ $kelompokbelajar->id }}" @if(isset($file) && $file->id_kelompokbelajar == $kelompokbelajar->id) selected @endif>{{ $kelompokbelajar->kelompokbelajar }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('kelompokbelajar')
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="basicInput">Semester</label> <span class="text-danger">*</span>
                                                    <select name="semester" class="form-control @error('semester') is-invalid @enderror" id="semesterSelect">
                                                        <option value="">Pilih semester</option>
                                                        @foreach($semester as $semester)
                                                            <option value="{{ $semester->id }}" @if(isset($file) && $file->id_semester == $semester->id) selected @endif>{{ $semester->semester }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('semester')
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="basicInput">Tahun Ajaran</label> <span class="text-danger">*</span>
                                                    <select name="tahunajaran" class="form-control @error('tahunajaran') is-invalid @enderror" id="tahunajaranSelect">
                                                        <option value="">Pilih tahunajaran</option>
                                                        @foreach($tahunajaran as $tahunajaran)
                                                            <option value="{{ $tahunajaran->id }}" @if(isset($file) && $file->id_tahunajaran == $tahunajaran->id) selected @endif>{{ $tahunajaran->tahunajaran }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('tahunajaran')
                                                        <div class="invalid-feedback">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="basicInput">Title</label> <span class="text-danger">*</span>
                                                   <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{$file->title}}">
                                                    @error('title')
                                                        <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="basicInput">Description</label> <span class="text-danger">*</span>
                                                    <textarea name="desc" class="form-control  @error('desc') is-invalid @enderror" rows="5"> {{$file->desc}} </textarea>
                                                    @error('desc')
                                                        <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="basicInput">moral</label> <span class="text-danger">*</span>
                                                   <input type="text" name="moral" class="form-control @error('moral') is-invalid @enderror" value="{{$file->moral}}">
                                                    @error('moral')
                                                        <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="basicInput">fisik_motorik</label> <span class="text-danger">*</span>
                                                   <input type="text" name="fisik_motorik" class="form-control @error('fisik_motorik') is-invalid @enderror" value="{{$file->fisik_motorik}}">
                                                    @error('fisik_motorik')
                                                        <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="basicInput">kognitif</label> <span class="text-danger">*</span>
                                                   <input type="text" name="kognitif" class="form-control @error('kognitif') is-invalid @enderror" value="{{$file->kognitif}}">
                                                    @error('kognitif')
                                                        <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="basicInput">bahasa</label> <span class="text-danger">*</span>
                                                   <input type="text" name="bahasa" class="form-control @error('bahasa') is-invalid @enderror" value="{{$file->bahasa}}">
                                                    @error('bahasa')
                                                        <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="basicInput">sosial_emosional</label> <span class="text-danger">*</span>
                                                   <input type="text" name="sosial_emosional" class="form-control @error('sosial_emosional') is-invalid @enderror" value="{{$file->sosial_emosional}}">
                                                    @error('sosial_emosional')
                                                        <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="basicInput">seni</label> <span class="text-danger">*</span>
                                                   <input type="text" name="seni" class="form-control @error('seni') is-invalid @enderror" value="{{$file->seni}}">
                                                    @error('seni')
                                                        <div class="invalid-feedback">
                                                        <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                          
                                        </div>
                                        <button class="btn btn-primary" type="submit">Update</button>
                                        <a href="{{route('backend-imageslider.index')}}" class="btn btn-warning">Batal</a>
                                    </form>
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
