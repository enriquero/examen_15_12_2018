<?php

class HomeController {
    
    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    private function __construct() {
        
    }

    public function show(){
        $view = new HomeView();
		//print_r($_SESSION);
        if (isset($_SESSION['usuario_id'])){
			//echo "funciona";
            $mensaje = "Logeado";
            $usuario_logeado = UsuarioController::getInstance()->buscarPorId($_SESSION['usuario_id']);
        } 
        else {
            $usuario_logeado = "";
            $mensaje = "";
        }
        $view->show($usuario_logeado, $mensaje);
        //print_r($usuario);
    }    
}
