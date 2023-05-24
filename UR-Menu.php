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
    <title>Menu Principal Usuarios Registrados</title>
    <link rel="stylesheet" href="style-Menu.css">
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
            <div id="portadaP" style="margin: auto;">
           <?php
                $tituloP = mysqli_fetch_array($query);
           ?>
       
                <p id="tituloPrincipal" ><?php echo $tituloP['titulo_publicacion'];?></p>
            </div>
            <?php
            while($row = mysqli_fetch_array($query)){?>

            
            <div id="articulo">
                
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

        date = new Date();
        year = date.getFullYear();
        month = date.getMonth() + 1;
        day = date.getDate();
        document.getElementById("fecha").innerHTML = day + "/" + month + "/" + year;
        const x = new Boolean(false);
    

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