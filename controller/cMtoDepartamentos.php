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
    
    if(isset($_REQUEST['editarDepartamento'])){
        $_SESSION['codDepartamentoEnCurso']=$_REQUEST['editarDepartamento'];
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='consultarModificarDepartamento';
        header('Location: index.php');
        exit;
    }
    
    if(isset($_REQUEST['bajaFisica'])){
        $_SESSION['codDepartamentoEnCurso']=$_REQUEST['bajaFisica'];
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
        $_SESSION['paginaEnCurso']='eliminarDepartamento';
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
    
    
    
    if(isset($_REQUEST['paginaAnterior']) && $_SESSION['numPaginacionDepartamentos']>1){
        $_SESSION['numPaginacionDepartamentos']--;
        
        header('Location: index.php');
        exit;
    }
    
    if(isset($_REQUEST['paginaSiguiente'])){
        $_SESSION['numPaginacionDepartamentos']++;
        
        header('Location: index.php');
        exit;
    }
    
    if(isset($_REQUEST['primeraPagina'])){
        $_SESSION['numPaginacionDepartamentos']=1;
        
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
        $oDepartamentos=DepartamentoPDO::buscaDepartamentosPorDesc("",0,$_SESSION['numPaginacionDepartamentos']-1);
        $oResultado=$oDepartamentos->fetchObject();
    }
    if($bEntradaOK){
        $_SESSION['criterioBusquedaDepartamentos']['descripcionBusqueda'] = $_REQUEST['busquedaDesc'];
        $_SESSION['criterioBusquedaDepartamentos']['estado'] = $_REQUEST['tipoCriterio'];
        
        if(isset($_REQUEST['busquedaDesc'])){
            $aRespuestas['busquedaDesc']=$_REQUEST['busquedaDesc'];
            $oDepartamentos= DepartamentoPDO::buscaDepartamentosPorDesc($aRespuestas['busquedaDesc'],$_SESSION['criterioBusquedaDepartamentos']['estado'], $_SESSION['numPaginacionDepartamentos']-1);
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
    
    
    /*if(isset($_REQUEST['exportarDepartamentos'])){
        $contenidoJSON = json_encode($aDepartamentos, JSON_PRETTY_PRINT);
        $escritura = file_put_contents('tmp/departamentos.json', $contenidoJSON);
    }
    
    if(isset($_REQUEST['importarDepartamentos'])){
        $json= file_get_contents('tmp/departamentos.json');
        $aFichero= json_decode($json, true);
        foreach($aFichero as $fila){
            DepartamentoPDO::altaDepartamento($fila['T02_CodDepartamento'], $fila['T02_DescDepartamento'], $fila['T02_VolumenDeNegocio']);
        }
    }*/
    
    $vistaEnCurso = $aVistas['mtoDepartamentos'];
    require_once "view/LayoutHeader.php";
    require_once $vistaEnCurso;
    require_once "view/LayoutFooter.php";