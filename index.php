<?php
require_once './vendor/autoload.php';
session_start();

$url = parse_url($_SERVER['REQUEST_URI']);

$path = $url['path'] ?? '/';

use App\Repository\UserRepository;
use App\Controller\UserController;


$userController = new UserController();

switch($path){
    case '/tpapi/':
        echo 'Bienvenue';
        break;
    case '/tpapi/user':
        $userController->save();
        break;
    default:
        echo 'Erreur 404';
        break;
}
?>