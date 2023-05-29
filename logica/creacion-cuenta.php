<?php
    require 'conexion.php';

 /*  var_dump($_POST);*/
    $emailNuevoR = $_POST['emailNuevoR'];
    $nombreUsuarioR = $_POST['nombreUsuarioR'];
    $contraseñaR = $_POST['contraseñaR'];

    $insert = "INSERT INTO usuario (contraseña, nombre_usuario, correo_electronico) 
    VALUES('".$contraseñaR."','".$nombreUsuarioR."','".$emailNuevoR."')";
    echo $insert;

    try {
       $query = mysqli_query($conexion, $insert);
	    //El registro se insertó con éxito
        header("Location: http://localhost/Entrega/Personalizacion-Usuario.php");
    } catch (Exception $e) {
	    //Ocurrió un error la insertar el registro
        header("Location: http://localhost/Entrega/Registro-Plataforma?error=Datos incorrectos");
    }

?>