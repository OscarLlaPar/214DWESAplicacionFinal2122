<?php

    if(isset($_REQUEST['cancelar'])){
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
        $_SESSION['paginaAnterior']='consultarModificarDepartamento';
        header('Location: index.php');
        exit;
    }
    
    $aErrores=[
        "descDepartamento" => "",
        "volumenDeNegocio" => ""
    ];
    
    $aRespuestas=[
        "descDepartamento" => "",
        "volumenDeNegocio" => ""
    ];
    
    $bEntradaOK=true;
    
    $oDepartamento= DepartamentoPDO::buscaDepartamentoPorCod($_SESSION['codDepartamentoEnCurso']);
    
    if(isset($_REQUEST['aceptar'])){
        $aErrores['descDepartamento']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['descDepartamento'], 50, 3, 1);
        $aErrores['volumenDeNegocio']= validacionFormularios::comprobarFloat($_REQUEST['volumenDeNegocio'],PHP_FLOAT_MAX,0,1);
        
        foreach($aErrores as $clave => $error){
            //condición de que hay un error
            if(($error)!=null){
                //limpieza del campo para cuando vuelva a aparecer el formulario
                $_REQUEST[$clave]="";
                $bEntradaOK=false;
            }
        }
    }
    else{
        $bEntradaOK=false;
    }
    if($bEntradaOK){
        $aRespuestas['descDepartamento']=$_REQUEST['descDepartamento'];
        $aRespuestas['volumenDeNegocio']=$_REQUEST['volumenDeNegocio'];
        
       
        
        if(DepartamentoPDO::modificaDepartamento($oDepartamento, $aRespuestas['descDepartamento'], $aRespuestas['volumenDeNegocio'])){
            $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
            $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
        }
        header('Location: index.php');
        exit;
    }
    
    $aVistaDepartamento=[
        "codDepartamento"=>$oDepartamento->getCodDepartamento(),
        "descDepartamento"=>$oDepartamento->getDescDepartamento(),
        "fechaCreacionDepartamento"=>date("d/m/Y",$oDepartamento->getFechaCreacionDepartamento()),
        "volumenDeNegocio"=>$oDepartamento->getVolumenDeNegocio(),
        "fechaBajaDepartamento"=>$oDepartamento->getFechaBajaDepartamento()
    ];
    
    $vistaEnCurso = $aVistas['consultarModificarDepartamento'];
    require_once "view/LayoutHeader.php";
    require_once $vistaEnCurso;
    require_once "view/LayoutFooter.php";