<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-Aplicación Final - Registrarse</title>
        <link href="webroot/css/registro.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main>
            <h2 class="titulo">Registrarse</h2>
            <form action="index.php" method="post">
                <table>
                    <tr>
                        <td><?php echo (isset($aErrores['usuario']))?"<span>".$aErrores['usuario']."</span>":""; ?></td>
                        <td><?php echo (isset($aErrores['descripcion']))?"<span>".$aErrores['descripcion']."</span>":""; ?></td>
                    </tr>
                    <tr>
                        <td><input id="usuario" type="text" name="usuario" <?php echo (isset($_REQUEST['usuario']))?'value="'.$_REQUEST['usuario'].'"':"" ?> placeholder="Nombre de usuario*"></td>
                        <td><input id="descripcion" type="text" name="descripcion" <?php echo (isset($_REQUEST['descripcion']))?'value="'.$_REQUEST['descripcion'].'"':"" ?> placeholder="Descripción de usuario*"></td>
                    </tr>
                    <tr>
                        <td><?php echo (isset($aErrores['password']))?"<span>".$aErrores['password']."</span>":""; ?></td>
                        <td><?php echo (isset($aErrores['confirmarPassword']))?"<span>".$aErrores['confirmarPassword']."</span>":""; ?></td>
                    </tr>
                    <tr>
                        <td><input id="password" type="password" name="password" placeholder="Contraseña*"></td>
                        <td><input id="confirmarPassword" type="password" name="confirmarPassword" placeholder="Confirmar contraseña*"></td>
                    </tr>
                </table>
                <div>
                    <button type="submit" name="registro" class="boton">Registrarse</button>
                    <button type="submit" name="cancelar" class="boton">Cancelar</button>
                </div>
            </form>
        </main>
    </body>
</html>
