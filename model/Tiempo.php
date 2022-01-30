<?php
    /**
    * Modelo: Tiempo
    * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
    * @since 30/01/2022 
    * @version 1.0 
    * Última modificación: 30/01/2022
    */
    class Tiempo{
        private $ciudad;
        private $pais;
        private $fechaHora;
        private $icono;
        private $temperatura;
        private $descripcion;
        
        function __construct($ciudad, $pais, $fechaHora, $icono, $temperatura, $descripcion) {
            $this->ciudad = $ciudad;
            $this->pais = $pais;
            $this->fechaHora = $fechaHora;
            $this->icono = $icono;
            $this->temperatura = $temperatura;
            $this->descripcion = $descripcion;
        }
        
        function getCiudad() {
            return $this->ciudad;
        }

        function getPais() {
            return $this->pais;
        }

        function getFechaHora() {
            return $this->fechaHora;
        }

        function getIcono() {
            return $this->icono;
        }

        function getTemperatura() {
            return $this->temperatura;
        }

        function getDescripcion() {
            return $this->descripcion;
        }

        function setCiudad($ciudad): void {
            $this->ciudad = $ciudad;
        }

        function setPais($pais): void {
            $this->pais = $pais;
        }

        function setFechaHora($fechaHora): void {
            $this->fechaHora = $fechaHora;
        }

        function setIcono($icono): void {
            $this->icono = $icono;
        }

        function setTemperatura($temperatura): void {
            $this->temperatura = $temperatura;
        }

        function setDescripcion($descripcion): void {
            $this->descripcion = $descripcion;
        }


        
    }