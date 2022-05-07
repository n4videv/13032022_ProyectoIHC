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

    if(isset($_POST['update_carrito'])){
        $carrito_id=$_POST['carrito_id'];
        $carrito_quantity=$_POST['$carrito_quantity'];

        $conn->prepare("UPDATE carrito SET quantity='$carrito_quantity' WHERE id='$carrito_id' ")->execute();
        $message[]="Cantidad actualizada en el carrito";
    }

    if(isset($_GET['delete'])){
        $delete_id=$_GET['delete'];
        $conn->prepare("DELETE FROM carrito WHERE id='$delete_id'")->execute();
        header("<?php echo constant('URL').'carrito.php' ?>");
    }
    
    if(isset($_GET['delete_all'])){
        $delete_id=$_GET['delete_all'];
        $conn->prepare("DELETE FROM carrito WHERE user_id='$user_id'")->execute();
        header("<?php echo constant('URL').'carrito.php' ?>");
    }
    
    //session_destroy()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Carrito</title>

    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <script src="https://kit.fontawesome.com/42778bfa5e.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="./assets/css/styles_all.css">
</head>
<body>
    <?php include 'includes/header_all.php' ?>
    
    <div class="heading">
        <h3>Carrito de compras</h3>
        <p> <a href="<?php echo constant("URL").'home_user.php'?>">Inicio</a> / Carrito </p>
    </div>

    <section class="carrito">s
        <h1 class="title">Productos añadidos</h1>
        <div class="box-container">
            <?php
                $total=0;
                $select_cart=$conn->prepare("SELECT * FROM carrito WHERE user_id='$user_id' ");
                $select_cart->execute();
                if($select_cart->rowCount()>0){
                     while($row=$select_cart->fetch(PDO::FETCH_ASSOC)){
            ?>
                <div class="box">
                    <a href="<?php echo constant('URL').'carrito.php' ?>?delete=<?php echo $row['id'] ?>" class="fas fa-times" onclick="return confirm('Borraste el producto')"></a>
                    <img src="imagenes_subidas/<?php echo $row['image']; ?>" alt="">
                    <div class="name"><?php echo $row['name']; ?></div>
                    <div class="price">s/.<?php echo $row['price']; ?></div>
                    <form action="" method="POST">
                        <input type="hidden" name="carrito_id" value="<?php echo $row['id']; ?>">
                        <input type="number"name="$carrito_quantity"  min="1" value="<?php echo $row['quantity'];  ?>">
                        <input type="submit" name="update_carrito" value="Actualizar" class="option-btn">
                    </form>
                    <div class="sub-total">Sub total: s/.<span><?php echo $sub_total=($row['quantity']*$row["price"]) ?></span></div>
                </div>

            <?php
                $total+=$sub_total;
                    }
                }else{
                    echo "<p class='empty'>Tu carro está vacío</p>";
                } 
            ?>    
        </div>

        <div style="margin-top: 2rem; text-align: center;">
            <a href="<?php echo constant('URL').'carrito.php'?>?delete_all" class="delete-btn <?php echo($total>1)?'':'disabled' ?>" onclick="return confirm('Borraste todo el carrito')">Borrar todo</a>
        </div>

        <div class="carrito_total">
            <p>Total generado: <span>s/.<?php echo $total;?></span> </p>
            <div class="flex">
                <a class="option-btn" href="<?php echo constant('URL').'shop-farma.php' ?>">Continuar comprando</a>
                <a class="btn <?php echo($total>1)?'':'disabled' ?>" href="<?php echo constant('URL').'checkout.php' ?>" >Pasar a la caja</a>
            </div>
        </div>
    </section>
    
    
    <?php include 'includes/footer_all.php' ?>

    <script src="assets/js/main_all.js"></script>
</body>
</html>