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

    if(isset($_POST['order_btn'])){
        $name=$_POST['name'];
        $number=$_POST['number'];
        $email=$_POST['email'];
        $method=$_POST['method'];
        $address='Lot.'.$_POST['lot'].'-'.$_POST['street'].'-'.$_POST['district'].'-'.$_POST['region'].'-'.$_POST['country'].','.$_POST['pin_code'];
        $fecha=date("d-M-Y");   

        $total_carrito=0;
        $products_carrito[]='';

        $query_carrito=$conn->prepare("SELECT * FROM carrito WHERE user_id='$user_id'");
        $query_carrito->execute();
        if($query_carrito->rowCount()>0){
            while($row=$query_carrito->fetch(PDO::FETCH_ASSOC)){
                $products_carrito[]=$row['name'].' ('.$row['quantity'].')';
                $sub_total=($row['price']*$row['quantity']);
                
                $total_carrito+=$sub_total;
            }
        }
        
        $total_products=implode(', ', $products_carrito);  
        
        $query_order=$conn->prepare("SELECT * FROM ordenes WHERE name='$name' AND number='$number' AND email='$email' AND method='$method' AND total_products='$total_products' AND total_price='$total_carrito' ");
        $query_order->execute();
        if($total_carrito==0){
            $message[]='Tu carrito está vacío';
        }else{
            if($query_order->rowCount()>0){
                $message[]='Pedido ya se ha realizado anteriormente'; 
            }else{
                $conn->prepare("INSERT INTO ordenes(user_id,name,number,email,method,address,total_products,total_price,placed_on) values('$user_id','$name','$number','$email','$method','$address','$total_products','$total_carrito','$fecha')")->execute();;
                $message[]='Pedido realizado correctamente'; 
                $conn->prepare("DELETE FROM carrito WHERE user_id='$user_id'")->execute();
            }
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
    <title>Consultar</title>

    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <script src="https://kit.fontawesome.com/42778bfa5e.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="./assets/css/styles_all.css">
</head>
<body>
    <?php include 'includes/header_all.php' ?>
    
    <div class="heading">
        <h3>Caja</h3>
    </div>

    <section class="display-order">
        <?php
            $total=0; 
            $select_carrito=$conn->prepare("SELECT * FROM carrito WHERE user_id='$user_id'");
            $select_carrito->execute();
            if($select_carrito->rowCount()){
                while($row=$select_carrito->fetch(PDO::FETCH_ASSOC)){
                   $total_price=$row['price']*$row['quantity']; 
                   $total+=$total_price;
        ?>  
        <p> <?php echo $row['name']; ?>  <span>(<?php echo 's/.'.$row['price'].' x '.$row['quantity']; ?>)</span> </p>
        <?php
                }
            }else{
                echo "<p class='empty'>Tu carrito está vacío</p>";
            }
        ?>
        <div class="total">El total es: <span>s/<?php echo $total; ?></span> </div>
    </section>

    <section class="caja">
        <form action="" method="POST">
            <h3>Haga su pedido</h3>
            <div class="flex">
                <div class="inputBox">
                    <span>Tu nombre:</span>
                    <input type="text" name="name" placeholder="Ingrese su nombre" required>
                </div>
                <div class="inputBox">
                    <span>Tu número:</span>
                    <input type="number" name="number" placeholder="Ingrese su número" required>
                </div>
                <div class="inputBox">
                    <span>Tu email:</span>
                    <input type="email" name="email" placeholder="Ingrese su email" required>
                </div>
                <div class="inputBox">
                    <span>Método de pago:</span>
                    <select name="method" id="">
                        <option value="Cash">Efectivo</option>
                        <option value="Credit Card">Tarjeta de credito</option>
                        <option value="Paypal">Paypal</option>
                        <option value="Paytm">Bitcoin</option>
                    </select>
                </div>
                <div class="inputBox">
                    <span>Lote:</span>
                    <input type="number" min="0" name="lot" placeholder="ej. 11" required>
                </div>
                <div class="inputBox">
                    <span>Calle:</span>
                    <input type="text" name="street" placeholder="ej. Las palmeras" required>
                </div>
                <div class="inputBox">
                    <span>Distrito:</span>
                    <input type="text" name="district" placeholder="ej. Chosica" required>
                </div>
                <div class="inputBox">
                    <span>Ciudad:</span>
                    <input type="text" name="region" placeholder="ej. Lima" required>
                </div>
                <div class="inputBox">
                    <span>Pais:</span>
                    <input type="text" name="country" placeholder="ej. Perú" required>
                </div>
                <div class="inputBox">
                    <span>Código PIN:</span>
                    <input type="number" min="0" name="pin_code" placeholder="ej. 123456" required>
                </div>
            </div>
            <input type="submit" value="Ordenar ahora" class="btn" name="order_btn">
        </form>
    </section>


    <?php include 'includes/footer_all.php' ?>


    <script src="assets/js/main_all.js"></script>
</body>
</html>