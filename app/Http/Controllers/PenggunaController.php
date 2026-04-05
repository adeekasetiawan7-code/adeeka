<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if ($request->email == 'admin@gmail.com' && $request->password == '123456') { 
        return redirect('/dashboard');
        }

        return back()->with('error', 'Login gagal');
    }
}