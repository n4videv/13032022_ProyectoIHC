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
    
    if(!isset($user_id)){
        header('location: home_user.php');
    }
    
    //session_destroy()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POrdenes</title>

    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <script src="https://kit.fontawesome.com/42778bfa5e.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="./assets/css/styles_all.css">
</head>
<body>
    <?php include 'includes/header_all.php' ?>
    <div class="heading">
        <h3>Mis Ordenes</h3>
        <p> <a href="<?php echo constant("URL").'home_user.php'?>">Menu Usuario</a> / Ordenes </p>
    </div>

    <div class="full-ordenes">
        <h1 class="title">Ordenes o Pedidos</h1>
        <div class="box-container">
            <?php 
                $query_order=$conn->prepare("SELECT * FROM ordenes WHERE user_id='$user_id'");
                $query_order->execute();
                if($query_order->rowCount()>0){
                    while($row=$query_order->fetch(PDO::FETCH_ASSOC)){
            ?>
                <div class="box">
                    <p>Fecha: <span><?php echo $row['placed_on']; ?></span></p>
                    <p>Name: <span><?php echo $row['name']; ?></span></p>
                    <p>Number: <span><?php echo $row['number']; ?></span></p>
                    <p>Email: <span><?php echo $row['email']; ?></span></p>
                    <p>Dirección: <span><?php echo $row['address']; ?></span></p>
                    <p>Método de Pago: <span><?php echo $row['method']; ?></span></p>
                    <p>Tus órdenes: <span><?php echo $row['total_products']; ?></span></p>
                    <p>Precio Total: s/.<span><?php echo $row['total_price']; ?></span></p>
                    <p>Estado del pedido: <span style="color:<?php if($row['payment_status']=='pendiente'){echo 'red';}else{echo 'green';} ?>"> <?php echo $row['payment_status'] ?></span></p>
                </div>
            <?php
                    }
                }else{
                    echo "<p class='empty'>Aún no hay ordenes realizados</p>";
                }
            ?>
        </div>
    </div>
        

    <?php include 'includes/footer_all.php' ?>

    <script src="assets/js/main_all.js"></script>
</body>
</html>