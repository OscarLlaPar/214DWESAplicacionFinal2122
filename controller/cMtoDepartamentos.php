<?php
    
    DBPDO::ejecutarConsulta("SELECT * FROM T02_Departamento");

    $vistaEnCurso = $aVistas['mtoDepartamentos'];
    require_once "view/LayoutHeader.php";
    require_once $vistaEnCurso;
    require_once "view/LayoutFooter.php";