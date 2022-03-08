<?php
    /*
        * Index de la aplicación
        * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
        * @since 21/12/2021 
        * @version 1.0 
        * Última modificación: 11/01/2022
    */
    //Incluir configuración de la aplicación
    require_once "conf/confAplicacion.php";
    //Crear o recuperar sesión
    session_start();
    //Si se ha pulsado el botón de tecnologías
    if(isset($_REQUEST['tecnologias'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Actualizar página anterior
        $_SESSION['paginaEnCurso']='tecnologias'; //Cambiar página a tecnologías
        header('Location: index.php'); //Recargar index
        exit;
    }
    //Si no hay página almacenada
    if(!isset($_SESSION['paginaEnCurso'])){
        $_SESSION['paginaEnCurso'] = 'inicioPublico'; //Cargar inicio público
    }
    
    
    //Si la página requiere autenticación y no hay usuario en la sesión
    if (!array_key_exists($_SESSION['paginaEnCurso'], $aControladores['publico'])
        && !isset($_SESSION['usuario214DWESAplicacionFinal2122'])) {
        $_SESSION['paginaEnCurso'] = 'inicioPublico'; //Cambiar página al inicio público
    }
    
    // Cargado de la página indicada.
    require_once array_column($aControladores, $_SESSION['paginaEnCurso'])[0];
    
    