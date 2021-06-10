<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Users;

class InformasiController extends Controller
{
    public function edit()
    {
        return view('informasi.edit');
    }

    public function update(Request $request)
    {
    $user = auth()->user()->id;
    request()->validate([
        'no_telepon' => ['required', 'numeric', 'digits_between:6,13']
    ],[
        'no_telepon.required' => 'Nomor telepon harus diisi',
        'no_telepon.digits_between' => 'Nomor telepon harus terdiri diantara 6 sampai 13 digit angka',
        'no_telepon.numeric' => 'Nomor telepon harus berupa angka'
    ]);
    Users::find($user)->update([    
   
    'no_telepon' => $request->no_telepon
      
            ]);
            return back()->with('success', "Anda berhasil merubah informasi anda");
}
}