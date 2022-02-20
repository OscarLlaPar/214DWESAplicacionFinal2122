<?php
    require_once '../conf/confDB.php';    
    require_once '../model/DB.php';
    require_once '../model/DBPDO.php';
    require_once '../model/Usuario.php';
    require_once '../model/UsuarioDB.php';
    require_once '../model/UsuarioPDO.php';
    
    //http://daw214.sauces.local/214DWESAplicacionFinal2122/api/modificarUsuario.php?codUsuario=prueba&descUsuario=Dios&imagenUsuario=
    //http://192.168.0.120/214DWESAplicacionFinal2122/api/modificarUsuario.php?codUsuario=admin&descUsuario=Dios&imagenUsuario=
    //https://daw214.ieslossauces.es/214DWESAplicacionFinal2122/api/modificarUsuario.php?codUsuario=prueba&descUsuario=Dios&imagenUsuario=
    
    $bRespuestaOK=true;
    $aRespuesta=[];
    $oUsuario=UsuarioPDO::buscarUsuarioPorCod($_GET['codUsuario']);
    
    if(is_object($oUsuario)){
        if(UsuarioPDO::modificarUsuario($oUsuario, $_GET['descUsuario'])){
            $aRespuesta=[
                "modificado"=>$bRespuestaOK
            ];
        }
        else{
            $bRespuestaOK=false;
            $aRespuesta=[
                "modificado"=>$bRespuestaOK,
                "mensaje"=>"Ha habido un problema con la API."
            ];
        }
    }
    else{
        $bRespuestaOK=false;
        $aRespuesta=[
                "modificado"=>$bRespuestaOK,
                "mensaje"=>"Usuario no encontrado."
            ];
    }
    
    echo json_encode($aRespuesta);
