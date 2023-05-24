<?php
    require './CRUD/logica/conexion.php';

    $consulta = "SELECT * FROM publicacion";
    $query = mysqli_query($conexion, $consulta);
  /*  $resultado = mysqli_fetch_array($query);

    var_dump($resultado);*/

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


<?php
    $publicacion = mysqli_fetch_array($query);
?>




<div class="paginaWeb">
    <div class="cuadroOpciones">
        <div class="imagenOpciones" onclick="toggleLista('tablaIzq')" > </div>
            <div  class="inicio" id="purgatorio"></div>
            <div class="inicio" id="unirse" onclick="location.href = './Registro-Plataforma.html';">  Unirse </div>
            <div class="inicio" onclick="location.href = './Inicio-Sesion.html';">Iniciar sesion </div>
    </div> 

    <div id="menuSupIz" style="position: fixed;">
        <ul  id="tablaIzq" class="izquierdoOculto" style="display: none;">
            <li>Cine</li>
            <li>Música</li>
            <li>Varios</li>
        </ul>
    </div>
    <div class="cuadrodeInicio">
        <div class="cuadrodePublicacion">
            <div class="inicioPublicacion">
                <div class="tipo">
                    <a>Portada/</a><a><?php echo $publicacion['categoria_publicacion'] ?></a>

                </div>
                <div class="cajadeFecha">
                    <b><?php echo $publicacion['id_autor']?></b>
                    <br>
                    <a ><?php echo $publicacion['fecha_publicacion']?></a>

                </div>

            </div>
           <div class="publicacion">
                <div class="titulo">
                   <div style="display: inline-block;"><?php echo $publicacion['titulo_publicacion'] ?></div><div id="bookmark"></div>
                </div>
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