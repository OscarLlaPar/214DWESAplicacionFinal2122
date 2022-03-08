<?php
    //Si se pulsa "Cancelar"
    if(isset($_REQUEST['cancelar'])){
        $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior']; //Cambiar a página anterior
        $_SESSION['paginaAnterior']='altaDepartamento'; //Establecer la página actual como anterior
        header('Location: index.php'); //Recargar index
        exit;
    }
    //Array para los mensajes de error
    $aErrores=[
        "codDepartamento"=> "",
        "descDepartamento"=>"",
        "volumenDeNegocio"=>""
    ];
    //Array para almacenar las respuestas válidas
    $aRespuestas=[
        "codDepartamento"=> "",
        "descDepartamento"=>"",
        "volumenDeNegocio"=>""
    ];
    //Variable para controlar que todo está OK
    $bEntradaOK=true;
    //Si se pulsa el botón "Aceptar"
    if(isset($_REQUEST['aceptar'])){
        //Validar entrada del código de departamento
        $aErrores['codDepartamento']= validacionFormularios::comprobarAlfabetico($_REQUEST['codDepartamento'], 3, 3, 1);
        //Si hasta aquí no tiene error el código
        if(is_null($aErrores['codDepartamento'])){
            //Validar que está en mayúsculas
            if(strtoupper($_REQUEST['codDepartamento'])!=$_REQUEST['codDepartamento']){
                $aErrores['codDepartamento']="El código debe estar en mayúsculas";
            }
            //Si todavía no hay error
            else{
                //Comprobar si el código está repetido
                if(!is_null(DepartamentoPDO::validaCodNoExiste($_REQUEST['codDepartamento']))){
                    $aErrores['codDepartamento']="Código repetido";
                }
            }
            
        }
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
        $aRespuestas['codDepartamento']=$_REQUEST['codDepartamento'];
        $aRespuestas['descDepartamento']=$_REQUEST['descDepartamento'];
        $aRespuestas['volumenDeNegocio']=$_REQUEST['volumenDeNegocio'];
        //Si se produce el alta, volver a mtoDepartamentos
        if(DepartamentoPDO::altaDepartamento($aRespuestas['codDepartamento'], $aRespuestas['descDepartamento'], $aRespuestas['volumenDeNegocio'])){
            $_SESSION['paginaAnterior']=$_SESSION['paginaEnCurso'];
            $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
        }
        header('Location: index.php'); //Recargar index
        exit;
        
    }
    //Cargar vista
    $vistaEnCurso = $aVistas['altaDepartamento'];
    require_once "view/LayoutHeader.php";
    require_once $vistaEnCurso;
    require_once "view/LayoutFooter.php";