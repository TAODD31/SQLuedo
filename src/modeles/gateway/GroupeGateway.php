<?php

namespace gateway;

use PDO;
use modeles\entiter\groupe;

class GroupeGateway extends BaseGateway
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
    public function find(string $name): ?groupe
    {
        $query = 'SELECT * FROM `groupe` WHERE nom = :name';
        $this->con->executeQuery($query, array(':name'=>array($name,PDO::PARAM_STR)));
        $results=$this->con->getResults();
        foreach ($results as $row)
            if ($row['nom'] != NULL) {
                return new groupe($row['nom'], $row['code'], $row['createur']);
            }
        return NULL;
    }

    public function insertGroupe(string $name, string $code, string $createur, int $nbMembre)
    {
        $query = 'INSERT INTO `groupe` VALUES (:nom, :code, :nbUtilisateur, :createur)';
        $this->con->executeQuery($query,array(':nom'=>array($name,PDO::PARAM_STR), ':code'=>array($code,PDO::PARAM_STR), 'nbUtilisateur'=>array($nbMembre, PDO::PARAM_INT), ':createur'=>array($createur, PDO::PARAM_STR)));
    }

    public function quitterGroupe(string $nomGrp, string $user)
    {
        $query = 'UPDATE `groupe` SET nbUtilisateur = nbUtilisateur - 1 WHERE nom = :name';
        $this->con->executeQuery($query, array(':name' => array($nomGrp, PDO::PARAM_STR)));
        $query = 'UPDATE `utilisateur` SET nomGroupe = NULL WHERE nomUtilisateur = :name';
        $this->con->executeQuery($query, array(':name' => array($user, PDO::PARAM_STR)));
    }

    public function ExistGroupe(string $name): bool
    {
        $query = 'SELECT count(*) FROM `groupe` WHERE nom = :name';
        $this->con->executeQuery($query, array(':name' => array($name, PDO::PARAM_STR)));
        $result = $this->con->getResults();
        if ($result[0]['count(*)'] >= 1) return true;
        return false;
    }

    public function rejoindreGroupe(string $nomGrp, string $user)
    {
        $query = 'UPDATE `utilisateur` SET nomGroupe = :nomGrp WHERE nomUtilisateur = :name';
        $this->con->executeQuery($query, array(':nomGrp' => array($nomGrp, PDO::PARAM_STR), ':name' => array($user, PDO::PARAM_STR)));
        $query = 'UPDATE `groupe` SET nbUtilisateur = nbUtilisateur + 1 WHERE nom = :nomGrp';
        $this->con->executeQuery($query, array(':nomGrp' => array($nomGrp, PDO::PARAM_STR)));
    }

    public function delGroupe(string $nomGrp, string $user)
    {
        $query = 'DELETE FROM `groupe` WHERE nom = :name';
        $this->con->executeQuery($query, array(':name'=>array($nomGrp,PDO::PARAM_STR)));
        $query = 'UPDATE `groupe` SET nbUtilisateur = nbUtilisateur - 1 WHERE nom = :name';
        $this->con->executeQuery($query, array(':name' => array($nomGrp, PDO::PARAM_STR)));
        $query = 'UPDATE `utilisateur` SET nomGroupe = NULL WHERE nomUtilisateur = :name';
        $this->con->executeQuery($query, array(':name' => array($user, PDO::PARAM_STR)));
    }

    public function suppAllUser(string $nomGrp)
    {
        $query = 'UPDATE `utilisateur` SET nomGroupe = NULL WHERE nomGroupe = :id';
        $this->con->executeQuery($query, array(':id' => array($nomGrp, PDO::PARAM_STR)));
    }

    public function findGroupByUser(string $nomUser) : ?string
    {
        $query = 'SELECT nomGroupe FROM `utilisateur` WHERE nomUtilisateur = :name';
        $this->con->executeQuery($query, array(':name'=>array($nomUser,PDO::PARAM_STR)));
        $results=$this->con->getResults();
        foreach ($results as $row){
            return $row['nomGroupe'];
        }
        return null;
    }

    public function getCodeGroupe(string $nomGroupe){
        $query = 'SELECT code FROM groupe WHERE nom = :name';
        $this->con->executeQuery($query, array(':name'=>array($nomGroupe,PDO::PARAM_STR)));
        $results = $this->con->getResults();
        foreach ($results as $row)
            return $row['code'];
    }
}
