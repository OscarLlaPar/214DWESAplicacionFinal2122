<?php
    /*
        * Controlador del menú de Cuenta
        * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
        * @since 18/01/2022 
        * @version 1.0 
        * Última modificación: 18/01/2022
    */
    //Si se pulsa "Cancelar"
    if(isset($_REQUEST['cancelar'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];  //Actualizar página anterior
        $_SESSION['paginaEnCurso'] = 'inicioPrivado'; //Volver a inicio privado
        header('Location: index.php'); //Recargar index
        exit;
    }
    //Si se pulsa "Borrar cuenta"
    if(isset($_REQUEST['borrarCuenta'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Actualizar página anterior
        $_SESSION['paginaEnCurso'] = 'borrarCuenta'; //Ir a página de borrar cuenta
        header('Location: index.php'); //Recargar index
        exit;
    }
    
    if(isset($_REQUEST['cambiarPassword'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Actualizar página anterior
        $_SESSION['paginaEnCurso'] = 'cambiarPassword'; //Ir a página de cambiar password
        header('Location: index.php'); //Recargar index
        exit;
    }
    //Array para los mensajes de error
    $aErrores = [
        'descripcion' => '',
        'imagenUsuario' => ''
    ];
    //Array para almacenar las respuestas válidas
    $aRespuestas = [
        'descripcion' => '',
        'imagenUsuario' => ''
    ];
    //Variable para controlar que todo está OK
    $bEntradaOK = true;
    
    //$_SESSION['usuario214DWESAplicacionFinal2122']= UsuarioPDO::buscarUsuarioPorCod($_SESSION['usuario214DWESAplicacionFinal2122']->getCodUsuario());
    //Cargar datos del usuario
    $aUsuario=[
        'nombre' => $_SESSION['usuario214DWESAplicacionFinal2122']->getCodUsuario(),
        'descripcion' => $_SESSION['usuario214DWESAplicacionFinal2122']->getDescUsuario(),
        'fechaHoraUltimaConexion' => $_SESSION['usuario214DWESAplicacionFinal2122']->getFechaHoraUltimaConexion(),
        'numConexiones' => $_SESSION['usuario214DWESAplicacionFinal2122']->getNumAccesos(),
        'perfil' => $_SESSION['usuario214DWESAplicacionFinal2122']->getPerfil(),
        'password' => $_SESSION['usuario214DWESAplicacionFinal2122']->getPassword(),
        'imagenUsuario' => $_SESSION['usuario214DWESAplicacionFinal2122']->getImagenUsuario()
    ];
    //Si se pulsa el botón "Aceptar"
    if(isset($_REQUEST['aceptar'])){
        //Validar entradas
        $aErrores['descripcion']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['descripcion'], 255, 3, 1);
        
        $aErrores['imagenUsuario'] = validacionFormularios::comprobarAlfaNumerico($_FILES['imagenUsuario']['name'], 255, 3, 0);
        //Si se ha subido una imagen de usuario
        if($aErrores['imagenUsuario']==null && !empty($_FILES['imagenUsuario']['name'])){
           $aExtensiones = ['jpg', 'jpeg', 'png']; //Array de extensiones válidas
           $extension = substr($_FILES['imagenUsuario']['name'], strpos($_FILES['imagenUsuario']['name'], '.') + 1); //Se extrae la extensión del nombre del archivo
           //Si la extensión extraída no coincide con ninguna de las del array
           if (!in_array($extension, $aExtensiones)) {
                $aErrores['imagenUsuario'] = "El archivo no tiene una extensión válida. Sólo se admite ".implode(', ', $aExtensiones)."."; //Creación del mensaje de error 
           }
        }
        //Si hay algun error, hacer lo propio
        foreach($aErrores as $error){
            //condición de que hay un error
            if(($error)!=null){
                $bEntradaOK=false; //La entrada está mal
            }
        }
    }
    // Si no se ha pulsado el botón "Aceptar"
    else{
        $bEntradaOK = false;
    }
    //Si todo está OK
    if($bEntradaOK){
         //Almacenar respuestas en array
        $aRespuestas['descripcion'] = $_REQUEST['descripcion'];
        //Si se ha especificado imagen
        if($_FILES['imagenUsuario']['name'] != ''){
                //Extraer contenido de la imagen
                $aRespuestas['imagenUsuario'] = base64_encode(file_get_contents($_FILES['imagenUsuario']['tmp_name'])); //Almacenamiento del fichero enviado
            }
            //Si no se ha especificado imagen
            else{
                $aRespuestas['imagenUsuario'] = $_SESSION['usuario214DWESAplicacionFinal2122']->getImagenUsuario();
            }
        //Efectuar modificaciones
        $_SESSION['usuario214DWESAplicacionFinal2122']= UsuarioPDO::modificarUsuario($_SESSION['usuario214DWESAplicacionFinal2122'],$aRespuestas['descripcion'], $aRespuestas['imagenUsuario']);
        //Volver al inicio privado
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        header('Location: index.php'); //Recargar index
        exit;
    }
    //Cargar vista
    $paginaEnCurso = 'miCuenta';
    require_once "view/LayoutHeader.php";
    require_once $aVistas[$paginaEnCurso];
    require_once "view/LayoutFooter.php";