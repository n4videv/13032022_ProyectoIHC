<?php
    require 'conexion_be.php';

    $full_name=$_POST['full_name'];
    $correo=$_POST['correo'];
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    $type=$_POST['type_user'];

    $pass_encrypt=md5($pass);

    $verificar_correo=$conn->prepare("SELECT*FROM usuarios WHERE email='$correo'");
    $verificar_correo->execute();  //Ejcutamos el query
    $results = $verificar_correo->fetch(PDO::FETCH_ASSOC); //Obtenemos la fila del usuario enmcontrado, nos muestra cada campo con su valor asociado
     if($verificar_correo->rowCount()){ //Verificarmos si existe filas que coincida con el correo
        echo "<script>
                alert('Este correo ya está registrado, intenta con otro');
                window.location='../index.php';
             </script>";
        exit();
     }   

     $verificar_usuario=$conn->prepare("SELECT*FROM usuarios WHERE user='$user'");
     $verificar_usuario->execute();
     if($verificar_usuario->rowCount()){
         echo "<script>
                 alert('Este usuario ya está registrado, intenta con otro');
                 window.location='../index.php';
              </script>";
 
         exit();
     }

     $sql = "INSERT INTO usuarios(full_name,email,user,pass,user_type) VALUES('$full_name','$correo','$user','$pass_encrypt','$type')";
     $stmt=$conn->prepare($sql);
     if($stmt->execute()){
         echo "<script> 
               alert('Usuario almacenado existosamente');
               window.location='../index.php';
               </script>";
     }else{
         echo "<script> alert('Ingresa los datos correctamente') </script>";
     }



?>

