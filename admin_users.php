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

    
    if(isset($_GET['delete'])){
        $delete_id=$_GET['delete'];
        $query_delete=$conn->prepare("DELETE FROM usuarios WHERE id='$delete_id' ");
        $query_delete->execute();
        $message[]='Usuario eliminado'; 
        header('location: admin_users.php');
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
    
    <title>Usuarios</title>
</head>
<body>
    
    <?php include 'admin_header.php'; ?>

    <section class="users">
        <h1 class="title">Cuentas de usuarios</h1>
        <div class="box-container">
            <?php 
                $select_users=$conn->prepare("SELECT * FROM usuarios");
                $select_users->execute();

                while($row=$select_users->fetch(PDO::FETCH_ASSOC)){        
            ?>
            <div class="box">
                <p>Nombre de Usuario: <span><?php echo $row['full_name']; ?></span></p>
                <p>Email: <span><?php echo $row['email']; ?></span></p>
                <p>Tipo de Usuario: <span style="color:<?php if($row['user_type']==='admin'){echo 'var(--orange)';}; ?>;"><?php echo $row['user_type']; ?></span></p>
                <a class="delete-btn" href="admin_users.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Eliminar este usuario?')">Eliminar Usuario</a>
                
            </div>
            <?php
                }

            ?>
        </div>
    </section>

         
    <script src="assets/js/main_admins.js"></script>
</body>
</html>