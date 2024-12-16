<?php

namespace App\Model;

class User{
    private ?int $id;
    private ?string $lastname;
    private ?string $firstname;
    private ?string $email;
    private ?string $password;

    public function __construct(){}


    //Getter et Setter
    public function getId(): ?int{
        return $this->id;
    }

    public function setId(?int $id): self{
        $this->id = $id;
        return $this;
    }

    public function getLastname(): null|string{
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self{
        $this->lastname = $lastname;
        return $this;
    }

    public function getFirstname(): null|string{
        return $this ->firstname;
    }

    public function setFirstname(?string $firstname): self{
        $this->firstname = $firstname;
        return $this;
    }

    public function getEmail(): null|string{
        return $this ->email;
    }

    public function setEmail(?string $email): self{
        $this->email = $email;
        return $this;
    }

    public function getPassword(): null|string{
        return $this ->password;
    }

    public function setPassword(?string $password): self{
        $this->password = $password;
        return $this;
    }

    //Méthodes
    public function hashPassword():void{
        $this->password = password_hash(this->password,PASSWORD_DEFAULT);
    }

    public function verifPassword(string $clear):bool{
        return password_verify($clear, $this->password);
    }

    public function __toString():string{
        return $this->firstname.' '.$this->lastname;
    }
}
?>