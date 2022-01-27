<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-Aplicación Final - Error</title>
        <link href="webroot/css/error.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main>
            <h1>Se ha producido un error</h1>
            <table class="error">
                <thead>
                    <tr>
                        <th colspan="2">Detalles del error</th>
                    </tr>
                </thead>
                <tr>
                    <th>Mensaje</th>
                    <td><?php echo $aError['mensaje'] ?></td>
                </tr>
                <tr>
                    <th>Código</th>
                    <td><?php echo $aError['codigo'] ?></td>
                </tr>
            </table>
            <form action="index.php">    
                <button type="submit" name="volver" class="boton">Volver</button>
            </form>
        </main>
    </body>
</html>
