<?php

class UsuarioRepository extends PDORepository {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        
    }

    public function login($usuario, $clave) {
        $answer = $this->queryList("select * from usuario where usuario=? and clave=?;", array($usuario, $clave));
        $final_answer = false;
        if ($answer){
            $final_answer = new usuario($answer[0]['id'], $answer[0]['usuario'], $answer[0]['clave'], $answer[0]['nombre'], $answer[0]['apellido'], $answer[0]['mail']);
        }
        return $final_answer;
    }

    public function buscarPorId($usuario_id) {
        $answer = $this->queryList("select * from usuario where id=?", array($usuario_id));
        $final_answer = false;
        if ($answer){
            $final_answer = new usuario($answer[0]['id'], $answer[0]['usuario'], $answer[0]['clave'], $answer[0]['nombre'], $answer[0]['apellido'], $answer[0]['mail']);
        }
        return $final_answer;
    }

}
