<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #2193b0, #6dd5ed);
            min-height: 100vh;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">
    <div class="card p-4 shadow-lg" style="width: 350px;">
        <h4 class="mb-3 text-center">Login</h4>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required />
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required />
            </div>
            <button class="btn btn-primary w-100">Login</button>
        </form>
        <small class="d-block mt-3 text-center">
            Belum punya akun? <a href="{{ route('register') }}">Register</a>
        </small>
    </div>
</body>
</html>
