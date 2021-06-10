<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Uploadgambar;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function data()
    {   $time = DB::table('laporan')->distinct()->pluck('Waktu');
        $getYear = array();
        for ($i=0; $i < count($time); $i++) { $getYear[]=date('Y', strtotime($time[$i])); } $uniqueYear=array_unique($getYear); 
        for ($i=0; $i < count($time); $i++) { $getYear[]=date('Y', strtotime($time[$i])); } $uniqueYear=array_unique($getYear); 
        
        $laporan=DB::table('users')
        ->rightJoin('laporan', 'users.id', '=', 'laporan.id_user')
        ->select('laporan.*', 'users.nama','users.no_telepon')
            ->get();
      
        $arrayLaporan = [0];

         return view('dashboard.index', compact('arrayLaporan','uniqueYear', 'laporan'));
    
    }

    public function filter1(Request $request)
    {
        $time = DB::table('laporan')->distinct()->pluck('Waktu');
        $getYear = array();
        for ($i=0; $i < count($time); $i++) { $getYear[]=date('Y', strtotime($time[$i])); } $uniqueYear=array_unique($getYear); 
        for ($i=0; $i < count($time); $i++) { $getYear[]=date('Y', strtotime($time[$i])); } $uniqueYear=array_unique($getYear); 
    
        $num_year = intval($request->tahun);  
        $num_month = intval($request->bulan);
        $laporan=DB::select("SELECT b.id_user, b.Waktu, b.Lokasi, b.Unggah_Foto, a.id, a.nama, a.kelurahan, a.no_telepon 
        FROM users a RIGHT JOIN laporan b ON a.id=b.id_user
        WHERE a.kelurahan='$request->kelurahan' AND month(b.Waktu)='$request->bulan' AND year(b.Waktu)='$request->tahun'");
     
        return view('dashboard.index', compact('uniqueYear', 'laporan'));
    
    }

    public function filter2(Request $request)
    {
        $time = DB::table('laporan')->distinct()->pluck('Waktu');
        $getYear = array();
        for ($i=0; $i < count($time); $i++) { $getYear[]=date('Y', strtotime($time[$i])); } $uniqueYear=array_unique($getYear); 
        for ($i=0; $i < count($time); $i++) { $getYear[]=date('Y', strtotime($time[$i])); } $uniqueYear=array_unique($getYear); 
    
        $num_year = intval($request->tahun);  
        $num_month = intval($request->bulan);
        $laporan=DB::select("SELECT b.id_user, b.Waktu, b.Lokasi, b.Unggah_Foto, a.id, a.nama, a.kelurahan, a.no_telepon 
        FROM users a LEFT JOIN laporan b ON a.id=b.id_user
        WHERE a.kelurahan='$request->kelurahan' AND b.id_user IS NULL");
        return view('dashboard.index', compact('uniqueYear', 'laporan'));
    
    }

    public function filter(Request $request)
    {
        switch ($request->filter) {
            case "filter1" :
                $time = DB::table('laporan')->distinct()->pluck('Waktu');
                     $getYear = array();
                     for ($i=0; $i < count($time); $i++) { $getYear[]=date('Y', strtotime($time[$i])); } $uniqueYear=array_unique($getYear); 
                     for ($i=0; $i < count($time); $i++) { $getYear[]=date('Y', strtotime($time[$i])); } $uniqueYear=array_unique($getYear); 
    
                     $num_year = intval($request->tahun);  
                     $num_month = intval($request->bulan);
                   
                $laporan = DB::table('users')->rightjoin('laporan', 'users.id', '=', 'laporan.id_user')
                        ->where('users.kelurahan', $request->kelurahan)
                        ->whereMonth('laporan.Waktu', $request->bulan)
                        ->whereYear('laporan.Waktu', $request->tahun)
                        ->get();
              
                $arrayLaporan = [0];
            return view('dashboard.index', compact('arrayLaporan','uniqueYear', 'laporan'));
            break;
        case "filter2":
                $time = DB::table('laporan')->distinct()->pluck('Waktu');
                $getYear = array();
                    for ($i=0; $i < count($time); $i++) { $getYear[]=date('Y', strtotime($time[$i])); } $uniqueYear=array_unique($getYear); 
                    for ($i=0; $i < count($time); $i++) { $getYear[]=date('Y', strtotime($time[$i])); } $uniqueYear=array_unique($getYear); 
    
                    $num_year = intval($request->tahun);  
                    $num_month = intval($request->bulan);
                   
                    $getlaporan = DB::table('users')->leftjoin('laporan', 'users.id', '=', 'laporan.id_user')
                    ->where('users.kelurahan', $request->kelurahan)
                    ->where('users.role', 'RT')
                    ->whereMonth('laporan.Waktu', $request->bulan)
                    ->whereYear('laporan.Waktu', $request->tahun)
                    ->get();
                   
                    $arrayLaporan = [];
                    if (count($getlaporan) != 0) {
                        $idUsers = [];
                        foreach ($getlaporan as $l) {
                            $idUsers[]=$l->id_user;
                        }
                       
                        $laporan = DB::table('users')
                        ->where('kelurahan', $request->kelurahan)
                        ->where('role', 'RT')
                        ->whereNotIn('id', $idUsers)
                        ->get();
   
                    } else {
                        $laporan = DB::table('users')
                        ->where('kelurahan', $request->kelurahan)
                         ->where('role', 'RT')->get();
                    }
        return view('dashboard.index', compact('arrayLaporan','uniqueYear', 'laporan'));
        break;
        }
        
    }

    //export Function
    public function export(Request $request){
        return Excel::download(new LaporanExport($request->input('kelurahan')), 'laporan.xlsx');
    }

    public function show($id)
    {
        $laporan = Uploadgambar::find($id);
        return view('dashboard.show', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $verif = Uploadgambar::find($id);
        $verif->Status = $request->Status;
        $verif->Keterangan = $request->Keterangan;
        $verif->save();
        
        return back()->with('status', 'Data berhasil diverifikasi!');
    }

    public function chart()
    {
        $time = now();
        $Year=date('Y', strtotime($time));
        $max = \DB::table('laporan')->whereYear('Waktu', $Year)->count();

        $userManggar = \DB::table('users')->where('role', 'RT')->where('kelurahan', 'Manggar')->get();        

        for ($i=1; $i<=12 ; $i++) { 
            foreach ($userManggar as $key => $value) {
                $getlaporanManggar = DB::table('laporan')->where('id_user', $value->id)->whereMonth('Waktu', $i)->whereYear('Waktu', $Year)->select(\DB::raw('count(*) as count, id_user' ))->groupBy('id_user')->get();
                $laporanrtManggar[$value->id] = $getlaporanManggar;
            }
            $datalaporanManggar[$i] = $laporanrtManggar;
           
        }
        for ($i=1; $i <= 12; $i++) { 
            $y = 0;
            foreach ($userManggar as $key => $value) { 
                $index = $i . $y;
                $datartManggar[$index]=$datalaporanManggar[$i][$value->id]->implode('count', ','); 
                $getdataManggar[$i][$y] = $datartManggar[$index];
                $y++;
            }
        }
        
        $namaManggar = [];
        foreach ($userManggar as $p) {
            $namaManggar[] = $p->nama;
        } 

        ////chart 2/////

        $userLamaru = \DB::table('users')->where('role', 'RT')->where('kelurahan', 'Lamaru')->get();        

        for ($i=1; $i<=12 ; $i++) { 
            foreach ($userLamaru as $key => $value) {
                $getlaporanLamaru = DB::table('laporan')->where('id_user', $value->id)->whereMonth('Waktu', $i)->whereYear('Waktu', $Year)->select(\DB::raw('count(*) as count, id_user' ))->groupBy('id_user')->get();
                $laporanrtLamaru[$value->id] = $getlaporanLamaru;
            }
            $datalaporanLamaru[$i] = $laporanrtLamaru;
           
        }
        for ($i=1; $i <= 12; $i++) { 
            $y = 0;
            foreach ($userLamaru as $key => $value) { 
                $index = $i . $y;
                $datartLamaru[$index]=$datalaporanLamaru[$i][$value->id]->implode('count', ','); 
                $getdataLamaru[$i][$y] = $datartLamaru[$index];
                $y++;
            }
        }
        
        $namaLamaru = [];
        foreach ($userLamaru as $p) {
            $namaLamaru[] = $p->nama;
        }

        ////chart 3/////

        $userManggarBaru = \DB::table('users')->where('role', 'RT')->where('kelurahan', 'Manggar Baru')->get();        

        for ($i=1; $i<=12 ; $i++) { 
            foreach ($userManggarBaru as $key => $value) {
                $getlaporanManggarBaru = DB::table('laporan')->where('id_user', $value->id)->whereMonth('Waktu', $i)->whereYear('Waktu', $Year)->select(\DB::raw('count(*) as count, id_user' ))->groupBy('id_user')->get();
                $laporanrtManggarBaru[$value->id] = $getlaporanManggarBaru;
            }
            $datalaporanManggarBaru[$i] = $laporanrtManggarBaru;
           
        }
        for ($i=1; $i <= 12; $i++) { 
            $y = 0;
            foreach ($userManggarBaru as $key => $value) { 
                $index = $i . $y;
                $datartManggarBaru[$index]=$datalaporanManggarBaru[$i][$value->id]->implode('count', ','); 
                $getdataManggarBaru[$i][$y] = $datartManggarBaru[$index];
                $y++;
            }
        }
        
        $namaManggarBaru = [];
        foreach ($userManggarBaru as $p) {
            $namaManggarBaru[] = $p->nama;
        }

        ////chart 4/////

        $userTeritip = \DB::table('users')->where('role', 'RT')->where('kelurahan', 'Teritip')->get();        

        for ($i=1; $i<=12 ; $i++) { 
            foreach ($userTeritip as $key => $value) {
                $getlaporanTeritip = DB::table('laporan')->where('id_user', $value->id)->whereMonth('Waktu', $i)->whereYear('Waktu', $Year)->select(\DB::raw('count(*) as count, id_user' ))->groupBy('id_user')->get();
                $laporanrtTeritip[$value->id] = $getlaporanTeritip;
            }
            $datalaporanTeritip[$i] = $laporanrtTeritip;
           
        }
        for ($i=1; $i <= 12; $i++) { 
            $y = 0;
            foreach ($userTeritip as $key => $value) { 
                $index = $i . $y;
                $datartTeritip[$index]=$datalaporanTeritip[$i][$value->id]->implode('count', ','); 
                $getdataTeritip[$i][$y] = $datartTeritip[$index];
                $y++;
            }
        }
        
        $namaTeritip = [];
        foreach ($userTeritip as $p) {
            $namaTeritip[] = $p->nama;
        }

        ////array seluruh kelurahan////

        $getdatakelurahan = array("Manggar" => $getdataManggar, "Lamaru"  => $getdataLamaru, "Manggar Baru"  => $getdataManggarBaru, "Teritip"  => $getdataTeritip);
        $namakelurahan = array("Manggar" => $namaManggar, "Lamaru"  => $namaLamaru, "Manggar Baru"  => $namaManggarBaru, "Teritip"  => $namaTeritip);

        // dd($getdatakelurahan);
       return view('chart/chartjs', compact('max', 'getdatakelurahan', 'namakelurahan'));
    }
    
}
  

// $jumlah = \DB::table('laporan')
        //             //->join('laporan', 'users.id', '=', 'users.id')
        //             ->select(\DB::raw('count(*) as count, id_user' ))
        //             //->where('users.id', '=', '7')
        //             ->groupBy('id_user')
        //             ->get();
        // $jml = $jumlah->implode('count', ',');

        // dd($datalaporan[5][7]->implode('count', ','));
        // $jml = $datalaporan[5][9]->implode('count', ',');
        // dd(implode($data[5], ','));


                    // dd($jml);