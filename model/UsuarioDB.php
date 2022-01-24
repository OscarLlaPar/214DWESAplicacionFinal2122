<?php

    /**
    * Modelo: UsuarioDB
    * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
    * @since 21/12/2021 
    * @version 1.0 
    * Última modificación: 11/01/2022
    */
    interface UsuarioDB{
        /**
         * Comprobación de la existencia previa de un usuario y de si su contraseña
         * es correcta en la base de datos.
         * 
         * @param String $codigoUsuario Código del usuario a comprpobar.
         * @param String $password Contraseña del usuario a comprobar.
         */
        public static function validarUsuario($codigoUsuario, $password);
    }
