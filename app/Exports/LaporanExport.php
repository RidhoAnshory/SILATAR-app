<?php

namespace App\Exports;

use App\Laporan;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;


class LaporanExport implements FromCollection,WithHeadings
{


    use Exportable;

    public function __construct($kel)
    {
        $this->kel = $kel;
    }

    public function collection()
    {
        
        return DB::table('laporan')
        ->join('users', 'laporan.id_user', '=', 'users.id')
        ->where('laporan.Status', 'Diterima')
        ->where('users.kelurahan', $this->kel)->orderBy('users.nama')
        ->select('users.nama', 'users.no_telepon', 'laporan.Jenis_laporan', 'laporan.Waktu', 'laporan.Lokasi', 'laporan.Penjelasan', 'laporan.url_Unggah', 'laporan.Status')->get();
    }
    
    public function headings(): array{
        return [
            'Nama', 'No Telepon', 'Jenis Laporan', 'Waktu', 'Lokasi', 'Penjelasan', 'Unggah Foto', 'Status',
        ];
    }
}
