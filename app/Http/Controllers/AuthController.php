<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengguna;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function prosesLogin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = DB::table('pengguna')
            ->where('email', $email)
            ->where('password', $password)
            ->first();

        if ($user) {
            session(['login' => true]);
            return redirect('/daftar_pengguna');
        } else {
            return redirect('/login')->with('error', 'Email atau password salah');
        }
    }

    public function daftarPengguna()
    {
        $users = pengguna::all();
        return view('daftar_pengguna', compact('users'));
    }

    public function dashboard() {
        return session('login') ? view('dashboard') : redirect('/login');
    }

    public function logout() {
        session()->flush();
        return redirect('/login');
    }
}