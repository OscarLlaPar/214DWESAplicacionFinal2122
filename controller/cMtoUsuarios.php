<?php
    //Si se pulsa "Volver"
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Volver a la página anterior
        $_SESSION['paginaEnCurso']='inicioPrivado'; //Actualizar página anterior
        header('Location: index.php'); //Recargar index
        exit;
    }
    
    header('Access-Control-Allow-Origin: *'); 
    //Cargar vista
    $vistaEnCurso = $aVistas['mtoUsuarios'];
    require_once "view/LayoutHeader.php";
    require_once $vistaEnCurso;
    require_once "view/LayoutFooter.php";