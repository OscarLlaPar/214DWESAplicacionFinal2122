<?php
    /*
        * Controlador del Login
        * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
        * @since 21/12/2021 
        * @version 1.0 
        * Última modificación: 11/01/2022
    */
    //Si se pulsa "Volver"
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];  //Actualizar página anterior
        $_SESSION['paginaEnCurso'] = 'inicioPublico'; //Ir a inicio público
        header('Location: index.php'); //Recargar index
        exit;
    }
    //Si se pulsa "Registrarse"
    if(isset($_REQUEST['registro'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Actualizar página anterior 
        $_SESSION['paginaEnCurso'] = 'registro'; //Ir a registro
        header('Location: index.php'); //Recargar index
        exit;
    }
    //Array de respuestas válidas
    $aRespuestas = [
        'usuario' => '',
        'password' => ''
    ];
    //Variable que indica que todo está OK
    $bEntradaOK = true;
    //Si se pulsa "Login"
    if(isset($_REQUEST['login'])){    
        //Validar entradas
        if (validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'], 8, 4, 1) 
                || validacionFormularios::comprobarAlfaNumerico($_REQUEST['password'], 8, 4, 1)) {
            $bEntradaOK = false;
        }
        //Si todo está bien, validar usuario y password correctos
        else{
            $oUsuarioValido = UsuarioPDO::validarUsuario($_REQUEST['usuario'], $_REQUEST['password']);
            //Si no es válido, hacer lo propio
            if(!$oUsuarioValido){
                $bEntradaOK = false;
            }
        }
    }
    //Si no se pulsa "Login"
    else{
        $bEntradaOK = false;
    }
    ///Si todo está OK
    if($bEntradaOK){
            //Almacenar respuestas en array
            $aRespuestas['usuario'] = $_REQUEST['usuario'];
            $aRespuestas['password'] = $_REQUEST['password'];
            //Si se actualizan los datos de conexión de usuario
            if(UsuarioPDO::registrarUltimaConexion($oUsuarioValido)){
                //Entrar en inicio privado
                $_SESSION['usuario214DWESAplicacionFinal2122'] = $oUsuarioValido;
                $_SESSION['paginaEnCurso'] = 'inicioPrivado'; 
            }
            header('Location: index.php'); //Recargar index
            exit;
    }
    //Cargar vista
    $paginaEnCurso = 'login';
    require_once "view/LayoutHeader.php";
    require_once $aVistas[$paginaEnCurso];
    require_once "view/LayoutFooter.php";