<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #2193b0, #6dd5ed);
            min-height: 100vh;
            color: #fff;
        }
        .sidebar {
            height: 100vh;
            background-color: #0b3553;
            color: #fff;
        }
        .sidebar a {
            color: #fff;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #1e5d7e;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <div class="sidebar p-3">
            <h4>{{ auth()->user()->role == 'dosen' ? 'Dosen' : 'Mahasiswa' }}</h4>
            <hr>
            <a href="{{ route('dashboard') }}">Dashboard</a>
            <a href="{{ route('tugas.index') }}">Manajemen Tugas</a>
            @if(auth()->user()->role == 'mahasiswa')
            <a href="{{ route('pengumpulan.index') }}">Kumpul Tugas</a>
            @endif
            <form action="{{ route('logout') }}" method="POST" class="mt-3">
                @csrf
                <button class="btn btn-danger w-100">Logout</button>
            </form>
        </div>
        <div class="flex-fill p-4">
            @yield('content')
        </div>
    </div>
</body>
</html>
