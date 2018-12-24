<?php

class HomeView extends TwigView {
    
    public function show($usuario_logeado, $mensaje) {
        
        echo self::getTwig()->render('home.html.twig', array('usuario_logeado' => $usuario_logeado, 'mensaje'=> $mensaje));
        
        
    }
    
}
