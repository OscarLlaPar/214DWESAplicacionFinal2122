<?php
    /**
    * Modelo: DBPDO
    * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
    * @since 21/12/2021 
    * @version 1.0 
    * Última modificación: 11/01/2022
    */
class DBPDO implements DB{
    /**
     * Conexión con la base de datos para ejecución de una consulta con o sin
     * parámetros.
     * 
     * @param String $sentenciaSQL Sentencia SQL a ejecutar.
     * @param Array|null $parametros Parámetros con los que completar la sentencia.
     * @return PDOStatement Resultado de la sentencia ejecutada.
     */
    public static function ejecutarConsulta($sentenciaSQL, $parametros = null) {
        try {
            // Conexión con la base de datos.
            $oDB = new PDO(HOST, USER, PASSWORD);
            $oDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Preparación y ejecución de la consulta con sus parámetros.
            $oResultado = $oDB->prepare($sentenciaSQL);
            $oResultado->execute($parametros);

            return $oResultado;
        } catch (PDOException $exception) {
            /*
             * Si sucede alguna excepción, carga el error en la variable de sesión
             * y envía al usuario a la página de error.
             */
            $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
            $_SESSION['error'] = new AppError($exception->getMessage(), $exception->getCode(), $_SESSION['paginaAnterior']);
            
            $_SESSION['paginaEnCurso'] = 'error';
            header('Location: index.php');
            exit;
        } finally {
            unset($oDB);
        }
    }
}