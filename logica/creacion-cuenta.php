<?php
    require 'conexion.php';

   //var_dump($_POST);
    $emailNuevoR = $_POST['emailNuevoR'];
    $nombreUsuarioR = $_POST['nombreUsuarioR'];
    $contraseñaR = $_POST['contraseñaR'];

    $insert = "INSERT INTO usuario (contraseña, nombre_usuario, correo_electronico) 
    VALUES('".$contraseñaR."','".$nombreUsuarioR."','".$emailNuevoR."')";
    echo $insert;

    try {
       $query = mysqli_query($conexion, $insert);
	    //El registro se insertó con éxito
        $consulta = "SELECT COUNT(*) as login, rol FROM usuario WHERE nombre_usuario='". $nombreUsuarioR ."' AND contraseña='". $contraseñaR ."'";

       //echo $consulta;
        $query1 = mysqli_query($conexion, $consulta);
        $row = mysqli_fetch_array($query1);

        session_start();
        if($row['login'] > 0){//Si están bien los datos
            $_SESSION['user'] = $user;
            $_SESSION['rol'] = $row['rol'];
            header("Location: http://localhost/Entrega/Personalizacion-Usuario.php");
        }else{
            header("Location: http://localhost/Entrega/Inicio-Sesion.php?error=Datos incorrectos creacion");
        }
       
    } catch (Exception $e) {
	    //Ocurrió un error la insertar el registro
        header("Location: http://localhost/Entrega/Registro-Plataforma?error=Datos incorrectos");
    }

    

?>