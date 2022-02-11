<?php
    if(isset($_REQUEST['cancelar'])){
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
        $_SESSION['paginaAnterior']='altaDepartamento';
        header('Location: index.php');
        exit;
    }
    
    $aErrores=[
        "codDepartamento"=> "",
        "descDepartamento"=>"",
        "volumenDeNegocio"=>""
    ];
    
    $aRespuestas=[
        "codDepartamento"=> "",
        "descDepartamento"=>"",
        "volumenDeNegocio"=>""
    ];
    
    $bEntradaOK=true;
    
    if(isset($_REQUEST['aceptar'])){
        $aErrores['codDepartamento']= validacionFormularios::comprobarAlfabetico($_REQUEST['codDepartamento'], 3, 3, 1);
        if(is_null($aErrores['codDepartamento'])){
            if(strtoupper($_REQUEST['codDepartamento'])!=$_REQUEST['codDepartamento']){
                $aErrores['codDepartamento']="El código debe estar en mayúsculas";
            }
            else{
                if(!is_null(DepartamentoPDO::validaCodNoExiste($_REQUEST['codDepartamento']))){
                    $aErrores['codDepartamento']="Código repetido";
                }
            }
            
        }
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
        $aRespuestas['codDepartamento']=$_REQUEST['codDepartamento'];
        $aRespuestas['descDepartamento']=$_REQUEST['descDepartamento'];
        $aRespuestas['volumenDeNegocio']=$_REQUEST['volumenDeNegocio'];
        if(DepartamentoPDO::altaDepartamento($aRespuestas['codDepartamento'], $aRespuestas['descDepartamento'], $aRespuestas['volumenDeNegocio'])){
            $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
            $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
        }
        header('Location: index.php');
        exit;
        
    }
    $vistaEnCurso = $aVistas['altaDepartamento'];
    require_once "view/LayoutHeader.php";
    require_once $vistaEnCurso;
    require_once "view/LayoutFooter.php";