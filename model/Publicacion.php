<?php

class Publicacion {
    private $id;
    private $mensaje;
    private $fecha_publicacion;
    private $publico;
    private $usuario;

    public function __construct($id, $mensaje, $fecha_publicacion, $publico, $usuario) {
        $this->id = $id;
        $this->mensaje = $mensaje;
        $this->fecha_publicacion = $fecha_publicacion;
        $this->publico = $publico;
        $this->usuario = $usuario;
    }

    public function getId() {
        return $this->id;
    }

    public function getMensaje() {
        return $this->mensaje;
    }

    public function getFecha_publicacion() {
        return $this->fecha_publicacion;
    }

    public function getPublico() {
        return $this->publico;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setMensaje($mensaje) {
        $this->mensaje = $mensaje;
    }

    public function setFecha_publicacion($fecha_publicacion) {
        $this->fecha_publicacion = $fecha_publicacion;
    }

    public function setPublico($publico) {
        $this->publico = $publico;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
}
