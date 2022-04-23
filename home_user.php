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
    <title>Principal</title>

    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <script src="https://kit.fontawesome.com/42778bfa5e.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="./assets/css/styles_all.css">
</head>
<body>
    <?php include 'includes/header_all.php' ?>
    
    <section class="home">
        <div class="content">
            <h3>Nosotros pensamos en usted</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, quod? Reiciendis ut porro iste totam.</p>
            <a href="about.php" class="white-btn">Descubre más</a>
        </div>
    </section>

    <seection class="products">
        <h1 class="title">Lista de productos</h1>
        <div class="box-container">
            <?php
                $select_products=$conn->prepare("SELECT * FROM productos LIMIT 6");
                $select_products->execute();
                if($select_products->rowCount()>0){
                    while($row=$select_products->fetch(PDO::FETCH_ASSOC)){
            ?>
             <form action="" method="POST" class="box">
                <img src="imagenes_subidas/<?php echo $row['image'] ?>" alt="libro1">
                <div class="name"><?php echo $row['name'] ?></div>   
                <div class="price">s/. <?php echo $row['price'] ?></div> 

                <input type="number" class="qty" min="1" name="product_quantity" value="1" >
                <input type="hidden" name="product_name" value="<?php echo $row['name'] ?>">
                <input type="hidden" name="product_price" value="<?php echo $row['price'] ?>">
                <input type="hidden" name="product_image" value="<?php echo $row['image'] ?>">
                <input type="submit" class="btn" name="add_to_carrito" value="Agregar a carrito">
            </form>
            <?php
                    }
                }else{
                    echo "<p class='empty'>No hay productos añadidos aqui</p>";
                }
            ?>
        </div>

        <div class="load-nmore" style="margin-top: 1rem; text-align: center;">
            <a class="option-btn" href="<?php echo constant("URL").'shop-farma.php' ?>">leer más</a>
        </div>
    </seection>

    <section class="about">
        <div class="flex">
            <div class="image">
                <img src="assets/images/logo.png" alt="">
            </div>

            <div class="content">
                <h3>Acerca de Nosotros</h3>
                <p>Somos una farmacia que ofrece variedad de productos, los cuales son distribuidos a precios módicos y efectivos. Ahora también por el medio digital. Es la mejor opción local, puedes realizar tus compras de forma vitual, lista tus productos médicos en tu carrito y realiza tu pedido. Puede pasar por tus productos en nuestra farmacia o podemos enviarlo por delivery.</p>
                <a href="about.php" class="btn">Leer Más</a>
            </div>
        </div>
    </section>

    <section class="home-contact">
        <div class="content">
            <h3>Tienen alguna pregunta?</h3>
            <p>¡Háznosla saber a escribiéndonos un mensaje!</p>
            <a href="contacts.php" class="white-btn">Contáctanos</a>
        </div>
    </section>


    <?php include 'includes/footer_all.php' ?>

    <script src="assets/js/main_all.js"></script>
</body>
</html>