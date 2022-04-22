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
    <div class="flex">
        <a href="<?php echo constant("URL").'admin_page.php';?>" class="logo"><span>Panel-</span>Administrador </a>
        <nav class="navbar">
            <a href="<?php echo constant('URL').'admin_page.php'; ?>">Dashboard</a>
            <a href="<?php echo constant('URL').'admin_products.php'; ?>">Productos</a>
            <a href="<?php echo constant('URL').'admin_orders.php'; ?>">Pedidos</a>
            <a href="<?php echo constant('URL').'admin_users.php'; ?>">Usuarios</a>
            <a href="<?php echo constant('URL').'admin_contacts.php'; ?>">Mensajes</a>
        </nav>

        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
        </div>
        
        <div class="account-box">
            <p>Usuario: <span><?php echo $_SESSION['admin_name']; ?></span></p>
            <p>Email: <span><?php echo $_SESSION['admin_email']; ?></span></p>
            <a href="<?php echo constant('URL').'./php/cerrar_sesion.php'; ?>" class="delete-btn">Cerrar Sesión</a>
        </div>
        
    </div>
</header>