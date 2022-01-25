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
                    if($aResultadoAPI["totalItems"]>0){
                        foreach($aResultadoAPI["items"] as $item){
                ?>
                    <div class="libro">
                        <img src="<?php echo (isset($item['volumeInfo']['imageLinks']))?$item['volumeInfo']['imageLinks']['thumbnail']:"webroot/img/nodisponible.jpg"?>">
                        <div class="titulo">
                            <h3><?php echo $item['volumeInfo']['title'] ?></h3>
                        </div>

                        <p class="descripcion">
                            <?php echo (isset($item['searchInfo']['textSnippet']))?$item['searchInfo']['textSnippet']:"Descripción no disponible" ?>
                        </p>
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
