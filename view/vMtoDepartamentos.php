<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="index.php" method="post">
            <input name="busqueda" type="text" placeholder="Buscar..." value="<?php echo $_REQUEST['busqueda']??""?>">                     
            <button class="boton" name="buscar">Buscar</button>
            <button class="boton" name="volver">Volver</button>
        </form>
    </body>
</html>
