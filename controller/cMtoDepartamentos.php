<?php
    
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
        $_SESSION['paginaAnterior']='mtoDepartamentos';
        header('Location: index.php');
        exit;
    }

    $oDepartamentos=DBPDO::ejecutarConsulta("SELECT * FROM T02_Departamento");
    $oResultado=$oDepartamentos->fetchObject();
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