
let xhttp = new XMLHttpRequest();
var busqueda = document.getElementById("busqueda");   
                    
mostrarUsuarios();


 let botonBuscar = document.getElementById("buscar");

 botonBuscar.addEventListener("click",function(event){
             mostrarUsuarios();
 });

            
function mostrarUsuarios(){
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            let tabla=document.getElementById("usuarios");
            tabla.innerHTML = "";
            let respuesta=xhttp.responseText;
            let respuestaJson=JSON.parse(respuesta);
            for(let usuario of respuestaJson.usuarios){
                let fila = document.createElement("tr");
                let codUsuario = usuario.T01_CodUsuario;
                for(let campo in usuario){
                    if(campo !== "T01_Password"){
                        let celda=document.createElement("td");
                        if(campo === "T01_ImagenUsuario"){
                            let imagen = document.createElement("img");
                            imagen.setAttribute("class", "fotoPerfil");
                            if(usuario[campo]){
                                imagen.setAttribute("src", `data:image/gif;base64,${usuario[campo]}`);
                            }
                            else{
                                imagen.setAttribute("src", "webroot/img/perfil.png");
                            }
                            celda.appendChild(imagen);
                            let saltoLinea = document.createElement("br");
                            celda.appendChild(saltoLinea);
                            /*let inputImagen = document.createElement("input");
                            inputImagen.setAttribute("type", "file");
                            inputImagen.setAttribute("id", codUsuario);*/
                            /*inputImagen.addEventListener("change",function(event){
                                let imagen = inputImagen.files[0];
                                let imagenBase64="";
                                let reader = new FileReader();
                                reader.readAsDataURL(imagen);
                                reader.onload = function () {
                                    console.log("Entró");
                                    imagenBase64=reader.result;
                                };
                                reader.onerror = function (error) {
                                  console.log('Error: ', error);
                                };
                                if(confirm(`¿Confirmar cambios?`)){
                                    xhttp.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                            mostrarUsuarios();
                                            alert("Usuario modiicado");
                                        }
                                    };
                                    //Clase
                                    xhttp.open("GET", `http://daw214.sauces.local/214DWESAplicacionFinal2122/api/modificarUsuario.php?codUsuario=${inputImagen.id}&descUsuario=&imagenUsuario=${imagenBase64}`, true);
                                    //Casa
                                    //xhttp.open("GET", `http://192.168.0.120/214DWESAplicacionFinal2122/api/modificarUsuario.php?codUsuario=${campoTexto.id}&descUsuario=${campoTexto.value}&imagenUsuario=`, true);
                                    //Explotación
                                    //xhttp.open("GET", `http://daw214.ieslossauces.es/214DWESAplicacionFinal2122/api/modificarUsuario.php?codUsuario=${campoTexto.id}&descUsuario=${campoTexto.value}`, true);
                                    xhttp.send();
                                }
                                else{
                                    mostrarUsuarios();
                                }
                            });*/
                            /*celda.appendChild(inputImagen);*/
                        }
                        else{
                            if(campo === "T01_FechaHoraUltimaConexion" && usuario[campo]!==null){
                                let oFecha = new Date(usuario[campo] * 1000);
                                usuario[campo]=`${oFecha.getDate()}/${oFecha.getMonth()+1}/${oFecha.getFullYear()}, a las ${oFecha.getHours()}:${oFecha.getMinutes()}:${oFecha.getSeconds()}`;
                            }
                            if(campo === "T01_DescUsuario"){
                                let campoTexto = document.createElement("input");
                                campoTexto.setAttribute("type", "text");
                                campoTexto.setAttribute("id", codUsuario);
                                campoTexto.setAttribute("value", usuario[campo]);
                                campoTexto.addEventListener("change",function(event){
                                    if(confirm(`¿Confirmar cambios?`)){
                                        xhttp.onreadystatechange = function() {
                                            if (this.readyState == 4 && this.status == 200) {
                                                mostrarUsuarios();
                                                alert("Usuario modiicado");
                                            }
                                        };
                                        //Clase
                                        xhttp.open("GET", `http://daw214.sauces.local/214DWESAplicacionFinal2122/api/modificarUsuario.php?codUsuario=${campoTexto.id}&descUsuario=${campoTexto.value}`, true);
                                        //Casa
                                        //xhttp.open("GET", `http://192.168.0.120/214DWESAplicacionFinal2122/api/modificarUsuario.php?codUsuario=${campoTexto.id}&descUsuario=${campoTexto.value}&imagenUsuario=`, true);
                                        //Explotación
                                        //xhttp.open("GET", `http://daw214.ieslossauces.es/214DWESAplicacionFinal2122/api/modificarUsuario.php?codUsuario=${campoTexto.id}&descUsuario=${campoTexto.value}`, true);
                                        xhttp.send();
                                    }
                                    else{
                                        mostrarUsuarios();
                                    }
                                });
                                celda.appendChild(campoTexto);
                            }
                            else{
                                celda.innerHTML=usuario[campo];
                            }
                        }
                        fila.appendChild(celda);
                    }

                }
                let celdaEliminar = document.createElement("td");
                let botonEliminar = document.createElement("button");
                botonEliminar.setAttribute("class", "boton eliminar");
                botonEliminar.setAttribute("type", "button");
                botonEliminar.setAttribute("value", usuario["T01_CodUsuario"]);
                botonEliminar.addEventListener("click",function(event){
                    if(confirm(`¿Está seguro de que desea eliminar el usuario ${botonEliminar.value}?`)){
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                mostrarUsuarios();
                                alert("Usuario eliminado");
                            }
                        };
                         //Clase
                        xhttp.open("GET", `http://daw214.sauces.local/214DWESAplicacionFinal2122/api/borrarUsuario.php?codUsuario=${botonEliminar.value}`, true);
                        //Casa
                        //xhttp.open("GET", `http://192.168.0.120/214DWESAplicacionFinal2122/api/borrarUsuario.php?codUsuario=${botonEliminar.value}`, true);
                        //Explotación
                        //xhttp.open("GET", `http://daw214.ieslossauces.es/214DWESAplicacionFinal2122/api/borrarUsuario.php?codUsuario=${botonEliminar.value}`, true);
                        xhttp.send();
                    }
                    else{
                        mostrarUsuarios();
                    }
                   
                });
                let iconoBoton = document.createElement("img");
                iconoBoton.setAttribute("src", "webroot/img/eliminar.png");
                botonEliminar.appendChild(iconoBoton);
                celdaEliminar.appendChild(botonEliminar);
                fila.appendChild(celdaEliminar);
                tabla.appendChild(fila);
            }
        }
    };
    //Clase
    xhttp.open("GET", `http://daw214.sauces.local/214DWESAplicacionFinal2122/api/buscarUsuariosPorDesc.php?descUsuario=${busqueda.value}`, true);
    //Casa
    //xhttp.open("GET", `http://192.168.0.120/214DWESAplicacionFinal2122/api/buscarUsuariosPorDesc.php?descUsuario=${busqueda.value}`, true);
    //Explotación
    //xhttp.open("GET", `http://daw214.ieslossauces.es/214DWESAplicacionFinal2122/api/buscarUsuariosPorDesc.php?descUsuario=${busqueda.value}`, true);
    xhttp.send();
}
            
  
