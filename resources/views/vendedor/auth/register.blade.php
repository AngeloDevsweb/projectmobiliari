<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Vendedor</title>
</head>
<body>
    <h1>Registro de Vendedor</h1>
    <form action="{{ route('vendedor.register.submit') }}" method="POST">
        @csrf
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>

        <label for="password_confirmation">Confirmar Contraseña:</label>
        <input type="password" name="password_confirmation" required>

        <label for="tipo_vendedor">Tipo de Vendedor:</label>
        <select name="tipo_vendedor" required>
            <option value="dueño de propiedad">Dueño de Propiedad</option>
            <option value="vendedor externo">Vendedor Externo</option>
        </select>

        <button type="submit">Registrarse</button>
    </form>
</body>
</html>
