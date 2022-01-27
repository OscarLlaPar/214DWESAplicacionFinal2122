<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    
    
    if(isset($_REQUEST['login'])){
        $_SESSION['paginaAnterior'] = 'inicioPublico';
        $_SESSION['paginaEnCurso'] = 'login';
        header('Location: index.php');
        exit;
    }
    
    $paginaEnCurso = 'inicioPublico';
    require_once "view/LayoutHeader.php";
    require_once $aVistas[$paginaEnCurso];
    require_once "view/LayoutFooter.php";