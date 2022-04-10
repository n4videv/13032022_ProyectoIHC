<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
        <form action="php/registro_usuario_be.php" class="formulario__register" method="POST">
            <h2>Registrarse</h2>
            <input type="text" placeholder="Ingrese su nombre completo" name="full_name" required>
            <input type="text" placeholder="Ingrese su correo" name="correo" >
            <input type="text" placeholder="Ingrese su el nombre de Usuario" name="user" required>
            <input type="password" placeholder="Ingrese su contraseña" name="pass" >
            <select name="type_user">
                <option value="user">Usuario</option>
                <option value="admin">Administrador</option>
            </select>
            <button>Registrarse</button>
        </form>
</body>
</html>