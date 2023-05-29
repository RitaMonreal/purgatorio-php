<!--Aun no se establece a dónde se va a mandar la información capturada
Podríamos hacer una página que sea antes de la principal, como referencia tenemos a pinterest-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión para todos los tipos de usuario registrado</title>

    <link rel="stylesheet" href="./style-InicioSesion-Registro.css">
</head>

<body>
    <div id="fondoPaginaPromocional">
        <div id="contPrincipalIS"> 
           <span><button onclick="history.back()" id ="cerrar">x</button></span><br><br>
            <div id ="contenedorTabla">
                
            <table align="center">
                <!--ENCABEZADO-->
                <tr><td><p id="bienvenida1"> <b>Iniciar sesión</b></p></td></tr>
                <tr><td><p id="bienvenida2">Abre las puertas de tu mente</p></td></tr>



                <!--FORMULARIO-->
                <tr><td><form action="./logica/login.php" method="POST">      
                        <tr><td><label nombreUsuario">Usuario: </label> </td></tr>          
                        <tr><td> <input type="text" id="nombreUsuario" name="nombreUsuarioIS" placeholder="Usuario"></td></tr>
                        
                        <tr><td><label for="contraseña">Contraseña: </label></td></tr>
                        <tr><td><input type="password" id="contraseña" name="contraseñaIS" placeholder="Contraseña"></td></tr>
                        <tr><td><p >¿Olvidate tu contraseña?</p></td></tr>

                    

                        <tr><td> <button id="entrar" type="submit">Acceder</button></td></tr>

                        

                </form></td></tr>



                
                <!--OTRAS OPCIONES DE INICIO DE SESIÓN-->
                <tr><td><p>o</p></td></tr>
                <tr><th> <div id="botonesCont">
                 <button id ="googleB" onclick="location.href='https://accounts.google.com/v3/signin/identifier?dsh=S855768779%3A1680841476862841&authuser=0&continue=https%3A%2F%2Fmyaccount.google.com%2F%3Futm_source%3DOGB%26utm_medium%3Dapp&ec=GAlAwAE&hl=es&service=accountsettings&flowName=GlifWebSignIn&flowEntry=AddSession'"><div class="contTextBoton"><p class="textCompleto">Inicia sesión con<h3 class="app">Google</h3></p></div></button>
                 <button id ="facebookB" onclick="location.href='https://es-la.facebook.com/'"><div class="contTextBoton"><p class="textCompleto">Inicia sesión con <h3> Facebook</h3></p></div></button>
            </div></td></tr>
                <!--CREACION DE CUENTA, LINKEADA A PÁGINA DE REGISTRO-->
                <tr><td><p>¿No tiene una cuenta en <b>purgatorio</b>? <a href=./Registro-Plataforma.php>Unirse</a></p></td></tr>
            </table>
         </div>
        </div>
    </div>
</body>
</html>