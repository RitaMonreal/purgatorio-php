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
    <title>En portada UR</title>
    <link rel="stylesheet" href="style-Articulo.css">

</head>
<body>  


<div class="paginaWeb">
    <div class="cuadroOpciones">
            <div class="imagenOpciones" onclick="toggleLista('tablaIzq')" > </div>
            <div  class="inicio" id="purgatorio"></div>
            <div class="inicio" id="usuario" onclick="toggleLista('tablaDer')"></div>
    </div> 

    <div id="menuSupIz" style="position: fixed;">
    <ul  id="tablaIzq" class="izquierdoOculto" style="display: none;">
    <?php
            while($row = mysqli_fetch_array($query4)){?>
                <li onclick="window.location.href = './UR-Menu-Particular.php?id=<?php echo $row['id_categoria_publicacion'];?>'"><?php echo $row['nombre_categoria'] ?></li>
                
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
                <li>Cerrar sesión</li>
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
            <?php echo $publicacion['titulo_publicacion'] ?></div>
            <div id="bookmark" onclick="window.location.href = './Perfil-Usuario.php?id=<?php echo $publicacion['id_publicacion'];?>'"></div>
             
             <div class="imagenPublicacion">
                
                   
                   
                </div>

                <div class="contenidoPublicacion">
                <?php echo $publicacion['texto_publicacion'] ?>
                                        
                </div>
                
            </div>
            <div class="seccionComentarios">
               <div class="foroPlegarias"> Foro de plegarias </div>
               
                     <form id="form-comentario">
                    <textarea id="comment" name="comment"></textarea>
                    <button type="submit" >Enviar</button>
             
                    </form>
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
    date = new Date();
    year = date.getFullYear();
    month = date.getMonth() + 1;
    day = date.getDate();
    document.getElementById("fecha").innerHTML = day + "/" + month + "/" + year;
   // Creamos un array para guardar los comentarios
        const comentarios = [];

        // Función para agregar un comentario al array
        function agregarComentario(comentario) {
        comentarios.push({
            comentario: comentario,
            likes: 0
        });
        borrarComentario();
        }

        // Función para renderizar los comentarios en el DOM
        function renderizarComentarios() {
        // Ordenamos los comentarios según la cantidad de likes
        comentarios.sort((a, b) => b.likes - a.likes);
        // Obtenemos el div donde se mostrarán los comentarios
        const comentariosDiv = document.getElementById('comentarios');
        // Limpiamos el div antes de renderizar los comentarios
        comentariosDiv.innerHTML = '';
        // Recorremos los comentarios y creamos un div para cada uno
        //usuario 
        //comentario
        //likes
        comentarios.forEach(comentario => {
            const div = document.createElement('div');
            div.setAttribute('class', 'comentarioIndividual');
            div.innerHTML = `
            <img src="./assets/menuUsuario.png" alt="Imagen" width="30" height="30">
            <strong>${usuario.usuario}:</strong> ${comentario.comentario}
            
            <button class="like-btn">Like (${comentario.likes})</button>
            `;
            // Añadimos un event listener al botón de like para aumentar la cantidad de likes del comentario
            const likeBtn = div.querySelector('.like-btn');
            likeBtn.addEventListener('click', () => {
            comentario.likes++;
            renderizarComentarios();
            });
            comentariosDiv.appendChild(div);
        });
        }

        // Obtenemos el formulario y le añadimos un event listener para agregar un comentario al array y renderizar los comentarios
        const formComentario = document.getElementById('form-comentario');
        formComentario.addEventListener('submit', event => {
        event.preventDefault();
        const comentarioText = document.getElementById('comment');
        agregarComentario(comentarioText.value);
        comentarioText.value = '';
        renderizarComentarios();
        });

        // Renderizamos los comentarios por primera vez
        renderizarComentarios();
        
        function borrarComentario()
        {
            document.getElementById("comment").value = "";
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