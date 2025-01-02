<?php

namespace modeles;

use gateway\GroupeGateway;
use connection\Connection;
use modeles\entiter\groupe;

require 'gateway/GroupeGateway.php';

class MDLGroupe
{

    public function VerifInfosGroupe(string $nomGrp, string $code):?groupe
    {
        $con = new Connection();
        $gtw = new GroupeGateway($con);
        return $gtw->find($nomGrp);
    }

    public function ExistGroupe(string $nomGrp):?bool
    {
        $con = new Connection();
        $gtw = new GroupeGateway($con);
        return $gtw->ExistGroupe($nomGrp);
    }

    public function InsertGroupe(string $nomGrp, string $code, string $createur, int $nbMembres)
    {
        $con = new Connection();
        $gtw = new GroupeGateway($con);
        return $gtw->insertGroupe($nomGrp, $code, $createur, $nbMembres);
    }

    public function FindGroupe(string $nomGrp): ?groupe
    {
        $con = new Connection();
        $gtw = new GroupeGateway($con);
        return $gtw->find($nomGrp);
    }

    public function RejoindreGroupe(string $nomGrp, string $user)
    {
        $con = new Connection();
        $gtw = new GroupeGateway($con);
        return $gtw->rejoindreGroupe($nomGrp, $user);
    }

    public function QuitterGroupe(string $nomGrp, string $user)
    {
        $con = new Connection();
        $gtw = new GroupeGateway($con);
        return $gtw->quitterGroupe($nomGrp, $user);
    }

    public function DelGroupe(string $nomGrp, string $user)
    {
        $con = new Connection();
        $gtw = new GroupeGateway($con);
        return $gtw->delGroupe($nomGrp, $user);
    }

    public function SuppAllUser(string $nomGrp)
    {
        $con = new Connection();
        $gtw = new GroupeGateway($con);
        return $gtw->suppAllUser($nomGrp);
    }

    public function FindGroupByUser(string $nomUser) : ?string
    {
        $con = new Connection();
        $gtw = new GroupeGateway($con);
        return $gtw->findGroupByUser($nomUser);
    }

    public function GetCodeGroupe(string $nomGroupe){
        $con = new Connection();
        $gtw = new GroupeGateway($con);
        return $gtw->getCodeGroupe($nomGroupe);
    }
}
