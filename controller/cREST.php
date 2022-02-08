<?php
    /*
        * Controlador del REST
        * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
        * @since 25/01/2022 
        * @version 1.0 
        * Última modificación: 25/01/2022
    */
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
        $_SESSION['paginaAnterior']='REST';
        header('Location: index.php');
        exit;
    }
    
    if(isset($_REQUEST['info'])){
        $_SESSION['paginaAnterior']= $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='infoREST';
        header('Location: index.php');
        exit;
    }
    
    $aErrores=[
        "busqueda" =>"",
        "busquedaTiempo" =>"",
        "busquedaDepartamento" =>""
    ];
    
    $aRespuestas=[
        "busqueda" =>"",
        "busquedaTiempo" =>"",
        "busquedaDepartamento" =>""
    ];
    
    $bEntradaOK=true;
    if(isset($_REQUEST['buscar'])){
        $_REQUEST['busquedaTiempo']="";
        $_REQUEST['busquedaDepartamento']="";
        $aErrores['busqueda']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['busqueda'], 255, 1);
        foreach($aErrores as $clave => $error){
            //condición de que hay un error
            if(($error)!=null){
                $bEntradaOK=false;
            }
        }
    }
    if(isset($_REQUEST['buscarTiempo'])){
        $_REQUEST['busqueda']="";
        $_REQUEST['busquedaDepartamento']="";
        $aErrores['busquedaTiempo']= validacionFormularios::comprobarAlfabetico($_REQUEST['busquedaTiempo'], 255, 1);
        foreach($aErrores as $clave => $error){
            //condición de que hay un error
            if(($error)!=null){
                $bEntradaOK=false;
            }
        }
    }
    if(isset($_REQUEST['buscarDepartamento'])){
        $_REQUEST['busquedaTiempo']="";
        $_REQUEST['busqueda']="";
        $aErrores['busquedaDepartamento']= validacionFormularios::comprobarAlfabetico($_REQUEST['busquedaDepartamento'], 255, 1);
        foreach($aErrores as $clave => $error){
            //condición de que hay un error
            if(($error)!=null){
                $bEntradaOK=false;
            }
        }
    }
    else if(!isset ($_REQUEST['buscar'])&&!isset ($_REQUEST['buscarTiempo'])&&!isset ($_REQUEST['buscarDepartamento'])){
        $bEntradaOK=false;
    }
    if($bEntradaOK){
        if($_REQUEST['busqueda']!=""){
            $aRespuestas['busqueda']=$_REQUEST['busqueda'];
            $aRespuestas['busqueda']=strtr($aRespuestas['busqueda'], " ", "%20");
            
            $aLibros=REST::buscarLibrosPorTitulo($aRespuestas['busqueda']);
            if(!is_array($aLibros)){
                $aErrorLibros=[
                    "Ha habido un error con la API",
                    $aLibros
                ];
            }
            else{
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
        if($_REQUEST['busquedaTiempo']!=""){
            $aRespuestas['busquedaTiempo']=$_REQUEST['busquedaTiempo'];
            $aRespuestas['busquedaTiempo']=strtr($aRespuestas['busquedaTiempo'], " ", "+");

            $oTiempo=REST::buscarTemperaturaPorCiudad($aRespuestas['busquedaTiempo']);
            if(is_object($oTiempo)){
                $aVistaTiempo=[
                    "ciudad"=>$oTiempo->getCiudad(),
                    "pais"=>$oTiempo->getPais(),
                    "fechaHora"=>$oTiempo->getFechaHora(),
                    "icono"=>$oTiempo->getIcono(),
                    "temperatura"=>$oTiempo->getTemperatura(),
                    "descripcion"=>$oTiempo->getDescripcion()
                ];
            }
            else{
                $aErrorTiempo=[
                    "Ha habido un error con la API",
                    $oTiempo
                ];
            }
        }
        if($_REQUEST['busquedaDepartamento']!=""){
            $aRespuestas['busquedaDepartamento']=$_REQUEST['busquedaDepartamento'];
            
            $oDepartamento= REST::buscarDepartamentoPorCod($aRespuestas['busquedaDepartamento']);
            if(is_object($oDepartamento)){
                $aVistaDepartamento=[
                    "codDepartamento"=>$oDepartamento->getCodDepartamento(),
                    "descDepartamento"=>$oDepartamento->getDescDepartamento(),
                    "fechaCreacionDepartamento"=>$oDepartamento->getFechaCreacionDepartamento(),
                    "volumenDeNegocio"=>$oDepartamento->getVolumenDeNegocio(),
                    "fechaBajaDepartamento"=>$oDepartamento->getFechaBajaDepartamento(),
                ];
            }
            else{
                $aErrorDepartamento=[
                    $oDepartamento
                ];
            }
            
        }
    }
    
    $vistaEnCurso = $aVistas['REST'];
    require_once "view/LayoutHeader.php";
    require_once $vistaEnCurso;
    require_once "view/LayoutFooter.php";