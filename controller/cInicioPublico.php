<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    
    //Si se pulsa "Login"
    if(isset($_REQUEST['login'])){
        $_SESSION['paginaAnterior'] = 'inicioPublico'; //Establecer página anterior
        $_SESSION['paginaEnCurso'] = 'login'; //Ir a la página de login
        header('Location: index.php'); //Recargar index
        exit;
    }
    //Cargar vista
    $paginaEnCurso = 'inicioPublico';
    require_once "view/LayoutHeader.php";
    require_once $aVistas[$paginaEnCurso];
    require_once "view/LayoutFooter.php";