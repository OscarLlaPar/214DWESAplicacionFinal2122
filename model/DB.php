<?php
    /**
    * Modelo: DB
    * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
    * @since 21/12/2021 
    * @version 1.0 
    * Última modificación: 11/01/2022
    */
    interface DB {
        /**
         * Conexión con la base de datos para ejecución de una consulta con o sin
         * parámetros.
         * 
         * @param String $sentenciaSQL Sentencia SQL a ejecutar.
         * @param Array|null $parametros Parámetros con los que completar la sentencia.
         */
        public static function ejecutarConsulta($sentenciaSQL, $parametros = null);
    }
