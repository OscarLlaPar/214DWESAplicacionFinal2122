<?php
    /**
    * Modelo: DepartamentoPDO
    * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
    * @since 30/01/2022 
    * @version 1.0 
    * Última modificación: 30/01/2022
    */
    class DepartamentoPDO{
        /**
         * Comprobación de la existencia previa de un usuario y de si su contraseña
         * es correcta en la base de datos.
         * 
         * @param String $codigoUsuario Código del usuario a comprobar.
         * @param String $password Contraseña del usuario a comprobar.
         * @return Object|boolean Devuelve el objeto únicamente con la FechaHoraUltimaConexion
         * si el usuario existe y la contraseña es correcta, y false en caso contrario.
         */
        public static function buscaDepartamentoPorCod($codigoDepartamento){
            /*
             * Query de selección de departamento según su código
             */
            $sSelect = <<<QUERY
                SELECT * FROM T02_Departamento
                WHERE T02_CodDepartamento='{$codigoDepartamento}';
            QUERY;

            $oResultado = DBPDO::ejecutarConsulta($sSelect);
            $oDatos = $oResultado->fetchObject();
            
            if($oDatos){
                return new Usuario($oDatos->T01_CodDepartamento, $oDatos->T02_DescDepartamento, $oDatos->T02_FechaCreacionDepartamento, $oDatos->T02_VolumenDeNegocio, $oDatos->T02_FechaBajaDepartamento);
            }
            /*
             * Si no existe, devuelve false.
             */
            else{
                return false;
            }
        }
        
        /**
         * Comprobación de la existencia previa de un usuario y de si su contraseña
         * es correcta en la base de datos.
         * 
         * @param String $codigoUsuario Código del usuario a comprobar.
         * @param String $password Contraseña del usuario a comprobar.
         * @return Object|boolean Devuelve el objeto únicamente con la FechaHoraUltimaConexion
         * si el usuario existe y la contraseña es correcta, y false en caso contrario.
         */
        public static function buscaDepartamentosPorDesc($descripcionDepartamento){
            /*
             * Query de selección de departamento según su descripción
             */
            $sSelect = <<<QUERY
                SELECT * FROM T02_Departamento
                WHERE T02_DescDepartamento='{$descripcionDepartamento}';
            QUERY;

            return DBPDO::ejecutarConsulta($sSelect);
        }
        
        /**
         * Comprobación de la existencia previa de un usuario y de si su contraseña
         * es correcta en la base de datos.
         * 
         * @param String $codigoUsuario Código del usuario a comprobar.
         * @param String $password Contraseña del usuario a comprobar.
         * @return Object|boolean Devuelve el objeto únicamente con la FechaHoraUltimaConexion
         * si el usuario existe y la contraseña es correcta, y false en caso contrario.
         */
        public static function altaDepartamento($codigoDepartamento, $descripcionDepartamento, $volumenNegocio){
            /*
             * Query de inserción del departamento, dados su código y descripción.
             */
            $sInsert = <<<QUERY
                INSERT INTO T02_Departamento(T02_CodDepartamento, T02_DescDepartamento, T02_FechaCreacionDepartamento, T02_VolumenDeNegocio) VALUES
                ("{$codigoDepartamento}", "{$descripcionDepartamento}", UNIX_TIMESTAMP(), "{$volumenNegocio}");
            QUERY;

            return DBPDO::ejecutarConsulta($sInsert);
        }
        
        /**
         * Comprobación de la existencia previa de un usuario y de si su contraseña
         * es correcta en la base de datos.
         * 
         * @param String $codigoUsuario Código del usuario a comprobar.
         * @param String $password Contraseña del usuario a comprobar.
         * @return Object|boolean Devuelve el objeto únicamente con la FechaHoraUltimaConexion
         * si el usuario existe y la contraseña es correcta, y false en caso contrario.
         */
        public static function bajaFisicaDepartamento($oDepartamento){
            $sDelete = <<<QUERY
               DELETE FROM T02_Departamento
               WHERE T02_CodDepartamento='{$oDepartamento->getCodDepartamento()}';
           QUERY;

           return DBPDO::ejecutarConsulta($sDelete);
        }
        
        /**
         * 
         */
        public static function bajaLogicaDepartamento(){
            
        }
        
        /**
         * Comprobación de la existencia previa de un usuario y de si su contraseña
         * es correcta en la base de datos.
         * 
         * @param String $codigoUsuario Código del usuario a comprobar.
         * @param String $password Contraseña del usuario a comprobar.
         * @return Object|boolean Devuelve el objeto únicamente con la FechaHoraUltimaConexion
         * si el usuario existe y la contraseña es correcta, y false en caso contrario.
         */
        public static function modificaDepartamento($oDepartamento, $descripcionDepartamento, $volumenNegocio){
            $oDepartamento->setDescDepartamento($descripcionDepartamento);
            $oDepartamento->setVolumenDeNegocio($volumenNegocio);
            
            $sUpdate = <<<QUERY
                UPDATE T02_Departamento SET T02_DescDepartamento = "{$oDepartamento->getDescDepartamento()}",
                T02_VolumenNegocio = '{$oDepartamento->getVolumenDeNegocio()}'
                WHERE T01_CodUsuario = "{$oDepartamento->getCodUsuario()}";
            QUERY;

            

            if(DBPDO::ejecutarConsulta($sUpdate)){
                return $oDepartamento;
            }
            else{
                return false;
            }
        }
        
        /**
         * 
         */
        public static function rehabilitaDepartamento(){
            
        }
        
        /**
         * Comprobación de la existencia previa de un usuario y de si su contraseña
         * es correcta en la base de datos.
         * 
         * @param String $codigoUsuario Código del usuario a comprobar.
         * @param String $password Contraseña del usuario a comprobar.
         * @return Object|boolean Devuelve el objeto únicamente con la FechaHoraUltimaConexion
         * si el usuario existe y la contraseña es correcta, y false en caso contrario.
         */
        public static function validaCodNoExiste($codigoDepartamento){
            $sSelect = <<<QUERY
                SELECT T02_CodDepartamento FROM T02_Departamento
                WHERE T02_CodDepartamento='{$codigoDepartamento}';
            QUERY;

            return DBPDO::ejecutarConsulta($sSelect); 
        }
    }
