<?php
    /**
    * Modelo: REST
    * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
    * @since 26/01/2022 
    * @version 1.0 
    * Última modificación: 26/01/2022
    */
    class REST{
        /**
        * Uso de la API REST de Google Books mediante el protocolo HTML para 
        * consultar libros introduciendo un título como parámetro.
        * 
        * @param String $sTitulo Título por el que hay que buscar un libro
        * @return Array Un array formado de objetos Libro
        */
        public static function buscarLibrosPorTitulo($sTitulo){
            $resultadoAPI=@file_get_contents("https://www.googleapis.com/books/v1/volumes?q=".$sTitulo);
            $aLibros=[];
            $aResultadoAPI=json_decode($resultadoAPI,true);
            if(is_null($aResultadoAPI)){
                return "No se ha podido establecer la conexión";
            }
            if($aResultadoAPI['totalItems']>0){
                 foreach($aResultadoAPI['items'] as $item){
                 array_push($aLibros, new Libro(
                     $item['volumeInfo']['title'],
                     $item['volumeInfo']['authors']??"Autor desconocido", 
                     $item['volumeInfo']['publisher']??"Editorial desconocida",
                     $item['volumeInfo']['publishedDate']??"Año desconocido", 
                     $item['volumeInfo']['pageCount']??"¿?", 
                     $item['volumeInfo']['imageLinks']['thumbnail']??"webroot/img/nodisponible.jpg", 
                     $item['volumeInfo']['infoLink'])); 
                 }
                 return $aLibros;
             }
             else{
                 return false;
             } 
            
        }
        /**
        * Uso de la API REST de WeatherStack (con credenciales)
        * 
        * @param String $sCiudad Nombre de la ciudad de la que se desea saber la temperatura
        * @return Array Un array formado de objetos Libro
        */
        public static function buscarTemperaturaPorCiudad($sCiudad){
            //http://api.weatherstack.com/current?acces_key=81fe86c10d6c6c35decbc53039e90c3f&query=New%20York
            $claveAcceso="81fe86c10d6c6c35decbc53039e90c3f";
            $resultadoAPI=@file_get_contents("http://api.weatherstack.com/current?access_key=".$claveAcceso."&query=".$sCiudad);
            $aResultadoAPI=json_decode($resultadoAPI,true);
            //var_dump($aResultadoAPI);
            if(!isset($aResultadoAPI['error'])){
                $oTiempo = new Tiempo(
                        $aResultadoAPI['location']['name'],
                        $aResultadoAPI['location']['country'],
                        $aResultadoAPI['location']['localtime'],
                        $aResultadoAPI['current']['weather_icons'][0],
                        $aResultadoAPI['current']['temperature'],
                        $aResultadoAPI['current']['weather_descriptions'][0]
                );
                return $oTiempo;
            }
            else{
                return $aResultadoAPI['error']['info'];
            }
        }
        
        public static function buscarDepartamentoPorCod($sCodDepartamento){
            $resultadoAPI=@file_get_contents("https://daw214.ieslossauces.es/214DWESAplicacionFinal2122/api/consultaDepartamentoPorCodigo.php?codDepartamento=".$sCodDepartamento);
            $aResultadoAPI=json_decode($resultadoAPI,true);
            if($aResultadoAPI['respuestaOK']){
                $oDepartamento=new Departamento(
                            $aResultadoAPI['departamento']['codDepartamento'],
                            $aResultadoAPI['departamento']['descDepartamento'],
                            $aResultadoAPI['departamento']['fechaCreacionDepartamento'],
                            $aResultadoAPI['departamento']['volumenDeNegocio'],
                            $aResultadoAPI['departamento']['fechaBajaDepartamento']
                        );
                return $oDepartamento;
            }
            else{
                return $aResultadoAPI['error'];
            }
        }
    }