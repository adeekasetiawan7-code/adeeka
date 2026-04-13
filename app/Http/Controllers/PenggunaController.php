<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function index()
{
    if (!session('login')) {
    return redirect('/login');
}
    $users = Pengguna::all();

    return view('daftar_pengguna', compact('users'));
}

    /**
     * Show the form for creating a new resource.
     */
public function create()
{
    return view('tambah_pengguna');
}

    /**
     * Store a newly created resource in storage.
     */


public function store(Request $request)
{
    Pengguna::create([
        'email' => $request->email,
        'password' => $request->password
    ]);

    return redirect('/daftar_pengguna');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
 public function edit($id)
{
    $user = Pengguna::find($id);
    return view('edit_pengguna', compact('user'));
}

    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, $id)
{
    $user = Pengguna::find($id);

    $user->update([
        'email' => $request->email,
        'password' => $request->password
    ]);

    return redirect('/daftar_pengguna');
}

    /**
     * Remove the specified resource from storage.
     */
public function destroy($id)
{
    $user = Pengguna::find($id);
    $user->delete();

    return redirect('/daftar_pengguna');
}
}