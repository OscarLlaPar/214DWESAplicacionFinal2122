<?php
    /*
        * Controlador del Registro
        * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
        * @since 17/01/2022 
        * @version 1.0 
        * Última modificación: 17/01/2022
    */
    //Si se pulsa "Cancelar"
    if(isset($_REQUEST['cancelar'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];  //Actualizar página anterior
        $_SESSION['paginaEnCurso'] = 'inicioPublico'; //Volver a inicio público
        header('Location: index.php'); //Recargar index
        exit;
    }
    //Array para los mensajes de error
    $aErrores = [
        'usuario' => '',
        'descripcion' => '',
        'password' => '',
        'confirmarPassword' => '',
    ];
    //Array para almacenar las respuestas válidas
    $aRespuestas = [
        'usuario' => '',
        'descripcion' => '',
        'password' => '',
        'confirmarPassword' => '',
    ];
    //Variable para controlar que todo está OK
    $bEntradaOK = true;
    //Si se pulsa "Registrarse"
    if(isset($_REQUEST['registro'])){
        //Validar entradas
        $aErrores['usuario']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'], 8, 4, 1);
        //Si no ha habido errores con el usuario, comprobar usuario duplicado
        if (is_null($aErrores['usuario']) && UsuarioPDO::validarCodNoExiste($codigoUsuario)){
            $aErrores['usuario']="Ya existe un usuario con ese nombre";
        }
        $aErrores['descripcion']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 255, 3, 1);
        $aErrores['password']= validacionFormularios::validarPassword($_REQUEST['password'], 16, 2, 1, 1);
        if($_REQUEST['confirmarPassword']!=$_REQUEST['password']){
            $aErrores['confirmarPassword']="Las contraseñas no coinciden";
        }
        //Si hay algún error, hacer lo propio
        foreach($aErrores as $clave => $error){
            //condición de que hay un error
            if(($error)!=null){
                //limpieza del campo para cuando vuelva a aparecer el formulario
                $_REQUEST[$clave]="";
                $bEntradaOK=false;
            }
        }
    }
    //Si no se ha pulsado "Registrarse"
    else{
        $bEntradaOK = false;
    }
    //Si todo está OK
    if($bEntradaOK){
        //Almacenar respuestas en array
        $aRespuestas['usuario'] = $_REQUEST['usuario'];
        $aRespuestas['descripcion'] = $_REQUEST['descripcion'];
        $aRespuestas['password'] = $_REQUEST['password'];
        $aRespuestas['confirmarPassword'] = $_REQUEST['confirmarPassword'];
        
        //Si el usuario queda registrado
        if(UsuarioPDO::altaUsuario($aRespuestas['usuario'], $aRespuestas['password'], $aRespuestas['descripcion'])){
            //Validar usuario correcto
            $oUsuarioValido = UsuarioPDO::validarUsuario($aRespuestas['usuario'], $aRespuestas['password']);
            //Crear usuario en la sesión
            $_SESSION['usuario214DWESAplicacionFinal2122'] = $oUsuarioValido;
            //Ir a inicio privado
            $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
            $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        }
        header('Location: index.php'); //Recargar index
        exit;
        
    }
    //Cargar vista
    $paginaEnCurso = 'registro';
    require_once "view/LayoutHeader.php";
    require_once $aVistas[$paginaEnCurso];
    require_once "view/LayoutFooter.php";