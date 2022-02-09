<?php
    
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='inicioPrivado';
        header('Location: index.php');
        exit;
    }
    
    if(isset($_REQUEST['altaDepartamento'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='altaDepartamento';
        header('Location: index.php');
        exit;
    }
    
    if(isset($_REQUEST['bajaLogica'])){
        DepartamentoPDO::bajaLogicaDepartamento($_REQUEST['bajaLogica']);
        
        header('Location: index.php');
        exit;
    }
    
    if(isset($_REQUEST['rehabilitar'])){
        DepartamentoPDO::rehabilitaDepartamento($_REQUEST['rehabilitar']);
        
        header('Location: index.php');
        exit;
    }
    
    $aErrores=[
      "busquedaDesc" => ""  
    ];
    $aRespuestas=[
      "busquedaDesc" => ""  
    ];
    
    $bEntradaOK=true;
    
    if(isset($_REQUEST['buscar'])){
        $aErrores['busquedaDesc']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['busquedaDesc'], 255, 1);
    
        foreach($aErrores as $clave => $error){
            //condición de que hay un error
            if(($error)!=null){
                $bEntradaOK=false;
            }
        }
    }
    else{
        $bEntradaOK=false;
        $oDepartamentos=DBPDO::ejecutarConsulta("SELECT * FROM T02_Departamento");
        $oResultado=$oDepartamentos->fetchObject();
    }
    if($bEntradaOK){
        $_SESSION['criterioBusquedaDepartamentos']['descripcionBusqueda'] = $_REQUEST['busquedaDesc'];
        $_SESSION['criterioBusquedaDepartamentos']['estado'] = $_REQUEST['tipoCriterio'];
        
        if(isset($_REQUEST['busquedaDesc'])){
            $aRespuestas['busquedaDesc']=$_REQUEST['busquedaDesc'];
            $oDepartamentos= DepartamentoPDO::buscaDepartamentosPorDesc($aRespuestas['busquedaDesc']);
            $oResultado=$oDepartamentos->fetchObject();
        }
        
    }
    $aDepartamentos=[];
    $contador=0;
    while($oResultado!=null){
        foreach($oResultado as $clave=>$valor){
            $aDepartamentos[$contador][$clave]=$valor;
        }
        $contador++;
        $oResultado=$oDepartamentos->fetchObject();
    }
    
    
    $vistaEnCurso = $aVistas['mtoDepartamentos'];
    require_once "view/LayoutHeader.php";
    require_once $vistaEnCurso;
    require_once "view/LayoutFooter.php";