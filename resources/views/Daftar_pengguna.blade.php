<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; background: #f8f9fa; }
        h1 { text-align: center; color: #333; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: white;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th { background-color: #f2f2f2; }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .logout {
            text-align: center;
            margin-top: 30px;
            font-size: 18px;
        }
        .logout a { color: #d9534f; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <h1>Data Pengguna</h1>

    <table>
        <thead>
            <tr>
                <th>Id_Pengguna</th>
                <th>Email</th>
                <th>Password</th>
                <th>Created_at</th>
                <th>Updated_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->password }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="logout">
        <a href="{{ route('logout') }}">Logout</a>
    </div>
</body>
</html>