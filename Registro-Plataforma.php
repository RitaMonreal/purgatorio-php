<!--¿importa si dejo dentro del registro los eventos de los botones que direccionan a los otros inicios de sesión?
No pude implementar los checkbox :((
No sé porque no funciona el direccionamiento a el inicio de sesión de fb y google en registro-->

<?php

    require './logica/conexion.php';

    
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro a la plataforma</title>

    <link rel="stylesheet" href="./style-InicioSesion-Registro.css">
</head>

<body>
    <div id="fondoPaginaPromocional">
        <div id="contPrincipalRP"> 
            <span><button  onclick="history.back()" id ="cerrar">x</button></span><br><br>
            <div id="contenedorTabla">
            <table align="center">
                <!--ENCABEZADO-->
                <tr><td><p id="bienvenida1"> <b>Unirse</b></p></td></tr>
                <tr><td><p id="bienvenida2">y vive el verdadero libre albedrío</p></td></tr>
                <!--FORMULARIO-->


                <tr><td><form action="./logica/creacion-cuenta.php" method="POST">      
                        
                        <tr><td><label email">Email: </label> </td></tr>          
                        <tr><td> <input type="email" id="email" name="emailNuevoR" placeholder="Email"></td></tr>

                        <tr><td><label nombreUsuario">Usuario: </label> </td></tr>          
                        <tr><td> <input type="text" id="nombreUsuario" name="nombreUsuarioR" placeholder="Usuario"></td></tr>
                            
                        <tr><td><label for="contraseña">Contraseña: </label></td></tr>
                        <tr><td><input type="password" id="contraseña" name="contraseñaR" placeholder="Contraseña"></td></tr>



                        <tr><td> <button id="entrar" type="submit">Crear cuenta</button></td></tr>

                        <?php
                            if(isset($_GET['error'])){
                                echo "<span>".$GET['error']."</span>";
                            }
                        ?>



                        
                        <!--OTRAS OPCIONES DE REGISTRO-->
                        <tr><td><p>o</p></td></tr>
                        <tr><th> <div id="botonesCont">
                            <button id ="googleB" onclick="location.href='https://accounts.google.com/v3/signin/identifier?dsh=S855768779%3A1680841476862841&authuser=0&continue=https%3A%2F%2Fmyaccount.google.com%2F%3Futm_source%3DOGB%26utm_medium%3Dapp&ec=GAlAwAE&hl=es&service=accountsettings&flowName=GlifWebSignIn&flowEntry=AddSession'"><div class="contTextBoton"><p class="textCompleto">Regístate con<h3 class="app">Google</h3></p></div></button>
                            <button id ="facebookB" onclick="location.href='https://es-la.facebook.com/'"><div class="contTextBoton"><p class="textCompleto">Regístrate con <h3> Facebook</h3></p></div></button>
                       </div></td></tr>

                

                        
                        <!--CREACION DE CUENTA, LINKEADA A PÁGINA DE REGISTRO-->
                        <tr><td><p>¿Ya tienes una cuenta en <b>purgatorio</b>? <a href=./Inicio-Sesion.php>Iniciar sesión</a></p></td></tr>
                </form></td></tr>
            </table>
        </div>
        </div>
    </div>
</body>
</html>