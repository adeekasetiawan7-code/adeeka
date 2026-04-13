<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Pengguna</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #003cff, #5d00ff, #00ff6a);
    background-size: 250% 250%;
    animation: gradientMove 4s ease infinite;
    padding: 20px;
}

@keyframes gradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.container {
    width: 100%;
    max-width: 380px;
    padding: 40px;
    border-radius: 20px;
    background: rgba(0, 0, 0, 0.18);
    backdrop-filter: blur(15px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.25);
    color: white;
}

.container h2 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 26px;
    font-weight: 700;
}

.input-group {
    margin-bottom: 18px;
}

.input-group label {
    display: block;
    margin-bottom: 6px;
    font-size: 13px;
    font-weight: 600;
}

.input-group input {
    width: 100%;
    padding: 13px 14px;
    border: none;
    border-radius: 12px;
    outline: none;
    background: rgba(255,255,255,0.9);
    color: #222;
    font-size: 14px;
    transition: 0.25s;
}

.input-group input:focus {
    transform: translateY(-1px);
    box-shadow: 0 6px 15px rgba(0,0,0,0.15);
}

/* BUTTON */
button {
    width: 100%;
    padding: 13px;
    border: none;
    border-radius: 14px;
    background: linear-gradient(to right, #ffffff, #f1f5ff);
    color: #00227e;
    font-size: 15px;
    font-weight: 700;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 22px rgba(0,0,0,0.25);
}

/* BACK LINK */
.back {
    display: block;
    text-align: center;
    margin-top: 15px;
    font-size: 13px;
    color: #fff;
    text-decoration: none;
    opacity: 0.85;
}

.back:hover {
    opacity: 1;
    text-decoration: underline;
}

/* RESPONSIVE */
@media (max-width: 480px) {
    .container {
        padding: 28px 22px;
    }

    .container h2 {
        font-size: 22px;
    }
}
</style>

</head>

<body>

<div class="container">

<h2>Edit Pengguna</h2>

<form method="POST" action="/update/{{ $user->id }}">
@csrf

<div class="input-group">
    <label>Email</label>
    <input type="email" name="email" value="{{ $user->email }}" required>
</div>

<div class="input-group">
    <label>Password</label>
    <input type="text" name="password" value="{{ $user->password }}" required>
</div>

<button type="submit">Update</button>

</form>

<a href="/daftar_pengguna" class="back">← Kembali</a>

</div>

</body>
</html>