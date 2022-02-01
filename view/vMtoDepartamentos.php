<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-Aplicación Final - MtoDepartamentos</title>
        <link href="webroot/css/mtoDepartamentos.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main>
            <form action="index.php" method="post">
                <input name="busqueda" type="text" placeholder="Buscar..." value="<?php echo $_REQUEST['busqueda']??""?>">                     
                <button class="boton" name="buscar">Buscar</button>
                <button class="boton" name="volver">Volver</button>
            </form>
            <div class="departamentos">
                <?php
                    foreach($aDepartamentos as $departamento){
                ?>
                <div class="departamento">
                    <p class="codigo"><?php echo $departamento['T02_CodDepartamento']?></p>
                    <h3><?php echo $departamento['T02_DescDepartamento']?></h3>
                    <p><strong>Fecha de creación: </strong><?php echo $departamento['T02_FechaCreacionDepartamento']?></p>
                    <p><strong>Volumen de negocio: </strong><?php echo $departamento['T02_VolumenDeNegocio']?></p>
                <?php
                        if(!is_null($departamento['T02_FechaBajaDepartamento'])){
                ?>
                    <p><strong>Fecha de baja: </strong><?php echo $departamento['T02_FechaBajaDepartamento']?></p>
                <?php
                        }
                ?>
                </div>    
                <?php
                    }
                ?>
            </div>
        </main>
    </body>
</html>
