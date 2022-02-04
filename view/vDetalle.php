<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OLP-Login Logout - WIP</title>
        <link href="webroot/css/detalle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main class="detalle">
            <h2>Detalle</h2>
            <form action="index.php">
                <button type="submit" name="volver" class="boton">Volver</button>
            </form>
            <h3>$_SESSION</h3>
                <table>
                    <?php
                    foreach ($_SESSION as $key => $value) {
                        echo '<tr>';
                        echo "<th>$key</th><td><pre>";
                        print_r($value); // print_r porque pueden ser objetos.
                        echo '</pre></td></tr>';
                    }
                    ?>
                </table>
                <h3>$_COOKIE</h3>
                <table>
                    <?php
                    foreach ($_COOKIE as $key => $value) {
                        echo '<tr>';
                        echo "<th>$key</th>";
                        echo "<td>$value</td>";
                        echo '</tr>';
                    }
                    ?>
                </table>
                <h3>$_SERVER</h3>
                <table>
                    <?php
                    foreach ($_SERVER as $key => $value) {
                        echo '<tr>';
                        echo "<th>$key</th>";
                        echo "<td>$value</td>";
                        echo '</tr>';
                    }
                    ?>
                </table>
                <h3>$_REQUEST</h3>
                <table>
                    <?php
                    foreach ($_REQUEST as $key => $value) {
                        echo '<tr>';
                        echo "<th>$key</th>";
                        echo "<td>$value</td>";
                        echo '</tr>';
                    }
                    ?>
                </table>
                <h3>$_FILES</h3>
                <table>
                    <?php
                    foreach ($_FILES as $key => $value) {
                        echo '<tr>';
                        echo "<th>$key</th>";
                        echo "<td>$value</td>";
                        echo '</tr>';
                    }
                    ?>
                </table>
                <h3>$_ENV</h3>
                <table>
                    <?php
                    foreach ($_ENV as $key => $value) {
                        echo '<tr>';
                        echo "<th>$key</th>";
                        echo "<td>$value</td>";
                        echo '</tr>';
                    }
                    ?>
                </table>
                <?php phpinfo(); ?>
        </main>
    </body>
</html>
