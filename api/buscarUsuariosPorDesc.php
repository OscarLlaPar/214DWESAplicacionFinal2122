<?php
    require_once '../conf/confDB.php';    
    require_once '../model/DB.php';
    require_once '../model/DBPDO.php';
    require_once '../model/Usuario.php';
    require_once '../model/UsuarioDB.php';
    require_once '../model/UsuarioPDO.php';
    
    //http://daw214.sauces.local/214DWESAplicacionFinal2122/api/buscarUsuariosPorDesc.php?descUsuario=Oscar
    //https://daw214.ieslossauces.es/214DWESAplicacionFinal2122/api/buscarUsuariosPorDesc.php?descUsuario=Oscar
    
    $bRespuestaOK=true;
    if(isset($_GET['descUsuario'])){
        $aResultado=UsuarioPDO::buscaUsuariosPorDesc($_GET['descUsuario']);
        
        if($aResultado){
            
            $aRespuesta=[
                "respuestaOK"=>$bRespuestaOK,
                "usuarios"=>$aResultado
            ];
        }
        else{
            $bRespuestaOK=false;
            $aRespuesta=[
                "respuestaOK"=>$bRespuestaOK,
                "error"=>"Usuario(s) no encontrado(s)"
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