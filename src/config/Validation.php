<?php
namespace config;
class Validation {

    static public function valForm(string $nom, string $mdp): int {
        $optionsNom = ["regexp" => "/^[a-zA-Z0-9]+$/"]; // contient que des lettres et des chiffres
        $optionsMdp = ["regexp" => "/^[a-zA-Z0-9&#\-_@=+*%\$€!]+$/"]; // contient lettres, chiffres, et caracteres & # - _ @ = + * % $ € !

        if (!isset($nom) || !filter_var($nom, FILTER_VALIDATE_REGEXP, ["options" => $optionsNom]) || strlen($nom) < 4) //nom non nul, conforme regexNOM, et est plus long que 4 caractères
        {
            return 1;
        }

        elseif (!isset($mdp) || !filter_var($mdp, FILTER_VALIDATE_REGEXP, ["options" => $optionsMdp]) || strlen($mdp) < 6) { //mdp non nul, conforme regexMDP, et est plus long que 6 caractères
            return 2;
        }
        else {
            return 0;
        }

    }

    static public function val_Grp(array &$dVueErreur ,string &$nom, string &$code, string &$createur): void
    {
        $optionsNomMdpGrp = ["regexp" => "/^[a-zA-Z0-9_]+$/"]; // contient que des lettres et des chiffres et underscore

        if (!isset($nom) || !filter_var($nom, FILTER_VALIDATE_REGEXP, ["options" => $optionsNomMdpGrp]) || strlen($nom) < 4)
        {
            $dVueErreur["nom"] = "Le nom du groupe est mal ecrit";
        }

        if (!isset($code) || !filter_var($code, FILTER_VALIDATE_REGEXP, ["options" => $optionsNomMdpGrp]) || strlen($code) < 6 || strlen($code) > 8)
        {
            $dVueErreur["code"] = "Le code du groupe est non conforme";
        }

    }

    static public function validation_Nom(String $nom):string
    {
        $optionsNomMdpGrp = ["regexp" => "/^[a-zA-Z0-9_]+$/"]; // contient que des lettres et des chiffres et underscore
        //filter_var($nom, FILTER_VALIDATE_REGEXP, ["options" => $optionsNomMdpGrp]);
        return filter_var($nom, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    static public function validation_session_nom(string $chaine):string
    {
        $optionsNom = ["regexp" => "/^[a-zA-Z0-9]+$/"];
        return filter_var($chaine, FILTER_VALIDATE_REGEXP, ["options" => $optionsNom]) ;
    }

    static public function validation_session_groupe(string $chaine):string
    {
        $optionsNomMdpGrp = ["regexp" => "/^[a-zA-Z0-9_]+$/"];
        return filter_var($chaine, FILTER_VALIDATE_REGEXP, ["options" => $optionsNomMdpGrp]) ;
    }


}
?>

