<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-Login Logout - Editar Cuenta</title>
        <link href="webroot/css/miCuenta.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main>
            <h2 class="titulo">Editar cuenta</h2>
            <form action="index.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td><label for="usuario">Nombre de usuario: </label></td>
                        <td><label for="descripcion">Descripción de usuario: </label></td>
                        <td><label for="fechaHoraUltimaConexion">Fecha y hora de última conexión: </label></td>
                    </tr>
                    <tr>
                        <td></td>
                        <?php echo (isset($aErrores['descripcion']))?"<td><span>".$aErrores['descripcion']."</span></td>":""; ?>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input id="usuario" type="text" name="usuario" readonly value="<?php echo $aUsuario['nombre']?>"></td>
                        <td><input id="descripcion" type="text" name="descripcion" value="<?php echo $aUsuario['descripcion']?>"></td>
                        <td><input id="fechaHoraUltimaConexion" type="text" name="fechaHoraUltimaConexion" readonly value="<?php echo date("d/m/Y - H:i:s", $aUsuario['fechaHoraUltimaConexion'])?>"></td>
                    </tr>
                    <tr>
                        <td><label for="numConexiones">Número de conexiones: </label></td>
                        <td><label for="perfil">Perfil: </label></td>
                        <td><label for="password">Contraseña: </label></td>
                    </tr>
                    <tr>
                        <td><input id="numConexiones" type="text" name="numConexiones" readonly value="<?php echo $aUsuario['numConexiones']?>"></td>
                        <td><input id="perfil" type="text" name="perfil" readonly value="<?php echo $aUsuario['perfil']?>"></td>
                        <td><input id="password" type="password" name="password" readonly value="<?php echo $aUsuario['password']?>"></td>
                    </tr>
                    <tr>
                        <td><label for="imagenUsuario">Imagen de usuario (.png, .jpg): </label></td>
                        <td><input id="imagenUsuario" type="file" name="imagenUsuario"></td>
                        <td>
                            <?php
                                if($aUsuario['imagenUsuario']){
                            ?>
                                <img class="fotoPerfil" src="data:image/gif;base64, <?php echo $aUsuario['imagenUsuario'] ?>" alt="Foto de perfil">
                            <?php
                                }
                                else{
                            ?>
                                <img class="fotoPerfil" src="webroot/img/perfil.png" alt="Foto de perfil">
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><?php echo (isset($aErrores['imagenUsuario']))?"<span>".$aErrores['imagenUsuario']."</span>":""; ?></td>
                    </tr>
                </table>
                <div>
                <button type="submit" name="aceptar" class="boton">Aceptar</button>
                <button type="submit" name="cancelar" class="boton">Cancelar</button>
                <br>
                <button type="submit" name="borrarCuenta" class="boton">Borrar Cuenta</button>
                <button type="submit" name="cambiarPassword" class="boton">Cambiar Contraseña</button>
            </form>
        </main>
    </body>
</html>
