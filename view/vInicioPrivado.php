<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-Login Logout - Inicio</title>
        <link href="webroot/css/inicioPrivado.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main>
            <h2 class="titulo">Inicio</h2>
            <p>¡Bienvenido <?php echo $aVistaInicioPrivado['descUsuario']?>!</p>
            <?php
                    if($aVistaInicioPrivado['imagenUsuario']){
            ?>
                <img class="fotoPerfil" src="data:image/gif;base64, <?php echo $aVistaInicioPrivado['imagenUsuario'] ?>" alt="Foto de perfil">
            <?php
                }
                else{
            ?>
                <img class="fotoPerfil" src="webroot/img/perfil.png" alt="Foto de perfil">
            <?php
                }
            ?>
            <p>Te has conectado en total <?php echo $aVistaInicioPrivado['numConexiones']?> veces.</p>
            <?php
                if(!empty($aVistaInicioPrivado['fechaHoraUltimaConexion'])) {
            ?>    
            <p>Última conexión: <?php echo date("\E\l d/m/Y \a \l\a\s H:i:s",$aVistaInicioPrivado['fechaHoraUltimaConexion']) ?></p>
            <?php
                }
            ?>
            <form action="index.php" method="post">
                <button type="submit" name="detalle" class="boton">Detalle</button>
                <button type="submit" name="mtoDepartamentos" class="boton">MtoDepartamentos</button>
                <button type="submit" name="editarPerfil" class="boton">Editar perfil</button>
                <button type="submit" name="apiRest" class="boton">API REST</button>
                <button type="submit" name="logout" class="boton">Cerrar sesion</button>
            </form>
        </main>
    </body>
</html>
