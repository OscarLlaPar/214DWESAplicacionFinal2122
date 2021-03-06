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
                <div class="menu">
                    <button class="boton" name="volver">Volver</button>
                    <?php
                        if(isset($sVistaMensaje)){
                            ?>
                    <div class="mensajeExportar">
                        <?php echo $sVistaMensaje?>
                    </div>
                            <?php
                        }
                    ?>
                    <button class="boton" name="altaDepartamento">Añadir departamento</button>
                    <button class="boton" name="importarDepartamentos">Importar departamentos</button>
                    <button class="boton" name="exportarDepartamentos">Exportar departamentos</button>
                    <br>
                    <input name="busquedaDesc" type="text" placeholder="Buscar por descripción..." value="<?php echo $_SESSION['criterioBusquedaDepartamentos']['descripcionBusqueda']??""?>">                     
                    <button class="boton" name="buscar">Buscar</button>
                    <input id="busquedaTodos" name="tipoCriterio" type="radio" value="0" <?php echo (!isset($_SESSION['criterioBusquedaDepartamentos']['estado'])||$_SESSION['criterioBusquedaDepartamentos']['estado']==0)?"checked":""?>>
                    <label for="busquedaTodos">Todos</label>
                    <input id="busquedaAlta" name="tipoCriterio" type="radio" value="1" <?php echo (isset($_SESSION['criterioBusquedaDepartamentos']['estado'])&&$_SESSION['criterioBusquedaDepartamentos']['estado']==1)?"checked":""?>>
                    <label for="busquedaAlta">Alta</label>
                    <input id="busquedaBaja" name="tipoCriterio" type="radio" value="2"<?php echo (isset($_SESSION['criterioBusquedaDepartamentos']['estado'])&&$_SESSION['criterioBusquedaDepartamentos']['estado']==2)?"checked":""?>>
                    <label for="busquedaBaja">Baja</label>
                </div>
                <div class="resultado">
                    <table class="tablaDepartamentos">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Descripción</th>
                                <th>Fecha de creación</th>
                                <th>Volumen de negocio</th>
                                <th>Fecha de baja</th>
                                <th>Editar</th>
                                <th>Baja</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody class="contenidoTabla">
                            <?php
                                foreach($aDepartamentos as $departamento){
                            ?>
                            <tr class="<?php echo (empty($departamento['T02_FechaBajaDepartamento']))?"activo":"baja" ?>">
                                <td class="codigo"><?php echo $departamento['T02_CodDepartamento']?></td>
                                <td><?php echo $departamento['T02_DescDepartamento']?></td>
                                <td><?php echo date("d/m/Y", $departamento['T02_FechaCreacionDepartamento'])?></td>
                                <td><?php echo $departamento['T02_VolumenDeNegocio']?> €</td>
                                <td><?php echo !empty($departamento['T02_FechaBajaDepartamento'])?date("d/m/Y", $departamento['T02_FechaBajaDepartamento']):"" ?></td>
                                <td><button class="boton" name="editarDepartamento" value="<?php echo $departamento['T02_CodDepartamento']?>"><img src="webroot/img/editar.png"></button></td>
                                <?php
                                    if(empty($departamento['T02_FechaBajaDepartamento'])){
                                ?>
                                <td><button class="boton" name="bajaLogica" value="<?php echo $departamento['T02_CodDepartamento']?>"><img src="webroot/img/baja.png"></button></td>
                                <?php
                                    }
                                    else{
                                ?>
                                <td><button class="boton" name="rehabilitar"  value="<?php echo $departamento['T02_CodDepartamento']?>"><img src="webroot/img/alta.png"></button></td>
                                <?php
                                    }
                                ?>
                                <td><button class="boton" name="bajaFisica"  value="<?php echo $departamento['T02_CodDepartamento']?>"><img src="webroot/img/eliminar.png"></button></td>
                            </tr>    
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="paginacion">
                    <button class="boton" name="primeraPagina" <?php echo ($_SESSION['numPaginacionDepartamentos']===1)?"disabled":"" ?>>| &#60;</button>
                    <button class="boton" name="paginaAnterior" <?php echo ($_SESSION['numPaginacionDepartamentos']===1)?"disabled":"" ?>>&#60;</button>
                    <span><?php echo $_SESSION['numPaginacionDepartamentos']."/".$_SESSION['numPaginas'] ?></span>
                    <button class="boton" name="paginaSiguiente" <?php echo ($_SESSION['numPaginacionDepartamentos']===$_SESSION['numPaginas'])?"disabled":"" ?>>&#62;</button>
                    <button class="boton" name="ultimaPagina" <?php echo ($_SESSION['numPaginacionDepartamentos']===$_SESSION['numPaginas'])?"disabled":"" ?>>&#62; |</button>
                </div>
            </form>
        </main>
    </body>
</html>
