<?php
    session_start();
    
    if(!isset($_SESSION['admin_name'])){
        echo "<script>
                alert('Por favor inicie sesión');
                window.location='index.php';
             </script>";
        session_destroy(); 
        die(); 
    }
    //session_destroy()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
</head>
<body>
    <div id="menu">
        <ul>
            <li>Home</li>
            <li class="cerrar-sesion">
                <a href="php/cerrar_sesion.php">Cerrar Sesión</a>
            </li>
        </ul>
    </div>
    
    <section>
        <h1>Bienvenido  <?php echo $_SESSION['admin_name']; ?> </h1>
    </section>
</body>
</html>