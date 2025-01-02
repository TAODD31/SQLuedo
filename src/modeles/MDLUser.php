<?php

namespace modeles;

use config\Validation;
use gateway\UtilisateurGateway;
use connection\Connection;
use modeles\entiter\utilisateur;

require 'gateway/UtilisateurGateway.php';

class MDLUser
{

    public function VerifInfosConnexion(string $nomUser, string $password): ?utilisateur
    {
        $con = new Connection();
        $gtw = new UtilisateurGateway($con);
        $user = $gtw->find(Validation::validation_Nom($nomUser));
        if ($user != null) {
            $user = new utilisateur($user->getNom(), $user->getMdp());
            if (password_verify($password,$user->getMdp()) || $nomUser == $user->getNom()) {
                $_SESSION['username'] = $user->getNom();
                $_SESSION['role'] = $gtw->findRole($user->getNom());
                return $user;
            }
        }
        return null;
    }

    public function ExistUser(string $nomUser): ?bool
    {
        $con = new Connection();
        $gtw = new UtilisateurGateway($con);
        return $gtw->ExistUser(Validation::validation_Nom($nomUser));
    }

    public function CreateUser(string $nomUser, string $password): void
    {
        $con = new Connection();
        $gtw = new UtilisateurGateway($con);
        $password = password_hash($password,PASSWORD_DEFAULT);
        $nomUser = Validation::validation_Nom($nomUser);
        $gtw->insertUser($nomUser, $password);
        $_SESSION['username'] = $nomUser;
        $_SESSION['role'] = $gtw->findRole($nomUser);
    }

    public function IsAdmin($nomUser): ?utilisateur
    {
        $con = new Connection();
        $gtw = new UtilisateurGateway($con);
        $nomUser = Validation::validation_Nom($nomUser);
        if ($gtw->isAdmin($nomUser)) {
            return new utilisateur($nomUser, '');
        }
        return null;
    }
}
