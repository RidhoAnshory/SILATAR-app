@extends('main')

@section('title', 'Laporan')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Laporan</a></li>
                    <li class="active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>    
@endsection

@section('content')
<div class="content mt-3">

    <div class="animated fadeIn">

        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Edit Laporan</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url ('laporan')}}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-sm-8 offset-md-0">
                        <form action=" {{ url('laporan/' .$laporan->id) }}" method="post" enctype="multipart/form-data">
                            @method('post')
                            @csrf
                            <div class="form-group">
                                <label>Jenis Laporan</label>
                                <select name="Jenis_laporan" class="form-control" required>
                                    <option value="Kependudukan"@if($laporan->Jenis_laporan == 'Kependudukan') selected @endif>Kependudukan</option>
                                    <option value="Lingkungan Hidup"@if($laporan->Jenis_laporan == 'Lingkungan Hidup') selected @endif>Lingkungan Hidup</option>
                                    <option value="Pembangunan"@if($laporan->Jenis_laporan == 'Pembangunan') selected @endif>Pembangunan</option>
                                    <option value="Sosial Kemasyarakatan"@if($laporan->Jenis_laporan == 'Sosial Kemasyarakatan') selected @endif>Sosial Kemasyarakatan</option>
                                  </select>       
                            </div>
                            <div class="form-group">
                                <label>Waktu Kegiatan</label>
                                <input type="date" name="Waktu" class="form-control" value="{{ $laporan->Waktu }}" required>
                            </div>
                            <div class="form-group">
                                <label>Lokasi Kegiatan</label>
                                <input type="text" name="Lokasi" class="form-control" value="{{ $laporan->Lokasi }}" required>
                            </div>
                            <div class="form-group">
                                <label>Penjelasan Kegiatan</label>
                                <textarea rows="7" name="Penjelasan" class="form-control" required>{{ $laporan->Penjelasan }} </textarea>
                            </div>
                            <div class="form-group">
                                <label>Unggah Foto</label>
                                <input type="file" id="Unggah_Foto" name="Unggah_Foto">
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('img/'. $laporan->Unggah_Foto) }}" height="10%" width="50%" alt="" srcset="">
                                @error('Unggah_Foto')
                                <div class="text-danger mt-2">{{ $message }} </div>
                                @enderror
                            </div>
                        
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                
    </div>
</div>
</div>  
    
@endsection