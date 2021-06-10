@extends('main')

@section('title', 'Password')

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
                    <li class="active">Kata sandi</li>
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
                    <strong>Ubah kata sandi</strong>
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
                <form action=" {{ url('password/' ) }}" method="post">
                    @csrf
                    @method("PATCH")
                    <div class="form-group">
                        <label for="old_password">Password Lama</label>
                        <input type="password" name="old_password" id="old_password" class="form-control" >
                        @error('old_password')
                            <div class="text-danger mt-2">{{ $message }} </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" name="password" id="password" class="form-control" >
                        @error('password')
                            <div class="text-danger mt-2">{{ $message }} </div>
                        @enderror
                        
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" >
                    </div>
                    @error('password')
                            <div class="text-danger mt-2">{{ $message }} </div>
                        @enderror
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
    </div>

</div>
</div>  
    
@endsection