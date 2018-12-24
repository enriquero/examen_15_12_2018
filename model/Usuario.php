<?php

class Usuario {
    private $id;
    private $usuario;
    private $clave;
    private $nombre;
    private $apellido;
    private $mail;

    public function __construct($id, $usuario, $clave, $nombre, $apellido, $mail) {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->mail = $mail;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getClave() {
        return $this->clave;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setClave($clave) {
        $this->clave = $clave;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }
}
