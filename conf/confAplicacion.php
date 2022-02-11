<?php
    //Incluir librería de validación en la configuración de la aplicación
    require_once 'core/libreriaValidacion.php';
    
    //Modelo incluido en la configuración de la aplicación
    require_once 'model/Usuario.php';
    require_once 'model/UsuarioDB.php';
    require_once 'model/UsuarioPDO.php';
    require_once 'model/DB.php';
    require_once 'model/DBPDO.php';
    require_once 'model/AppError.php';
    require_once 'model/REST.php';
    require_once 'model/Libro.php';
    require_once 'model/Tiempo.php';
    require_once 'model/Departamento.php';
    require_once 'model/DepartamentoPDO.php';
    
    // Configuración de la base de datos incluida
    require_once 'conf/confDB.php';
    
    
    //Array de los ficheros de controladores
    $aControladores = [
        "login" => "controller/cLogin.php",
        "inicioPrivado" => "controller/cInicioPrivado.php",
        "inicioPublico" => "controller/cInicioPublico.php",
        "registro" => "controller/cRegistro.php",
        "detalle" => "controller/cDetalle.php",
        "miCuenta" => "controller/cMiCuenta.php",
        "borrarCuenta" => "controller/cBorrarCuenta.php",
        "cambiarPassword" => "controller/cCambiarPassword.php",
        "REST" => "controller/cREST.php",
        "infoREST" => "controller/cInfoREST.php",
        "mtoDepartamentos" => "controller/cMtoDepartamentos.php",
        "altaDepartamento" => "controller/cAltaDepartamento.php",
        "eliminarDepartamento" => "controller/cEliminarDepartamento.php",
        "consultarModificarDepartamento" => "controller/cConsultarModificarDepartamento.php",
        "mtoUsuarios" => "controller/cMtoUsuarios.php",
        "WIP" => "controller/cWIP.php",
        "error" => "controller/cError.php",
        "tecnologias"=>"controller/cTecnologias.php"
    ];
    
    //Array de los ficheros de vistas
    $aVistas = [
        "login" => "view/vLogin.php",
        "inicioPrivado" => "view/vInicioPrivado.php",
        "inicioPublico" => "view/vInicioPublico.php",
        "registro" => "view/vRegistro.php",
        "detalle" => "view/vDetalle.php",
        "miCuenta" => "view/vMiCuenta.php",
        "borrarCuenta" => "view/vBorrarCuenta.php",
        "cambiarPassword" => "view/vCambiarPassword.php",
        "REST" => "view/vREST.php",
        "infoREST" => "view/vInfoREST.php",
        "mtoDepartamentos"=>"view/vMtoDepartamentos.php",
        "altaDepartamento"=>"view/vAltaDepartamento.php",
        "eliminarDepartamento"=>"view/vEliminarDepartamento.php",
        "consultarModificarDepartamento"=>"view/vConsultarModificarDepartamento.php",
        "mtoUsuarios"=>"view/vMtoUsuarios.php",
        "WIP" => "view/vWIP.php",
        "error" => "view/vError.php",
        "tecnologias" => "view/vTecnologias.php"
    ];