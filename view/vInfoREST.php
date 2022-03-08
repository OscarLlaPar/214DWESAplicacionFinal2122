<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-Aplicación Final - Info REST</title>
        <link href="webroot/css/infoREST.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main>
            <form class="contenidoInfo">
                <button class="boton" name="volver">Volver</button>
                <h2 class="tituloApis">Información sobre las APIs</h2>
                <div class="textoInfo">
                    <h3 class="nombreApi">Buscar departamento por código</h3>
                    <p>
                        La API REST de la búsqueda de departamentos sirve para consultar un departamento 
                        introduciendo su código. El código de un departamento está formado por tres letras 
                        mayúsculas.
                    </p>
                    <h4>Enlace de la API</h4>
                    <pre>
                        https://daw214.ieslossauces.es/214DWESAplicacionFinal2122/api/consultaDepartamentoPorCodigo.php
                    </pre>
                    <h4>Nombre del parámetro</h4>
                    <pre>
                        codDepartamento
                    </pre>
                    <h4>Ejemplo de uso</h4>
                    <pre>
                        https://daw214.ieslossauces.es/214DWESAplicacionFinal2122/api/consultaDepartamentoPorCodigo.php?codDepartamento=UNO
                    </pre>
                    <h4>Errores</h4>
                    <p>
                        En caso de error el valor de <code>RespuestaOK</code> pasa a ser <code>false</code>.
                    </p>
                    <p>
                        En vez de devolver un objeto con el departamento buscado, devuelve un mensaje de error.
                    </p>
                    <hr>
                    <h3 class="nombreApi">Buscar usuario por descripción</h3>
                    <p>
                        La API REST de la búsqueda de usuarios por descripción devuelve una lista de usuarios cuya descripción contenga
                        los caracteres introducidos. Si se introduce el parámetro vacío, muestra todos los usuarios.
                    </p>
                    <h4>Enlace de la API</h4>
                    <pre>
                        https://daw214.ieslossauces.es/214DWESAplicacionFinal2122/api/buscarUsuariosPorDesc.php
                    </pre>
                    <h4>Nombre del parámetro</h4>
                    <pre>
                        descUsuario
                    </pre>
                    <h4>Ejemplo de uso</h4>
                    <pre>
                        https://daw214.ieslossauces.es/214DWESAplicacionFinal2122/api/buscarUsuariosPorDesc.php?descUsuario=Administrador
                    </pre>
                    <hr>
                    <h3 class="nombreApi">Borrar usuario</h3>
                    <p>
                        Al llamar a esta API, se borra de la base de datos el usuario cuyo código se ha pasado como parámetro.
                    </p>
                    <h4>Enlace de la API</h4>
                    <pre>
                        https://daw214.ieslossauces.es/214DWESAplicacionFinal2122/api/borrarUsuario.php
                    </pre>
                    <h4>Nombre del parámetro</h4>
                    <pre>
                        codUsuario
                    </pre>
                    <h4>Ejemplo de uso</h4>
                    <pre>
                        https://daw214.ieslossauces.es/214DWESAplicacionFinal2122/api/borrarUsuario.php?codUsuario=prueba
                    </pre>
                    <hr>
                    <h3 class="nombreApi">Modificar descripción de usuario</h3>
                    <p>
                        Modifica la descripción del usuario cuyo código se ha especificado, y la cambia por la descripción
                        pasada como parámetro.
                    </p>
                    <h4>Enlace de la API</h4>
                    <pre>
                        https://daw214.ieslossauces.es/214DWESAplicacionFinal2122/api/modificarUsuario.php
                    </pre>
                    <h4>Nombre de los parámetros</h4>
                    <pre>
                        codUsuario
                    </pre>
                    <pre>
                        descUsuario
                    </pre>
                    <h4>Ejemplo de uso</h4>
                    <pre>
                        https://daw214.ieslossauces.es/214DWESAplicacionFinal2122/api/modificarUsuario.php?codUsuario=prueba&descUsuario=Dios
                    </pre>
                </div>
                
            </form>
        </main>
    </body>
</html>
