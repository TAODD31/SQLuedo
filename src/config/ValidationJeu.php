<?php
namespace config;

class ValidationJeu
{

    static function val_action($action)
    {

        if (!isset($action)) {
            throw new Exception('pas d\'action');

        }
    }

    public static function val_form_verif(string &$reponse, array &$dVueEreur)
    {

        if (empty($reponse)) {
            $dVueEreur[] = "La réponse ne peut pas être vide.";
            return;
        }
        // Validation des mots-clés interdits spécifiques
        $mots_interdits = ['<script', '<img', 'alert', 'onerror', 'onload'];
        foreach ($mots_interdits as $mot) {
            if (stripos($reponse, $mot) !== false) {
                $dVueEreur[] = "Le contenu contient un mot-clé interdit ($mot) pour des raisons de sécurité.";
                return;
            }
        }

    }

    public static function val_form_exe(string &$requete_sql, array &$dVueEreur)
    {
        if (empty($requete_sql)) {
            $dVueEreur[] = "La requête SQL ne peut pas être vide.";
            return;
        }


        // Vérification stricte pour permettre seulement les requêtes SELECT
        if (stripos(trim($requete_sql), 'SELECT') !== 0) {
            $dVueEreur[] = "Seules les requêtes SELECT sont autorisées.";
            return;
        }

        // Validation des mots-clés interdits
        $requete_interdite = ['DROP', 'DELETE', 'UPDATE', 'INSERT', 'ALTER', 'TRUNCATE', 'EXEC', 'UNION'];
        foreach ($requete_interdite as $cmd) {
            if (stripos($requete_sql, $cmd) !== false) {
                $dVueEreur[] = "Le mot-clé $cmd est interdit pour des raisons de sécurité.";
                return;
            }
        }

    }

    public static function val_creation_formulaire(array &$dVueErreur, string $titre, string $description, string $sqlCommand, int $nivExpert, int $nivInter, string $solution, string $indice)
{
    if (!isset($titre) || trim($titre) === "") {
        $dVueErreur['titre'] = "Titre manquant";
    } else {
        // Filtrage des caractères spéciaux pour éviter les injections de code
        $titre = htmlspecialchars($titre, ENT_QUOTES, 'UTF-8');
    }

    if (!isset($description) || trim($description) === "") {
        $dVueErreur['description'] = "Description manquante";
    } else {
        // Filtrage des caractères spéciaux pour éviter les injections de code
        $description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
    }

    if (!isset($nivInter) || $nivInter <= 0) {
        $dVueErreur['nivInter'] = "Niveau intermédiaire invalide (doit être un entier strictement supérieur à 0)";
    }

    if (!isset($nivExpert) || $nivExpert <= 0) {
        $dVueErreur['nivDiff'] = "Niveau expert invalide (doit être un entier strictement supérieur à 0)";
    }

    if (!isset($solution) || trim($solution) === "") {
        $dVueErreur['solution'] = "Solution manquante";
    } else {
        // Filtrage des caractères spéciaux pour éviter les injections de code
        $solution = htmlspecialchars($solution, ENT_QUOTES, 'UTF-8');
    }

    if (!isset($indice) || trim($indice) === "") {
        $dVueErreur['indice'] = "Indice manquant";
    } else {
        // Filtrage des caractères spéciaux pour éviter les injections de code
        $indice = htmlspecialchars($indice, ENT_QUOTES, 'UTF-8');
    }

    if (!isset($sqlCommand) || trim($sqlCommand) === "") {
        $dVueErreur['sqlCommand'] = "Commande SQL manquante";
    } else {
        // Filtrage des caractères spéciaux
        $sqlCommand = htmlspecialchars($sqlCommand, ENT_QUOTES, 'UTF-8');
    }
}

}    
?>

        