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
                <p>Nosotros te ofrecemos una variedad de productos para la salud, ademas contamos con un servicio de entrega para que no tenga que estar dirigiéndose  a nuestro establecimiento y con varios medios de pago.</p>
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
                <h3>Marcela Gomez Ramon</h3>
            </div>

            </div>
        </div>
    </section>


    <?php include 'includes/footer_all.php' ?>

    <script src="assets/js/main_all.js"></script>
</body>
</html>