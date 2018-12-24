<?php

class UsuarioView extends TwigView {
    
    public function show($usuario_logeado) {
        echo self::getTwig()->render('home.html.twig', array('usuario_logeado' => $usuario_logeado));        
    }
}
