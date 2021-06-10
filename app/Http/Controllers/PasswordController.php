<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('password.edit');
    }

    public function update()
    {
        request()->validate([
            'old_password' => 'required',
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ],[
            'old_password.required' => 'Password lama harus diisi',
            'password.required' => 'Password baru harus diisi',
            'password.confirmed' => 'Password baru dan konfirmasi password tidak sama',
            'password.min' => 'Password minimal terdiri dari 5 karakter'
        ]);
        $currentPassword = auth()->user()->password;
        $old_password = request('old_password');

        if (Hash::check($old_password, $currentPassword)) {
            auth()->user()->update([
                'password' => bcrypt(request('password')),
                
            ]);
            return back()->with('success', "Anda berhasil merubah kata sandi anda");
        } else {
            return back()->withErrors(['old_password' => 'Pastikan Anda mengisi kata sandi yang benar']);
        }
    }

}
