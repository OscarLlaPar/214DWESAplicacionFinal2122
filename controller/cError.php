<?php


    //Si se pulsa "Volver"
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso'] = $_SESSION['error']->getPaginaSiguiente(); //Volver a la página establecida en el error
        unset($_SESSION['error']); //Quitar el error de la sesión
        header('Location: index.php'); //Recargar index
        exit;
    };
    //Preparar datos de error para la vista
    $aError=[
        "mensaje" => $_SESSION['error']->getMensaje(),
        "codigo" => $_SESSION['error']->getCodigo()
    ];
    //Cargar vista
    $paginaEnCurso = 'error';
    require_once "view/LayoutHeader.php";
    require_once $aVistas[$paginaEnCurso];
    require_once "view/LayoutFooter.php";