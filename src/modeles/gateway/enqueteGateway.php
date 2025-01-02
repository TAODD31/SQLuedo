<?php

namespace gateway;

use PDO;

class enqueteGateway extends BaseGateway
{
    private $con;

    /**
     * @param $con
     */
    public function __construct($con)
    {
        $this->con = $con;
    }

    public function find(string $id): void
    {

        $query = 'SELECT * FROM enquete WHERE id = :id';
        $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));
        $this->con->getResults();
    }

    public function insertEnquete(
        string $titre,
        string $description,
        string $sqlCommand,
        int    $nivExpert,
        int    $nivInter,
        string $solution,
        string $indice,
        string $imageName,
        string $nomCreateur
    )
    {
        if (!empty($sqlCommand)) {
            $result = $this->resultatEnquete($sqlCommand);
            if (is_string($result) && strpos($result, 'Erreur SQL') !== false) {
                throw new \Exception($result);
            }
        }

        try {
            // Sélectionner la base de données SQLuedo
            $this->con->executeQuery('USE SQLuedo;');

            // Requête d'insertion
            $query = 'INSERT INTO `enquete` 
                      (`titre`, `description`, `difficulteIntermediaire`, `difficulteDifficile`, `MLD`, `solution`, `indice`, `nomDatabase`, `nomCreateur`) 
                      VALUES 
                      (:titre, :description, :nivInter, :nivExpert, :mld, :solution, :indice, :nomDatabase, :nomCreateur)';

            $this->con->executeQuery($query, [
                ':titre' => [$titre, PDO::PARAM_STR],
                ':description' => [$description, PDO::PARAM_STR],
                ':nivInter' => [$nivInter, PDO::PARAM_INT],
                ':nivExpert' => [$nivExpert, PDO::PARAM_INT],
                ':mld' => [$imageName, PDO::PARAM_STR],
                ':solution' => [$solution, PDO::PARAM_STR],
                ':indice' => [$indice, PDO::PARAM_STR],
                ':nomDatabase' => [$titre, PDO::PARAM_STR],
                ':nomCreateur' => [$nomCreateur, PDO::PARAM_STR]
            ]);

        } catch (\PDOException $e) {
            error_log("Erreur SQL : " . $e->getMessage());
            throw new \PDOException("Erreur lors de l'insertion de l'enquête : " . $e->getMessage());
        }
    }

    public function resultatEnquete(string $requete_sql)
    {
        if ($this->con->executeQuery($requete_sql)) {
            $results = $this->con->getResults();
            return $results;
        } else {
            $errorInfo = $this->con->errorInfo();
            return ('Erreur SQL : ' . $errorInfo[2]);
        }
    }

    public function getSolution(int $id): string
    {
        try {
            $query = 'SELECT solution FROM `enquete` WHERE id = :id';
            $this->con->executeQuery($query, array(':id' => array($id, PDO::PARAM_INT)));
            $result = $this->con->getResults();
            return $result[0]['solution'];
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
    }

    public function getEnquete(): array
    {
        $query = 'SELECT * FROM enquete';
        $this->con->executeQuery($query);
        return $this->con->getResults();
    }

    public function getDatabaseNameById(int $id): ?string
    {
        try {
            $query = 'SELECT nomDatabase FROM `enquete` WHERE id = :id';
            $this->con->executeQuery($query, [':id' => [$id, PDO::PARAM_INT]]);
            $result = $this->con->getResults();

            if (count($result) > 0) {
                return $result[0]['nomDatabase'];
            } else {
                return null;
            }
        } catch (\PDOException $e) {
            throw new \Exception("Erreur lors de la recherche du nom de la base de données : " . $e->getMessage());
        }
    }
}