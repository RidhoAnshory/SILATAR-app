<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; 
use App\User;
use App\Users;
use App\Uploadgambar;


class AkunrtController extends Controller
{
    public function data()
    {
        $akunrt = DB::table('users')->get();
        return view('akunrt.data') ->with ('users', $akunrt);
    }

    public function add()
    {
        return view('akunrt.add');
    }

    public function store(Request $request)
    {   
        DB::table('users')->insert([
            'role' => $request->role,
            'nama' => $request->nama,
            'kelurahan' => $request->kelurahan,
            'no_telepon' => $request->no_telepon,
            'username' => $request->username,
            'password' => bcrypt($request->password)
            
       ]);
      return redirect('akunrt')->with('status', 'Akun RT berhasil ditambah!');
    }    
    public function edit($id)
    {
        $akunrt = DB::table('users')->where('id', $id)->first();
        return view('akunrt/edit', compact('akunrt'));
    }

    public function editprocess(Request $request, $id)
    {
        $user = Users::findOrFail($id);
        $user->nama = $request->get('nama');
        $user->kelurahan = $request->get('kelurahan');
        $user->no_telepon = $request->get('no_telepon');
        $user->username = $request->get('username');
        if (!$request->get('password') === '') {
            $user->password = bcrypt($request->get('password'));
        }
        $user->save();
        return redirect('akunrt')->with('status', 'Akun RT berhasil diubah!');
    }

    public function delete($id)
    {
        Users::destroy($id);
        $hapus = Uploadgambar::where('id_user',$id)->get();
        foreach ($hapus as $hapus) {
            $file = public_path('/img/'). $hapus->Unggah_Foto;
            if(file_exists($file)) {
                @unlink($file);
            }
            $hapus->delete();
        }
        return redirect('akunrt')->with('status', 'Akun RT berhasil dihapus!');
    }

}

