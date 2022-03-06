<?php
    //Si se pulsa "Volver"
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior']; //Volver a la página anterior
        $_SESSION['paginaAnterior']='tecnologias'; //Actualizar página anterior
        header('Location: index.php'); //Recargar index
        exit;
    }
    //Cargar vista
    $vistaEnCurso = $aVistas['tecnologias'];
    require_once "view/LayoutHeader.php";
    require_once $vistaEnCurso;
    require_once "view/LayoutFooter.php";