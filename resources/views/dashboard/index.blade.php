@extends('main')

@section('title', 'Dashboard')

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
                    <li><a href="#">Dashboard</a></li>
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


        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Data laporan RT</strong>
                </div>
                <br>
                <br>
                <div class="pull-left">
                <form action="{{ route('filter') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">                                
                                    <select class="form-control select1" name="kelurahan" id="kelurahan" required>
                                        <option value="">Pilih Kelurahan</option>
                                        <optgroup label="Kelurahan: ">
                                            <option value="Manggar">Manggar</option>
                                            <option value="Manggar Baru">Manggar Baru</option>
                                            <option value="Teritip">Teritip</option>
                                            <option value="Lamaru">Lamaru</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control select2" name="bulan" id="bulan" required>
                                            <option value="">Pilih Bulan</option>
                                            <optgroup label="Bulan: ">
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">                                   
                                        <select class="form-control select3" name="tahun" id="tahun" required>
                                            <option value="">Pilih Tahun</option>
                                            <optgroup label="Tahun: ">
                                                <?php
                                                for ($i = 0; $i < count($uniqueYear); $i++) {
                                                    echo "<option value=$uniqueYear[$i]>$uniqueYear[$i]</option>";
                                                }
                                                ?>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">                                  
                                        <select class="form-control select1" name="filter" id="filter" required>
                                            <option value="">Konfirmasi</option>
                                            <optgroup label="Kelurahan: ">
                                                <option value="filter1">Sudah</option>
                                                <option value="filter2">Belum</option>
                                          </optgroup>
                                        </select>
                                    </div>
                                </div>
                               <div class="col-md-3">
                                <button type="submit" class="btn btn-success  mr-1" target="_blank">Filter</button>
                            </div>
                            </div>
                    </div>
                </form>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                        
                            <th>Nomor Telepon</th>
                            <th>Waktu</th>
                            <th>Lokasi</th>
                            <th>Unggah Foto</th>
                            <th>Status</th>
                            <th>Aksi</th>
                                                      
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($laporan as $key => $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama}}</td>
                        
                            <td>{{ $item->no_telepon }}</td>
                            @if(count($arrayLaporan)!=NULL)
                            <td>
                                @if($item->Waktu != NULL)
                                {{ $item->Waktu }}
                                @else 
                                {{ __('NULL')}}
                                @endif
                            </td>
                            <td>
                                @if($item->Lokasi != NULL)
                                {{ $item->Lokasi }}
                                @else 
                                {{ __('NULL')}}
                                @endif
                            </td>
                            <td>
                                @if($item->Unggah_Foto != NULL)
                                <a href="{{ asset('img/'. $item->Unggah_Foto)}}" target="blank" rel="noopener noreferrer">Lihat Gambar</a>
                                @else 
                                {{ __('NULL')}}
                                @endif
                            </td>
                            <td>
                                @if($item->Status != NULL)
                                {{ strtoupper($item->Status) }}
                                @else 
                                {{ __('NULL')}}
                                @endif <br/>
                                <i>{{ $item->Keterangan ?? '' }}</i>
                            </td>
                            <td class="text-center">
                                <a href="{{ url('dashboard',$item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fa fa-eye"></i>
                                    </a>
                                </td>    
                            @else
                            <td>{{ __('NULL')}}</td>
                            <td>{{ __('NULL')}}</td>
                            <td>{{ __('NULL')}}</td>
                            <td>{{ __('NULL')}}</td>
                            <td>{{ __('NULL')}}</td>
                            @endif                
                         </tr>
                     @endforeach
                    </tbody>
                 </table>
                 
            </div>


            {{-- Export Data --}}
            <div class="card">
                <div style="margin-left: 30px; margin-top: 16px;">
                    <h3>Export Data</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('export') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <select class="form-control select1" name="kelurahan" id="kelurahan" required>
                                            <option value="">Pilih Kelurahan</option>
                                            <optgroup label="Kelurahan: ">
                                                <option value="Manggar">Manggar</option>
                                                <option value="Manggar Baru">Manggar Baru</option>
                                                <option value="Teritip">Teritip</option>
                                                <option value="Lamaru">Lamaru</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-success  mr-1" target="_blank">Export</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            {{-- End Export Data --}}
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

