@extends('main')

@section('title', 'Dashboard')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Data</a></li>
                    <li class="active">Detail</li>
                </ol>
            </div>
        </div>
    </div>
</div>    
@endsection

@section('content')
<div class="content mt-3">

    <div class="animated fadeIn">

        @if (session('status'))
            <div class="alert alert-success">
                  {{ session('status') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Detail Laporan</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url ('dashboard')}}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-pluss"></i>Kembali
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">
                
                <div class="row">
                    <div class="col-md-8 offset-md-2">

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $laporan->users->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Kelurahan</th>
                                    <td>{{ $laporan->users->kelurahan }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Telepon</th>
                                    <td>{{ $laporan->users->no_telepon}}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Laporan</th>
                                    <td>{{ $laporan->Jenis_laporan }}</td>
                                </tr>
                                <tr>
                                    <th>Waktu</th>
                                    <td>{{ $laporan->Waktu }}</td>
                                </tr>
                                <tr>
                                    <th>Lokasi</th>
                                    <td>{{ $laporan->Lokasi }}</td>
                                </tr>
                                <tr>
                                    <th>Penjelasan</th>
                                    <td>{{ $laporan->Penjelasan }}</td>
                                </tr>
                                <tr>
                                    <th>Unggah Foto</th>
                                    <td> <a href="{{ asset('img/'. $laporan->Unggah_Foto)}}" target="blank" rel="noopener noreferrer">Lihat Gambar</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ strtoupper($laporan->Status) }} <br/>
                                    <i>{{ $laporan->Keterangan ?? '' }}</i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
               
            </div>
        </div>
                
    </div>
</div>
<div class="content mt-3">

    <div class="animated fadeIn">
       
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Validasi Laporan</strong>
                </div>
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-sm-5 offset-md-0">
                        <form action=" {{ url('/editstatus/'.$laporan->id) }}" method="post">
        
                            @csrf
                            <div class="form-group">
                                <label>Status</label>
                                <select name="Status" class="form-control">   
                                    <option value="Diterima" @if($laporan->Status == 'Diterima') selected @endif>Diterima</option>    
                                    <option value="Diperbaiki" @if($laporan->Status == 'Diperbaiki') selected @endif>Diperbaiki</option>                
                                  </select> 
                            </div>    
                            <div class="form-group" width="100%">
                                <label>Keterangan</label>
                                <textarea rows="7" name="Keterangan" class="form-control">{{ $laporan->Keterangan }} </textarea>
                            </div>
                                                                         
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>

</div>
</div>
</div>

    
@endsection