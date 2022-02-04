<?php
    require_once '../conf/confDB.php';    
    require_once '../model/DB.php';
    require_once '../model/DBPDO.php';
    require_once '../model/Departamento.php';
    require_once '../model/DepartamentoPDO.php';

    //http://daw214.sauces.local/214DWESAplicacionFinal2122/api/consultaDepartamentoPorCodigo.php?codDepartamento=UNO
    $bRespuestaOK=true;
    if(isset($_GET['codDepartamento'])){
        $oDepartamento = DepartamentoPDO::buscaDepartamentoPorCod($_GET['codDepartamento']);
        if($oDepartamento){
            $aRespuesta=[
                "respuestaOK"=>$bRespuestaOK,
                "departamento"=>[
                    "codDepartamento" => $oDepartamento->getCodDepartamento(),
                    "descDepartamento" => $oDepartamento->getDescDepartamento(),
                    "fechaCreacionDepartamento" => $oDepartamento->getFechaCreacionDepartamento(),
                    "volumenDeNegocio" => $oDepartamento->getVolumenDeNegocio(),
                    "fechaBajaDepartamento" => $oDepartamento->getFechaBajaDepartamento()
                ]
            ];
        }
        else{
            $bRespuestaOK=false;
            $aRespuesta=[
                "respuestaOK"=>$bRespuestaOK,
                "error"=>"Departamento no encontrado"
            ];
        }
        
    }
    else{
        $bRespuestaOK=false;
        $aRespuesta=[
                "respuestaOK"=>$bRespuestaOK,
                "error"=>"Ha habido un problema con la API"
            ];
    }
    echo json_encode($aRespuesta);