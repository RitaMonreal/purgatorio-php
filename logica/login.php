<?php
    require 'conexion.php';

    $user = $_POST['nombreUsuarioIS'];
    $pass = $_POST['contraseñaIS'];

   $consulta = "SELECT COUNT(*) as login, rol FROM usuario WHERE nombre_usuario='". $user ."' AND contraseña='". $pass ."'";

   // echo $consulta;
   $query = mysqli_query($conexion, $consulta);
   $row = mysqli_fetch_array($query);

   /*var_dump($row);*/

   session_start();

   if($row['login'] > 0){//Si están bien los datos
        $_SESSION['user'] = $user;
        $_SESSION['rol'] = $row['rol'];
        header("Location: http://localhost/Entrega/Bienvenida-Usuarios.php");
   }else{
        header("Location: http://localhost/Entrega/Inicio-Sesion.php?error=Datos incorrectos");
   }
?>