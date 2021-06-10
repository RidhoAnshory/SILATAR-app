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
                    <strong>Data Laporan</strong>
                </div>
                <div class="pull-right">
                    <a href="{{ url ('laporan/add')}}" class="btn btn-success btn-sm">
                        <i class="fa fa-pluss"></i>Tambah
                    </a>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jenis Laporan</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>Penjelasan</th>
                            <th>Unggah Foto</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan as $key => $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->Jenis_laporan }}</td>
                            <td>{{ $item->Waktu }}</td>
                            <td>{{ $item->Lokasi }}</td>
                            <td>{{ $item->Penjelasan }}</td>
                            <td>
                               <a href="{{ asset('img/'. $item->Unggah_Foto)}}" target="blank" rel="noopener noreferrer">Lihat Gambar</a>
                            </td>
                            <td>{{ strtoupper($item->Status) }} <br/>
                                <i>{{ $item->Keterangan ?? '' }}</i>
                            </td>
                            <td class="text-center">
                                <a href="{{ url('laporan/edit',$item->id) }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-pencil"></i>
                                </a>
                                <form action="{{ url('laporan' ,$item->id) }}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
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