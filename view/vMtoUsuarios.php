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
                <input type="text" name="busqueda" id="busqueda" placeholder="Buscar...">
                <button type="button" id="buscar" name="buscar" class="boton">Buscar</button>
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
                        </tr>
                    </thead>
                    <tbody  id="usuarios">
                        
                    </tbody>
                </table>
            </div>
        </main>
        <script>
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    
                    mostrarUsuarios();
                }
            };
            //Clase
            //xhttp.open("GET", "http://daw214.sauces.local/214DWESAplicacionFinal2122/api/buscarUsuariosPorDesc.php?descUsuario=", true);
            //Casa
            xhttp.open("GET", "http://192.168.0.120/214DWESAplicacionFinal2122/api/buscarUsuariosPorDesc.php?descUsuario=", true);
            xhttp.send();
            
            let botonBuscar = document.getElementById("buscar");
            let busqueda = document.getElementById("busqueda");
            botonBuscar.addEventListener("click",function(event){
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        let tabla=document.getElementById("usuarios");
                        tabla.innerHTML = "";
                        mostrarUsuarios();
                    }
                };
                //Clase
                //xhttp.open("GET", `http://daw214.sauces.local/214DWESAplicacionFinal2122/api/buscarUsuariosPorDesc.php?descUsuario=${busqueda.value}`, true);
                //Casa
                xhttp.open("GET", `http://192.168.0.120/214DWESAplicacionFinal2122/api/buscarUsuariosPorDesc.php?descUsuario=${busqueda.value}`, true);
                xhttp.send();
            })
            
            function mostrarUsuarios(){
                let tabla=document.getElementById("usuarios");
                let respuesta=xhttp.responseText;
                let respuestaJson=JSON.parse(respuesta);
                for(let usuario of respuestaJson.usuarios){
                    let fila = document.createElement("tr");
                    for(let campo in usuario){
                        if(campo !== "T01_Password"){
                            let celda=document.createElement("td");
                            if(campo === "T01_ImagenUsuario"){
                                let imagen = document.createElement("img");
                                imagen.setAttribute("class", "fotoPerfil");
                                if(usuario[campo]!==null){
                                    imagen.setAttribute("src", `data:image/gif;base64,${usuario[campo]}`);
                                }
                                else{
                                    imagen.setAttribute("src", "webroot/img/perfil.png");
                                }
                                celda.appendChild(imagen);
                            }
                            else{
                                if(campo === "T01_FechaHoraUltimaConexion" && usuario[campo]!==null){
                                    let oFecha = new Date(usuario[campo] * 1000);
                                    usuario[campo]=`${oFecha.getDate()}/${oFecha.getMonth()+1}/${oFecha.getFullYear()}, a las ${oFecha.getHours()}:${oFecha.getMinutes()}:${oFecha.getSeconds()}`;
                                }
                                celda.innerHTML=usuario[campo];
                            }
                            fila.appendChild(celda);
                        }
                        
                    }
                    tabla.appendChild(fila);
                }
            }
        </script>
    </body>
</html>
