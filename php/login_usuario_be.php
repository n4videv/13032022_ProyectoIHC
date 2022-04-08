<?php
    require 'conexion_be.php';
    session_start();

    $email=$_POST['correo'];
    $pass=$_POST['pass'];
    $md5pass=md5($pass);

    $validar_login=$conn->prepare("SELECT * FROM usuarios WHERE email=:email and pass=:pass");
    $validar_login->execute(['email'=>$email,'pass'=> $md5pass]);

    if($validar_login->rowCount()){
        $_SESSION['usuario']=$email;
        header('location: ../home.php');
    }else{
        echo 
        "<script>
            alert('Este correo no está registrado');
            window.location='../index.php';
        </script>";
        exit;  
    }
?>


