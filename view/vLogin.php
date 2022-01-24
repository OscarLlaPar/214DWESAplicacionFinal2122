<head>
    <meta charset="UTF-8">
    <link href="webroot/css/login.css" rel="stylesheet" type="text/css"/>
    <title>OLP-Aplicación Final - Login</title>
</head>
<main>
    <h2 class="titulo">Iniciar sesión</h2>
    <form action="index.php" method="post">
        <!--<label for="usuario">Nombre de usuario: </label>-->
        <input id="usuario" type="text" name="usuario" placeholder="Nombre de usuario">
        <!--<label for="password">Contraseña: </label>-->
        <input id="password" type="password" name="password" placeholder="Contraseña">
        <button type="submit" name="login" class="boton">Iniciar sesion</button>
        <div>
            <button id="registro" type="submit" name="registro">Registrarse</button>
            <button id="volver" type="submit" name="volver">Volver</button>
        </div>
    </form>
</main>
    