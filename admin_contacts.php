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
        $query_delete=$conn->prepare("DELETE FROM mensaje WHERE id='$delete_id' ");
        $query_delete->execute();
        $message[]='Mensaje eliminado'; 
        header('location: admin_contacts.php');
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
    
    <title>Mensajes</title>
</head>
<body>
    
    <?php include 'admin_header.php'; ?>
     
    <section class="messages">
        <h1 class="title">Mensajes</h1>
        <div class="box-container">
            <?php 
                $select_mjs=$conn->prepare("SELECT * FROM mensaje");
                $select_mjs->execute();
                if($select_mjs->rowCount()>0){
                    while($row=$select_mjs->fetch(PDO::FETCH_ASSOC)){        
                        ?>
                        <div class="box">
                            <p>Nombre de Usuario: <span><?php echo $row['name']; ?></span></p>
                            <p>Number: <span><?php echo $row['number']; ?></span></p>
                            <p>Email: <span><?php echo $row['email']; ?></span></p>
                            <p>Mensaje: <span><?php echo $row['message']; ?></span></p>
                            <a class="delete-btn" href="admin_cotacts.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Eliminar este mensaje?')">Eliminar mensaje</a>
                        </div>
                        <?php
                    }
                }else{
                    echo '<p class="empty">No hay mensajes registrados</p>';
                }
            ?>
        </div>
    </section>


         
    <script src="assets/js/main_admins.js"></script>
</body>
</html>