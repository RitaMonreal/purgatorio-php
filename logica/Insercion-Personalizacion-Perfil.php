<?php
    require 'conexion.php';

/*   var_dump($_POST);*/
    $urlFotoPerfil = $_POST['urlFotoPerfil'];
    $informacionU = $_POST['informacionU'];

    $insert = "INSERT INTO usuario (foto_usuario, estado_usuario) VALUES('".$urlFotoPerfil."','".$informacionU."')";
 /*   echo $insert;*/

    try {
       $query = mysqli_query($conexion, $insert);
	    //El registro se insertó con éxito
        header("Location: http://localhost/Entrega/Perfil-Usuario.php");
    } catch (Exception $e) {
	    //Ocurrió un error la insertar el registro
        header("Location: http://localhost/Entrega/Perfil-Usuario.php?error=Datos incorrectos");
    }

?>