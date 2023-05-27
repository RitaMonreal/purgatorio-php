<?php
    require './logica/conexion.php';
    

   if(!isset($_GET['id'])){
        header("Location: http://localhost/Entrega/NR-Menu.php?error=No se econtró el articulo");
    }
       
    $consulta = "SELECT * FROM publicacion WHERE id_publicacion=".$_GET['id'];
    $query = mysqli_query($conexion, $consulta);

    $publicacion = mysqli_fetch_array($query);
    
    $consulta = "SELECT * FROM categorias_publicacion WHERE id_categoria_publicacion=".$publicacion['id_categoria_publicacion'];
    $query1 = mysqli_query($conexion, $consulta);

    $categoriaP = mysqli_fetch_array($query1);

    $consulta = "SELECT * FROM usuario WHERE id_usuario=".$publicacion['id_autor'];
    $query3 = mysqli_query($conexion, $consulta);

    $autorP = mysqli_fetch_array($query3);

    $consulta = "SELECT * FROM `categorias_publicacion`";
    $query4 = mysqli_query($conexion, $consulta);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articulo UNR</title>
    <link rel="stylesheet" href="./style-Articulo.css">

</head>
<body>  


<div class="paginaWeb">
    <div class="cuadroOpciones">
        <div class="imagenOpciones" onclick="toggleLista('tablaIzq')" > </div>
            <div  class="inicio" id="purgatorio"></div>
            <div class="inicio" id="unirse" onclick="location.href = './Registro-Plataforma.html';">  Unirse </div>
            <div class="inicio" onclick="location.href = './Inicio-Sesion.html';">Iniciar sesion </div>
    </div> 

    <div id="menuSupIz" style="position: fixed;">
    <ul  id="tablaIzq" class="izquierdoOculto" style="display: none;">
    <?php
            while($row = mysqli_fetch_array($query4)){?>
                <li onclick="window.location.href = './NR-Menu-Particular.php?id=<?php echo $row['id_categoria_publicacion'];?>'"><?php echo $row['nombre_categoria'] ?></li>
                
                <?php
      
        }
        ?>
        </ul>
    </div>

    <div class="cuadrodeInicio">
        <div class="cuadrodePublicacion">
            <div class="inicioPublicacion">
                <div class="tipo">
                    <a>Portada/</a><a><?php echo $categoriaP['nombre_categoria'] ?></a>

                </div>
                <div class="cajadeFecha">
                    <b><?php echo $autorP['nombre_usuario']?></b>
                    <br>
                    <a ><?php echo $publicacion['fecha_publicacion']?></a>

                </div>

            </div>
           <div class="publicacion">
                <div class="titulo">
                  <?php echo $publicacion['titulo_publicacion'] ?>
                   
                </div>
                <div id="bookmark"onclick="window.location.href = './Inicio-Sesion.html?id=<?php echo $publicacion['id_publicacion'];?>'"></div>

                <div class="imagenPublicacion">
                   
                
                </div>

                <div class="contenidoPublicacion">
                    
                <?php echo $publicacion['texto_publicacion'] ?>
                </div>
                
            </div>
            <div class="seccionComentarios">
                <div class="foroPlegarias"> Foro de plegarias </div>
                
            
                     <div id="comentarios"></div>                 
             </div>
             
          </div>
          <div class="cuadrodeSugerencia">
            <div class="sugerencias"> Sugerencias</div>
             <div class="sugerenciaPublicaciones">
                 <div >
                     <img src="./assets/Rihanna" alt="Descripción de la imagen" class="sugerenciaImagen">
 
                 </div>
                 <div class="contenidoSugerencia">
          
                   <a>La cantante Rihanna sorprende a sus fans con su nuevo sencillo 'El pacto con el demonio'"</a>
                 </div>
             </div>
             <div class="sugerenciaPublicaciones">
                 <div >
                     <img src="./assets/angeles.jpg" alt="Descripción de la imagen" class="sugerenciaImagen">
                 </div>
                 <div class="contenidoSugerencia">
                   <a>El jugador de baloncesto LeBron James se inspira en los ángeles y los demonios para su nueva línea de zapatillas</a>
                 </div>
                 
             </div>
             <div class="sugerenciaPublicaciones">
                 <div >
                     <img src="./assets/raven age.jpg" alt="Descripción de la imagen" class="sugerenciaImagen">
                 </div>
                 <div class="contenidoSugerencia">
                   <a>Raven Age "El camino hacia el poder está pavimentado con sacrificios"</a>
                 </div>
                 
             </div>
         
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