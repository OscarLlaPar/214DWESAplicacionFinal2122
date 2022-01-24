<?php
    /*
        * Controlador de Cambiar Contraseña
        * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
        * @since 18/01/2022 
        * @version 1.0 
        * Última modificación: 18/01/2022
    */
    if(isset($_REQUEST['cancelar'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; 
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        header('Location: index.php');
        exit;
    }
    
    $aErrores = [
        'password' => '',
        'nuevaPassword' => '',
        'confirmarPassword' => ''
    ];

    $aRespuestas = [
        'nuevaPassword' => ''
    ];
    
    $bEntradaOK = true;
    
    if(isset($_REQUEST['aceptar'])){
        $oUsuarioValido = UsuarioPDO::validarUsuario($_SESSION['usuario214DWESAplicacionLoginLogout']->getCodUsuario(), $_REQUEST['password']);
            
        if(!$oUsuarioValido){
            $bEntradaOK = false;
        }
        
        $aErrores['nuevaPassword']= validacionFormularios::validarPassword($_REQUEST['nuevaPassword'], 16, 2, 1, 1);
        
        if($aErrores['nuevaPassword']!=null){
            $_REQUEST['nuevaPassword']="";
            $bEntradaOK=false;
        }
        
        if($_REQUEST['confirmarPassword']!=$_REQUEST['nuevaPassword']){
            $aErrores['confirmarPassword']="Las contraseñas no coinciden";
            $bEntradaOK=false;
        }
    }
    else{
        $bEntradaOK = false;
    }
    if($bEntradaOK){
        $aRespuestas['nuevaPassword'] = $_REQUEST['nuevaPassword'];
        
        $_SESSION['usuario214DWESAplicacionLoginLogout']= UsuarioPDO::cambiarPassword($_SESSION['usuario214DWESAplicacionLoginLogout'], $aRespuestas['nuevaPassword']);
        
        $_SESSION['paginaEnCurso'] = 'miCuenta';
        header('Location: index.php');
        exit;
    }
    
    $paginaEnCurso = 'cambiarPassword';
    require_once "view/LayoutHeader.php";
    require_once $aVistas[$paginaEnCurso];
    require_once "view/LayoutFooter.php";