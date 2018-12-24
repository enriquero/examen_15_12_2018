<?php
class PublicacionController {
    
    private static $instance;

    public static function getInstance() {

        if (!isset(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    
    private function __construct() {
        
    }
    
    public function add(){
        if ( isset($_SESSION['usuario_id']) ){
            $view = new PublicacionView();
            $usuario_logeado = UsuarioController::getInstance()->buscarPorId($_SESSION['usuario_id']);
            if ( isset($_POST['mensaje']) and isset($_POST['publico']) ) {
                $fecha_publicacion = date('Y-m-d');
                $mensaje = $_POST['mensaje'];
                if ($_POST['publico'] == "publico") {
                    $publico = 1;
                }
                else {
                    $publico = 0;
                }
                $autor = $usuario_logeado->getId();
               PublicacionRepository::getInstance()->add($mensaje, $fecha_publicacion, $publico, $autor);
               HomeController::getInstance()->show();
            }
            else {
                $view->add($usuario_logeado);
            }
        }
        else {
            HomeController::getInstance()->show();
        }
    }

    public function listAll(){
        if ( isset($_SESSION['usuario_id']) ){
            $usuario_logeado = UsuarioController::getInstance()->buscarPorId($_SESSION['usuario_id']);
            $mensajes = PublicacionRepository::getInstance()->listAll();
            $view = new PublicacionView();
            $view->listAll($usuario_logeado, $mensajes);
        }
        else{
            HomeController::getInstance()->show();
        }
    }

    public function listSeguidos(){
        if ( isset($_SESSION['usuario_id']) ){
            $usuario_logeado = UsuarioController::getInstance()->buscarPorId($_SESSION['usuario_id']);
            $mensajes = PublicacionRepository::getInstance()->seguidos($usuario_logeado->getId());
            $view = new PublicacionView();
            $view->listAll($usuario_logeado, $mensajes);
        }
        else{
            HomeController::getInstance()->show();
        }
    }
    
}
