<?php
    /*
        * Controlador del Login
        * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
        * @since 21/12/2021 
        * @version 1.0 
        * Última modificación: 11/01/2022
    */
    
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; 
        $_SESSION['paginaEnCurso'] = 'inicioPublico';
        header('Location: index.php');
        exit;
    }
    
    if(isset($_REQUEST['registro'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; 
        $_SESSION['paginaEnCurso'] = 'registro';
        header('Location: index.php');
        exit;
    }

    $aRespuestas = [
        'usuario' => '',
        'password' => ''
    ];
    
    $bEntradaOK = true;
    
    if(isset($_REQUEST['login'])){    
        
        if (validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'], 8, 4, 1) 
                || validacionFormularios::comprobarAlfaNumerico($_REQUEST['password'], 8, 4, 1)) {
            $bEntradaOK = false;
        }
        else{
            $oUsuarioValido = UsuarioPDO::validarUsuario($_REQUEST['usuario'], $_REQUEST['password']);
            
            if(!$oUsuarioValido){
                $bEntradaOK = false;
            }
        }
    }
    else{
        $bEntradaOK = false;
    }
    
    if($bEntradaOK){
            $aRespuestas['usuario'] = $_REQUEST['usuario'];
            $aRespuestas['password'] = $_REQUEST['password'];
        
            if(UsuarioPDO::registrarUltimaConexion($oUsuarioValido)){
                $_SESSION['usuario214DWESAplicacionFinal2122'] = $oUsuarioValido;
                $_SESSION['paginaEnCurso'] = 'inicioPrivado';
            }
            header('Location: index.php');
            exit;
    }
    
    $paginaEnCurso = 'login';
    require_once "view/LayoutHeader.php";
    require_once $aVistas[$paginaEnCurso];
    require_once "view/LayoutFooter.php";