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
    
    
    if(!isset($_SESSION['paginaEnCurso'])){
        $_SESSION['paginaEnCurso'] = 'inicioPublico';
    }
    
    if(isset($_REQUEST['tecnologias'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='tecnologias';
        header('Location: index.php');
        exit;
    }
    // Cargado de la página indicada.
    require_once $aControladores[$_SESSION['paginaEnCurso']]; 
    
    