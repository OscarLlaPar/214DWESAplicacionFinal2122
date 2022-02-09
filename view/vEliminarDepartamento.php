<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-Aplicación Final - Eliminar Departamento</title>
        <link href="webroot/css/eliminarDepartamento.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main>
            <h2 class="titulo">Eliminar Departamento</h2>
            <form action="index.php" method="post">
                <div class="campo">
                    <label>Código del departamento:</label>
                    <input type="text" name="codDepartamento"  value="<?php echo $aVistaDepartamento['codDepartamento']?>" readonly>
                </div>
                <div class="campo">
                    <label>Descripción del departamento<span>*</span>:</label>
                    <input type="text" name="descDepartamento"  value="<?php echo $aVistaDepartamento['descDepartamento']?>" readonly>
                </div>
                <div class="campo">
                    <label>Fecha de creación del departamento:</label>
                    <input type="text" name="fechaCreacionDepartamento"  value="<?php echo $aVistaDepartamento['fechaCreacionDepartamento']?>" readonly>
                </div>
                <div class="campo">
                    <label>Volumen de negocio<span>*</span>:</label>
                    <input type="text" name="volumenDeNegocio"  value="<?php echo $aVistaDepartamento['volumenDeNegocio']?>" readonly>
                </div>
                <div class="campo">
                    <label>Fecha de baja del departamento:</label>
                    <input type="text" name="fechaBajaDepartamento"  value="<?php echo !empty($aVistaDepartamento['fechaBajaDepartamento'])?date("d/m/Y",$aVistaDepartamento['fechaBajaDepartamento']):""?>" readonly>
                </div>
                <div class="botones">
                    <p>¿Estás seguro?</p>
                    <button type="submit" name="aceptar" class="boton">Aceptar</button>
                    <button type="submit" name="cancelar" class="boton">Cancelar</button>
                </div>
            </form>
        </main>
    </body>
</html>
