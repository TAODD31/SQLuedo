<?php


namespace controleur;

use modeles\MDLUser;
use AltoRouteur\AltoRouteur;
use Exception;

class frontControlleur
{

    public function __construct()
    {
        global $vues,$twig;
        $dVueErreur = [];
        session_start();

        try {
            require_once('ctrlUser.php');
            require_once('ctrlAdmin.php');

            $routeur = new AltoRouteur();
            $routeur->setBasePath('SQLuedo/src/');

            $routeur->map('GET', '/', 'ctrlUser');
            $routeur->map('GET', '/index.php', 'ctrlUser'); 
            $routeur->map('GET|POST', '/index/[a:action]?', 'ctrlUser');
            $routeur->map('GET|POST', '/[a:action]?', 'ctrlUser'); 
            $routeur->map('GET|POST', '/index/[i:id]/[a:action]?', 'ctrlUser');

            $routeur->map('GET|POST', '/admin/[a:action]?', 'ctrlAdmin');

            $match = $routeur->match();

            if (!$match) {
                echo 'Error 404';
                die;
            }
            $controlleur = $match['target'];
            $action = $match['params']['action'] ?? 'default';

//            $mld = new MDLUser();
//            $username = $_REQUEST['username'] ?? '';
//            $Admin = $mld->IsAdmin($username);
            switch ($controlleur) {
                case 'ctrlUser':
                    $controlleur = '\\Controleur\\' . $controlleur;
                    $controlleur = new $controlleur;
                        if (is_callable(array($controlleur, $action))) {
                           call_user_func_array(array($controlleur, $action), array($match['params']));
                        }
                    break;
                    case 'ctrlAdmin':
                        $controlleur = '\\Controleur\\' . $controlleur;
                        $controlleur = new $controlleur;
                        if ($_SESSION['role'] == 'admin') {
                            if (is_callable(array($controlleur, $action))) {
                                call_user_func_array(array($controlleur, $action), array($match['params']));
                            }
                        } else {
                            $dVueErreur[] = "Accès refusé. Vous devez être administrateur.";
                            echo $twig->render('erreur.html', ['errors' => $dVueErreur]);
                        }
                        break;
                default:
                    $dVueErreur[] = "La page demandée n'existe pas";
                    echo $twig->render('erreur.html',['errors' => $dVueErreur]);
            }
        } catch (Exception $e) {
            $dVueErreur[] = $e->getMessage();
            echo $twig->render('erreur.html',['errors' => $dVueErreur]);
        }


    }
}