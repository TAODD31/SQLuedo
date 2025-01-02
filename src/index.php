<?php
//ini_set('display_errors', 1);
//error_reporting(E_ALL);

use controleur\frontControlleur;


require_once(__DIR__.'/config/config.php');
require_once (__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/vendor/AltoRouteur.php');

$loader = new \Twig\Loader\FilesystemLoader('templates');

// Création de l'instance de Twig
$twig = new \Twig\Environment($loader, [
    'cache' => 'twig_cache', // Chemin vers le dossier de cache (peut être désactivé en mettant null)
    'debug' => true // Active le mode débogage si nécessaire
]);

$cont = new frontControlleur();
?>