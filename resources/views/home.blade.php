<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - WebServ</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container" style="padding: 120px 0 60px;">
        <h1>Bienvenido</h1>
        <p>Ya estas dentro. Aqui ira tu dashboard.</p>
        <form method="post" action="/logout" style="margin-top: 24px;">
            @csrf
            <button type="submit" class="btn">Cerrar sesion</button>
        </form>
    </div>
</body>
</html>
