<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auths.login');
    }
    public function postlogin(Request $request)
    {
        request()->validate([
            'username' => 'required',
            'password' => 'required'
        ],[
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi'
        ]);
       
    if(Auth::attempt($request->only('username','password'))) {
    $role = Auth::user()->role; 

    // Check user role
    $role = Auth::user()->role;
    if ($role == "Kecamatan/Kelurahan") {
        return redirect('dashboard');
    }
    elseif ($role == "RT") {
        return redirect('laporan');
     }}
     else{
        return redirect('login')->withErrors(['username', 'password' => "Pastikan anda mengisi Username atau password yang benar"]);
    }}

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
    
}
