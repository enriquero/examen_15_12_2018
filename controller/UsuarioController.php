<?php
class UsuarioController {
    
    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    private function __construct() {
        
    }
    
    public function buscarPorId($usuario_id){
        return UsuarioRepository::getInstance()->buscarPorId($usuario_id);
    }    
    
    public function login(){
        if ( isset($_POST['usuario']) and isset($_POST['password']) )  {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
        }
        
        $usuario = UsuarioRepository::getInstance()->login($usuario, $password);
        if ($usuario){
            $_SESSION['usuario_id'] = $usuario->getId();
            $mensage = "Bienvenido " . $usuario->getNombre();
        } 
        else {
            $usuario = "";
            $mensage = "Usuario y/o contraseña incorrectos";
        }
        PublicacionController::getInstance()->listAll();
    }
    
    public function logout(){
        session_unset();
        session_destroy();
        $mensage = "Iniciar sesion para acceder a mas funcionalidades";
        $usuario = "";
        HomeController::getInstance()->show($usuario, $mensage);
    }    
}
