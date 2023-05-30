<?php
    require 'conexion.php';

    session_start();

    if(isset($_SESSION['user'])&& isset($_SESSION['rol'])){
        $user = $_SESSION['user'];
        $rol = $_SESSION['rol'];
    }else{
        header("Location: http://localhost/Entrega/Purgatorio.php");
        return;
    }

    
    
 //   echo $user;
    $consulta ="SELECT * FROM usuario WHERE nombre_usuario="."'$user'";
    $query = mysqli_query($conexion, $consulta);
    $id_usuario = mysqli_fetch_array($query);
   
    $urlFotoPerfil = $_POST['urlFotoPerfil'];
    $informacionU = $_POST['informacionU'];

    $consulta ="SELECT * FROM usuario WHERE nombre_usuario="."'$user'";
    $update = "UPDATE usuario SET estado_usuario='$informacionU' WHERE id=" .$id_usuario['id_usuario'];
    /*"'".$informacionU'" WHERE id_usuario=".$id_usuario['id_usuario'];*/
   // $update = "UPDATE usuario SET estado_usuario='$informacionU' WHERE id=" .$id_usuario['id_usuario'];
    
    echo $update;
    

    try {
        $query1 = mysqli_query($conexion, $update);
        header("Location: http://localhost/Entrega/Perfil-Usuario.php");

     } catch (Exception $e) {
         //Ocurrió un error la insertar el registro
         header("Location: http://localhost/Entrega/Personalizacion-Usuario.php?error=Problemas con el servidor");
     }


?>


