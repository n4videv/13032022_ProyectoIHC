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

    if(isset($_POST['add_to_carrito'])){
        $product_name=$_POST['product_name'];
        $product_price=$_POST['product_price'];
        $product_image=$_POST['product_image'];
        $product_quantity=$_POST['product_quantity'];

        $check_numbers_carrito=$conn->prepare("SELECT * FROM carrito WHERE name='$product_name' AND user_id='$user_id' ");
        $check_numbers_carrito->execute();
        if($check_numbers_carrito->rowCount()>0){
            $message[]="Ya se ha añadido al carrito";
        }else{
            $stmt=$conn->prepare("INSERT INTO carrito(user_id, name, price, quantity, image) VALUES('$user_id','$product_name','$product_price','$product_quantity','$product_image')");
            $stmt->execute();
            $message[]="Producto añadido al carrito";
        }
    }

    //session_destroy()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search-Page</title>

    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <script src="https://kit.fontawesome.com/42778bfa5e.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="./assets/css/styles_all.css">
</head>
<body>
    <?php include 'includes/header_all.php' ?>
    
    <div class="heading">
        <h3>Busqueda</h3>
        <p> <a href="<?php echo constant('URL')?>home_user.php">Inicio</a> / Buscar </p>
    </div>

    <section class="search-form">
        <form action="" method="POST">
            <input class="box" type="text" name="search" placeholder="Buscar productos..." >
            <input class="btn" type="submit" name="submit" value="Buscar" >
        </form>
    </section>

    <section class="products" style="padding-top: 0;">

        <div class="box-container">
            <?php
            if(isset($_POST['submit'])){
                $item_search=$_POST['search'];
                $select_products=$conn->prepare("SELECT * FROM productos WHERE name LIKE '%$item_search%'");
                $select_products->execute();
    
                if($select_products->rowCount()>0){
                    while($row=$select_products->fetch(PDO::FETCH_ASSOC)){
            ?>
            <form action="" method="POST" class="box">
                <img src="imagenes_subidas/<?php echo $row['image']; ?>" alt="" class="image">
                <div class="name"><?php echo $row['name']; ?></div>
                <div class="price">$<?php echo $row['price']; ?>/-</div>
                <input type="number"  class="qty" name="product_quantity" min="1" value="1">
                <input type="hidden" name="product_name" value="<?php echo $row['name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $row['price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $row['image']; ?>">
                <input type="submit" class="btn" value="Agregar a carrito" name="add_to_carrito">
            </form>
            <?php
                    }
                }else{
                    echo '<p class="empty">No hay datos con dicho patrón</p>';
                }
            }else{
                echo '<p class="empty">No encontramos nada</p>';
            }
            ?>
        </div>

    </section>


    <?php include 'includes/footer_all.php' ?>

    <script src="assets/js/main_all.js"></script>
</body>
</html>