<?php
    require './logica/conexion.php';
    session_start();

   if(!isset($_GET['id'])){
        header("Location: http://localhost/Entrega/NR-Menu.php?error=No se econtró el articulo");
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['comment'])) {
            $comentario = $_POST['comment'];
             // Obtén la ID de la publicación del campo oculto
            $idPublicacion = $_POST['id_publicacion'];

            $user = $_SESSION['user']; // Obtener el nombre del usuario desde la sesión
            
            // Obtener la ID del usuario
            $consultaUsuario = "SELECT id_usuario FROM usuario WHERE nombre_usuario = '$user'";
            $queryUsuario = mysqli_query($conexion, $consultaUsuario);
            $usuario = mysqli_fetch_assoc($queryUsuario);

            if ($usuario) {
                $idUsuario = $usuario['id_usuario'];
    
            // Insertar el comentario en la base de datos
            $consultaInsertarComentario = "INSERT INTO comentario (id_usuario, id_publicacion, texto_comentario, likes) VALUES ('$idUsuario', '$idPublicacion', '$comentario', 0)";
            mysqli_query($conexion, $consultaInsertarComentario);
            }
        } elseif (isset($_POST['like'])) {
            $idComentario = $_POST['like'];
    
            // Insertar el like en la base de datos
            $consultaInsertarLike = "UPDATE comentario SET likes = likes + 1 WHERE id_comentario = '$idComentario'";
            mysqli_query($conexion, $consultaInsertarLike);
        }
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
                <li><a href=./logica/log-out.php>Cerrar sesión</a></li>
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
             
            <div class="imagenPublicacion" style="background-image: url(./foto_publicacion/<?php echo $publicacion['foto_publicacion']?>); ">
                   
                
                   </div>

                <div class="contenidoPublicacion">
                <?php echo $publicacion['texto_publicacion'] ?>
                                        
                </div>
                
            </div>
            <div class="seccionComentarios">
                <div class="foroPlegarias"> Foro de plegarias 

                </div>

                <form id="form-comentario" method="post" action="UR-Articulo.php?id=<?php echo $_GET['id']; ?>">
                <input type="hidden" name="id_publicacion" value="<?php echo $_GET['id']; ?>">
                <textarea id="comment" name="comment"></textarea>
                <button type="submit">Enviar</button>

                <div id="comentarios">
                    <?php
                    // Obtener los comentarios existentes para mostrarlos
                    $consultaComentarios = "SELECT * FROM comentario WHERE id_publicacion=" . $_GET['id'];
                    $queryComentarios = mysqli_query($conexion, $consultaComentarios);

                    while ($comentario = mysqli_fetch_array($queryComentarios)) {
                        // Obtener el nombre del usuario que realizó el comentario
                        $consultaUsuario = "SELECT * FROM usuario WHERE id_usuario=" . $comentario['id_usuario'];
                        $queryUsuario = mysqli_query($conexion, $consultaUsuario);
                        $usuarioComentario = mysqli_fetch_array($queryUsuario);

            
                        // Obtener la cantidad de likes del comentario
                        $consultaLikes = "SELECT COUNT(*) AS likes FROM comentario WHERE id_comentario=" . $comentario['id_comentario'];
                        $queryLikes = mysqli_query($conexion, $consultaLikes);
                        $likesComentario = mysqli_fetch_array($queryLikes);

                        echo '<div class="comentarioIndividual">';
                        echo '<img src="./assets/menuUsuario.png" alt="Imagen" width="30" height="30">';
                        echo '<span class="nombreUsuario"><strong>' . $usuarioComentario['nombre_usuario'] . ':</strong></span>';
                        echo '<span class="textoComentario">' . $comentario['texto_comentario'] . '</span>';
                        echo '<span class="likesComentario">' . $likesComentario['likes'] . ' likes</span>';
                        echo '<form method="post" action="NR-Articulo.php?id=' . $_GET['id'] . '">';
                        echo '<button type="submit" name="like" value="' . $comentario['id_comentario'] . '">Me gusta</button>';// se utiliza específicamente para el procesamiento de los likes de los comentarios.
                        echo '</form>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>

            
         </div><!-- Este div ya estaba -->
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
            <strong>${usuarioComentario['nombre_usuario']}:</strong> ${comentario.comentario}
            <button class="like-btn">Like (${comentario.likes})</button>
            `;
            // Añadimos un event listener al botón de like para aumentar la cantidad de likes del comentario
            const formComentario = document.getElementById('form-comentario');
            formComentario.addEventListener('submit', event => {
                event.preventDefault();
                const comentarioText = document.getElementById('comment').value;

                // Verificar si el usuario ya ha dado "me gusta" al comentario actual
                const hasLiked = comentarios.some(comentario => comentario.comentario === comentarioText && comentario.likes > 0);

                if (!hasLiked) {
                    agregarComentario(comentarioText);
                    renderizarComentarios();
                } else {
                    alert('Ya has dado "me gusta" a este comentario');
                }

                document.getElementById('comment').value = '';
            });
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

        function toggleLista(tabla) 
        {
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