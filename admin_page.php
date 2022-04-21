<?php
    include 'php/conexion_be.php';
    session_start();

    $admin_id=$_SESSION['admin_id'];
    if(!isset($admin_id)){
        header('location:login_register.php');
    }

    if(!isset($_SESSION['admin_name'])){
        echo "<script>
                alert('Por favor inicie sesión');
                window.location='index.php';
             </script>";
        session_destroy(); 
        die(); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/42778bfa5e.js" crossorigin="anonymous"></script>
   
    <link rel="stylesheet" href="./assets/css/styles_admin.css">
    
    <title>Admin Panel</title>
</head>
<body>
    
    <?php include 'admin_header.php'; ?>

    <section class="dashboard">
        <h1 class="title">Dashboard</h1>
        <div class="box-container">
            <div class="box">
                <?php 
                    $total=0;
                    $select_pendientes=$conn->prepare("SELECT total_price FROM ordenes WHERE payment_status='pendiente'");
                    $select_pendientes->execute();
                    if($select_pendientes->rowCount()>0){
                        while($row=$select_pendientes->fetch(PDO::FETCH_ASSOC)){
                            $total_price=$row['total_price'];
                            $total+=$total_price;
                        }
                    }    
                ?>
                <h3>s/.<?php echo $total; ?></h3>
                <p>Total de pendientes</p>
            </div>
            <div class="box">
                <?php 
                    $total=0;
                    $select_completado=$conn->prepare("SELECT total_price FROM ordenes WHERE payment_status='completado'");
                    $select_completado->execute();
                    if($select_completado->rowCount()>0){
                        while($row=$select_completado->fetch(PDO::FETCH_ASSOC)){
                            $total_price=$row['total_price'];
                            $total+=$total_price;
                        }
                    }    
                ?>
                <h3>s/.<?php echo $total; ?></h3>
                <p>Total de Completados</p>
            </div>
            <div class="box">
                <?php 
                    $select_ordenes=$conn->prepare('SELECT * FROM ordenes');
                    $select_ordenes->execute();
                    $number_ordenes=$select_ordenes->rowCount();
                ?>
                <h3><?php echo $number_ordenes ?></h3>
                <p>Pedidos Realizados</p>
            </div>
            <div class="box">
                <?php 
                    $select_productos=$conn->prepare('SELECT * FROM productos');
                    $select_productos->execute();
                    $number_productos=$select_productos->rowCount();
                ?>
                <h3><?php echo $number_productos ?></h3>
                <p>Productos añadidos</p>
            </div>
            <div class="box">
                <?php 
                    $select_usuarios=$conn->prepare('SELECT * FROM usuarios WHERE user_type="user"');
                    $select_usuarios->execute();
                    $number_usuarios=$select_usuarios->rowCount();
                ?>
                <h3><?php echo $number_usuarios ?></h3>
                <p>Usuarios normales</p>
            </div>
            <div class="box">
                <?php 
                    $select_admins=$conn->prepare('SELECT * FROM usuarios WHERE user_type="admin"');
                    $select_admins->execute();
                    $number_admins=$select_admins->rowCount();
                ?>
                <h3><?php echo $number_admins ?></h3>
                <p>Usuarios admins</p>
            </div>
            <div class="box">
                <?php 
                    $select_account=$conn->prepare('SELECT * FROM usuarios');
                    $select_account->execute();
                    $select_account=$select_account->rowCount();
                ?>
                <h3><?php echo $select_account ?></h3>
                <p>Usuarios en Total </p>
            </div>
            <div class="box">
                <?php 
                    $select_mensajes=$conn->prepare('SELECT * FROM mensaje');
                    $select_mensajes->execute();
                    $number_mensajes=$select_mensajes->rowCount();
                ?>
                <h3><?php echo $number_mensajes ?></h3>
                <p>Nuevos mensajes </p>
            </div>
        </div>

    </section>

         
    <script src="assets/js/main_admin.js"></script>
</body>
</html>