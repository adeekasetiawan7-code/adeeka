<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // cek user dan password hash
        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'user' => $user->email,
                'name' => $user->name
            ]);

            return redirect('/dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function dashboard()
    {
        if (!session('user')) {
            return redirect('/login');
        }

        return view('Daftar_pengguna');
    }

    public function logout()
    {
        session()->forget('user');
        session()->forget('name');

        return redirect('/login');
    }

    public function index()
    {
        return "Halo dari controller";
    }

    public function create()
    {
        return "Simpan pengguna";
    }
}