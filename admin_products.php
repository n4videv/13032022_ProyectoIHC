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

    if(isset($_POST['add_product'])){
        $name=$_POST['name'];
        $price=$_POST['price'];
        $detalles=$_POST['details'];
        $image=$_FILES['image']['name'];
        $image_size=$_FILES['image']['size'];
        $image_tmp_name=$_FILES['image']['tmp_name'];
        $image_folder='imagenes_subidas/'.$image;
        
        $select_product_name=$conn->prepare('SELECT name FROM productos WHERE name="$name"');
        $select_product_name->execute();
        if($select_product_name->rowCount()>0){
            $message[]='El nombre del producto ya existe';
        }else{
            $insert_product=$conn->prepare("INSERT INTO productos(name,details,price,image) VALUES('$name','$detalles','$price','$image')");
            $insert_product->execute();

            if($insert_product){
                if($image_size>2000000 ){
                    $message[]='El tamaño de la imagen es muy grande';
                }else{
                    move_uploaded_file($image_tmp_name,$image_folder);
                    $message[]='El producto ha sido añadiodo existosamente';
                }
            }
        }
    }

    if(isset($_GET['delete'])){
        $delete_id=$_GET['delete'];
        $select_delete_image=$conn->prepare("SELECT * FROM productos WHERE id='$delete_id'");
        $select_delete_image->execute();
        $row_delete_image=$select_delete_image->fetch(PDO::FETCH_ASSOC);
        unlink('imagenes_subidas/'.$row_delete_image['image']);

        $prod_delete=$conn->prepare("DELETE FROM productos WHERE id='$delete_id'");
        $prod_delete->execute();

        header('location: admin_products.php');
    }

    if(isset($_POST['update_product'])){
        $update_p_id=$_POST['update_p_id'];
        $update_name=$_POST['update_name'];
        $update_price=$_POST['update_price'];

        $update_name=$conn->prepare("UPDATE productos SET name='$update_name', price='$update_price' WHERE id='$update_p_id'");
        $update_name->execute();
        
        $update_image=$_FILES['update_image']['name'];
        $update_image_tmp_name=$_FILES['update_image']['tmp_name'];
        $update_image_size=$_FILES['update_image']['size'];
        $update_folder='imagenes_subidas/'.$update_image;
        $update_old_image=$_POST['update_old_image'];

        if(!empty($update_image)){
            if($update_image_size>2000000){
                $message[]='La imágen es muy grande';
            }else{
                $update_img=$conn->prepare("UPDATE productos SET image='$update_image' WHERE id='$update_p_id'");
                $update_img->execute();
                move_uploaded_file($update_image_tmp_name,$update_folder);
                unlink('imagenes_subidas/'.$update_old_image);
            }
        }
        header('location: admin_products.php');
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
    
    <title>Productos</title>
</head>
<body>
    
    <?php include 'admin_header.php'; ?>

    <section class="add-products">
        <form action="" method="POST" enctype="multipart/form-data">
            <H3>Agregar nuevos productos</H3>
            <input type="text" class="box" required placeholder="Ingresa el nombre del producto" name="name">
            <input type="number" class="box" required placeholder="Ingresa el precio" name="price">
            <textarea name="details" class="box" required placeholder="Ingresa los detalles del producto" id="" cols="30" rows="10"></textarea>            
            <input type="file" accept="image/jpg, image/jpeg, image/png" class="box" required name="image">
            <input type="submit" value="Agregar producto" name="add_product" class="btn">
        </form>
    </section>
 
    <section class="show-products">
        <div class="box-container">
            <?php 
                $select_products=$conn->prepare("SELECT * FROM productos");
                $select_products->execute();
                if($select_products->rowCount()>0){
                    while($row=$select_products->fetch(PDO::FETCH_ASSOC)){
            ?>
            <div class="box">
                <div class="price">s/.<?php echo $row['price'] ?></div>
                <img class="image" src="imagenes_subidas/<?php echo $row['image'] ?>" alt="">
                <div class="name"><?php echo $row['name'] ?></div>
                <a href="admin_products.php?update=<?php echo $row['id']; ?>" class="btn">Actualizar</a>
                <a href="admin_products.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Eliminar el producto?')">Eliminar</a>
            </div>

            <?php
                }
            }else{
                 echo '<p class="empty">No hay productos agregados</p>';
            }
            ?>
        </div>
    </section>


    <section class="edit-product-form">
        <?php 
            if(isset($_GET['update'])){
                $update_id=$_GET['update'];
  
                $query_update=$conn->prepare("SELECT * FROM productos WHERE id='$update_id'");
                $query_update->execute();
                if($query_update->rowCount()>0){
                    while($row=$query_update->fetch(PDO::FETCH_ASSOC)){
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="update_p_id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="update_old_image" value="<?php echo $row['image']; ?>">
            <img src="imagenes_subidas/<?php echo $row['image']; ?>" alt="" srcset="">
            <input type="text"  class="box" name="update_name" value="<?php echo $row['name']; ?>" required placeholder="Ingresa el nombre del producto">
            <input type="number" class="box"  name="update_price" value="<?php echo $row['price']; ?>" required placeholder="Ingresa el precio del producto">
            <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
            <input type="submit" class="btn" value="Actualizar" name="update_product" >
            <input type="reset" class="option-btn" value="Cancelar" id="close-update" >
        </form>

        <?php
                    }
                }
            }else{
                echo "<script>document.querySelector('.edit-product-form').style.display='none';</script>";
            }
        ?>
    </section>



         
    <script src="assets/js/main_admins.js"></script>
</body>
</html>