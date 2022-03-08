<?php
    //Si se pulsa "Cancelar"
    if(isset($_REQUEST['cancelar'])){
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior']; //Cambiar a página anterior
        $_SESSION['paginaAnterior']='consultarModificarDepartamento'; //Establecer la página actual como anterior
        header('Location: index.php'); //Recargar index
        exit;
    }
    //Cargar datos del departamento
    $oDepartamento= DepartamentoPDO::buscaDepartamentoPorCod($_SESSION['codDepartamentoEnCurso']);
    //Si se pulsa el botón "Aceptar"
    if(isset($_REQUEST['aceptar'])){
        //Si se efectúa la eliminación
        if(DepartamentoPDO::bajaFisicaDepartamento($oDepartamento)){
            //Volver a mtoDepartamentos
            $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
            $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
        }
        header('Location: index.php'); //Recargar index
        exit;
    }
    //Preparar datos del departamento para la vista
    $aVistaDepartamento=[
        "codDepartamento"=>$oDepartamento->getCodDepartamento(),
        "descDepartamento"=>$oDepartamento->getDescDepartamento(),
        "fechaCreacionDepartamento"=>date("d/m/Y",$oDepartamento->getFechaCreacionDepartamento()),
        "volumenDeNegocio"=>$oDepartamento->getVolumenDeNegocio(),
        "fechaBajaDepartamento"=>$oDepartamento->getFechaBajaDepartamento()
    ];
    //Cargar vista
    $vistaEnCurso = $aVistas['eliminarDepartamento'];
    require_once "view/LayoutHeader.php";
    require_once $vistaEnCurso;
    require_once "view/LayoutFooter.php";