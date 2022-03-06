<?php
    /*
        * Controlador del Inicio
        * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
        * @since 21/12/2021 
        * @version 1.0 
        * Última modificación: 11/01/2022
    */
    
    //Si se pulsa el botón "Detalle"
    if(isset($_REQUEST['detalle'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Actualizar página anterior
        $_SESSION['paginaEnCurso'] = 'detalle'; //Ir a detalle
        header('Location: index.php'); //Recargar index
        exit;
    }
    
    if(isset($_REQUEST['mtoUsuarios'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Actualizar página anterior
        $_SESSION['paginaEnCurso'] = 'mtoUsuarios'; //Ir a mtoUsuarios
        header('Location: index.php'); //Recargar index
        exit;
    }
    
    if(isset($_REQUEST['mtoDepartamentos'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Actualizar página anterior
        $_SESSION['paginaEnCurso'] = 'mtoDepartamentos'; //Ir a mtoDepartamentos
        $_SESSION['numPaginacionDepartamentos']=1; //Colocarse en la primera página
        header('Location: index.php'); //Recargar index
        exit;
    }
    
    if(isset($_REQUEST['editarPerfil'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Actualizar página anterior
        $_SESSION['paginaEnCurso'] = 'miCuenta'; //Ir a la página de la cuenta
        header('Location: index.php'); //Recargar index
        exit;
    }
    
    if(isset($_REQUEST['apiRest'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Actualizar página anterior
        $_SESSION['paginaEnCurso'] = 'REST'; //Ir a la página de REST
        header('Location: index.php'); //Recargar index
        exit;
    }
    
    if(isset($_REQUEST['logout'])){
       //Eliminar sesión
        session_unset();
        session_destroy();
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Actualizar página anterior
        header('Location: index.php'); //Recargar index
        exit;
    }

    
    
    // Array con la información de la vista.
    $aVistaInicioPrivado = [
        'descUsuario' => $_SESSION['usuario214DWESAplicacionFinal2122']->getDescUsuario(),
        'numConexiones' => $_SESSION['usuario214DWESAplicacionFinal2122']->getNumAccesos(),
        'fechaHoraUltimaConexion' => $_SESSION['usuario214DWESAplicacionFinal2122']->getFechaHoraUltimaConexionAnterior(),
        'imagenUsuario' => $_SESSION['usuario214DWESAplicacionFinal2122']->getImagenUsuario()
    ];
    //Cargar vista
    $vistaEnCurso = $aVistas['inicioPrivado'];
    require_once "view/LayoutHeader.php";
    require_once $vistaEnCurso;
    require_once "view/LayoutFooter.php";