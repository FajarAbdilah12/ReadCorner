<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
</head>
<body>
    <h1>Register</h1>
    @if ($errors->any())
        <div>
            <strong>{{ $errors->first() }}</strong>
        </div>
    @endif
    <form action="{{ route('register') }}" method="POST">
    @csrf
    <label>Nama</label>
    <input type="text" name="name" required>
    <label>Email</label>
    <input type="email" name="email" required>
    <label>Password</label>
    <input type="password" name="password" required>
    <label>Konfirmasi Password</label>
    <input type="password" name="password_confirmation" required>
    <button type="submit">Daftar</button>
</form>

</body>
</html>