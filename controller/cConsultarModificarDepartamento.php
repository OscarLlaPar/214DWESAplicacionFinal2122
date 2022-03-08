<?php
    //Si se pulsa "Cancelar"
    if(isset($_REQUEST['cancelar'])){
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior']; //Cambiar a página anterior
        $_SESSION['paginaAnterior']='consultarModificarDepartamento'; //Establecer la página actual como anterior
        header('Location: index.php'); //Recargar index
        exit;
    }
     //Array para los mensajes de error
    $aErrores=[
        "descDepartamento" => "",
        "volumenDeNegocio" => ""
    ];
    //Array para almacenar las respuestas válidas
    $aRespuestas=[
        "descDepartamento" => "",
        "volumenDeNegocio" => ""
    ];
    //Variable para controlar que todo está OK
    $bEntradaOK=true;
    //Cargar datos del departamento
    $oDepartamento= DepartamentoPDO::buscaDepartamentoPorCod($_SESSION['codDepartamentoEnCurso']);
    //Si se pulsa el botón "Aceptar"
    if(isset($_REQUEST['aceptar'])){
        //Validar entradas
        $aErrores['descDepartamento']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['descDepartamento'], 50, 3, 1);
        $aErrores['volumenDeNegocio']= validacionFormularios::comprobarFloat($_REQUEST['volumenDeNegocio'],PHP_FLOAT_MAX,0,1);
        //Si hay algun error, hacer lo propio
        foreach($aErrores as $clave => $error){
            //condición de que hay un error
            if(($error)!=null){
                //limpieza del campo para cuando vuelva a aparecer el formulario
                $_REQUEST[$clave]="";
                $bEntradaOK=false;
            }
        }
    }
    // Si no se ha pulsado el botón "Aceptar"
    else{
        $bEntradaOK=false;
    }
    //Si todo está OK
    if($bEntradaOK){
        //Almacenar respuestas en array
        $aRespuestas['descDepartamento']=$_REQUEST['descDepartamento'];
        $aRespuestas['volumenDeNegocio']=$_REQUEST['volumenDeNegocio'];
        
       
        //Si se efectúa la modificación
        if(DepartamentoPDO::modificaDepartamento($oDepartamento, $aRespuestas['descDepartamento'], $aRespuestas['volumenDeNegocio'])){
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
    $vistaEnCurso = $aVistas['consultarModificarDepartamento'];
    require_once "view/LayoutHeader.php";
    require_once $vistaEnCurso;
    require_once "view/LayoutFooter.php";