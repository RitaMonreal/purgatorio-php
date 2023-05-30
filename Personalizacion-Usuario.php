<?php
     require './logica/conexion.php';
    
    session_start();

    if(isset($_SESSION['user'])&& isset($_SESSION['rol'])){
        $user = $_SESSION['user'];
        $rol = $_SESSION['rol'];
    }else{
        header("Location: http://localhost/Entrega/Inicio-Sesion.php");
        return;
    }

/*    $userName = $_GET['username'];
    echo $userName;*/
    $consulta ="SELECT * FROM usuario WHERE nombre_usuario="."'$user'";
  //  echo $consulta;
    $query = mysqli_query($conexion, $consulta);
    $row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personalización usuario</title>

    <link rel="stylesheet" href="./style-Personalizacion-Perfil.css">
</head>

<body>
    <div id="fondo">
        <div id="contPrincipal"> 
            <div id ="contenedorTabla">
                
            <table align="center">
                <!--ENCABEZADO-->
                <tr><td><p id="instrucciones"> <b>Personaliza tu perfil</b> <?php echo $user?></p></td></tr>
                <!--FORMULARIO-->
                <tr><td><form action="./logica/editar-perfil.php" method="POST">   
                        <div class ="fotoPerfil"></div>

                        <tr><td><label for="urlFotoPerfil">URL a tu foto de perfil: </label></td></tr>
                        <tr><td><input type="text" name="urlFotoPerfil" placeholder="URL..." value="<?php echo $row['foto_usuario'];?>"></td></tr>


                        <tr><td><label for=informacionU" >Informacion: </label> </td></tr>          
                        <tr><td> <input type="text" name="informacionU" style="height: 100px;" placeholder="Escribe tu informacion..." value="<?php echo $row['estado_usuario'];?>"></td></tr>
                       
                        <tr><td> <button id="configurar" type="submit">Terminar</button></td></tr>
                       
                </form></td></tr>

            
                <tr><td><p style="font-size: 12px;"><a href=./UR-Menu-Portada.php>Omitir paso</a></p></td></tr>
            </table>
         </div>
        </div>
    </div>
</body>
</html>


