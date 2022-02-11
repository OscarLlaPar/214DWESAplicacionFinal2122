<?php
    /*
        * Controlador del menú de Cuenta
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
    
    if(isset($_REQUEST['borrarCuenta'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; 
        $_SESSION['paginaEnCurso'] = 'borrarCuenta';
        header('Location: index.php');
        exit;
    }
    
    if(isset($_REQUEST['cambiarPassword'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; 
        $_SESSION['paginaEnCurso'] = 'cambiarPassword';
        header('Location: index.php');
        exit;
    }

    $aErrores = [
        'descripcion' => '',
        'imagenUsuario' => ''
    ];

    $aRespuestas = [
        'descripcion' => '',
        'imagenUsuario' => ''
    ];
    
    $bEntradaOK = true;
    
    //$_SESSION['usuario214DWESAplicacionFinal2122']= UsuarioPDO::buscarUsuarioPorCod($_SESSION['usuario214DWESAplicacionFinal2122']->getCodUsuario());
    
    $aUsuario=[
        'nombre' => $_SESSION['usuario214DWESAplicacionFinal2122']->getCodUsuario(),
        'descripcion' => $_SESSION['usuario214DWESAplicacionFinal2122']->getDescUsuario(),
        'fechaHoraUltimaConexion' => $_SESSION['usuario214DWESAplicacionFinal2122']->getFechaHoraUltimaConexion(),
        'numConexiones' => $_SESSION['usuario214DWESAplicacionFinal2122']->getNumAccesos(),
        'perfil' => $_SESSION['usuario214DWESAplicacionFinal2122']->getPerfil(),
        'password' => $_SESSION['usuario214DWESAplicacionFinal2122']->getPassword(),
        'imagenUsuario' => $_SESSION['usuario214DWESAplicacionFinal2122']->getImagenUsuario()
    ];
    
    if(isset($_REQUEST['aceptar'])){
        $aErrores['descripcion']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 255, 3, 1);
        
        $aErrores['imagenUsuario'] = validacionFormularios::comprobarAlfaNumerico($_FILES['imagenUsuario']['name'], 255, 3, 0);
        
        if($aErrores['imagenUsuario']==null && !empty($_FILES['imagenUsuario']['name'])){
           $aExtensiones = ['jpg', 'jpeg', 'png']; //Array de extensiones válidas
           $extension = substr($_FILES['imagenUsuario']['name'], strpos($_FILES['imagenUsuario']['name'], '.') + 1); //Se extrae la extensión del nombre del archivo
           //Si la extensión extraída no coincide con ninguna de las del array
           if (!in_array($extension, $aExtensiones)) {
                $aErrores['imagenUsuario'] = "El archivo no tiene una extensión válida. Sólo se admite ".implode(', ', $aExtensiones)."."; //Creación del mensaje de error 
           }
        }
        foreach($aErrores as $error){
            //condición de que hay un error
            if(($error)!=null){
                $bEntradaOK=false; //La entrada está mal
            }
        }
    }
    else{
        $bEntradaOK = false;
    }
    if($bEntradaOK){
        $aRespuestas['descripcion'] = $_REQUEST['descripcion'];
        
        if($_FILES['imagenUsuario']['name'] != ''){
                $aRespuestas['imagenUsuario'] = base64_encode(file_get_contents($_FILES['imagenUsuario']['tmp_name'])); //Almacenamiento del fichero enviado
            }
            //Si no se ha especificado imagen
            else{
                $aRespuestas['imagenUsuario'] = $_SESSION['usuario214DWESAplicacionFinal2122']->getImagenUsuario();
            }
        
        $_SESSION['usuario214DWESAplicacionFinal2122']= UsuarioPDO::modificarUsuario($_SESSION['usuario214DWESAplicacionFinal2122'],$aRespuestas['descripcion'], $aRespuestas['imagenUsuario']);
        
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        
        header('Location: index.php');
        exit;
    }
    
    $paginaEnCurso = 'miCuenta';
    require_once "view/LayoutHeader.php";
    require_once $aVistas[$paginaEnCurso];
    require_once "view/LayoutFooter.php";