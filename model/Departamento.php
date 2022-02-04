<?php
    /**
    * Modelo: Departamento
    * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
    * @since 30/01/2022 
    * @version 1.0 
    * Última modificación: 30/01/2022
    */
    class Departamento{
        private $codDepartamento;
        private $descDepartamento;
        private $fechaCreacionDepartamento;
        private $volumenDeNegocio;
        private $fechaBajaDepartamento;
        
        function __construct($codDepartamento, $descDepartamento, $fechaCreacionDepartamento, $volumenDeNegocio, $fechaBajaDepartamento=null) {
            $this->codDepartamento = $codDepartamento;
            $this->descDepartamento = $descDepartamento;
            $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
            $this->volumenDeNegocio = $volumenDeNegocio;
            $this->fechaBajaDepartamento = $fechaBajaDepartamento;
        }
        function getCodDepartamento() {
            return $this->codDepartamento;
        }

        function getDescDepartamento() {
            return $this->descDepartamento;
        }

        function getFechaCreacionDepartamento() {
            return $this->fechaCreacionDepartamento;
        }

        function getVolumenDeNegocio() {
            return $this->volumenDeNegocio;
        }

        function getFechaBajaDepartamento() {
            return $this->fechaBajaDepartamento;
        }

        function setCodDepartamento($codDepartamento): void {
            $this->codDepartamento = $codDepartamento;
        }

        function setDescDepartamento($descDepartamento): void {
            $this->descDepartamento = $descDepartamento;
        }

        function setFechaCreacionDepartamento($fechaCreacionDepartamento): void {
            $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
        }

        function setVolumenDeNegocio($volumenDeNegocio): void {
            $this->volumenDeNegocio = $volumenDeNegocio;
        }

        function setFechaBajaDepartamento($fechaBajaDepartamento): void {
            $this->fechaBajaDepartamento = $fechaBajaDepartamento;
        }


    }
