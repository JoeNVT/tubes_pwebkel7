<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #2193b0, #6dd5ed);
            min-height: 100vh;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center">
    <div class="card p-4 shadow-lg" style="width: 400px;">
        <h4 class="mb-3 text-center">Register</h4>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="mb-2">
                <input type="text" name="name" class="form-control" placeholder="Nama" required />
            </div>
            <div class="mb-2">
                <input type="email" name="email" class="form-control" placeholder="Email" required />
            </div>
            <div class="mb-2">
                <select name="role" class="form-control" required>
                    <option value="">Pilih Role</option>
                    <option value="dosen">Dosen</option>
                    <option value="mahasiswa">Mahasiswa</option>
                </select>
            </div>
            <div class="mb-2">
                <input type="password" name="password" class="form-control" placeholder="Password" required />
            </div>
            <div class="mb-2">
                <input type="password" name="password_confirmation" class="form-control"
                    placeholder="Konfirmasi Password" required />
            </div>
            <button class="btn btn-success w-100">Register</button>
        </form>
        <small class="d-block mt-3 text-center">
            Sudah punya akun? <a href="{{ route('login') }}">Login</a>
        </small>
    </div>
</body>

</html>
