<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-Aplicación Final - REST</title>
        <link href="webroot/css/REST.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main>
            <p class="definirRest">API REST de <strong>Google Books</strong> para buscar libros por título.</p>
            <form action="index.php" method="post">
                <input name="busqueda" type="text" placeholder="Buscar...">
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
                            <p class="editorial"><?php echo $item->getEditorial(); ?></p>
                            <p class="paginas"><?php echo $item->getPaginas(); ?> páginas</p>
                            <a href="<?php echo $item->getLink(); ?>">Ver en Google Books &#62;&#62;</a>
                        </div>
                    </div>
                <?php
                        }
                    }
                    else{
                ?>
                    <h3>Sin resultados</h3>
                <?php
                    }
                ?>
            </div>
        </main>
    </body>
</html>
