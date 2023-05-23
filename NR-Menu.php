<?php
    require './CRUD/logica/conexion.php';

    $consulta = "SELECT * FROM articulos";
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
                <li>Cine</li>
                <li>Música</li>
                <li>Varios</li>
            </ul>
        </div>
    
        
                <div id ="contenedorPublic">
                <div id="portadaP" style="margin: auto;">
               <?php
                    $tituloP = mysqli_fetch_array($query);
               ?>
           
                    <p id="tituloPrincipal" ><?php echo $tituloP['titulo'];?></p>
                </div>
                <?php
                while($row = mysqli_fetch_array($query)){?>

                
                <div id="articulo">
                    
                    <div id="fotoArticulo" style="background-image: url(./assets/rihanna.jpg); ">
                    
                    </div>
                    <div id="titulo" style="background:#F5F5F5" onmouseover="this.style.background='black';" onmouseout="this.style.background='#F5F5F5';">
                    
                    <p onmouseenter="changecolor(this)" onmouseleave="setnormal(this)"><?php echo $row['titulo'] ?></p> 
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