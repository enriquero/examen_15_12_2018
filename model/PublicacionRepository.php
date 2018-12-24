<?php

class PublicacionRepository extends PDORepository {

    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    private function __construct() {
        
    }

    public function listAll() {
        $answer = $this->queryList("select p.id as id, mensaje, fecha_publicacion, publico, usuario_id, usuario, clave, nombre, apellido, mail 
                                    from publicacion as p inner join usuario as u on p.usuario_id = u.id
                                    where publico = 1", array());
        $final_answer = [];
        foreach ($answer as &$element) {
            $usuario = new Usuario($element['usuario_id'], $element['usuario'], $element['clave'], $element['nombre'], $element['apellido'], $element['mail']);
            $publicacion = new Publicacion($element['id'], $element['mensaje'], $element['fecha_publicacion'], $element['publico'], $usuario);
            $final_answer[] = $publicacion;
        }
        //print_r($final_answer);
        return $final_answer;
    }
/*
select p.id as id, mensaje, fecha_publicacion, publico, usuario_id, usuario, clave, nombre, apellido, mail 
from publicacion as p inner join usuario as u on p.usuario_id = u.id 
where p.usuario_id IN (select usuario_id 
                    from usuario_sigue_a_usuario as s 
                    where s.usuario_seguidor_id = 3)
*/
    public function seguidos($usuario_logeado_id) {
        $answer = $this->queryList("select p.id as id, mensaje, fecha_publicacion, publico, usuario_id, usuario, clave, nombre, apellido, mail 
                                    from publicacion as p inner join usuario as u on p.usuario_id = u.id
                                    where p.usuario_id IN (select usuario_id
                                                from usuario_sigue_a_usuario as s
                                                where s.usuario_seguidor_id =?)", array($usuario_logeado_id));
        $final_answer = [];
        foreach ($answer as &$element) {
            $usuario = new Usuario($element['usuario_id'], $element['usuario'], $element['clave'], $element['nombre'], $element['apellido'], $element['mail']);
            $publicacion = new Publicacion($element['id'], $element['mensaje'], $element['fecha_publicacion'], $element['publico'], $usuario);
            $final_answer[] = $publicacion;
        }
        return $final_answer;
    }

    public function add($mensaje, $fecha_publicacion, $publico, $usuario) {
        $answer=$this->queryList("INSERT INTO `publicacion`(`mensaje`, `fecha_publicacion`, `publico`, `usuario_id`)
                                    VALUES (?, ?, ?, ?)", array($mensaje, $fecha_publicacion, $publico, $usuario));
        if ($answer) {
            $final_answer = true;
        }
        else {
            $final_answer = false;
        }
        return $final_answer;
    }

}
