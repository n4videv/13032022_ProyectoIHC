<?php
    session_start();
    
    if(isset($_SESSION['usuario'])){
        header('location: home.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" cont ent="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN Y REGISTER</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>
<body>
    
    <main>
        <div class="contenedor_todo">
            <div class="caja__trasera">
                <div class="caja__trasera-login">
                    <h3>¿Ya tienes una cuenta?</h3>
                    <p>Inicia Sesión para entrar en la página</p>
                    <button id="btn__iniciar-sesion">Inicar Sesión</button>
                </div>
                <div class="caja__trasera-register">
                    <h3>¿Aún no tienes una cuenta?</h3>
                    <p>Reistrarse para que puedas iniciar sesión</p>
                    <button id="btn__registrarse">Registrarse</button>
                </div>
            </div>  
            <div class="contenedor__login-register">
                <!-- Login -->
                <?php
                    include "login.php";
                ?>
                <!-- Register -->
                <?php
                    include "register.php";
                ?>
            </div>
        </div>
    </main>

    <script src="assets/js/main.js"></script>
</body>
</html>