<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-Login Logout - Cambiar Contraseña</title>
        <link href="webroot/css/cambiarPassword.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main>
            <h2 class="titulo">Cambiar contraseña</h2>
            <form action="index.php" method="post">
                <table>
                    <tr>
                        <label for="password">Contraseña actual: </label>
                        <input id="password" type="password" name="password" placeholder="Contraseña actual">
                        <?php echo (isset($aErrores['password']))?"<span>".$aErrores['password']."</span>":""; ?>
                        <label for="nuevaPassword">Nueva contraseña: </label>
                        <input id="nuevaPassword" type="password" name="nuevaPassword" placeholder="Nueva contraseña">
                        <?php echo (isset($aErrores['nuevaPassword']))?"<span>".$aErrores['nuevaPassword']."</span>":""; ?>
                        <label for="confirmarPassword">Confirmar contraseña: </label>
                        <input id="confirmarPassword" type="password" name="confirmarPassword" placeholder="Confirmar contraseña">
                        <?php echo (isset($aErrores['confirmarPassword']))?"<span>".$aErrores['confirmarPassword']."</span>":""; ?>
                        <div>
                            <button type="submit" name="aceptar" class="boton">Aceptar</button>
                            <button type="submit" name="cancelar" class="boton">Cancelar</button>
                        </div>
            </form>
        </main>
    </body>
</html>
