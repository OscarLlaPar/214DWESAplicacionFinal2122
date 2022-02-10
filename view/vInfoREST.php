<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-Aplicación Final - Info REST</title>
        <link href="webroot/css/infoREST.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main>
            <form>
                <button class="boton" name="volver">Volver</button>
                <div class="textoInfo">
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
                    <!--<h4>Ejemplo de devolución</h4>
                    <pre>
                        
                    </pre>-->
                    <h4>Errores</h4>
                    <p>
                        En caso de error el valor de <code>RespuestaOK</code> pasa a ser <code>false</code>.
                    </p>
                    <p>
                        En vez de devolver un objeto con el departamento buscado, devuelve un mensaje de error.
                    </p>
                </div>
            </form>
        </main>
    </body>
</html>
