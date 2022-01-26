<?php
    /**
    * Modelo: LibroREST
    * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
    * @since 26/01/2022 
    * @version 1.0 
    * Última modificación: 26/01/2022
    */
    class LibroREST{
        private $titulo;
        private $autor;
        private $editorial;
        private $anyoEdicion;
        private $paginas;
        private $imagen;
        private $link;
        
        function __construct($titulo, $autor, $editorial, $anyoEdicion, $paginas, $imagen, $link) {
            $this->titulo = $titulo;
            $this->autor = $autor;
            $this->editorial = $editorial;
            $this->anyoEdicion = $anyoEdicion;
            $this->paginas = $paginas;
            $this->imagen = $imagen;
            $this->link = $link;
        }
        
        function getTitulo() {
            return $this->titulo;
        }

        function getAutor() {
            return $this->autor;
        }

        function getEditorial() {
            return $this->editorial;
        }

        function getAnyoEdicion() {
            return $this->anyoEdicion;
        }

        function getPaginas() {
            return $this->paginas;
        }

        function getImagen() {
            return $this->imagen;
        }

        function getLink() {
            return $this->link;
        }

        function setTitulo($titulo): void {
            $this->titulo = $titulo;
        }

        function setAutor($autor): void {
            $this->autor = $autor;
        }

        function setEditorial($editorial): void {
            $this->editorial = $editorial;
        }

        function setAnyoEdicion($anyoEdicion): void {
            $this->anyoEdicion = $anyoEdicion;
        }

        function setPaginas($paginas): void {
            $this->paginas = $paginas;
        }

        function setImagen($imagen): void {
            $this->imagen = $imagen;
        }

        function setLink($link): void {
            $this->link = $link;
        }


    }