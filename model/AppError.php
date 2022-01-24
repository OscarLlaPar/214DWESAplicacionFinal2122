<?php

    /**
    * Modelo: Error
    * @author Óscar Llamas Parra - oscar.llapar@educa.jcyl.es - https://github.com/OscarLlaPar
    * @since 12/01/2022 
    * @version 1.0 
    * Última modificación: 12/01/2022
    */
class AppError {
    private $mensaje;
    private $codigo;
    private $paginaSiguiente;
    
    function __construct($mensaje, $codigo, $paginaSiguiente) {
        $this->mensaje = $mensaje;
        $this->codigo = $codigo;
        $this->paginaSiguiente = $paginaSiguiente;
    }

    function getMensaje() {
        return $this->mensaje;
    }
    function getCodigo() {
        return $this->codigo;
    }

    function getPaginaSiguiente() {
        return $this->paginaSiguiente;
    }

        function setMensaje($mensaje): void {
        $this->mensaje = $mensaje;
    }

    function setCodigo($codigo): void {
        $this->codigo = $codigo;
    }

    function setPaginaSiguiente($paginaSiguiente): void {
        $this->paginaSiguiente = $paginaSiguiente;
    }


}
