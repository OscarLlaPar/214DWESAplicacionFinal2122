<?php


//Formatear salida
//Pasar valores a vista en array

    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso'] = $_SESSION['error']->getPaginaSiguiente();
        unset($_SESSION['error']);
        header('Location: index.php');
        exit;
    };
    
    $aError=[
        "mensaje" => $_SESSION['error']->getMensaje(),
        "codigo" => $_SESSION['error']->getCodigo()
    ];
            
    $paginaEnCurso = 'error';
    require_once "view/LayoutHeader.php";
    require_once $aVistas[$paginaEnCurso];
    require_once "view/LayoutFooter.php";