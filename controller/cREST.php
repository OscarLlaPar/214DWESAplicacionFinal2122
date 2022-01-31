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
    
    $aErrores=[
        "busqueda" =>"",
        "busquedaTiempo" =>""
    ];
    
    $aRespuestas=[
        "busqueda" =>"",
        "busquedaTiempo" =>""
    ];
    
    $bEntradaOK=true;
    if(isset($_REQUEST['buscar'])){
        $aErrores['busqueda']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['busqueda'], 255, 1);
        $aErrores['busquedaTiempo']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['busquedaTiempo'], 255, 1);
        foreach($aErrores as $clave => $error){
            //condición de que hay un error
            if(($error)!=null){
                $bEntradaOK=false;
            }
        }
    }
    else{
        $bEntradaOK=false;
    }
    if($bEntradaOK){
        if($_REQUEST['busqueda']!=""){
            $aRespuestas['busqueda']=$_REQUEST['busqueda'];
            $aRespuestas['busqueda']=strtr($aRespuestas['busqueda'], " ", "%20");
            
            $aLibros=REST::buscarLibrosPorTitulo($aRespuestas['busqueda']);
            if(!$aLibros){
                $sMensaje = "Sin resultados";
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
            if($oTiempo){
                $aVistaTiempo=[
                    "ciudad"=>$oTiempo->getCiudad(),
                    "pais"=>$oTiempo->getPais(),
                    "fechaHora"=>$oTiempo->getFechaHora(),
                    "icono"=>$oTiempo->getIcono(),
                    "temperatura"=>$oTiempo->getTemperatura(),
                    "descripcion"=>$oTiempo->getDescripcion()
                ];
            }
        }
    }
    
    $vistaEnCurso = $aVistas['REST'];
    require_once "view/LayoutHeader.php";
    require_once $vistaEnCurso;
    require_once "view/LayoutFooter.php";