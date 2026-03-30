<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', function () {
    if (session()->has('login')) {
        return redirect('/dashboard');
    }

    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (
        trim($request->email) === 'admin@gmail.com' &&
        trim($request->password) === '123456'
    ) {
        session([
            'login' => true,
            'email' => $request->email
        ]);

        return redirect('/dashboard');
    }

    return back()
        ->withInput($request->only('email'))
        ->withErrors([
            'email' => 'Email atau password salah.',
        ]);
})->name('login.post');

Route::get('/dashboard', function () {
    if (!session()->has('login')) {
        return redirect('/login');
    }

    return view('dashboard');
})->name('dashboard');

Route::get('/caesar', function () {
    if (!session()->has('login')) {
        return redirect('/login');
    }

    return view('caesar');
})->name('caesar');

Route::post('/caesar', function (Request $request) {
    if (!session()->has('login')) {
        return redirect('/login');
    }

    $request->validate([
        'text' => 'required',
        'shift' => 'required|integer|min:1|max:25',
        'action' => 'required|in:encrypt,decrypt',
    ]);

    $text = $request->text;
    $shift = (int) $request->shift;
    $mode = $request->action;
    $result = '';

    if ($mode === 'decrypt') {
        $shift = 26 - $shift;
    }

    for ($i = 0; $i < strlen($text); $i++) {
        $char = $text[$i];

        if (ctype_alpha($char)) {
            $asciiOffset = ctype_upper($char) ? 65 : 97;
            $result .= chr((ord($char) - $asciiOffset + $shift) % 26 + $asciiOffset);
        } else {
            $result .= $char;
        }
    }

    return view('caesar', [
        'result' => $result,
        'text' => $text,
        'shift' => $request->shift,
        'mode' => $mode
    ]);
})->name('caesar.process');

Route::post('/logout', function () {
    session()->flush();
    return redirect('/login');
})->name('logout');