<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-Aplicación Final - REST</title>
        <link href="webroot/css/REST.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main>
            <div class="definirRest">
                <h3>API REST de <strong>Google Books</strong></h3>
                <p>Servicio web que sirve para consultar un libro buscándolo por título</p>
                <a href="https://developers.google.com/books/docs/v1/getting_started" target="__blank">Más información &#62;&#62;</a>
            </div>
            <form action="index.php" method="post">
                <input name="busqueda" type="text" placeholder="Buscar..." value="<?php echo $_REQUEST['busqueda']??""?>">
                <button class="boton" name="buscar">Buscar</button>
                <br>
                <button class="boton" name="volver">Volver</button>
            </form>
            <div class="resultado">
                <?php
                    if(isset($aLibros)){
                        foreach($aLibros as $item){
                ?>
                    <div class="libro">
                        <div class="imagen">
                            <img src="<?php echo $item->getImagen(); ?>">
                        </div>
                        <div class="titulo">
                            <h3><?php echo $item->getTitulo().", (".$item->getAnyoEdicion().")"; ?></h3>
                            <p>
                                <?php
                                    
                                ?>
                            </p>
                            <p class="editorial"><?php echo $item->getEditorial(); ?></p>
                            <p class="paginas"><?php echo $item->getPaginas(); ?> páginas</p>
                            <a href="<?php echo $item->getLink(); ?>">Ver en Google Books &#62;&#62;</a>
                        </div>
                    </div>
                <?php
                        }
                    }
                ?>
            </div>
        </main>
    </body>
</html>
