<?php
    /*
        * Modelo: Usuario
        * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
        * @since 21/12/2021 
        * @version 1.0 
        * Última modificación: 11/01/2022
    */
    class Usuario{
        private $codUsuario;
        private $password;
        private $descUsuario;
        private $numAccesos;
        private $fechaHoraUltimaConexion;
        private $fechaHoraUltimaConexionAnterior;
        private $perfil;
        private $imagenUsuario;

        function __construct($codUsuario, $password, $descUsuario, $numAccesos, $fechaHoraUltimaConexion, $fechaHoraUltimaConexionAnterior, $perfil, $imagenUsuario) {
            $this->codUsuario = $codUsuario;
            $this->password = $password;
            $this->descUsuario = $descUsuario;
            $this->numAccesos = $numAccesos;
            $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
            $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
            $this->perfil = $perfil;
            $this->imagenUsuario = $imagenUsuario;
        }
        
        function getCodUsuario() {
            return $this->codUsuario;
        }

        function getPassword() {
            return $this->password;
        }

        function getDescUsuario() {
            return $this->descUsuario;
        }

        function getNumAccesos() {
            return $this->numAccesos;
        }

        function getFechaHoraUltimaConexion() {
            return $this->fechaHoraUltimaConexion;
        }

        function getFechaHoraUltimaConexionAnterior() {
            return $this->fechaHoraUltimaConexionAnterior;
        }

        function getPerfil() {
            return $this->perfil;
        }

        function getImagenUsuario() {
            return $this->imagenUsuario;
        }

        function setCodUsuario($codUsuario): void {
            $this->codUsuario = $codUsuario;
        }

        function setPassword($password): void {
            $this->password = $password;
        }

        function setDescUsuario($descUsuario): void {
            $this->descUsuario = $descUsuario;
        }

        function setNumAccesos($numAccesos): void {
            $this->numAccesos = $numAccesos;
        }

        function setFechaHoraUltimaConexion($fechaHoraUltimaConexion): void {
            $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        }

        function setFechaHoraUltimaConexionAnterior($fechaHoraUltimaConexionAnterior): void {
            $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
        }

        function setPerfil($perfil): void {
            $this->perfil = $perfil;
        }

        function setImagenUsuario($imagenUsuario): void {
            $this->imagenUsuario = $imagenUsuario;
        }


        
    }