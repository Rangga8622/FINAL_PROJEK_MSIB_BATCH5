<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,900" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('acces_denied/acces_denied.css') }}" />
    <title>Access Denied</title>
</head>

<body>
    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>Access Denied</h1>
            </div>
            <h2>Mohon Maaf, Akun Anda tidak memiliki Akses ke Halaman ini</h2>
            <a href="{{ url('/home') }}">Kembali</a>
        </div>
    </div>
</body>

</html>
