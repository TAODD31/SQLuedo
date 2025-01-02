<?php
namespace connection;
use PDO;
class Connection extends PDO
{

    private $stmt;
    private string $user = 'UserBdd';
    private string $pass = 'mdpUserBdd';
    private string $dsn;


    public function __construct(?string $dbName = 'sqluedo') {
        $this->dsn = "mysql:host=localhost;dbname={$dbName}";
        try {
            parent::__construct($this->dsn, $this->user, $this->pass);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $this->lastError = $e;
            throw $e; 
        }
    }



    public function executeQuery(string $query, array $parameters = []): bool
    {
        $this->stmt = parent::prepare($query);
        foreach ($parameters as $name => $value) {
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }

        return $this->stmt->execute();
    }

    public function getResults(): array
    {
        return $this->stmt->fetchall();

    }

    public function errorInfo(): array
    {
        // Si un statement PDO est défini, retourne les informations d'erreur associées.
        if ($this->stmt) {
            return $this->stmt->errorInfo();
        } 
        // Si une erreur est enregistrée dans $this->lastError, retourne les détails de cette erreur.
        elseif ($this->lastError) {
            return [
                $this->lastError->getCode(),  // Code d'erreur de l'exception
                null,                         // Non applicable pour une exception PHP
                $this->lastError->getMessage() // Message d'erreur
            ];
        } 
        // Si aucune erreur n'est détectée, retourne un tableau indiquant "Aucune erreur".
        else {
            return ['00000', null, 'Aucune erreur.'];
        }
    }


}

?>