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
    <title>Page About</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <script src="https://kit.fontawesome.com/42778bfa5e.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="./assets/css/styles_all.css">
</head>
<body>
    <?php include 'includes/header_all.php' ?>
    
    <div class="heading">
        <h3>Acerca de Nosotros</h3>
        <p> <a href="<?php echo constant("URL").'home_user.php'?>">Menu Usuario</a> / about </p>
    </div>

    <section class="about">
        <div class="flex">
            <div class="image">
                <img src="<?php echo constant("URL").'assets/images/logo.png' ?>" alt="">
            </div>

            <div class="content">
                <h3>Por qué elegirnos?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem, tempora dolores earum veritatis a in distinctio ipsum asperiores beatae atque facilis itaque tenetur aliquid deserunt minus nemo provident vel voluptatum qui quos, impedit culpa numquam? Reprehenderit, unde esse eos vitae dignissimos voluptate architecto placeat, neque aliquam quidem error. Quasi, reprehenderit?</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam asperiores aliquid nostrum, velit ipsum explicabo odio temporibus iste maiores facere similique dolorem minima fuga id sit quis laudantium ipsa. Hic expedita qui quaerat animi repudiandae quibusdam laborum nemo consectetur, reprehenderit quod magni eius fugiat! In veniam fugit voluptate? Inventore, sit?</p>
                <a href="<?php echo constant("URL").'about.php'?>" class="btn">Leer más</a>
            </div>
        </div>
    </section>

    <section class="reviews">
        <h1 class="title">Revisar Clientes</h1>
        <div class="box-container">

            <div class="box">
                <img src="assets/images/profile-user-lg.png" alt="">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quaerat odit ipsam iste voluptatem odio ipsum distinctio ratione dolor reprehenderit explicabo.</p>
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
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto, quae. Alias nostrum at obcaecati dolores dolor in et consequuntur saepe?</p>
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
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto, quae. Alias nostrum at obcaecati dolores dolor in et consequuntur saepe?</p>
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
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto, quae. Alias nostrum at obcaecati dolores dolor in et consequuntur saepe?</p>
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
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto, quae. Alias nostrum at obcaecati dolores dolor in et consequuntur saepe?</p>
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
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto, quae. Alias nostrum at obcaecati dolores dolor in et consequuntur saepe?</p>
                <div class="starts">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
                <h3>Juan Perez</h3>
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
                <h3>Juan PerezC</h3>
            </div>

            <div class="box">
                <img src="assets/images/profile-user-lg.png" alt="">
                    <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
                <h3>Juan Perez2</h3>
            </div>

            <div class="box">
                <img src="assets/images/profile-user-lg.png" alt="">
                    <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
                <h3>Juan Perez3</h3>
            </div>

            <div class="box">
                <img src="assets/images/profile-user-lg.png" alt="">
                    <div class="share">
                    <a href="#" class="fab fa-facebook-f"></a>
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-instagram"></a>
                    <a href="#" class="fab fa-linkedin"></a>
                </div>
                <h3>Juan Perez4</h3>
            </div>
        </div>
    </section>


    <?php include 'includes/footer_all.php' ?>

    <script src="assets/js/main_all.js"></script>
</body>
</html>