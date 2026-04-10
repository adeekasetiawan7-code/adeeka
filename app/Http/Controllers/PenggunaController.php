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
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session([
                'user'  => $user->email,
                'name'  => $user->name ?? $user->email
            ]);

            return redirect('/dashboard');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function dashboard()
    {
        $users = User::all();

        return view('Daftar_pengguna', compact('users'));
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login')->with('success', 'Anda telah logout');
    }
}