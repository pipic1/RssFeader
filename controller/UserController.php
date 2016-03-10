<?php

class UserController {

    public function __construct($action) {
        global $rep, $vues, $dataVueErreur;
        try {
            switch ($action) {
                case NULL:
                    $tabNews = self::listerNews();
                    require($rep . $vues['acceuil']);
                    break;
                case 'consult':
                    $tabNews = self::listerNews();
                    require($rep . $vues['acceuil']);
                    break;
                case 'connect':
                    require($rep . $vues['connect']);
                    break;
                case 'connexion':
                    self::connect();
                    break;
                case 'getPage':
                    $tabNews = self::getPage();
                    require($rep . $vues['acceuil']);
                    break;
                case 'search':
                    $tabNews = self::search();
                    require($rep . $vues['acceuil']);
                    break;
                default:
                    $tabNews = self::listerNews();
                    break;
            }
        } catch (Exception $ex) {
            $dataVueErreur = 'Probleme survenue durant ' . $action . ', en tant qu utilisateur lambda';
            require($rep . $vues['erreur']);
        }
    }

    //public static  reinit(){        
    //}

    public static function listerNews() {
        global $rep, $vues;
        try {
            $news = ModelNews::getALLNews();
            return $news;
            //$adm=  \model\AdminGateway::isAdmin();
        } catch (Exception $ex) {
            require($rep . $vues['erreur']);
        }
    }

    public static function connect() {
        global $rep, $vues;
        $login = isset($_POST['login']) ? $_POST['login'] : null;
        $pass = isset($_POST['password']) ? $_POST['password'] : null;
        $login=  Sanitize::sanitizeItem($login, 'string');
        $pass=  Sanitize::sanitizeItem($pass, 'string');
        //Valider
        try {
            if (ModelAdmin::Connection($login, $pass)) {
                require($rep . $vues['admin']);
            } else {
                require($rep . $vues['connect']);
            }
        } catch (Exception $ex) {
            require($rep . $vues['erreur']);
        }
    }

    /*    public static function getNbNews() {
      try {
      $nb_news = ModelNews::getALLNews();
      return $nb_news;
      } catch (Exception $ex) {

      }
      } */

    public static function getPage() {
        global $newsParPage, $rep, $vues;
        $pageActuelle = isset($_REQUEST['page']) ? $_REQUEST['page'] : '0';
        $pageActuelle = Sanitize::sanitizeItem($pageActuelle, 'string');
        try {
            $newsNumber = ($pageActuelle - 1) * $newsParPage;
            $news = ModelNews::getNews($newsNumber, $newsParPage);
            return $news;
        } catch (Exception $ex) {
            require($rep . $vues['erreur']);
        }
    }

    public static function search() {
        global $rep, $vues;
        $searchText = isset($_POST['searchtext']) ? $_POST['searchtext'] : null;
        $searchText = Sanitize::sanitizeItem($searchText, 'string');
        try {
            $findedNews = ModelNews::searchInNews($searchText);
            return $findedNews;
        } catch (Exception $ex) {
            require($rep . $vues['erreur']);
        }
    }

}

?>
