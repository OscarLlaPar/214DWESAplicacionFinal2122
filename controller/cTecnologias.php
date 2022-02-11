<?php
    
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
        $_SESSION['paginaAnterior']='tecnologias';
        header('Location: index.php');
        exit;
    }

    $vistaEnCurso = $aVistas['tecnologias'];
    require_once "view/LayoutHeader.php";
    require_once $vistaEnCurso;
    require_once "view/LayoutFooter.php";