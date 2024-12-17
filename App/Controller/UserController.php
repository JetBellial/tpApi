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
}
?>
