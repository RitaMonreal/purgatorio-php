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
    
    $consulta = "SELECT * FROM usuario WHERE nombre_usuario="."'$user'";
    $query = mysqli_query($conexion, $consulta);
    $usuario = mysqli_fetch_array($query);

 //   var_dump($usuario['nombre_usuario']);

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

  <div id="fondo">
    <div id="contenedorGeneral">
      <div class="cuadroOpciones">
        <div class="imagenOpciones" onclick="toggleLista('tablaIzq')"> </div>
        <div  class="inicio" id="purgatorio" onclick="location.href = './UR-Menu-Portada.php';"></div>
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
          
            <br>
            <div class ="fotoPerfil" id ="profilePicture" style="background-image: url(./foto_publicacion/<?php echo $usuario['foto_usuario']?>);"></div>

            
            <p style="text-align: center; margin: 1%; font-size: 28px;">@<?php echo $usuario['nombre_usuario']?></p>
            
        </div>
        <div id = "biografia">
            <div id="botonesCont">
                      <button id ="acercaDe" style="background-color: black; color: white;">Acerca de</button>
                      <button id ="conversaciones" >Conversaciones</button>
                  
            </div>
                <p style="font-size: 24px; margin-top: 40px; margin-left: 15px; margin-right: 15px; margin-bottom: 30px;"><?php echo $usuario['estado_usuario'] ?></p>
                
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
