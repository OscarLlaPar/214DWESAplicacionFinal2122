        <head>
            <meta charset="UTF-8">
            <link href="webroot/css/inicioPublico.css" rel="stylesheet" type="text/css"/>
            <title>OLP-Aplicación Final - Inicio Público</title>
        </head>
        <main>
            <div class="titulo">
                <p>¡Bienvenido a AplicacionFinal!</p>
                <form action="index.php" method="post">
                    <button type="submit" name="login" class="boton">Log in</button>
                </form>
            </div>
            <div class="enlaces">
                <div class="tarjeta">
                    <p>Catálogo de Requisitos</p>
                    <a href="doc/220119CatalogoDeRequisitos.pdf" target="__blank">Ver documento</a>
                </div>
                <div class="tarjeta">
                    <p>Estándares de desarrollo</p>
                    <a href="doc/211129EstandarDesarrolloDAWyEstructuraAlmacenamientoDWES.pdf" target="__blank">Ver documento</a>
                </div>
                <div class="tarjeta">
                    <p>Uso de $_SESSION</p>
                    <a href="doc/220111UsoDeLaSessionParaLaAplicación.pdf" target="__blank">Ver documento</a>
                </div>
            </div>
        </main>
        <div class="diagramas">
            <div class="diagrama">
                <div class="textoDiagrama">
                    <h2>Árbol de navegación</h2>
                    <p>
                        Es un diagrama que representa el flujo que sigue el usuario
                        cuando va cambiando de páginas al utilizar la aplicación.
                    </p>
                    <p>
                        Se pueden distinguir cuatro tipos de páginas:
                    </p>
                    <ul>
                        <li>Color rojo: Páginas solo accesibles para el administrador.</li>
                        <li>Color blanco: Páginas que abarca el usuario registrado o identificado.</li>
                        <li>Color azul claro: Páginas que puede ver el usuario no registrado o identificado.</li>
                        <li>Color azul oscuro: Páginas comunes a toda la aplicación. Ej: Página que muestra un error.</li>
                    </ul>
                </div>
                <div class="imagenDiagrama">
                    <a href="webroot/img/diagramaArbolNavegacion.JPG" target="__blank"><img src="webroot/img/diagramaArbolNavegacion.JPG"></a>
                </div>
            </div>
            <div class="diagrama">
                <div class="textoDiagrama">
                    <h2>Diagrama de casos de uso</h2>
                    <p>
                        Los casos de uso son, en otras palabras, todas las funcionalidades
                        que la aplicación ofrece a un usuario.
                    </p>
                    <p>
                        Se distinguen tres tipos de usuario:
                    </p>
                    <ul>
                        <li>Usuario no identificado: Representado con el color amarillo.</li>
                        <li>Usuario identificado: Representado con el color azul.</li>
                        <li>Usuario administrador: Representado con el color rojo.</li>
                    </ul>
                </div>
                <div class="imagenDiagrama">
                    <a href="webroot/img/diagramaCasosUso.JPG" target="__blank"><img src="webroot/img/diagramaCasosUso.JPG"></a>
                </div>
            </div>
            <div class="diagrama">
                <div class="textoDiagrama">
                    <h2>Diagrama de clases</h2>
                    <p>
                        Representa las clases e interfaces que se han utilizado en el
                        modelo para desarrollar la aplicación, así como sus métodos.
                    </p>
                </div>
                <div class="imagenDiagrama">
                    <a href="webroot/img/diagramaClases.JPG" target="__blank"><img src="webroot/img/diagramaClases.JPG"></a>
                </div>
            </div>
            <div class="diagrama">
                <div class="textoDiagrama">
                    <h2>Relación de ficheros</h2>
                    <p>
                        Es un diagrama en el que aparecen todos los ficheros que
                        contiene la aplicación. En él se pueden distinguir los que
                        pertenecen a la vista, los que pertenecen al controlador
                        y los que pertenecen al modelo. También aparecen los ficheros
                        de configuración de la base de datos y de la aplicación.
                    </p>
                    <p>
                        Cada fichero de la vista tiene a su vez un fichero de controlador.
                    </p>    
                    <p>
                        Cada fichero del modelo es una clase o una interface. La
                        clase DBPDO tiene acceso a la base de datos.
                    </p>
                </div>
                <div class="imagenDiagrama">
                    <a href="webroot/img/diagramaRelacionFicheros.JPG" target="__blank"><img src="webroot/img/diagramaRelacionFicheros.JPG"></a>
                </div>
            </div>
        </div>
        