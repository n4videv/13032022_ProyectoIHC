<?php
    include 'php/conexion_be.php';

    session_start();
    
    $user_id = $_SESSION['user_id'];
    // echo $user_id;

    if(!isset($_SESSION['user_name'])){
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
    <title>Nosotros</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <script src="https://kit.fontawesome.com/42778bfa5e.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="./assets/css/styles_all.css">
</head>
<body>
    <?php include 'includes/header_all.php'; ?>
    
    <div class="heading">
        <h3>Acerca de Nosotros</h3>
        <p> <a href="<?php echo constant("URL").'home_user.php'?>">Inicio</a> / Nosotros </p>
    </div>
    
    <section class="about">
        <div class="flex">
            <div class="image">
                <img src="<?php echo constant("URL").'assets/images/logo.png' ?>" alt="">
            </div>

            <div class="content">
                <h3>Por qué elegirnos?</h3>
                <p>Somos una farmacia que ofrece variedad de productos, los cuales son distribuidos a precios módicos y efectivos. Ahora también por el medio digital. Es la mejor opción local, puedes realizar tus compras de forma vitual, lista tus productos médicos en tu carrito y realiza tu pedido. Puede pasar por tus productos en nuestra farmacia o podemos enviarlo por delivery.</p>
                <a href="<?php echo constant("URL").'about.php'?>" class="btn">Leer más</a>
            </div>
        </div>
    </section>

    <section class="reviews">
        <h1 class="title">Revisar Clientes</h1>
        <div class="box-container">

            <div class="box">
                <img src="assets/images/profile-user-lg.png" alt="">
                <p>Es buena la atención, realizamos nuestro pedido y en menos de 4h lo recibimos en casa</p>
                <div class="starts">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Juan Perez</h3>
            </div>

            <div class="box">
                <img src="assets/images/profile-user-lg.png" alt="">
                <p>Apuesto por el sistema, ya no hago cola como amtes lo hacía, ahora compro más tranquilo.</p>
                <div class="starts">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Lucas Pereira</h3>
            </div>

            <div class="box">
                <img src="assets/images/profile-user-lg.png" alt="">
                <p>Me ayuda, por que ya no tengo que ir a exponerme a un posible contagio.</p>
                <div class="starts">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Juan Bernardo</h3>
            </div>

            <div class="box">
                <img src="assets/images/profile-user-lg.png" alt="">
                <p>Estoy seguro de que será un mejor sistema, espero mejore en el diseño, funcionalidad, experiencia de usuario, etc.</p>
                <div class="starts">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Percy Huamán</h3>
            </div>

            <div class="box">
                <img src="assets/images/profile-user-lg.png" alt="">
                <p>Me ayuda mucho, si bien hay veces que el stock no tiene productos, por la plataforma realizo el pedido y me dicen en cuanto tiempo podría obtener el producto.</p>
                <div class="starts">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Luis Quispe</h3>
            </div>

            <div class="box">
                <img src="assets/images/profile-user-lg.png" alt="">
                <p>Desde ahora realizaré las compras por esta plataformas, hay varios motivos por el cual hacerlo, y uno de ellos es el tiempo.</p>
                <div class="starts">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Maria Delgado</h3>
            </div>
        </div>
    </section>

    <section class="authors">
        <h1 class="title">Dueños y Empleados:</h1>
        <div class="box-container">
            <div class="box">
                <img src="assets/images/profile-user-lg.png" alt="">
                    <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
                <h3>Liz Gomez Ramon</h3>
            </div>

            <div class="box">
                <img src="assets/images/profile-user-lg.png" alt="">
                    <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                    </div>
                <h3>Carlos Enrique Tome</h3>
            </div>

            <div class="box">
                <img src="assets/images/profile-user-lg.png" alt="">
                    <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                    </div>
                <h3>Marcela Gomez R.</h3>
            </div>
        </div>
    </section>

    
    <?php include 'includes/footer_all.php' ?>

    <script src="assets/js/main_all.js"></script>
</body>
</html>