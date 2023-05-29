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
    
    $consulta = "SELECT * FROM usuario";
    $query = mysqli_query($conexion, $consulta);
    $resultado = mysqli_fetch_array($query);

    var_dump($resultado);

     $consulta = "SELECT * FROM `categorias_publicacion`";
    $query4 = mysqli_query($conexion, $consulta);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de usuario</title>
    <link rel="stylesheet" href="./style-PerfilUsuario.css">

</head>
<body>

<?php
    $usuario = mysqli_fetch_array($query);
?>


  <div id="fondo">
    <div id="contenedorGeneral">
      <div class="cuadroOpciones">
        <div class="imagenOpciones" onclick="toggleLista('tablaIzq')"> </div>
        <div  class="inicio" id="purgatorio"></div>
        <div class="inicio" id="usuario" onclick="toggleLista('tablaDer')"></div>
    </div> 

    <div id="menuSupIz" style="position: fixed;">
    <ul  id="tablaIzq" class="izquierdoOculto" style="display: none;">
    <?php
            while($row = mysqli_fetch_array($query4)){?>
                <li onclick="window.location.href = './UR-Menu-Particular.php?idC=<?php echo $row['id_categoria_publicacion'];?>'"><?php echo $row['nombre_categoria'] ?></li>
                
                <?php
      
        }
        ?>
        </ul>
    </div>

    <div id="menuSupDer" style="position: fixed;">
            <ul style="list-style: none; padding-right: 17px; display: none;"id="tablaDer" class="derechoOculto">
            <li onclick="location.href = './Bookmarks.html';">Bookmarks</li>
                <li>Idioma: Español</li>
                <li onclick="location.href = './Perfil-Usuario.php';">Mi perfil</li>
                <li onclick="location.href = './Acerca-De.html';">Acerca De</li>
                <li><a href=./logica/log-out.php>Cerrar sesión</a></li>
            </ul>
        </div>  

        <div id="informacionUsuario">
            <span><button id="cerrar"></button></span> 
            <br>
            <br>
            <div class ="fotoPerfil" id ="profilePicture"></div>
            
            <p style="text-align: center; margin: 1%;">@Usuario</p>
            <table align="center">
                <tr>
                    <td>633</td>
                  </tr>
                  <tr>
                    <th>Followers</th>           
                  </tr>
            </table>
        </div>
        <div id = "biografia">
            <div id="botonesCont">
                      <button id ="acercaDe" style="background-color: black; color: white;">Acerca de</button>
                      <button id ="conversaciones" >Conversaciones</button>
                  
            </div>
                <p style="font-size: 16px; margin-top: 40px; margin-left: 15px; margin-right: 15px"><?php echo $usuario['estado_usuario'] ?></p>
                <p style="font-size: 14px;"><i>Joined 2023</i></p>
        </div>

        <div id="bookmarks">
          <p style="font-size: 19px; margin: 15px 0px 15px 25px;">Bookmarks > </p>
      </div>
    </div>
  </div>

  <script>
      function toggleLista(tabla) {
        var lista = document.getElementById(tabla);
       if(lista.style.display=="none")
       {
        lista.style.display="";
       }
       else{
        lista.style.display="none";
       }
      }
  </script>
</body>
</html>
