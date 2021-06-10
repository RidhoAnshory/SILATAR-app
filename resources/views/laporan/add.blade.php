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
                    <li class="active">Tambah</li>
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
                    <strong>Tambah Laporan</strong>
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
                        <form action=" {{ url('laporan') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Jenis Laporan</label>
                                <select name="Jenis_laporan" class="form-control" required>
                                    <option value="Kependudukan">Kependudukan</option>
                                    <option value="Lingkungan Hidup">Lingkungan Hidup</option>
                                    <option value="Pembangunan">Pembangunan</option>
                                    <option value="Sosial Kemasyarakatan">Sosial Kemasyarakatan</option>
                                  </select>       
                            </div>
                            <div class="form-group">
                                <label>Waktu Kegiatan</label>
                                <input type="date" name="Waktu" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Lokasi Kegiatan</label>
                                <input type="text" name="Lokasi" class="form-control" required>
                            </div>
                            <div class="form-group" width="100%">
                                <label>Penjelasan Kegiatan</label>
                                <textarea rows="7" name="Penjelasan" class="form-control" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Unggah Foto</label>
                                <input type="file" name="Unggah_Foto" class="form-control" required>
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