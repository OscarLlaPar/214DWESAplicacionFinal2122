<?php
    /*
        * Controlador del Inicio
        * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
        * @since 21/12/2021 
        * @version 1.0 
        * Última modificación: 11/01/2022
    */
    
    
    if(isset($_REQUEST['detalle'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'detalle';
        header('Location: index.php');
        exit;
    }
    
    if(isset($_REQUEST['mtoDepartamentos'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'WIP';
        header('Location: index.php');
        exit;
    }
    
    if(isset($_REQUEST['editarPerfil'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso'] = 'miCuenta';
        header('Location: index.php');
        exit;
    }
    
    if(isset($_REQUEST['logout'])){
        session_unset();
        session_destroy();
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        header('Location: index.php');
        exit;
    }

    
    
    // Array con la información de la vista.
    $aVistaInicioPrivado = [
        'descUsuario' => $_SESSION['usuario214DWESAplicacionLoginLogout']->getDescUsuario(),
        'numConexiones' => $_SESSION['usuario214DWESAplicacionLoginLogout']->getNumAccesos(),
        'fechaHoraUltimaConexion' => $_SESSION['usuario214DWESAplicacionLoginLogout']->getFechaHoraUltimaConexionAnterior(),
        'imagenUsuario' => $_SESSION['usuario214DWESAplicacionLoginLogout']->getImagenUsuario()
    ];
    
    $vistaEnCurso = $aVistas['inicioPrivado'];
    require_once "view/LayoutHeader.php";
    require_once $vistaEnCurso;
    require_once "view/LayoutFooter.php";