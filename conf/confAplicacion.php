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
        "WIP" => "controller/cWIP.php",
        "error" => "controller/cError.php"
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
        "WIP" => "view/vWIP.php",
        "error" => "view/vError.php"
    ];