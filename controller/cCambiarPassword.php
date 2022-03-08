<?php
    /*
        * Controlador de Cambiar Contraseña
        * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
        * @since 18/01/2022 
        * @version 1.0 
        * Última modificación: 18/01/2022
    */
    //Si se pulsa "Cancelar"
    if(isset($_REQUEST['cancelar'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Cambiar a página anterior
        $_SESSION['paginaEnCurso'] = 'inicioPrivado'; //Establecer la página actual como anterior
        header('Location: index.php'); //Recargar index
        exit;
    }
    //Array para los mensajes de error
    $aErrores = [
        'password' => '',
        'nuevaPassword' => '',
        'confirmarPassword' => ''
    ];
    //Array para almacenar las respuestas válidas
    $aRespuestas = [
        'nuevaPassword' => ''
    ];
    //Variable para controlar que todo está OK
    $bEntradaOK = true;
    //Si se pulsa el botón "Aceptar"
    if(isset($_REQUEST['aceptar'])){
        //Validar que se ha introducido la contraseña correctamente
        $oUsuarioValido = UsuarioPDO::validarUsuario($_SESSION['usuario214DWESAplicacionFinal2122']->getCodUsuario(), $_REQUEST['password']);
        //Si no es válido    
        if(!$oUsuarioValido){
            $bEntradaOK = false; //No OK
        }
        
        $aErrores['nuevaPassword']= validacionFormularios::validarPassword($_REQUEST['nuevaPassword'], 16, 2, 1, 1);
        //Si hay algun error, hacer lo propio
        if($aErrores['nuevaPassword']!=null){
            $_REQUEST['nuevaPassword']="";
            $bEntradaOK=false;
        }
        //Validar que la password está confirmada
        if($_REQUEST['confirmarPassword']!=$_REQUEST['nuevaPassword']){
            $aErrores['confirmarPassword']="Las contraseñas no coinciden";
            $bEntradaOK=false;
        }
    }
    // Si no se ha pulsado el botón "Aceptar"
    else{
        $bEntradaOK = false;
    }
    //Si todo está OK
    if($bEntradaOK){
        //Almacenar en array
        $aRespuestas['nuevaPassword'] = $_REQUEST['nuevaPassword'];
        //Efectuar el cambio de contraseña
        $_SESSION['usuario214DWESAplicacionFinal2122']= UsuarioPDO::cambiarPassword($_SESSION['usuario214DWESAplicacionFinal2122'], $aRespuestas['nuevaPassword']);
        //Volver a la página de la cuenta
        $_SESSION['paginaEnCurso'] = 'miCuenta';
        header('Location: index.php'); //Recargar index
        exit;
    }
    //Cargar vista
    $paginaEnCurso = 'cambiarPassword';
    require_once "view/LayoutHeader.php";
    require_once $aVistas[$paginaEnCurso];
    require_once "view/LayoutFooter.php";