<?php
    header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
    header("Expires: Sat, 1 Jul 2000 05:00:00 GMT"); // Fecha en el pasado


    // Sesion manejada por Cookies para compartir varianbles e informacion en diferentes peginas
    session_destroy(); // elimina la sesion existente en caso de existir
    session_start();
    $_SESSION['estado']='on';
    $_SESSION['nombre_recep']=$_POST['nombre_usuario'];
    $_SESSION['ciudad_recep']=$_POST['ciudad_usuario'];
    $_SESSION['id_usuario']=$_POST['id_usuario'];
    $_SESSION['email']=$_POST['email'];
    $_SESSION['tipo_usuario']=$_POST['tipo_usuario'];
    echo json_encode($_SESSION);
?>