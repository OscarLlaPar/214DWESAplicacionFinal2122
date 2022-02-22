# 214DWESAplicacionFinal2122
Aplicación final del curso DAW2 2021-2022. LoginLogout, mantenimiento de departamentos, mantenimiento de usuarios y API REST.

### Funcionalidades
- Login
- Logout
- Página de WIP
- Página de error
- Ventana de detalle
- Editar perfil (y editar imagen)
- Borrar cuenta
- Cambiar contraseña
- API REST de Google Books - Buscar libros por título
- API REST de Weather Shark - Consultar el clima incluyendo una ciudad
- API REST propia - Búsqueda de departamento por código
- Consulta de diagramas
- Búsqueda de departamentos por descripción (filtrado por alta, por baja, o todos)
- Alta de departamento
- Baja lógica de departamento y rehabilitación
- Baja física de departamento
- Modificar departamento
- Paginación de departamentos
- Mantenimiento de usuarios para el usuario administrador
- Buscar usuarios
- Eliminar usuario

### Software utilizado
- Ubuntu Server 20.04.3
- Servidor Apache 2.4.41
- PHP 7.4
- MySQL Server 8.0.27

### Lenguajes utilizados
- PHP
- HTML
- CSS

### Instrucciones para despliegue
- Descargar el fichero .zip y extraer. Subir los archivos a la ubicación elegida al servidor
- En la carpeta `conf` eliminar el fichero `confDB.php` y cambiar el nombre de `confDBExplotacion.php` a `confDB.php`
- Ejecutar los ficheros de creación y carga inicial de la base de datos que se encuentran en la carpeta `scriptDB` introduciendo su nombre en el navegador
