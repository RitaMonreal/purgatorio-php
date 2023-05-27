<?php
    session_start();
    session_destroy();

    header("Location: http://localhost/Entrega/Inicio-Sesion.php?error=Datos incorrectos");
?>