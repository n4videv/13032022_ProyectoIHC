<?php

if(isset($message)){
    foreach($message as $message){
        echo 
        '<div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onClick="this.parentElement.remove();"></i>
        </div>';
    }
}
?>

<header class="header">
    <div class="header-1">
        <div class="flex">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            
            <p> Nuevo <a href="<?php echo constant("URL").'login_register.php' ?>">Login</a> | <a href="<?php echo constant("URL").'login_register.php' ?>">Registro</a></p>
        </div>
    </div>

    <div class="header-2">
        <div class="flex">
            <a href="<?php echo constant("URL").'home_user.php' ?>" class="logo">Cruz de Mayo</a>

            <nav class="navbar">
                <a href="<?php echo constant("URL").'home_user.php' ?>">Menu Usuario</a>
                <a href="<?php echo constant("URL").'about.php' ?>">Nosotros</a>
                <a href="<?php echo constant("URL").'shop-farma.php' ?>">Tienda farmacia</a>
                <a href="<?php echo constant("URL").'contacts.php' ?>">Contáctanos</a>
                <a href="<?php echo constant("URL").'orders.php' ?>">Ordenes</a>
            </nav>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <a href="<?php echo constant("URL").'search_page.php' ?>" class="fas fa-search"></a>
                <div id="user-btn" class="fas fa-user"></div>
                <?php
                    $select_user_id_in_carrito=$conn->prepare("SELECT * FROM carrito WHERE user_id='$user_id'");
                    $select_user_id_in_carrito->execute();
                    $number_rows_carrito=$select_user_id_in_carrito->rowCount();
                ?>
                <a href="<?php echo constant("URL").'carrito.php' ?>"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $number_rows_carrito; ?>)</span> </a>
            </div>

            <div class="user-box">
                <p>Usuario : <span><?php echo $_SESSION['user_name']; ?></span></p>
                <p>Correo : <span><?php echo $_SESSION['user_email']; ?></span></p>
                <a href="<?php echo constant("URL").'php/cerrar_sesion.php' ?>" class="delete-btn">Cerrar Sesión</a>
            </div>
        </div>
    </div>

</header>