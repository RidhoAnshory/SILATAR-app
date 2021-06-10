@extends('main')

@section('title', 'Informasi')

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
                    <li><a href="#">Akun</a></li>
                    <li class="active">Informasi</li>
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
                    <strong>Ubah data informasi</strong>
                </div>
                
            </div>
            <div class="card-body">

        <div class="row">
            <div class="col-md-4 offset-md-0">
                @if(session('success'))
            <div class="alert alert-success" role='alert'>
                {{ session('success') }}
            </div>
            @endif
                <form action=" {{ url('informasi/' ) }}" method="post">
                    @csrf
                    @method("PATCH")
                    <div class="form-group">
                        <label for="disabled-input">Nama</label>
                        <input type="text" id="disabled-input" name="nama" disabled="" class="form-control" value="{{ auth()->user()->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="no_telepon">No Telepon</label>
                        <input type="text" name="no_telepon" id="no_telepon" class="form-control" value="{{ auth()->user()->no_telepon }}">
                        @error('no_telepon')
                            <div class="text-danger mt-2">{{ $message }} </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
    </div>

</div>
</div>  
    
@endsection