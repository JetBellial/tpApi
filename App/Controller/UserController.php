<?php
namespace App\Controller;
use App\Utils\Bdd;
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

    public function showUser():void{
        if (isset($_GET["id"])){
            
            $user = $this->repository->find($_GET["id"]);
            
            Tools::JsonResponse(["Utilisateur par id"=>$user->toArray()],200);
        } else {
            Tools::JsonResponse(["Utilisateurs"=>"Aucun utilisateur trouvé avec cet id"],404);
        }
    }
}
?>
