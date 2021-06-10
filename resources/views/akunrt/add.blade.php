@extends('main')

@section('title', 'Akun RT')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="#">Akun RT</a></li>
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
                    <strong>Tambah Akun</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url ('akunrt')}}" class="btn btn-secondary btn-sm">
                        <i class="fa fa-undo"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                
                <div class="row">
                    <div class="col-sm-8 offset-md-0">
                        <form action=" {{ url('akunrt') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="Kecamatan/Kelurahan">Kecamatan/Kelurahan</option>
                                    <option value="RT">RT</option>
                                </select>       
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <select name="kelurahan" class="form-control" required>
                                    <option value="Manggar">Manggar</option>
                                    <option value="Manggar Baru">Manggar Baru</option>
                                    <option value="Lamaru">Lamaru</option>
                                    <option value="Teritip">Teritip</option>
                                  </select>       
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="text" name="no_telepon" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input name="username" type="text" class="form-control" id="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input name="password" type="password" class="form-control" id="password" required> </div>
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