<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-Aplicación Final - REST</title>
        <link href="webroot/css/REST.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main class="mainRest">
                
                <form action="index.php" method="post">
                    <div class="definirRest">
                        <h3>API REST de <strong>Google Books</strong></h3>
                        <p>
                            Servicio web que sirve para consultar un libro. No necesariamente busca por título, pero es su prioridad.
                            (p. ej. si buscas un autor primero mostrará libros en cuyo título esté su nombre).
                            Puede buscar los carácteres introducidos en cualquier campo de su base de datos de libros.
                        </p>
                        <a href="https://developers.google.com/books/docs/v1/getting_started" target="__blank">Más información &#62;&#62;</a>
                        <div>
                            <input name="busqueda" type="text" placeholder="Buscar..." value="<?php echo $_REQUEST['busqueda']??""?>">
                            <button class="boton" name="buscar">Buscar</button>
                        </div>
                    </div>
                    <div class="definirRest">
                        <h3>API REST de <strong>WeatherStack</strong></h3>
                        <p>
                            Servicio web que permite consultar el tiempo de una ciudad al introducir su nombre (en inglés).
                            Requiere autenticación de usuarios. El plan gratuito tiene un límite de 250 usos.
                            En caso de que la ciudad sea homónima de otro país, tambien se puede especificar el país.
                        </p>
                        <a href="https://weatherstack.com/documentation" target="__blank">Más información &#62;&#62;</a>
                        <div>
                            <input name="busquedaTiempo" type="text" placeholder="Buscar..." value="<?php echo $_REQUEST['busquedaTiempo']??""?>">
                            <button class="boton" name="buscar">Buscar</button>
                        </div>
                    </div>
                    <div class="botonVolver">
                        <button class="boton" name="volver">Volver</button>
                    </div>
                </form>
                <div class="resultado">
                    <?php
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
                <div class="resultado">
                    <?php
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
                    ?>
                </div>
        </main>
    </body>
</html>
