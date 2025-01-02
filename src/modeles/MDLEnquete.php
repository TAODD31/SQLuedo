<?php

namespace modeles;

use gateway\EnqueteGateway;
use connection\Connection;
use modeles\entiter\enquete;

class MDLEnquete
{
    public function AjoutEnquete(string $titre, string $description, string $sqlCommand, int $nivExpert, int $nivInter, string $solution, string $indice, string $imageName, string $nomCreateur) {
        $con = new Connection();
        $enqueteGateway = new enqueteGateway($con);
        $enqueteGateway->insertEnquete($titre, $description, $sqlCommand, $nivExpert, $nivInter, $solution, $indice, $imageName, $nomCreateur);
    }
    
    public function afficheEnquete(int $id)
    {
        $con = new Connection();
        $gtw = new enqueteGateway($con);
        $gtw->find($id);
    }


    public function getSolution(int $id): string {
        $con = new Connection();
        $gtw = new enqueteGateway($con);
        $solution = $gtw->getSolution($id);
    
        if ($solution === null) {
            throw new \Exception("Solution introuvable pour l'enquête avec l'ID $id.");
        }
    
        return $solution;
    }
    public function getEnquete():array{
        $con = new Connection();
        $gtw = new enqueteGateway($con);
        return $gtw->getEnquete();
    }

    public function resultatEnquete(string $requete_sql, string $database = "enquete_1", array $params = []) {
        $con = new Connection($database);
        $gtw = new enqueteGateway($con);
        return $gtw->resultatEnquete($requete_sql);
    }

    public function getDatabaseName(int $id): string {
        $con = new Connection();
        $gtw = new enqueteGateway($con);
        $databaseName = $gtw->getDatabaseNameById($id);
    
        if ($databaseName === null) {
            throw new \Exception("Nom de la base de données introuvable pour l'enquête avec l'ID $id.");
        }
    
        return $databaseName;
    }

}