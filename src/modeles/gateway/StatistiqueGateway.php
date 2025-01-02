<?php

namespace gateway;

use PDO;
use modeles\entiter\statistique;

class StatistiqueGateway extends BaseGateway
{
    private $con;

    /**
     * @param $con
     */
    public function __construct($con)
    {
        $this->con = $con;
    }

    public function incrementerNbCoup(int $idEnquete, string $nomUtilisateur): void
    {
        try {
            $query = 'UPDATE `statistiques` 
                      SET nbTentatives = nbTentatives + 1 
                      WHERE idEnquete = :idEnquete AND nomUtilisateur = :nomUtilisateur';
    
            $this->con->executeQuery($query, array(
                ':idEnquete' => array($idEnquete, PDO::PARAM_INT),
                ':nomUtilisateur' => array($nomUtilisateur, PDO::PARAM_STR)
            ));
        } catch (\PDOException $e) {}
    }

    public function recupStatistique(string $nomUtilisateur): array
    {
        try{
            $query = 'SELECT *,`titre` FROM `statistiques` JOIN `enquete` ON id = idEnquete WHERE nomUtilisateur = :nomUtilisateur';
            $this->con->executeQuery($query, array('nomUtilisateur' => array($nomUtilisateur, PDO::PARAM_STR)));
            return $this->con->getResults();

        } catch (\PDOException $e) {
            return $e->getMessage();
        }

    }


    public function find(string $id)
    {
    }
}