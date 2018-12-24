<?php

class PublicacionView extends TwigView {
    
    public function listAll($usuario_logeado, $mensajes) {
        echo self::getTwig()->render('listMensajes.html.twig', array('usuario_logeado' => $usuario_logeado, 'mensajes'=> $mensajes));
    }

    public function add($usuario_logeado) {
    	echo self::getTwig()->render('addPublicacion.html.twig', array('usuario_logeado' => $usuario_logeado));
    }
}
