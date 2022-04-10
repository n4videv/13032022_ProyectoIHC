<?php
    require 'conexion_be.php';
    session_start();

    $email=$_POST['correo'];
    $pass=$_POST['pass'];
    $md5pass=md5($pass);

    //Validación de inputs
    if($email==null && $pass==null){  
        echo "<script> 
            alert('Ingrese su correo y contraseña');
            window.location='../index.php';
            </script>";
        exit();
    }

    //Validación de ingreso
    $validar_login=$conn->prepare("SELECT * FROM usuarios WHERE email=:email and pass=:pass");
    $validar_login->execute(['email'=>$email,'pass'=> $md5pass]);
    $row=$validar_login->fetch(PDO::FETCH_ASSOC);
    // var_dump($row['user_type']) ;

    if($validar_login->rowCount() >0){
        if($row['user_type']=='admin'){
            $_SESSION['admin_name']=$row['user'];
            $_SESSION['admin_email']=$row['email'];
            $_SESSION['admin_id']=$row['id'];
            // echo $_SESSION['admin_name'];
            header('location: ../home_admin.php');
        }else if($row['user_type']=='user'){
            $_SESSION['user_name']=$row['user'];
            $_SESSION['user_email']=$row['email'];
            $_SESSION['user_id']=$row['id'];
            // echo $_SESSION['user_name'];
            header('location: ../usuario.php');
        }
    }else{
        echo 
        "<script>
            alert('Este usuario no está registrado');
            window.location='../index.php';
        </script>";
        exit;  
    }


?>


