<?php
    /*
        * Controlador de Borrar Cuenta
        * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
        * @since 18/01/2022 
        * @version 1.0 
        * Última modificación: 18/01/2022
    */
    //Si se ha pulsado "Cancelar"
    if(isset($_REQUEST['cancelar'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Cambiar a página anterior 
        $_SESSION['paginaEnCurso'] = 'inicioPrivado'; //Establecer la página actual como anterior
        header('Location: index.php'); //Recargar index
        exit;
    }
    // Cargar datos del usuario para la vista
    $aUsuario=[
        'nombre' => $_SESSION['usuario214DWESAplicacionFinal2122']->getCodUsuario(),
        'descripcion' => $_SESSION['usuario214DWESAplicacionFinal2122']->getDescUsuario(),
        'fechaHoraUltimaConexion' => $_SESSION['usuario214DWESAplicacionFinal2122']->getFechaHoraUltimaConexion(),
        'numConexiones' => $_SESSION['usuario214DWESAplicacionFinal2122']->getNumAccesos(),
        'perfil' => $_SESSION['usuario214DWESAplicacionFinal2122']->getPerfil(),
        'password' => $_SESSION['usuario214DWESAplicacionFinal2122']->getPassword()
    ];
    //Si se ha pulsado "Aceptar"
    if(isset($_REQUEST['aceptar'])){
        //Borrar usuario de la BBDD
        UsuarioPDO::borrarUsuario($_SESSION['usuario214DWESAplicacionFinal2122']);
        //Borrar sesión
        session_unset();
        session_destroy();
        header('Location: index.php'); //Recargar index
        exit;
    }
    //Cargar vista
    $paginaEnCurso = 'borrarCuenta';
    require_once "view/LayoutHeader.php";
    require_once $aVistas[$paginaEnCurso];
    require_once "view/LayoutFooter.php";