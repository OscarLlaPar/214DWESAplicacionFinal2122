<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-Aplicación Final - Consultar/Modificar Departamento</title>
        <link href="webroot/css/consultarModificarDepartamento.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main>
            <h2 class="titulo">Consultar/Modificar Departamento</h2>
            <form action="index.php" method="post">
                <div class="campo">
                    <label>Código del departamento:</label>
                    <input type="text" name="codDepartamento"  value="<?php echo $aVistaDepartamento['codDepartamento']?>" readonly>
                </div>
                <div class="campo">
                    <label>Descripción del departamento<span>*</span>:</label>
                    <input type="text" name="descDepartamento"  value="<?php echo $aVistaDepartamento['descDepartamento']?>">
                    <?php echo (isset($aErrores['descDepartamento']))?"<span>".$aErrores['descDepartamento']."</span>":""; ?>
                </div>
                <div class="campo">
                    <label>Fecha de creación del departamento:</label>
                    <input type="text" name="fechaCreacionDepartamento"  value="<?php echo $aVistaDepartamento['fechaCreacionDepartamento']?>" readonly>
                </div>
                <div class="campo">
                    <label>Volumen de negocio<span>*</span>:</label>
                    <input type="text" name="volumenDeNegocio"  value="<?php echo $aVistaDepartamento['volumenDeNegocio']?>">
                    <?php echo (isset($aErrores['volumenDeNegocio']))?"<span>".$aErrores['volumenDeNegocio']."</span>":""; ?>
                </div>
                <div class="campo">
                    <label>Fecha de baja del departamento:</label>
                    <input type="text" name="fechaBajaDepartamento"  value="<?php echo !empty($aVistaDepartamento['fechaBajaDepartamento'])?date("d/m/Y",$aVistaDepartamento['fechaBajaDepartamento']):""?>" readonly>
                </div>
                <div class="botones">
                    <button type="submit" name="aceptar" class="boton">Aceptar</button>
                    <button type="submit" name="cancelar" class="boton">Cancelar</button>
                </div>
            </form>
        </main>
    </body>
</html>
