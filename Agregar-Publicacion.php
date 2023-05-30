<?php
require 'logica/conexion.php';
session_start();

if (isset($_SESSION['user']) && isset($_SESSION['rol'])) {
    $user = $_SESSION['user'];
    $rol = $_SESSION['rol'];

    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo = $_POST['titulo_publicacion_nueva'];
        $contenido = $_POST['texto_publicacion_nueva'];
        $imagen = $_FILES['imagen_publicacion_nueva']['name'];
        $categoria = $_POST['categoria'];
        $fecha = date('Y-m-d'); // Obtener la fecha actual en formato YYYY-MM-DD
        // Mover la imagen cargada al directorio de imágenes
        $targetDir = "assets/";
        $targetFile = $targetDir . basename($_FILES["imagen_publicacion_nueva"]["name"]);
        move_uploaded_file($_FILES["imagen_publicacion_nueva"]["tmp_name"], $targetFile);

        // Obtener la ID del usuario
        $consultaUsuario = "SELECT id_usuario FROM usuario WHERE nombre_usuario = '$user'";
        $queryUsuario = mysqli_query($conexion, $consultaUsuario);
        $idUsuario = mysqli_fetch_assoc($queryUsuario)['id_usuario'];

        // Insertar la publicación en la base de datos
        $insert = "INSERT INTO publicacion (id_autor, titulo_publicacion, texto_publicacion, fecha_publicacion, id_categoria_publicacion) VALUES ('$idUsuario', '$titulo', '$contenido', '$fecha', '$categoria')";
        $query = mysqli_query($conexion, $insert);

        if ($query) {
            // La publicación se ha agregado con éxito
            header("Location: http://localhost/Entrega/UR-Menu-Portada.php");
            exit;
        } else {
            // Ocurrió un error al agregar la publicación
            $error = "Error al agregar la publicación.";
        }
    }
} else {
    header("Location: http://localhost/Entrega/Inicio-Sesion.php?no se pudo");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Publicacion Administradores</title>
    <link rel="stylesheet" href="style-Agregar-Publicacion.css">
</head>
<body>  
    <div class="paginaWeb" style="min-height: 460px;">
        <div class="cuadroOpciones">
            <div class="imagenOpciones" onclick="toggleLista('tablaIzq')"> </div>
            <div  class="inicio" id="purgatorio"></div>
            <div class="inicio" id="usuario" onclick="toggleLista('tablaDer')"></div>
        </div> 

        <div id="menuSupIz" style="position: fixed;">
            <ul  id="tablaIzq" class="izquierdoOculto" style="display: none;">
                <li>Cine</li>
                <li>Música</li>
                <li>Varios</li>
            </ul>
        </div>
    
        <div id="menuSupDer" style="position: fixed;">
            <ul style="list-style: none; padding-right: 17px; display: none;"id="tablaDer" class="derechoOculto">
                <li>Notificaciones</li>
                <li>Idioma: Español</li>
                <li>Ayuda</li>
                <li>Configuración</li>
                <li>Cerrar sesión</li>
            </ul>
        </div> 

        <div id ="contenedorPublic">
       
        <h1>Agregar Publicación</h1>

<?php
    if (isset($error)) {
        echo "<p class='error'>" . $error . "</p>";
    }
?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titulo">Título:</label>
        <br>
        <input type="text" id="titulo_publicacion_nueva" name="titulo_publicacion_nueva" required>
    </div>

    <div class="form-group">
        <label for="texto">Contenido de la publicación:</label>
        <br>
        <textarea id="texto_publicacion_nueva" name="texto_publicacion_nueva" rows="4" required></textarea>
    </div>

    <div class="form-group">
        <label for="imagen">Imagen:</label>
        <input type="file" id="imagen_publicacion_nueva" name="imagen_publicacion_nueva">
    </div>

    <div class="form-group">
        <label for="categoria">Categoría:</label>
        <select id="categoria" name="categoria" required>
            <option value="1">Cine</option>
            <option value="2">Música</option>
            <option value="3">Varios</option>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" value="Agregar Publicación">
    </div>
</form>
</div>
</div>
<script>  
function toggleLista(tabla) {
var lista = document.getElementById(tabla);
if (lista.style.display == "none") {
    lista.style.display = "";
} else {
    lista.style.display = "none";
}
}
</script>
</body>
</html>

