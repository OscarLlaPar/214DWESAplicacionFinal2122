<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-Aplicación Final - Alta Departamento</title>
        <link href="webroot/css/altaDepartamento.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main>
            <h2 class="titulo">Añadir Departamento</h2>
            <form action="index.php" method="post">
                <label>Código del departamento<span>*</span>:</label>
                <input type="text" name="codDepartamento" placeholder="Tres letras mayúsculas" value="<?php echo $_REQUEST['codDepartamento']??""?>">
                <?php echo (isset($aErrores['codDepartamento']))?"<span>".$aErrores['codDepartamento']."</span>":""; ?>
                <label>Descripción del departamento<span>*</span>:</label>
                <input type="text" name="descDepartamento" placeholder="Hasta 50 caracteres" value="<?php echo ($_REQUEST['descDepartamento'])??""?>">
                <?php echo (isset($aErrores['descDepartamento']))?"<span>".$aErrores['descDepartamento']."</span>":""; ?>
                <label>Volumen de negocio<span>*</span>:</label>
                <input type="text" name="volumenDeNegocio" placeholder="Número decimal (€)" value="<?php echo ($_REQUEST['volumenDeNegocio'])??""?>">
                <?php echo (isset($aErrores['volumenDeNegocio']))?"<span>".$aErrores['volumenDeNegocio']."</span>":""; ?>
                <div>
                    <button type="submit" name="aceptar" class="boton">Aceptar</button>
                    <button type="submit" name="cancelar" class="boton">Cancelar</button>
                </div>
            </form>
        </main>
    </body>
</html>
