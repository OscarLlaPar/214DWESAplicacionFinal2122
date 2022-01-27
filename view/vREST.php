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
                    if(isset($aVistaREST)){
                        foreach($aVistaREST as $libro){
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
        </main>
    </body>
</html>
