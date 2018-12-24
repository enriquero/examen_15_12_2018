<?php
session_start();
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);

require_once('model/PDORepository.php');
require_once('view/TwigView.php');


// Modulo Usuario
require_once('controller/UsuarioController.php');
require_once('model/UsuarioRepository.php');
require_once('model/Usuario.php');
require_once('view/UsuarioView.php');

// Modulo Home
require_once('controller/HomeController.php');
require_once('view/HomeView.php');

//Modulo Publicacion
require_once('controller/PublicacionController.php');
require_once('model/PublicacionRepository.php');
require_once('model/Publicacion.php');
require_once('view/PublicacionView.php');

//require_once('model/ResourceRepository.php');
//require_once('controller/ResourceController.php');
//require_once('model/Resource.php');
//require_once('view/SimpleResourceList.php');


if(isset($_REQUEST["action"])){

    switch ($_REQUEST["action"]) {
    case 'login':
        UsuarioController::getInstance()->login();
        break;
    case 'logout':
        UsuarioController::getInstance()->logout();
        break;
    case 'mensaje_add':
        PublicacionController::getInstance()->add();
        break;
    case 'mensaje_list':
        PublicacionController::getInstance()->listAll();
        break;
    case 'mensaje_seguidos':
        PublicacionController::getInstance()->listSeguidos();
        break;
    default:
        HomeController::getInstance()->show();
	}
}
else{
    HomeController::getInstance()->show();
}

