@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<style>
    body {
        margin: 0;
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #003cff, #5d00ff, #00ff6a);
        background-size: 300% 300%;
        animation: bgMove 10s ease infinite;
    }

    @keyframes bgMove {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    .dashboard {
        max-width: 1250px;
        margin: 0 auto;
        padding: 55px 30px 100px;
    }

    .welcome {
        background: linear-gradient(135deg, rgba(255,255,255,0.20), rgba(255,255,255,0.08));
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border: 1px solid rgba(255,255,255,0.18);
        color: white;
        padding: 38px 42px;
        border-radius: 28px;
        margin-bottom: 35px;
        box-shadow: 0 18px 45px rgba(0,0,0,0.18);
    }

    .welcome h2 {
        margin: 0 0 12px;
        font-size: 46px;
        font-weight: 800;
        letter-spacing: -1px;
    }

    .welcome p {
        margin: 0;
        font-size: 24px;
        color: rgba(255,255,255,0.95);
    }

    .welcome b {
        color: #fff;
    }

    .grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
    }

    .card {
        background: rgba(255,255,255,0.96);
        padding: 28px 24px;
        border-radius: 22px;
        box-shadow: 0 14px 35px rgba(0,0,0,0.12);
        transition: all .25s ease;
        min-height: 215px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 40px rgba(0,0,0,0.16);
    }

    .card h3 {
        margin: 0 0 18px;
        color: #4f46e5;
        font-size: 20px;
        font-weight: 800;
    }

    .card p,
    .card li,
    .card a,
    .card b {
        font-size: 16px;
        color: #111827;
        line-height: 1.7;
    }

    .card ul {
        margin: 0;
        padding-left: 20px;
    }

    .card li {
        margin-bottom: 8px;
    }

    .card a {
        color: #4338ca;
        text-decoration: none;
        font-weight: 600;
    }

    .card a:hover {
        text-decoration: underline;
    }

    .status-badge {
        display: inline-block;
        margin-top: 12px;
        padding: 10px 16px;
        border-radius: 12px;
        background: linear-gradient(135deg, #eef2ff, #dbeafe);
        color: #312e81;
        font-weight: 700;
        box-shadow: inset 0 0 0 1px rgba(79,70,229,0.08);
    }

    /* Tombol logout fixed kiri bawah */
    .logout-fixed {
        position: fixed;
        left: 22px;
        bottom: 22px;
        z-index: 999;
    }

    @media (max-width: 1100px) {
        .grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .welcome h2 {
            font-size: 38px;
        }

        .welcome p {
            font-size: 20px;
        }
    }

    @media (max-width: 700px) {
        .dashboard {
            padding: 30px 18px 100px;
        }

        .grid {
            grid-template-columns: 1fr;
        }

        .welcome {
            padding: 28px 24px;
            border-radius: 22px;
        }

        .welcome h2 {
            font-size: 30px;
        }

        .welcome p {
            font-size: 17px;
        }

        .card {
            min-height: auto;
        }
    }
</style>

<div class="dashboard">

    <div class="welcome">
        <h2>Dashboard</h2>
        <p>Selamat datang, <b>{{ session('user') }}</b> 👋</p>
    </div>

    <div class="grid">

        <div class="card">
            <h3>Informasi</h3>
            <p>Ini adalah halaman dashboard utama untuk mengakses fitur aplikasi yang tersedia.</p>
        </div>

        <div class="card">
            <h3>Menu</h3>
            <ul>
                <li><a href="/caesar">Caesar Cipher</a></li>
            </ul>
        </div>

        <div class="card">
            <h3>Fitur</h3>
            <ul>
                <li>Laravel MVC</li>
                <li>Session Login</li>
                <li>Controller</li>
                <li>Routing</li>
            </ul>
        </div>

        <div class="card">
            <h3>Status Login</h3>
            <p>Login sebagai:</p>
            <div class="status-badge">{{ session('user') }}</div>
        </div>

    </div>
</div>
</div>

@endsection