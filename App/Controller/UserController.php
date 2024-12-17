<?php
namespace App\Controller;

use App\Repository\UserRepository;
use App\Utils\Tools;

class UserController{
    private UserRepository $repository;

    public function __construct(){
        $this->repository = new UserRepository();
    }

    public function save(){
        Tools::JsonResponse(["Utilisateur créé"=>"Succes"],200);
    }

    public function showAll():void{
        $users = $this->repository->findAll();
        if(empty($users)){
            Tools::JsonResponse(["Utilisateurs"=>"Aucun utilisateur trouvé"],404);
            exit;
        }
        $userTab =[];
        foreach($users as $user){
            $userTab[] = $user->toArray();
        }
        Tools::JsonResponse(["Utilisateurs"=>$userTab],200);
    }

    public function showUser(int $id):void{
        if (isset($_GET["id"])){
            $_GET["id"];
            dd($_GET["id"]);
        } else {
            Tools::JsonResponse(["Utilisateurs"=>"Aucun utilisateur trouvé avec cet id"],404);
        }
    }
}
?>
