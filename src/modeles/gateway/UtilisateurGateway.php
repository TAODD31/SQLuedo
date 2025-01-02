<?php

namespace gateway;
use PDO;
use modeles\entiter\utilisateur;

class UtilisateurGateway extends BaseGateway
{
    private $con;

    /**
     * @param $con
     */
    public function __construct($con)
    {
        $this->con = $con;
    }

    /**
     * @return mixed
     */
    public function find(string $name): ?utilisateur
    {
        $query = 'SELECT * FROM utilisateur WHERE nomUtilisateur = :name';
        $this->con->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR)));
        $results = $this->con->getResults();
        foreach ($results as $row)
            if ($row['nomUtilisateur'] != NULL) {
                return new utilisateur($row['nomUtilisateur'], $row['mdp']);
            }
        return NULL;
    }

    public function insertUser(string $name, string $mdp):void
    {
        $query = 'INSERT INTO `utilisateur`(`nomUtilisateur`,`mdp`) VALUES (:nomUtilisateur, :mdp)';
        $this->con->executeQuery($query, array(':nomUtilisateur' => array($name, PDO::PARAM_STR), ':mdp' => array($mdp, PDO::PARAM_STR)));
    }


    public function delUser(string $name):void
    {
        $query = 'DELETE FROM `utilisateur` WHERE nomUtilisateur = :name';
        $this->con->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR)));
        //echo "utilisateur $name retiré"."<br>";
    }

    public function ExistUser(string $name): bool
    {
        $query = 'SELECT * FROM `utilisateur` WHERE nomUtilisateur = :name';
        $this->con->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR)));
        $result = $this->con->getResults();
        if(empty($result)){
            return false; // L'utilisateur n'existe pas
        } else {
            return true; // L'utilisateur existe
        }
    }

    public function isAdmin(string $name): bool
    {
        $query = 'SELECT role FROM `utilisateur` WHERE nomUtilisateur = :name';
        $this->con->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR)));
        $result = $this->con->getResults();
        if (!empty($result) && $result[0]['role'] == 'admin') {
            return true;
        }
        return false;
    }

    public function findRole(string $name): string
    {
        $query = 'SELECT role FROM `utilisateur` WHERE nomUtilisateur = :name';
        $this->con->executeQuery($query, [':name' => [$name, PDO::PARAM_STR]]);

        // Récupérer le résultat
        $result = $this->con->getResults();

        // S'assurer que le résultat contient une valeur et retourner le rôle
        if (!empty($result) && isset($result[0]['role'])) {
            return $result[0]['role'];
        }

        // Retourner une chaîne de caractères vide ou un rôle par défaut si aucun résultat n'est trouvé
        return '';
    }
}