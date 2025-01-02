<?php

namespace controleur;

use enquete\Exception;
use enquete\PDOException;
use modeles\MDLEnquete;
use config\ValidationJeu;

class ctrlAdmin
{
    public function default()
    {
        global $twig;
        $model = new \modeles\MDLEnquete();
        echo $twig->render('accueil.html', ['enquetes' => $model->getEnquete(),'session' => $_SESSION['role'] ?? null]);
    }

    public function afficherEnquete()
    {
        $id = $_POST['id'];
        $mdl = new MDLEnquete();
        $mdl->afficheEnquete($id);
    }

    public function afficherCreation(){
        global $twig;
        if($_SESSION['role'] == 'admin'){
            echo $twig->render('creationEnquete.html');
        }
        else{
            echo $twig->render('erreur.html',['error' => $dVueErreur]);
        }
    }

    public function creationEnquete() {
        global $twig;
        $dVueErreur = [];        
        $titre = $_POST['title'] ?? null;
        $description = $_POST['description'] ?? null;
        $sqlCommand = $_POST['sql_command'] ?? null;
        $nivExpert = $_POST['expert_attempts'] ?? null;
        $nivInter = $_POST['intermediate_attempts'] ?? null;
        $solution = $_POST['response'] ?? null;
        $indice = $_POST['hint'] ?? null;
        $imageName = "";
        ValidationJeu::val_creation_formulaire($dVueErreur, $titre, $description, $sqlCommand, $nivExpert, $nivInter, $solution, $indice);
        if (count($dVueErreur) === 0) {
            $nomCreateur = $_SESSION['username'] ?? 'anonyme';    
            try {
                (new MDLEnquete())->AjoutEnquete($titre, $description, $sqlCommand, $nivExpert, $nivInter, $solution, $indice, $imageName, $nomCreateur);
                echo $twig->render('accueil.html', ['enquetes' => (new \modeles\MDLEnquete())->getEnquete(), 'session' => $_SESSION['role'] ?? null]);
            } catch (\Exception $e) {
                $dVueErreur[] = $e->getMessage();
                echo $twig->render('creationEnquete.html', ['dVueErreur' => $dVueErreur, 'titre' => $titre, 'description' => $description, 'sqlCommand' => $sqlCommand, 'nivExpert' => $nivExpert, 'nivInter' => $nivInter, 'solution' => $solution, 'indice' => $indice]);
            }
        } else {
            echo $twig->render('creationEnquete.html', ['dVueErreur' => $dVueErreur, 'titre' => $titre, 'description' => $description, 'sqlCommand' => $sqlCommand, 'nivExpert' => $nivExpert, 'nivInter' => $nivInter, 'solution' => $solution, 'indice' => $indice]);
        }
    }
    
    
}   
    
    
    
