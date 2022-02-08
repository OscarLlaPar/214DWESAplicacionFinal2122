<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-Aplicación Final - REST</title>
        <link href="webroot/css/REST.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main class="mainRest">
            <h2>APIs REST</h2>
            <form action="index.php" method="post">
                    <div class="botonVolver">
                        <button class="boton" name="volver">Volver</button>
                    </div>
                    <div class="apisRest">
                        <div class="definirRest">
                            <h3>API REST propia</h3>
                            <button class="info" name="info" value="departamentos"><img src="webroot/img/info.png"></button>
                            <p>
                                Sirve para consultar un departamento introduciendo su código. El código
                                de un departamento está formado por tres letras mayúsculas.
                            </p>
                            <div>
                                <input name="busquedaDepartamento" type="text" placeholder="Buscar por código" value="<?php echo $_REQUEST['busquedaDepartamento']??""?>">
                                <button class="boton" name="buscarDepartamento">Buscar departamento</button>
                                <br>
                                <p class="errorValidacion"><?php echo $aErrores['busquedaDepartamento'] ?></p>
                            </div>
                        </div>
                        <div class="definirRest">
                            <h3>API REST de <strong>WeatherStack</strong></h3>
                            <button class="info" name="info" value="weatherStack"><img src="webroot/img/info.png"></button>
                            <p>
                                Servicio web que permite consultar el tiempo de una ciudad al introducir su nombre (en inglés).
                                Requiere autenticación de usuarios. El plan gratuito tiene un límite de 250 usos.
                                En caso de que la ciudad sea homónima de otro país, tambien se puede especificar el país.
                            </p>
                            <a href="https://weatherstack.com/documentation" target="__blank">Más información &#62;&#62;</a>
                            <div>
                                <input name="busquedaTiempo" type="text" placeholder="Buscar ciudad..." value="<?php echo $_REQUEST['busquedaTiempo']??""?>">
                                <button class="boton" name="buscarTiempo">Buscar tiempo</button>
                                <br>
                                <p class="errorValidacion"><?php echo $aErrores['busquedaTiempo'] ?></p>
                            </div>
                        </div>
                        <div class="definirRest">
                            <h3>API REST de <strong>Google Books</strong></h3>
                            <button class="info" name="info" value="googleBooks"><img src="webroot/img/info.png"></button>
                            <p>
                                Servicio web que sirve para consultar un libro. No necesariamente busca por título, pero es su prioridad.
                                (p. ej. si buscas un autor primero mostrará libros en cuyo título esté su nombre).
                                Puede buscar los carácteres introducidos en cualquier campo de su base de datos de libros.
                            </p>
                            <a href="https://developers.google.com/books/docs/v1/getting_started" target="__blank">Más información &#62;&#62;</a>
                            <div>
                                <input name="busqueda" type="text" placeholder="Buscar título..." value="<?php echo $_REQUEST['busqueda']??""?>">
                                <button class="boton" name="buscar">Buscar libro</button>
                                <br>
                                <p class="errorValidacion"><?php echo $aErrores['busqueda'] ?></p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="resultado">
                        <?php
                            if(isset($aErrorDepartamento)){
                        ?>
                            <div class="error">
                                <p><?php echo $aErrorDepartamento[0] ?></p>
                            </div>
                        <?php
                            }
                            if(isset($aVistaDepartamento)){
                        ?>
                            <div class="departamento">
                                <p class="codigo"><?php echo $aVistaDepartamento['codDepartamento']?></p>
                                <h3><?php echo $aVistaDepartamento['descDepartamento']?></h3>
                                <p><strong>Fecha de creación: </strong><?php echo $aVistaDepartamento['fechaCreacionDepartamento']?></p>
                                <p><strong>Volumen de negocio: </strong><?php echo $aVistaDepartamento['volumenDeNegocio']?></p>
                            <?php
                                    if(!is_null($aVistaDepartamento['fechaBajaDepartamento'])){
                            ?>
                                <p><strong>Fecha de baja: </strong><?php echo $aVistaDepartamento['fechaBajaDepartamento']?></p>
                            <?php
                                    }
                            ?>
                            </div>
                        <?php
                            }
                            if(isset($aErrorTiempo)){
                        ?>
                            <div class="error">
                                <p><?php echo $aErrorTiempo[0] ?></p>
                                <p><?php echo $aErrorTiempo[1] ?></p>
                            </div>
                        <?php
                            }
                            if(isset($aVistaTiempo)){
                        ?>
                            <div class="tiempo">
                                <div class="icono">
                                    <img src="<?php echo $aVistaTiempo['icono'] ?>">
                                </div>
                                <div class="descTiempo">
                                    <h3><?php echo $aVistaTiempo['ciudad'].", (".$aVistaTiempo['pais'].")" ?></h3>
                                    <h4><?php echo $aVistaTiempo['descripcion'] ?></h4>
                                    <p><?php echo $aVistaTiempo['temperatura']."ºC" ?></p>
                                </div>
                            </div>
                        <?php
                            }
                            if(isset($aErrorLibros)){
                        ?>
                            <div class="error">
                                <p><?php echo $aErrorLibros[0] ?></p>
                                <p><?php echo $aErrorLibros[1] ?></p>
                            </div>
                        <?php
                            }
                            if(isset($aVistaLibros)){
                                foreach($aVistaLibros as $libro){
                        ?>
                            <div class="libro">
                                <div class="imagen">
                                    <img src="<?php echo $libro['imagen']; ?>">
                                </div>
                                <div class="titulo">
                                    <h3><?php echo $libro['titulo'].", (".$libro['anyoEdicion'].")"; ?></h3>
                                    <p>
                                        <?php

                                        ?>
                                    </p>
                                    <p class="editorial"><?php echo $libro['editorial']; ?></p>
                                    <p class="paginas"><?php echo $libro['paginas']; ?> páginas</p>
                                    <a href="<?php echo $libro['link']; ?>">Ver en Google Books &#62;&#62;</a>
                                </div>
                            </div>
                        <?php
                                }
                            }
                        ?>
                    </div>
                    
                </form>
        </main>
    </body>
</html>
