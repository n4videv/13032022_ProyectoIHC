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

    if(isset($_POST['send'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $number=$_POST['number'];
        $msg=$_POST['message'];

        $select_message=$conn->prepare("SELECT * FROM mensaje WHERE name='$name' AND email='$email' AND number='$number' AND message='$msg' ");
        $select_message->execute();
        if($select_message->rowCount()>0){
            $message[]="Ya se envió su mensaje";
        }else{
            $stmt=$conn->prepare("INSERT INTO mensaje(user_id, name, email, number,message) VALUES('$user_id','$name','$email','$number','$msg')");
            $stmt->execute();
            $message[]="Mensaje enviado";
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
    <title>Contactos</title>

    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <script src="https://kit.fontawesome.com/42778bfa5e.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="./assets/css/styles_all.css">
</head>
<body>
    
    <?php include 'includes/header_all.php' ?>
    <div class="heading">
        <h3>Contáctanos</h3>
        <p> <a href="<?php echo constant("URL").'home_user.php'?>">Menu Usuario</a> / Contáctanos </p>
    </div>

    <section class="contact">
        <form action="" method="POST">
            <h3>Mandanos un mensaje!</h3>
            <input class="box" type="text" name="name" required placeholder="Ingrese su nombre">
            <input class="box" type="text" name="email" required placeholder="Ingrese su email">
            <input class="box" type="number" name="number" required placeholder="Ingrese su número">
            <textarea  class="box"  name="message" class="box" cols="30" rows="10"></textarea>
            <input class="btn" type="submit" value="Enviar mensaje" name="send">
        </form>
    </section>


    <?php include 'includes/footer_all.php' ?>

    <script src="assets/js/main_all.js"></script>
</body>
</html>