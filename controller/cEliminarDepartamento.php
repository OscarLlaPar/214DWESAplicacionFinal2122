<?php

    if(isset($_REQUEST['cancelar'])){
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
        $_SESSION['paginaAnterior']='consultarModificarDepartamento';
        header('Location: index.php');
        exit;
    }
    
    $oDepartamento= DepartamentoPDO::buscaDepartamentoPorCod($_SESSION['codDepartamentoEnCurso']);
    
    if(isset($_REQUEST['aceptar'])){
        
        if(DepartamentoPDO::bajaFisicaDepartamento($oDepartamento)){
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
    
    $vistaEnCurso = $aVistas['eliminarDepartamento'];
    require_once "view/LayoutHeader.php";
    require_once $vistaEnCurso;
    require_once "view/LayoutFooter.php";