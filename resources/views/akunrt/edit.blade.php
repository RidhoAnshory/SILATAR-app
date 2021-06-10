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
                    <li class="active">Ubah</li>
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
                    <strong>Edit Akun RT</strong>
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
                        <form action=" {{ url('akunrt/' .$akunrt->id) }}" method="post">
                            @method('patch')
                            @csrf
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" value="{{ $akunrt->nama }}">
                            </div>
                            <div class="form-group">
                                <label>Kelurahan</label>
                                <select name="kelurahan" class="form-control" value="{{ $akunrt->kelurahan }}">
                                    <option value="Manggar" @if($akunrt->kelurahan == 'Manggar') selected @endif>Manggar</option>
                                    <option value="Manggar Baru" @if($akunrt->kelurahan == 'Manggar Baru') selected @endif>Manggar Baru</option>
                                    <option value="Lamaru" @if($akunrt->kelurahan == 'Lamaru') selected @endif>Lamaru</option>
                                    <option value="Teritip" @if($akunrt->kelurahan == 'Teritip') selected @endif>Teritip</option>
                                  </select> 
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="text" name="no_telepon" class="form-control" value="{{ $akunrt->no_telepon }}">
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input name="username" type="text" class="form-control" value="{{ $akunrt->username }}" id="username">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
                
    </div>
</div>
</div>  
    
@endsection