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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida usuarios</title>
    <link rel="stylesheet" href="./style-Bienvenida-Administrador.css">
</head>
<body>
    <div id="fondo">
        <div id="contPrincipal"> 
            <div id ="contenedorTabla">
                <table align="center">
                <!--ENCABEZADO-->
                <tr><td><p id="instrucciones"> <b>Nos encanta verte de regreso <?php echo $user?></b></p></td></tr>
                <?php
                    if($rol=="admin"){
                ?>

                        <tr><td> <button id="configurar" onclick="window.location.href='./Agregar_Publicacion.html'">Trabaja con los articulos</button></td></tr>   
                <?php                        
                    }
                ?>
                
                tr><td> <button id="configurar" onclick="window.location.href='./UR-Menu-Portada.php'">Entrar al purgatorio</button></td></tr>     
            
                <tr><td><p style="font-size: 18px;"><a href=./logica/log-out.php>Cerrar sesión</a></p></td></tr>
            </table>
         </div>
        </div>
    </div>
</body>
</html>