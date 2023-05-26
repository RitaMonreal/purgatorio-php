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
                <tr><td><p id="instrucciones"> <b>Personaliza tu perfil</b></p></td></tr>
                <!--FORMULARIO-->
                <tr><td><form action="./logica/Insercion-Personalizacion-Perfil.php" method="POST">   
                        <div class ="fotoPerfil"></div>

                        <tr><td><label for="urlFotoPerfil">URL a tu foto de perfil: </label></td></tr>
                        <tr><td><input type="text" name="urlFotoPerfil" placeholder="URL..."></td></tr>


                        <tr><td><label informacionU" >Informacion: </label> </td></tr>          
                        <tr><td> <input type="text" name="informacionU" style="height: 100px;" placeholder="Escribe tu informacion..."></td></tr>
                        
                        
                       
                        <tr><td> <button id="configurar" type="submit">Terminar</button></td></tr>
                        <?php
                            if(isset($_GET['error'])){
                                echo "<span>".$GET['error']."</span>";
                            }
                        ?>
                </form></td></tr>

            
                <tr><td><p style="font-size: 12px;"><a href=./UR-Menu.html>Omitir paso</a></p></td></tr>
            </table>
         </div>
        </div>
    </div>
</body>
</html>