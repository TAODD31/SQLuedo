<?php

namespace controleur;

use modeles\MDLGroupe;
use modeles\MDLUser;
use modeles\MDLEnquete;
use config\ValidationJeu;
use modeles\MDLStatistique;
use config\Validation;

class ctrlUser
{
    public function pageConnexionProfil()
    {
        global $twig;
        $model = new MDLStatistique();

        if(isset($_SESSION['username']) && Validation::validation_session_nom($_SESSION['username']))
            $username = $_SESSION['username'];
        else $username = NULL;

        if (isset($_SESSION['groupe']) && Validation::validation_session_groupe($_SESSION['groupe']))
            $groupe = $_SESSION['groupe'];
        else $groupe = NULL;

        if (isset($_SESSION['codeGroupe']) && Validation::validation_session_groupe($_SESSION['codeGroupe']))
            $codeGroupe = $_SESSION['codeGroupe'];
        else $codeGroupe = NULL;

        if (!isset($username) || $username == '') {
            echo $twig->render('connexionProfil.html');
        } else {
            echo $twig->render('profil.html', ['nom' => $username,
                'statistiques' => $model->afficherStat($username), 'groupe' => $groupe, 'codeGroupe' => $codeGroupe]);
        }
    }

    public function pageInscription()
    {
        global $twig;
        $model = new MDLStatistique();

        if(isset($_SESSION['username']) && Validation::validation_session_nom($_SESSION['username']))
            $username = $_SESSION['username'];
        else $username = NULL;

        if ($username == NULL) {
            echo $twig->render('inscription.html');
        } else {
            echo $twig->render('profil.html', ['nom' => $username,
                'statistiques' => $model->afficherStat($username)]);
        }
    }

    public function pageGroupe()
    {
        global $twig;
        $model = new MDLStatistique();

        if(isset($_SESSION['username']) && Validation::validation_session_nom($_SESSION['username']))
            $username = $_SESSION['username'];
        else $username = NULL;

        if (isset($_SESSION['groupe']) && Validation::validation_session_groupe($_SESSION['groupe']))
            $groupe = $_SESSION['groupe'];
        else $groupe = NULL;

        if (isset($_SESSION['codeGroupe']) && Validation::validation_session_groupe($_SESSION['codeGroupe']))
            $codeGroupe = $_SESSION['codeGroupe'];
        else $codeGroupe = NULL;

            echo $twig->render('profil.html', ['nom' => $username,
            'statistiques' => $model->afficherStat($username), 'groupe' => $groupe, 'codeGroupe' => $codeGroupe]);
    }

    public function VerifInfosConnexion()
    {
        global $twig;
        $model = new MDLStatistique();
        $dVueErreur = array();
        $nomUser = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $mdlU = new MDLUser();
        $mdlG = new MDLGroupe();
        $result = $mdlU->VerifInfosConnexion($nomUser, $password);
        if ($result == NULL || $result->getNom() != $nomUser) { // l'utilisateur n'existe pas
            $dVueErreur[] = "Nom d'utilisateur ou mot de passe incorrect";
            echo $twig->render('connexionProfil.html', ['dVueErreur' => $dVueErreur]);
        } else if ($result->getNom() == $nomUser) { // cas où $result['mdp'] == $password  et $result['nomUser'] == $nomUser
            $_SESSION['username'] = $nomUser;
            $_SESSION['groupe'] = $mdlG->FindGroupByUser($nomUser); //va chercher si il est dans un groupe

            if (isset($_SESSION['groupe']) && Validation::validation_session_groupe($_SESSION['groupe']))
                $groupe = $_SESSION['groupe'];
            else $groupe = NULL;

            if ($groupe != NULL) {
                $_SESSION['codeGroupe'] = $mdlG->GetCodeGroupe($groupe);
                echo $twig->render('profil.html', ['nom' => $_SESSION['username'], 'statistiques' => $model->afficherStat($_SESSION['username']), 'groupe' => $_SESSION['groupe'], 'codeGroupe' => $_SESSION['codeGroupe']]);
                return;
            }
            echo $twig->render('profil.html', ['nom' => $_SESSION['username'], 'statistiques' => $model->afficherStat($_SESSION['username']), 'groupe' => NULL, 'codeGroupe' => NULL]);
            return;
        }

        $dVueErreur[] = "Probleme de verification lors de l'authentification";
        echo $twig->render('erreur.html', ['errors' => $dVueErreur]);
    }

    public function inscription()
    {
        global $twig;
        $model = new MDLStatistique();
        $dVueErreur = array();
        $nomUser = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $mdl = new MDLUser();
        $resultValid = Validation::valForm($nomUser, $password);
        $resultExist = $mdl->ExistUser($nomUser);

        if ($resultValid == 1) { // le nom est mal écrit
            $dVueErreur[] = "Le nom d'utilisateur est mal écrit. IL doit être d'au moins 4 caractères et contienir que des lettres ou des chiffres.";
            echo $twig->render('inscription.html', ['dVueErreur' => $dVueErreur]);
        } elseif ($resultValid == 2) { // le mdp est mal écrit
            $dVueErreur[] = "Le mot de passe est non conforme. Il doit être d'au moins 6 caractères et contenir que des lettres, des chiffres, et les caracteres & # - _ @ = + * % $ €";
            echo $twig->render('inscription.html', ['dVueErreur' => $dVueErreur]);
        } elseif ($resultExist) { //nom d'utilisateur existe deja
            $dVueErreur[] = "Le nom d'utilisateur existe déjà ";
            echo $twig->render('inscription.html', ['dVueErreur' => $dVueErreur]);
        } else {
            $mdl->CreateUser($nomUser, $password);
            echo $twig->render('profil.html', ['nom' => $_SESSION['username'],
                'statistiques' => $model->afficherStat($_SESSION['username'])]);
        }
    }

    function AffCreationGroupe()
    {
        global $twig;
        echo $twig->render('creerGroupe.html');
    }

    function CreerGroupe()
    {
        global $twig;
        $model = new MDLStatistique();
        $dVueErreur = array();
        $nomGrp = $_POST['nom'];
        $codeGrp = $_POST['code'];

        $createurGrp = $_SESSION['username'];

        $mdl = new MDLGroupe();
        Validation::val_Grp($dVueErreur, $nomGrp, $codeGrp, $createurGrp);
        $existGrp = $mdl->ExistGroupe($nomGrp);
        if ($_SESSION['groupe'] != NULL) {
            $dVueErreur["nom"] = "Vous êtes déjà dans un groupe, quittez-le avant d'en créer un autre";
            echo $twig->render('creerGroupe.html', ['dVueErreur' => $dVueErreur]);
            return;
        }
        // Ajouter le message d'erreur si le groupe existe déjà
        if ($existGrp) {
            $dVueErreur["nom"] = "Le groupe existe déjà";
            echo $twig->render('creerGroupe.html', ['dVueErreur' => $dVueErreur]);
            return;
        }

        if (!empty($dVueErreur)) {
            echo $twig->render('creerGroupe.html', ['dVueErreur' => $dVueErreur]);
        } else {
            $mdl->insertGroupe($nomGrp, $codeGrp, $createurGrp, 1);
            $mdl->RejoindreGroupe($nomGrp, $createurGrp);
            $_SESSION['groupe'] = $nomGrp;
            $_SESSION['codeGroupe'] = $codeGrp;
            echo $twig->render('profil.html', ['nom' => $_SESSION['username'],
                'statistiques' => $model->afficherStat($_SESSION['username']), 'groupe' => $_SESSION['groupe'], 'codeGroupe' => $_SESSION['codeGroupe']]);
        }
    }

    function RejoindreGroupe()
    {
        global $twig;
        $model = new MDLStatistique();

        $VnomGrp = $_SESSION['groupe'] ?? NULL;
        $user = $_SESSION['username'];
        $nomGrp = $_POST['nomGroupe'];
        $code = $_POST['codeGroupe'];
        $mdl = new MDLGroupe();

        if ($VnomGrp != NULL) {
            $dVueErreur['dejaDansGroupe'] = "Vous appartenez déjà à un groupe";
            echo $twig->render('rejoindreGroupe.html', ['dVueErreur' => $dVueErreur]);
            return;
        }

        $grp = $mdl->FindGroupe($nomGrp);
        if ($grp == NULL) {
            $dVueErreur['groupeExistant'] = "Groupe innexistant";
            echo $twig->render('rejoindreGroupe.html', ['dVueErreur' => $dVueErreur]);
        } elseif ($code != $grp->getCode()) {
            $dVueErreur['code'] = "Mauvais code";
            echo $twig->render('rejoindreGroupe.html', ['dVueErreur' => $dVueErreur]);
        } else {
            $mdl->RejoindreGroupe($nomGrp, $user);
            $codeGrp = $mdl->GetCodeGroupe($nomGrp);
            $_SESSION['groupe'] = $nomGrp;
            $_SESSION['codeGroupe'] = $codeGrp;
            echo $twig->render('profil.html', ['nom' => $_SESSION['username'], 'statistiques' => $model->afficherStat($_SESSION['username']), 'groupe' => $_SESSION['groupe'], 'codeGroupe' => $_SESSION['codeGroupe']]);
        }
    }

    function AffRejoindreGroupe(): void
    {
        global $twig;
        echo $twig->render('rejoindreGroupe.html');
    }

    function QuitterGroupe()
    {
        global $twig;

        $VnomGrp = $_SESSION['groupe'] ?? NULL;
        $user = $_SESSION['username'];
        $mdl = new MDLGroupe();
        $model = new MDLStatistique();

        if ($VnomGrp == NULL) {
            $dVueErreur[] = "N'appartient pas a un groupe";
            echo $twig->render('profil.html', ['nom' => $_SESSION['username'],
                'statistiques' => $model->afficherStat($_SESSION['username']),
                'dVueErreur' => $dVueErreur]);
            return;
        }
        $grp = $mdl->FindGroupe($VnomGrp);
        if ($grp == NULL) {
            $dVueErreur[] = "Erreur : aucun groupe lié en base de données";
            echo $twig->render('profil.html', ['nom' => $_SESSION['username'],
                'statistiques' => $model->afficherStat($_SESSION['username']),
                'dVueErreur' => $dVueErreur]);
        } elseif ($user == $grp->getCreateur()) {
            $mdl->SuppAllUser($VnomGrp);
            $mdl->DelGroupe($VnomGrp, $user);
            $_SESSION["groupe"] = NULL;
            echo $twig->render('profil.html', ['nom' => $_SESSION['username'],
                'statistiques' => $model->afficherStat($_SESSION['username'])]);
        } else {
            $mdl->QuitterGroupe($VnomGrp, $user);
            $_SESSION["groupe"] = NULL;
            echo $twig->render('profil.html', ['nom' => $_SESSION['username'],
                'statistiques' => $model->afficherStat($_SESSION['username'])]);
        }
    }

    function deconnection(): void
    {
        session_unset();
        session_destroy();
        $_SESSION = array();
        $this->default();
    }

    public function default(): void
    {
        global $twig;
        $model = new \modeles\MDLEnquete();
        echo $twig->render('accueil.html', [
            'enquetes' => $model->getEnquete(),
            'session' => $_SESSION['role'] ?? null
        ]);
    }

    public function vueJeu(array $params): void
    {
        global $twig;
        $dVueErreur = [];
        try {
            $idEnquete = $params['id'] ?? null;

            if ($idEnquete === null) {
                throw new \Exception("L'ID de l'enquête est manquant.");
            }

            $enqueteModel = new MDLEnquete();
            $enquete = $enqueteModel->afficheEnquete($idEnquete);

            echo $twig->render('vueJeu.html', ['enquete' => $enquete]);

        } catch (\Exception $e) {
            $dVueErreur[] = $e->getMessage();
            echo $twig->render('erreur.html', ['errors' => $dVueErreur]);
        }
    }


    function ValidationJeuFormulaireExecution()
    {
        global $twig;

        $dVueErreur = [];
        $requete_sql = $_POST['requete_sql'] ?? '';
        $nomUtilisateur = $_SESSION['username'] ?? '';

        $requestUri = $_SERVER['REQUEST_URI'];
        $urlSegments = explode('/', $requestUri);
        $idEnquete = intval($urlSegments[4]);

        $_SESSION['idEnquete'] = $idEnquete;

        ValidationJeu::val_form_exe($requete_sql, $dVueErreur);
        $dVue = [];

        if (count($dVueErreur) === 0) {
            try {
                $modelEnquete = new \modeles\MDLEnquete();
                $nomDatabase = $modelEnquete->getDatabaseName($idEnquete);

                if ($nomDatabase) {
                    $statistiqueModel = new \modeles\MDLStatistique();
                    $statistiqueModel->incrementerNbCoup($idEnquete, $nomUtilisateur);

                    $resultat = $modelEnquete->resultatEnquete($requete_sql, $nomDatabase);

                    if (is_array($resultat)) {
                        foreach ($resultat as &$row) {
                            $row = array_filter($row, 'is_string', ARRAY_FILTER_USE_KEY);
                        }
                        echo $twig->render('vueJeu.html', ['dVue' => ['resultats' => $resultat]]);
                        exit;
                    } else {
                        $dVueErreur[] = $resultat;
                        echo $twig->render('vueJeu.html', ['dVueErreur' => $dVueErreur]);
                        exit;
                    }
                } else {
                    $dVueErreur[] = "Nom de la base de données introuvable.";
                    echo $twig->render('vueJeu.html', ['dVueErreur' => $dVueErreur]);
                    exit;
                }
            } catch (\Exception $e) {
                $dVueErreur[] = "Une erreur est survenue : " . $e->getMessage();
                echo $twig->render('vueJeu.html', ['dVueErreur' => $dVueErreur]);
                exit;
            }
        } else {
            echo $twig->render('vueJeu.html', ['dVueErreur' => $dVueErreur]);
            exit;
        }
    }


    function ValidationJeuFormulaireVerifier()
    {
        global $twig;
        $dVueErreur = [];
        $reponse = $_POST['reponse_utilisateur'] ?? '';
        $requestUri = $_SERVER['REQUEST_URI'];
        $urlSegments = explode('/', $requestUri);
        $idEnquete = intval($urlSegments[4]);

        $_SESSION['idEnquete'] = $idEnquete;

        ValidationJeu::val_form_verif($reponse, $dVueErreur);
        if (count($dVueErreur) === 0) {
            try {
                $modelEnquete = new \modeles\MDLEnquete();
                $solutionCorrecte = $modelEnquete->getSolution($idEnquete);

                if (strcasecmp($solutionCorrecte, $reponse) === 0) {
                    echo $twig->render('resultatjeu.html');
                    exit;
                } else {
                    $dVueErreur[] = "Ce n'est pas ça !";
                    echo $twig->render('vueJeu.html', ['dVueVerif' => $dVueErreur]);
                    exit;
                }
            } catch (\Exception $e) {
                $dVueErreur[] = "Une erreur est survenue lors de la vérification de la réponse : " . $e->getMessage();
                echo $twig->render('vueJeu.html', ['dVueVerif' => $dVueErreur]);
                exit;
            }
        } else {
            $dVueErreur[] = "Réponse utilisateur invalide";
            echo $twig->render('vueJeu.html', ['dVueVerif' => $dVueErreur]);
            exit;
        }
    }
}

?>
