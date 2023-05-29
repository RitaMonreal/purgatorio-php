<?php
    require './logica/conexion.php';
    if(!isset($_GET['idC'])){
        header("Location: http://localhost/Entrega/NR-Menu-Portada.php?error=No se encontró la categoria");
    }

    /*$consulta = "SELECT * FROM `publicacion` WHERE categoria_publicacion=3";*/
    $consulta = "SELECT * FROM publicacion WHERE id_categoria_publicacion=".$_GET['idC'];
    $query = mysqli_query($conexion, $consulta);

  /*  $resultado = mysqli_fetch_array($query);

    var_dump($resultado);*/

    $consulta = "SELECT * FROM `categorias_publicacion`";
    $query4 = mysqli_query($conexion, $consulta);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal Usuarios No Registrados</title>
    <link rel="stylesheet" href="style-Menu.css">
</head>
<body>  


    <div class="paginaWeb" style="min-height: 460px;">
        <div class="cuadroOpciones">
                <div class="imagenOpciones" onclick="toggleLista('tablaIzq')"> </div>
                <div  class="inicio" id="purgatorio"></div>
                <div class="inicio" id="unirse" onclick="location.href = './Registro-Plataforma.html';">  Unirse </div>
                <div class="inicio" id="iniciarSesion" onclick="location.href = './Inicio-Sesion.html';">Iniciar sesion </div>
        </div> 

        <div id="menuSupIz" style="position: fixed;">
    <ul  id="tablaIzq" class="izquierdoOculto" style="display: none;">
    <?php
            while($row = mysqli_fetch_array($query4)){?>
               <li onclick="window.location.href = './NR-Menu-Particular.php?idC=<?php echo $row['id_categoria_publicacion'];?>'"><?php echo $row['nombre_categoria'] ?></li>
                
                <?php
      
        }
        ?>
        </ul>
    </div>
    
        <?php
                    $tituloP = mysqli_fetch_array($query);
               ?>
        
                <div id ="contenedorPublic">
                <div id="portadaP" style="margin: auto;" onclick="window.location.href = './NR-Articulo.php?id=<?php echo $tituloP['id_publicacion'];?>'">
              
           
                    <p id="tituloPrincipal" ><?php echo $tituloP['titulo_publicacion'];?></p>
                </div>
                <?php
                while($row = mysqli_fetch_array($query)){?>

                
                <div id="articulo" onclick="window.location.href = './NR-Articulo.php?id=<?php echo $row['id_publicacion'];?>'">
                    
                    <div id="fotoArticulo" style="background-image: url(./assets/rihanna.jpg); ">
                    
                    </div>
                    <div id="titulo" style="background:#F5F5F5" onmouseover="this.style.background='black';" onmouseout="this.style.background='#F5F5F5';">
                    
                    <p onmouseenter="changecolor(this)" onmouseleave="setnormal(this)"><?php echo $row['titulo_publicacion'] ?></p> 
                    </div>
                </div>
                <?php
            }
            ?>
            </div>
    </div>
    
    <script>

        function changecolor(obj) {
            obj.style.color = "white";
        }

        function setnormal(obj) {
            obj.style.color = "black";
        }

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