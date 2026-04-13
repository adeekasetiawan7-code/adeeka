<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Daftar Pengguna</title>

<style>
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family: 'Poppins', sans-serif;
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

.container{
width:900px;
padding:30px;
border-radius:20px;
background:rgba(255,255,255,0.1);
backdrop-filter:blur(15px);
box-shadow:0 8px 32px rgba(0,0,0,0.3);
color:white;
}

.header{
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:20px;
}

.header h2{
font-size:26px;
}

.button-group a{
padding:10px 15px;
border-radius:20px;
text-decoration:none;
color:white;
font-size:14px;
margin-left:10px;
}

.btn-add{
background:linear-gradient(45deg,#00c6ff,#0072ff);
}

.btn-logout{
background:linear-gradient(45deg,#ff416c,#ff4b2b);
}

.table{
width:100%;
border-collapse:collapse;
overflow:hidden;
border-radius:10px;
}

.table th, .table td{
padding:12px;
text-align:center;
}

.table thead{
background:rgba(0,0,0,0.4);
}

.table tbody tr{
background:rgba(255,255,255,0.1);
transition:0.3s;
}

.table tbody tr:hover{
background:rgba(255,255,255,0.2);
}

.btn{
padding:6px 10px;
border-radius:10px;
text-decoration:none;
color:white;
font-size:12px;
}

.btn-edit{
background:orange;
}

.btn-delete{
background:red;
}

.alert{
background: rgba(0,255,0,0.2);
padding:10px;
border-radius:10px;
margin-bottom:15px;
font-size:13px;
}
</style>

</head>

<body>

<div class="container">

    <div class="header">
        <h2>Daftar Pengguna</h2>
        <div class="button-group">
            <a href="/tambah_pengguna" class="btn-add">+ Tambah</a>
            <a href="/logout" class="btn-logout">Logout</a>
        </div>
    </div>

    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Email</th>
                <th>Password</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->email }}</td>
                <td>********</td>
                <td>
                    <a href="/edit/{{ $user->id }}" class="btn btn-edit">Edit</a>
                    <a href="/delete/{{ $user->id }}" 
                       class="btn btn-delete"
                       onclick="return confirm('Yakin mau hapus?')">
                       Hapus
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

</body>
</html>