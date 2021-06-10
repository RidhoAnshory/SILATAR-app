@extends('main')

@section('title', 'Akun RT')

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
                    <li><a href="#">Akun RT</a></li>
                    <li class="active">Data</li>
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
                    <strong>Data Akun RT</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url ('akunrt/add')}}" class="btn btn-success btn-sm">
                        <i class="fa fa-pluss"></i> Tambah
                    </a>
                </div>
            </div>
            
            <div class="card-body table-responsive">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Role</th>
                            <th>Nama</th>
                            <th>Kelurahan</th>
                            <th>No. Telepon</th>
                            <th>username</th>
                            <th>aksi</th>
                                                      
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->role }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->kelurahan }}</td>
                            <td>{{ $item->no_telepon }}</td>
                            <td>{{ $item->username }}</td>
                           
                            <td class="text-center">
                                <a href="{{ url('akunrt/edit',$item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{ url('akunrt' ,$item->id) }}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                            
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
                
    </div>
</div>
</div>  
    
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();        
    } );
</script>

@endpush