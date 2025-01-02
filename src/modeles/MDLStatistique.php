<?php

namespace modeles;

use gateway\StatistiqueGateway;
use connection\Connection;
use modeles\entiter\statistique;

require 'gateway/StatistiqueGateway.php';

class MDLStatistique
{
    public function incrementerNbCoup(int $idEnquete, string $nomUtilisateur): void
    {
        $con = new Connection();
        $gtw = new StatistiqueGateway($con);
        $gtw->incrementerNbCoup($idEnquete,$nomUtilisateur);
    }

    public function afficherStat(string $nomUser) : array
    {
        $con = new Connection();
        $gtw = new StatistiqueGateway($con);
        return  $gtw->recupStatistique($nomUser);
    }

}