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
                <h2>Mantenimiento Departamentos</h2>
                <div>
                    <input name="busquedaDesc" type="text" placeholder="Buscar por descripción..." value="<?php echo $_REQUEST['busquedaDesc']??""?>">                     
                    <button class="boton" name="buscar">Buscar</button>
                    <button class="boton" name="volver">Volver</button>
                </div>
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
                        <div class="botones">
                            <button class="boton"><img src="webroot/img/editar.png"></button>
                            <button class="boton"><img src="webroot/img/eliminar.png"></button>
                            <button class="boton"><img src="webroot/img/ver.png"></button>
                        </div>
                    </div>    
                    <?php
                        }
                    ?>
                </div>
            </form>
        </main>
    </body>
</html>
