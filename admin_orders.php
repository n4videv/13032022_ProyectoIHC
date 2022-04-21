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

    
    if(isset($_POST['update_order'])){
        $order_update_id=$_POST['order_id'];
        $update_status=$_POST['update_payment'];
        $update_query=$conn->prepare("UPDATE ordenes SET payment_status='$update_status' WHERE id='$order_update_id'");
        $update_query->execute();
        $message[]='Estado del pedido actualizado';
    }

    if(isset($_GET['delete'])){
        $delete_id=$_GET['delete'];
        $query_delete=$conn->prepare("DELETE FROM ordenes WHERE id='$delete_id' ");
        $query_delete->execute();
        $message[]='Órden eliminado';
        header('location: admin_orders.php');
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
    
    <title>Órdenes}</title>
</head>
<body>
    
    <?php include 'admin_header.php'; ?>


    <section class="orders">
        <h1 class="title">Pedidos realizados</h1>
        <div class="box-container">
            <?php
                $select_orders=$conn->prepare("SELECT * FROM ordenes");
                $select_orders->execute();
                if($select_orders->rowCount()>0){
                    while($row=$select_orders->fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="box">
                <p>ID Usuario: <span><?php echo $row['user_id'] ?></span></p>
                <p>Realizado: <span><?php echo $row['placed_on'] ?></span></p>
                <p>Nombre: <span><?php echo $row['name'] ?></span></p>
                <p>Número: <span><?php echo $row['number'] ?></span></p>
                <p>Email: <span><?php echo $row['email'] ?></span></p>
                <p>Dirección: <span><?php echo $row['address'] ?></span></p>
                <p>Productos: <span><?php echo $row['total_products'] ?></span></p>
                <p>Precio total: <span>s/.<?php echo $row['total_price'] ?></span></p>
                <p>Método de Pago: <span><?php echo $row['method'] ?></span></p>
                <form action="" method="POST">
                    <input type="hidden" name="order_id" value="<?php echo $row['id'] ?>">
                    <select name="update_payment" id="">
                        <option value="" selected disabled><?php echo $row['payment_status'] ?></option>
                        <option value="pendiente">Pendiente</option>
                        <option value="completado">Completado</option>
                    </select>
                    <input type="submit" value="Actualizar" name="update_order" class="option-btn">
                    <a href="admin_orders.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Eliminar esta orden?')" class="delete-btn">Eliminar</a>
                </form>

            </div>
            <?php
                    }
                }else{
                    echo '<p class="empty">No hay {ordenes realizadas</p>';
                }
            ?>

        </div>
    </section>



         
    <script src="assets/js/main_admins.js"></script>
</body>
</html>