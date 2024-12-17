<?php

namespace App\Repository;

use App\Utils\Bdd;
use App\Model\User;

class UserRepository{

    private static \PDO $bdd;

    public function __contruct(){
        self::$bdd = Bdd::connexion();
    }

    public function add(User $user):User{
        try{
            $lastname = $user->getLastname();
            $firstname = $user->getFirstname();
            $email = $user->getEmail();
            $password = $user->getPassword();

            $sql = "INSERT INTO user(lastname, firstname, email, `password`) VALUE (?,?,?,?)";
            $request = self::$bdd->prepare($sql);
            $request->bindParam(1,$lastname, \PDO::PARAM_STR);
            $request->bindParam(2,$firstname, \PDO::PARAM_STR);
            $request->bindParam(3,$email, \PDO::PARAM_STR);
            $request->bindParam(4,$password, \PDO::PARAM_STR);
            $request->execute();

            $sql2 = "SELECT  u.id, u.lastname, u.firstname, u.email FROM user AS u WHERE u.email = ?  ORDER BY id DESC LIMIT 1";
            $request2 = self::$bdd->prepare($sql2);
            $request2->bindParam(1, $email, \PDO::PARAM_STR);
            $request2->execute();
            $request2->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, User::class);
            $user = $request2->fetch();

        } catch(\PDOException $error) {
            die("Error".$error->getMessage()); 
        }
        return $user;
    }

    public function findAll():array{
        try{
            $sql ="SELECT u.id, u.lastname, u.firstname, u.email FROM user AS u ORDER BY u.id";
            $request = self::$bdd->prepare($sql);
            $request->execute();
            $request->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, User::class);
            $users = $request->fetchAll();
            return $users;
        }catch(\PDOException $error){
            die("Error".$error->getMessage());
        }
    }

    public function find(int $id):User{
        return new User();
    }
}
?>