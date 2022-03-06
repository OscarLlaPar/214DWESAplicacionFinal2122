<?php
    
    //Si se pulsa el botón "Volver"
    if(isset($_REQUEST['volver'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Actualizar página anterior
        $_SESSION['paginaEnCurso']='inicioPrivado'; //Ir a inicio privado
        header('Location: index.php'); //Recargar index
        exit;
    }
    
    //Si se pulsa en "Añadir departamento"
    if(isset($_REQUEST['altaDepartamento'])){
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Actualizar página anterior
        $_SESSION['paginaEnCurso']='altaDepartamento'; //Ir a la página de añadir departamento
        header('Location: index.php'); //Recargar index
        exit;
    }
    
    //Si se pulsa en el botón "Editar" de un departamento
    if(isset($_REQUEST['editarDepartamento'])){
        $_SESSION['codDepartamentoEnCurso']=$_REQUEST['editarDepartamento']; //Almacenar el código del departamento con que se trabaja
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Actualizar página anterior
        $_SESSION['paginaEnCurso']='consultarModificarDepartamento'; //Ir a la página de editar departamento
        header('Location: index.php'); //Recargar index
        exit;
    }
    
    //Si se pulsa el botón de eliminar departamento
    if(isset($_REQUEST['bajaFisica'])){
        $_SESSION['codDepartamentoEnCurso']=$_REQUEST['bajaFisica']; //Almacenar el código del departamento con que se trabaja
        $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso']; //Actualizar página anterior
        $_SESSION['paginaEnCurso']='eliminarDepartamento'; //Ir a la página de eliminar departamento
        header('Location: index.php'); //Recargar index
        exit;
    }
    
    //Si se pulsa el botón de baja de un departamento (flechita roja)
    if(isset($_REQUEST['bajaLogica'])){
        DepartamentoPDO::bajaLogicaDepartamento($_REQUEST['bajaLogica']); //Eliminar departamento de BBDD
        
        header('Location: index.php'); //Recargar index
        exit;
    }
    
    //Si se pulsa el botón de rehabilitar departamento (flechita verde)
    if(isset($_REQUEST['rehabilitar'])){
        DepartamentoPDO::rehabilitaDepartamento($_REQUEST['rehabilitar']); //Rehabilitar departamento en BBDD
        
        header('Location: index.php'); //Recargar index
        exit;
    }
    
    //Si se pulsa el botón de página anterior y no es la primera página
    if(isset($_REQUEST['paginaAnterior']) && $_SESSION['numPaginacionDepartamentos']>1){
        $_SESSION['numPaginacionDepartamentos']--; // Reducir página
        
        header('Location: index.php'); //Recargar index
        exit;
    }
    
    //Si se pulsa el botón de página siguiente y no es la última página
    if(isset($_REQUEST['paginaSiguiente']) && $_SESSION['numPaginacionDepartamentos']<$_SESSION['numPaginas']){
        $_SESSION['numPaginacionDepartamentos']++; //Aumentar página
        
        header('Location: index.php'); //Recargar index
        exit;
    }
    
    //Si se pulsa el botón de primera página
    if(isset($_REQUEST['primeraPagina'])){
        $_SESSION['numPaginacionDepartamentos']=1; //Cambiar página actual a 1
        
        header('Location: index.php'); //Recargar index
        exit;
    }
    
    //Si se pulsa el botón de última página
    if(isset($_REQUEST['ultimaPagina'])){
        $_SESSION['numPaginacionDepartamentos']=$_SESSION['numPaginas']; //Cambiar página a la última
        
        header('Location: index.php'); //Recargar index
        exit;
    }
    
    //Array para los mensajes de error
    $aErrores=[
      "busquedaDesc" => ""  
    ];
    //Array para almacenar las respuestas válidas
    $aRespuestas=[
      "busquedaDesc" => ""  
    ];
    
    //Variable para controlar que todo está OK
    $bEntradaOK=true;
    
    //Si se pulsa el botón de "Buscar"
    if(isset($_REQUEST['buscar'])){
        //Validar búsqueda
        $aErrores['busquedaDesc']= validacionFormularios::comprobarAlfaNumerico($_REQUEST['busquedaDesc'], 255, 1);
        //Si hay algun error, hacer lo propio
        foreach($aErrores as $clave => $error){
            //condición de que hay un error
            if(($error)!=null){
                $bEntradaOK=false; //No está OK la cosa
            }
        }
    }
    //Si no se ha pulsado el botón de "Buscar"
    else{
        $bEntradaOK=false;
        //Muestra inicial de departamentos
        $oDepartamentos=DepartamentoPDO::buscaDepartamentosPorDesc("",0,$_SESSION['numPaginacionDepartamentos']-1);
        $oResultado=$oDepartamentos->fetchObject();
    }
    //Si todo está OK
    if($bEntradaOK){
        //Almacenar búsqueda y tipo de búsqueda
        $_SESSION['criterioBusquedaDepartamentos']['descripcionBusqueda'] = $_REQUEST['busquedaDesc'];
        $_SESSION['criterioBusquedaDepartamentos']['estado'] = $_REQUEST['tipoCriterio'];
        
        //Si se cambia el tipo de búsqueda, volver a la primera página
        if($_SESSION['criterioBusquedaDepartamentos']['estado']!=0){
            $_SESSION['numPaginacionDepartamentos']=1;
        }
        
        //Si se ha buscado algo
        if(isset($_REQUEST['busquedaDesc'])){
            $aRespuestas['busquedaDesc']=$_REQUEST['busquedaDesc'];
            //Mostrar departamentos según la búsqueda
            $oDepartamentos= DepartamentoPDO::buscaDepartamentosPorDesc($aRespuestas['busquedaDesc'],$_SESSION['criterioBusquedaDepartamentos']['estado'], $_SESSION['numPaginacionDepartamentos']-1);
            $oResultado=$oDepartamentos->fetchObject();
        }
        
    }
    //Contar departamentos
    $numDepartamentos= DepartamentoPDO::contarDepartamentos($_SESSION['criterioBusquedaDepartamentos']['estado']??0);
    //Calcular páginas a partir de los departamentos
    $_SESSION['numPaginas']=($numDepartamentos%3===0)?$numDepartamentos/3:intdiv($numDepartamentos,3)+1;
    //Preparar departamentos para la vista
    $aDepartamentos=[];
    $contador=0;
    while($oResultado!=null){
        foreach($oResultado as $clave=>$valor){
            $aDepartamentos[$contador][$clave]=$valor;
        }
        $contador++;
        $oResultado=$oDepartamentos->fetchObject();
    }
    
    //Si se pulsa el botón de "Exportar departamentos"
    if(isset($_REQUEST['exportarDepartamentos'])){
        //Pasar departamentos a json
        $contenidoJSON = json_encode($aDepartamentos, JSON_PRETTY_PRINT);
        //Escribir en archivo
        $escritura = file_put_contents('tmp/departamentos.json', $contenidoJSON);
    }
    //Si se pulsa el botón de "Importar departamentos"
    if(isset($_REQUEST['importarDepartamentos'])){
        //Sacar contenido de archivo
        $json= file_get_contents('tmp/departamentos.json');
        //Pasar de json a array
        $aFichero= json_decode($json, true);
        //Ir dando de alta a cada departamento del array
        foreach($aFichero as $fila){
            DepartamentoPDO::altaDepartamento($fila['T02_CodDepartamento'], $fila['T02_DescDepartamento'], $fila['T02_VolumenDeNegocio']);
        }
        header('Location: index.php'); //Recargar index
        exit;
    }
    
    //Cargar la vista
    $vistaEnCurso = $aVistas['mtoDepartamentos'];
    require_once "view/LayoutHeader.php";
    require_once $vistaEnCurso;
    require_once "view/LayoutFooter.php";