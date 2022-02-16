<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-Aplicación Final - MtoUsuarios</title>
        <link href="webroot/css/mtoUsuarios.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main class="mainUsuarios">
            <form action="index.php" class="formulario">
                <button class="boton" name="volver">Volver</button>
                <label>Buscar usuario por descripción:</label>
                <div>
                    <input type="text" name="busqueda" id="busqueda" placeholder="Buscar...">
                    <button type="button" id="buscar" name="buscar" class="boton">Buscar</button>
                </div>
                
            </form>
            <div id="container">
                <table class="tablaUsuarios">
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Descripción</td>
                            <td>Última conexión</td>
                            <td>Conexiones</td>
                            <td>Perfil</td>
                            <td>Imagen</td>
                            <td>Eliminar</td>
                        </tr>
                    </thead>
                    <tbody  id="usuarios">
                        
                    </tbody>
                </table>
            </div>
        </main>
        <script src="webroot/js/mtoUsuarios.js">
        </script>
    </body>
</html>
