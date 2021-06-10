<?php

namespace App\Http\Controllers;

use App\Exports\LaporanExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Uploadgambar;
use Maatwebsite\Excel\Facades\Excel;


class LaporanController extends Controller
{
    public function data()
    {   
        $laporan = DB::table('laporan')
        ->rightJoin('users', 'laporan.id_user', '=', 'users.id')
        ->where('id_user', '=',Auth:: user()->id)
           ->whereNotNull('users.id')
           ->select('laporan.*')
            ->get();
         
        return view('laporan.data') ->with ('laporan', $laporan);
    }

    public function add()
    {
        return view('laporan.add');
    }

    public function addprocess(Request $request)

    {        
        request()->validate([
            'Unggah_Foto' => ['required', 'max:2000', 'image']
        ],[
            'Unggah_Foto.max' => 'Maksimal Ukuran Foto 2000 MB'
         
        ]);
        $nm = $request->Unggah_Foto;
        $namaFile = "".time().rand(100,999).".".$nm->getClientOriginalName();

            $id_user = Auth::user()->id;
            $dtUpload = new Uploadgambar;
            $dtUpload->id_user = $id_user;
            $dtUpload->Jenis_laporan = $request->Jenis_laporan;
            $dtUpload->Waktu = $request->Waktu;
            $dtUpload->Lokasi = $request->Lokasi;
            $dtUpload->Penjelasan = $request->Penjelasan;
            $dtUpload->Unggah_Foto = $namaFile;
            $dtUpload->url_Unggah = "http://127.0.0.1:8000/img/".$namaFile;
            $nm->move(public_path().'/img', $namaFile);
            $dtUpload->Status = 'Belum Diverifikasi';
            $dtUpload->save();
      
        return redirect('laporan')->with('status', 'Laporan berhasil ditambah!');
    }    
    public function edit($id)
    {
       $laporan = Uploadgambar::findorfail($id);
        // $laporan = DB::table('laporan')->where('id', $id)->first();
        return view('laporan/edit', compact('laporan'));
    }

   public function update(Request $request, $id)
    {
        request()->validate([
            'Unggah_Foto' => ['max:2000', 'image']
        ],[
            'Unggah_Foto.max' => 'Maksimal Ukuran Foto 2000 MB'
         
        ]);
        $ubah = Uploadgambar::findOrFail($id);
        $awal = $ubah->Unggah_Foto;
        $data = $request->all();
        if ($request->file('Unggah_Foto')) {
            $file = $request->file('Unggah_Foto');
        	$foto = $file->move("img", $awal);
            $foto = substr($foto, 4);
        	$data['Unggah_Foto'] = $foto;
            $data['url_Unggah']="http://127.0.0.1:8000/img/".$foto;

        }
        $ubah->update($data);
        // $ubah->update($laporan);
        return redirect('laporan')->with('status', 'Laporan berhasil diubah!');
   }

    public function delete($id)
    {
        $hapus = Uploadgambar::where('id', $id)->first();
        $file = public_path('/img/'). $hapus->Unggah_Foto;

        if(file_exists($file)) {
            @unlink($file);
        }
        $hapus->delete();

        // DB::table('laporan')->where('id', $id)->delete();
        return redirect('laporan')->with('status', 'Laporan berhasil dihapus!');
    }

    
    
   
}

