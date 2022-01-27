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
        * Uso de la API REST  de Google Books mediante el protocolo HTML para 
        * consultar libros introduciendo un título como parámetro.
        * 
        * @param String $sTitulo Título por el que hay que buscar un libro
        * @return Array Un array formado de objetos LibroREST
        */
        public static function buscarLibrosPorTitulo($sTitulo){
            $resultadoAPI=@file_get_contents("https://www.googleapis.com/books/v1/volumes?q=".$sTitulo);
            $aLibros=[];
            $aResultadoAPI=json_decode($resultadoAPI,true);
            if($aResultadoAPI){
                foreach($aResultadoAPI['items'] as $item){
                array_push($aLibros, new LibroREST(
                    $item['volumeInfo']['title'],
                    $item['volumeInfo']['authors']??"Autor desconocido", 
                    $item['volumeInfo']['publisher']??"Editorial desconocida",
                    $item['volumeInfo']['publishedDate']??"Año desconocido", 
                    $item['volumeInfo']['pageCount']??"¿?", 
                    $item['volumeInfo']['imageLinks']['thumbnail']??"webroot/img/nodisponible.jpg", 
                    $item['volumeInfo']['infoLink'])); 
                }
            }
            return $aLibros;
        }
    }