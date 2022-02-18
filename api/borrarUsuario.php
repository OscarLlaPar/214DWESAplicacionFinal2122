<?php
    require_once '../conf/confDB.php';    
    require_once '../model/DB.php';
    require_once '../model/DBPDO.php';
    require_once '../model/Usuario.php';
    require_once '../model/UsuarioDB.php';
    require_once '../model/UsuarioPDO.php';
    
    //http://daw214.sauces.local/214DWESAplicacionFinal2122/api/borrarUsuario.php?codUsuario=prueba
    //https://daw214.ieslossauces.es/214DWESAplicacionFinal2122/api/borrarUsuario.php?codUsuario=prueba
    
    $bRespuestaOK=true;
    $aRespuesta=[];
    $oUsuario=UsuarioPDO::buscarUsuarioPorCod($_GET['codUsuario']);
    
    if(is_object($oUsuario)){
        if(UsuarioPDO::borrarUsuario($oUsuario)){
            $aRespuesta=[
                "eliminado"=>$bRespuestaOK
            ];
        }
        else{
            $bRespuestaOK=false;
            $aRespuesta=[
                "eliminado"=>$bRespuestaOK,
                "mensaje"=>"Ha habido un problema con la API."
            ];
        }
    }
    else{
        $bRespuestaOK=false;
        $aRespuesta=[
                "eliminado"=>$bRespuestaOK,
                "mensaje"=>"Usuario no encontrado."
            ];
    }
    
    echo json_encode($aRespuesta);