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
        "busqueda" =>""
    ];
    
    $aRespuestas=[
        "busqueda" =>""
    ];
    
    $bEntradaOK=true;
    if(isset($_REQUEST['buscar'])){
        $aErrores['busqueda']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['busqueda'], 255, 1);
        if($aErrores['busqueda']!=""){
            $bEntradaOK=false;
        }
    }
    else{
        $bEntradaOK=false;
    }
    if($bEntradaOK){
        $aRespuestas['busqueda']=$_REQUEST['busqueda'];
        $aRespuestas['busqueda']=strtr($aRespuestas['busqueda'], " ", "-");
        
        $aLibros=REST::buscarLibrosPorTitulo($aRespuestas['busqueda']);
        
        /*$resultadoAPI=file_get_contents("https://www.googleapis.com/books/v1/volumes?q=".$aRespuestas['busqueda']);
        $aResultadoAPI=json_decode($resultadoAPI,true);*/
        
        $aVistaREST=[];
        $indice=0;
        
        foreach($aLibros as $libro){
            $aVistaREST[$indice]['titulo']=$libro->getTitulo();
            $aVistaREST[$indice]['autores']=$libro->getAutor();
            $aVistaREST[$indice]['editorial']=$libro->getEditorial();
            $aVistaREST[$indice]['anyoEdicion']=$libro->getAnyoEdicion();
            $aVistaREST[$indice]['paginas']=$libro->getPaginas();
            $aVistaREST[$indice]['imagen']=$libro->getImagen();
            $aVistaREST[$indice]['link']=$libro->getLink();
            
            $indice++;
        }
        
    }
    
    /*print_r($aResultadoAPI["items"][0]);*/
    $vistaEnCurso = $aVistas['REST'];
    require_once "view/LayoutHeader.php";
    require_once $vistaEnCurso;
    require_once "view/LayoutFooter.php";