<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-Aplicación Final - Borrar Cuenta</title>
        <link href="webroot/css/borrarCuenta.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main>
            <h2 class="titulo">Borrar cuenta</h2>
            <form action="index.php" method="post">
                <table>
                    <tr>
                        <td><label for="usuario">Nombre de usuario: </label></td>
                        <td><label for="descripcion">Descripción de usuario: </label></td>
                        <td><label for="fechaHoraUltimaConexion">Descripción de usuario: </label></td>
                    </tr>
                    <tr>
                        <td><input id="usuario" type="text" name="usuario" readonly value="<?php echo $aUsuario['nombre'] ?>"></td>
                        <td><input id="descripcion" type="text" name="descripcion" readonly value="<?php echo $aUsuario['descripcion'] ?>"></td>
                        <td><input id="fechaHoraUltimaConexion" type="text" name="fechaHoraUltimaConexion" readonly value="<?php echo $aUsuario['fechaHoraUltimaConexion']?>"></td>
                    </tr>
                    <tr>
                        <td><label for="numConexiones">Descripción de usuario: </label></td>
                        <td><label for="perfil">Descripción de usuario: </label></td>
                        <td><label for="password">Contraseña: </label></td>
                    </tr>
                    <tr>
                        <td><input id="numConexiones" type="text" name="numConexiones" readonly value="<?php echo $aUsuario['numConexiones']?>"></td>
                        <td><input id="perfil" type="text" name="perfil" readonly value="<?php echo $aUsuario['perfil']?>"></td>
                        <td><input id="password" type="password" name="password" readonly value="<?php echo $aUsuario['password']?>"></td>
                    </tr>
                </table>
                <p class="confirmar">¿Estás seguro?</p>
                <div>
                    <button type="submit" name="aceptar" class="boton">Aceptar</button>
                    <button type="submit" name="cancelar" class="boton">Cancelar</button>
                </div>
            </form>
        </main>
    </body>
</html>
