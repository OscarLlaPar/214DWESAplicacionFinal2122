
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
                let celdaEliminar = document.createElement("td");
                let botonEliminar = document.createElement("button");
                botonEliminar.setAttribute("class", "boton eliminar");
                botonEliminar.setAttribute("type", "button");
                botonEliminar.setAttribute("value", usuario["T01_CodUsuario"]);
                botonEliminar.addEventListener("click",function(event){
                    if(confirm(`¿Está seguro de que desea eliminar el usuario ${botonEliminar.value}?`))
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
                    xhttp.send();
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
    xhttp.send();
}
            
    /*setTimeout(() => {
        let tabla = document.getElementById("usuarios");
        let botones= tabla.getElementsByTagName("button");
        for (let boton of botones){
            boton.addEventListener("click",function(event){
                if(confirm(`¿Está seguro de que desea eliminar el usuario ${boton.value}?`))
                    xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            mostrarUsuarios();
                            alert("Usuario eliminado");
                        }
                };
                //Clase
                xhttp.open("GET", `http://daw214.sauces.local/214DWESAplicacionFinal2122/api/borrarUsuario.php?codUsuario=${boton.value}`, true);
                //Casa
                //xhttp.open("GET", `http://192.168.0.120/214DWESAplicacionFinal2122/api/borrarUsuario.php?codUsuario=${boton.value}`, true);
                xhttp.send();
            });
        }
    }, 100);*/