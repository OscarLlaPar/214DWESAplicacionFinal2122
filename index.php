<?php
    /*
        * Index de la aplicación
        * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
        * @since 21/12/2021 
        * @version 1.0 
        * Última modificación: 11/01/2022
    */
    require_once "conf/confAplicacion.php";
    session_start();
    
    if(isset($_REQUEST['tecnologias'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='tecnologias';
        header('Location: index.php');
        exit;
    }
    
    if(!isset($_SESSION['paginaEnCurso'])){
        $_SESSION['paginaEnCurso'] = 'inicioPublico';
    }
    
    
    
    if (!array_key_exists($_SESSION['paginaEnCurso'], $aControladores['publico'])
        && !isset($_SESSION['usuario214DWESAplicacionFinal2122'])) {
        $_SESSION['paginaEnCurso'] = 'inicioPublico';
    }
    
    // Cargado de la página indicada.
    require_once array_column($aControladores, $_SESSION['paginaEnCurso'])[0];
    
    