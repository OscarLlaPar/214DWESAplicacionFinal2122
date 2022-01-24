<?php
    /*
        * Controlador del Registro
        * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
        * @since 17/01/2022 
        * @version 1.0 
        * Última modificación: 17/01/2022
    */
    
    if(isset($_REQUEST['cancelar'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; 
        $_SESSION['paginaEnCurso'] = 'inicioPublico';
        header('Location: index.php');
        exit;
    }

    $aErrores = [
        'usuario' => '',
        'descripcion' => '',
        'password' => '',
        'confirmarPassword' => '',
    ];

    $aRespuestas = [
        'usuario' => '',
        'descripcion' => '',
        'password' => '',
        'confirmarPassword' => '',
    ];
    
    $bEntradaOK = true;
    
    if(isset($_REQUEST['registro'])){
        $aErrores['usuario']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'], 8, 4, 1);
        if (is_null($aErrores['usuario']) && UsuarioPDO::validarCodNoExiste($codigoUsuario)){
            $aErrores['usuario']="Ya existe un usuario con ese nombre";
        }
        $aErrores['descripcion']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 255, 3, 1);
        $aErrores['password']= validacionFormularios::validarPassword($_REQUEST['password'], 16, 2, 1, 1);
        if($_REQUEST['confirmarPassword']!=$_REQUEST['password']){
            $aErrores['confirmarPassword']="Las contraseñas no coinciden";
        }
        foreach($aErrores as $clave => $error){
            //condición de que hay un error
            if(($error)!=null){
                //limpieza del campo para cuando vuelva a aparecer el formulario
                $_REQUEST[$clave]="";
                $bEntradaOK=false;
            }
        }
    }
    else{
        $bEntradaOK = false;
    }
    if($bEntradaOK){
        $aRespuestas['usuario'] = $_REQUEST['usuario'];
        $aRespuestas['descripcion'] = $_REQUEST['descripcion'];
        $aRespuestas['password'] = $_REQUEST['password'];
        $aRespuestas['confirmarPassword'] = $_REQUEST['confirmarPassword'];
        
        
        
        if(UsuarioPDO::altaUsuario($aRespuestas['usuario'], $aRespuestas['password'], $aRespuestas['descripcion'])){
            $oUsuarioValido = UsuarioPDO::validarUsuario($aRespuestas['usuario'], $aRespuestas['password']);
            $_SESSION['usuario214DWESAplicacionLoginLogout'] = $oUsuarioValido;
            $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        }
        header('Location: index.php');
        exit;
        
    }
    
    $paginaEnCurso = 'registro';
    require_once "view/LayoutHeader.php";
    require_once $aVistas[$paginaEnCurso];
    require_once "view/LayoutFooter.php";