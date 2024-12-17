<?php
require_once './vendor/autoload.php';
session_start();

$url = parse_url($_SERVER['REQUEST_URI']);

$path = $url['path'] ?? '/';

use App\Utils\Tools;
use App\Controller\UserController;



$userController = new UserController();

switch($path){
    case '/tpapi/':
        Tools::JsonResponse(["Test"=>"Test2"],200);
        break;
    case '/tpapi/user':
        $userController->save();
        break;
    default:
        Tools::JsonResponse(["Erreur"=>"Erreu2"],404);
        break;
}
?>