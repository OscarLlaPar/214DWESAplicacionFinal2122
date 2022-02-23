<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-Aplicación Final - Error 404</title>
        <link href="webroot/css/wip.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" type="image/x-icon" href="webroot/img/favicon.ico">
    </head>
    <body>
        <?php
            require_once '../view/LayoutHeader.php';
        ?>
        <main>
            <h3>Error 404</h3>
            <p>Página no econtrada</p>
            <a href="index.php" class="boton">Volver</a>
        </main>
        <?php
            require_once '../view/LayoutFooter.php';
        ?>
    </body>
</html>
