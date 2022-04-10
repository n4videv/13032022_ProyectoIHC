<header class="header">
    <div class="header-1">
        <div class="flex">
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-twitter"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-linkedin"></a>
            </div>
            <p> Nuevo <a href="../login.php">login</a> | <a href="../register.php">login</a></p>
        </div>
    </div>

    <div class="header-2">
        <div class="flex">
            <a href="../home_user.php" class="logo">Botica Cruz de Mayo</a>

            <nav class="navbar">
                <a href="../home_user.php">Menu Usuario</a>
                <a href="#">Nosotros</a>
                <a href="#">Tienda</a>
                <a href="#">Contactos</a>
                <a href="#">Ordenes</a>
            </nav>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
                <a href="#" class="fas fa-search"></a>
                <div id="user-btn" class="fas fa-user"></div>
                <?php
                    $select_card_id=$conn->prepare("SELECT*FROM carrito WHERE id='$user_id'");
                    $select_card_id->execute();
                    $card_rows_number=$select_card_id->rowCount();
                ?>X
                <a href="cart.php"> <i class="fas fa-shopping-cart"></i> <span>(<?php echo $card_rows_number; ?>)</span> </a>
            </div>

            <div class="user-box">
                <p>Usuario : <span><?php echo $_SESSION['user_name']; ?></span></p>
                <p>Correo : <span><?php echo $_SESSION['user_email']; ?></span></p>
                <a href="../php/cerrar_sesion.php" class="delete-btn">Cerrar Sesión</a>
            </div>
        </div>
    </div>

</header>