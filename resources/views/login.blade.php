<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
            background-size: 300% 300%;
            animation: gradientMove 10s ease infinite;
            padding: 20px;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-box {
            width: 100%;
            max-width: 380px;
            background: rgba(0, 0, 0, 0.18);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(0, 0, 0, 0.25);
            border-radius: 20px;
            padding: 40px 45px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.18);
            color: #797979;
        }

        .login-header {
            text-align: center;
            margin-bottom: 45px;
        }

        .login-header h2 {
            font-size: 30px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #fff;
        }

        .login-header p {
            font-size: 14px;
            color: rgba(255,255,255,0.85);
        }

        .error {
            background: rgba(255, 77, 77, 0.15);
            border: 1px solid rgba(255, 77, 77, 0.35);
            color: #fff;
            padding: 12px;
            border-radius: 12px;
            margin-bottom: 18px;
            text-align: center;
            font-size: 14px;
        }

        .input-group {
            margin-bottom: 18px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #fff;
        }

        .input-group input {
            width: 100%;
            padding: 14px 15px;
            border: none;
            outline: none;
            border-radius: 14px;
            background: rgba(255,255,255,0.92);
            color: #222;
            font-size: 15px;
            transition: 0.3s ease;
            box-shadow: inset 0 0 0 2px transparent;
        }

        .input-group input:focus {
            transform: translateY(-1px);
            box-shadow: inset 0 0 0 2px #4facfe, 0 8px 18px rgba(0,0,0,0.12);
        }

        .input-group input::placeholder {
            color: #777;
        }

        .login-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 14px;
            background: linear-gradient(to right, #ffffff, #f1f5ff);
            color: #00227e;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 25px rgba(0,0,0,0.2);
            background: linear-gradient(to right, #f8fbff, #ffffff);
        }

        .login-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: rgba(255,255,255,0.9);
        }

        .login-footer a {
            color: #fff;
            font-weight: 600;
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .login-box {
                padding: 28px 22px;
                border-radius: 18px;
            }

            .login-header h2 {
                font-size: 26px;
            }
        }
    </style>
</head>
<body>

    <div class="login-box">
        <div class="login-header">
            <h2>LOGIN</h2>
            <p>Silakan login untuk melanjutkan</p>
        </div>

        @if(session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif

        <form action="{{ url('/login') }}" method="POST">
            @csrf

            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" placeholder="Masukkan email" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="login-btn">Login</button>
        </form>

        <div class="login-footer">
        </div>
    </div>

</body>
</html>