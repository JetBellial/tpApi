<?php
require_once './env.local.php';
require_once './vendor/autoload.php';
session_start();

$url = parse_url($_SERVER['REQUEST_URI']);

$path = $url['path'] ?? '/';

$requestMethod = $_SERVER['REQUEST_METHOD'];

use App\Utils\Tools;
use App\Controller\UserController;



$userController = new UserController();

switch(trim($path,BASE_URL)){
    case '':
        Tools::JsonResponse(["Test"=>"Test2"],200);
        break;
    case 'user':
        if($requestMethod === 'POST'){
            $userController->save();
        }else if($requestMethod === 'GET'){
            $userController->showAll();
        }else if($requestMethod === 'DELETE'){
            Tools::JsonResponse(["Message"=>"Suppression de tout les utilisateurs"],200);
        }else{
            Tools::JsonResponse(["Message"=>"Méthode non autorisée"],405);
        }
        break;
        case 'user/id': 
            if($requestMethod === 'GET') {
                $userController->showUser();
            }
            else if($requestMethod === 'PATCH') {
                Tools::JsonResponse(["Message"=>"Utilsiateur mis à jour par son id"], 200);
            }
            else if($requestMethod === 'DELETE') {
                Tools::JsonResponse(["Message"=>"Utilisateur supprimé par son id"], 200);
            }
            else {
                Tools::JsonResponse(["Message"=>"Méthode non autorisée"], 405);
            }
            break;
    default:
        Tools::JsonResponse(["Erreur"=>"Erreu2"],404);
        break;
}
?>