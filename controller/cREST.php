<?php
    /*
        * Controlador del REST
        * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
        * @since 25/01/2022 
        * @version 1.0 
        * Última modificación: 25/01/2022
    */
    //Si se pulsa "Volver"
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaAnterior']= $_SESSION['paginaEnCurso']; //Actualizar página anterior
        $_SESSION['paginaEnCurso']='inicioPrivado'; //Volver a inicio privado
        header('Location: index.php'); //Recargar index
        exit;
    }
    //Si se pulsa "Info"
    if(isset($_REQUEST['info'])){
        $_SESSION['paginaAnterior']= $_SESSION['paginaEnCurso']; //Actualizar página anterior
        $_SESSION['paginaEnCurso']='infoREST'; //Ir a la página de info
        header('Location: index.php'); //Recargar index
        exit;
    }
    //Array para los mensajes de error
    $aErrores=[
        "busqueda" =>"",
        "busquedaTiempo" =>"",
        "busquedaDepartamento" =>""
    ];
    //Array para almacenar las respuestas válidas
    $aRespuestas=[
        "busqueda" =>"",
        "busquedaTiempo" =>"",
        "busquedaDepartamento" =>""
    ];
    //Variable para controlar que todo está OK
    $bEntradaOK=true;
    //Si se busca un libro
    if(isset($_REQUEST['buscar'])){
        //Vaciar demás búsquedas
        $_REQUEST['busquedaTiempo']="";
        $_REQUEST['busquedaDepartamento']="";
        //Validar entrada
        $aErrores['busqueda']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['busqueda'], 255, 1);
        //Si hay algun error, hacer lo propio
        foreach($aErrores as $clave => $error){
            //condición de que hay un error
            if(($error)!=null){
                $bEntradaOK=false;
            }
        }
    }
    //Si se busca el tiempo
    if(isset($_REQUEST['buscarTiempo'])){
        //Vaciar demás búsquedas
        $_REQUEST['busqueda']="";
        $_REQUEST['busquedaDepartamento']="";
        //Validar entrada
        $aErrores['busquedaTiempo']= validacionFormularios::comprobarAlfabetico($_REQUEST['busquedaTiempo'], 255, 1);
        //Si hay algun error, hacer lo propio
        foreach($aErrores as $clave => $error){
            //condición de que hay un error
            if(($error)!=null){
                $bEntradaOK=false;
            }
        }
    }
    //Si se busca un departamento
    if(isset($_REQUEST['buscarDepartamento'])){
        //Vaciar demás búsquedas
        $_REQUEST['busquedaTiempo']="";
        $_REQUEST['busqueda']="";
        //Validar entrada
        $aErrores['busquedaDepartamento']= validacionFormularios::comprobarAlfabetico($_REQUEST['busquedaDepartamento'], 255, 1);
        //Si hay algun error, hacer lo propio
        foreach($aErrores as $clave => $error){
            //condición de que hay un error
            if(($error)!=null){
                $bEntradaOK=false;
            }
        }
    }
    //Si no se ha buscado nada
    else if(!isset ($_REQUEST['buscar'])&&!isset ($_REQUEST['buscarTiempo'])&&!isset ($_REQUEST['buscarDepartamento'])){
        $bEntradaOK=false;
    }
    //Si todo está OK
    if($bEntradaOK){
        //Si se ha buscado un libro
        if($_REQUEST['busqueda']!=""){
            //Almacenar respuesta en arraay y formatearla para URL
            $aRespuestas['busqueda']=$_REQUEST['busqueda'];
            $aRespuestas['busqueda']=strtr($aRespuestas['busqueda'], " ", "%20");
            //Hacer la consulta a la API
            $aLibros=REST::buscarLibrosPorTitulo($aRespuestas['busqueda']);
            //Si no ha habido resultado
            if(!is_array($aLibros)){
                $aErrorLibros=[
                    "Ha habido un error con la API",
                    $aLibros
                ];
            }
            //Si ha habido resultado
            else{
                //Preparar datos para la vista
                $aVistaLibros=[];
                $indice=0;

                foreach($aLibros as $libro){
                    $aVistaLibros[$indice]['titulo']=$libro->getTitulo();
                    $aVistaLibros[$indice]['autores']=$libro->getAutor();
                    $aVistaLibros[$indice]['editorial']=$libro->getEditorial();
                    $aVistaLibros[$indice]['anyoEdicion']=$libro->getAnyoEdicion();
                    $aVistaLibros[$indice]['paginas']=$libro->getPaginas();
                    $aVistaLibros[$indice]['imagen']=$libro->getImagen();
                    $aVistaLibros[$indice]['link']=$libro->getLink();

                    $indice++;
                }
            }
            
        }
        //Si se ha buscado el tiempo
        if($_REQUEST['busquedaTiempo']!=""){
            //Almacenar respuestas en array y formatear para URL
            $aRespuestas['busquedaTiempo']=$_REQUEST['busquedaTiempo'];
            $aRespuestas['busquedaTiempo']=strtr($aRespuestas['busquedaTiempo'], " ", "+");
            //Efectuar la consulta a la API
            $oTiempo=REST::buscarTemperaturaPorCiudad($aRespuestas['busquedaTiempo']);
            //Si ha habido resultado
            if(is_object($oTiempo)){
                //Preparar datos para la vista
                $aVistaTiempo=[
                    "ciudad"=>$oTiempo->getCiudad(),
                    "pais"=>$oTiempo->getPais(),
                    "fechaHora"=>$oTiempo->getFechaHora(),
                    "icono"=>$oTiempo->getIcono(),
                    "temperatura"=>$oTiempo->getTemperatura(),
                    "descripcion"=>$oTiempo->getDescripcion()
                ];
            }
            //Si no ha habido resultado
            else{
                $aErrorTiempo=[
                    "Ha habido un error con la API",
                    $oTiempo
                ];
            }
        }
        //Si se ha buscado un departamento
        if($_REQUEST['busquedaDepartamento']!=""){
            //Almacenar respuestas en array
            $aRespuestas['busquedaDepartamento']=$_REQUEST['busquedaDepartamento'];
            //Efectuar la consulta a la API
            $oDepartamento= REST::buscarDepartamentoPorCod($aRespuestas['busquedaDepartamento']);
            //Si ha habido resultado
            if(is_object($oDepartamento)){
                //Preparar datos para la vista
                $aVistaDepartamento=[
                    "codDepartamento"=>$oDepartamento->getCodDepartamento(),
                    "descDepartamento"=>$oDepartamento->getDescDepartamento(),
                    "fechaCreacionDepartamento"=>$oDepartamento->getFechaCreacionDepartamento(),
                    "volumenDeNegocio"=>$oDepartamento->getVolumenDeNegocio(),
                    "fechaBajaDepartamento"=>$oDepartamento->getFechaBajaDepartamento(),
                ];
            }
            //Si no ha habido resultado
            else{
                $aErrorDepartamento=[
                    $oDepartamento
                ];
            }
            
        }
    }
    //Cargar vista
    $vistaEnCurso = $aVistas['REST'];
    require_once "view/LayoutHeader.php";
    require_once $vistaEnCurso;
    require_once "view/LayoutFooter.php";