<?php

class AdminController {

    public function __construct($action) {
        global $rep, $vues, $newsParPage, $dataVueErreur;
        try {
            switch ($action) {
                case 'disconnect':
                    self::disconnect();
                    require($rep . $vues['acceuil']);
                    break;
                case 'update':
                    self::update();
                    require($rep . $vues['acceuil']);
                    break;
                case 'formulaire':
                    require($rep . $vues['admin']);
                    break;
                case 'deleteBDD':
                    self::deleteBDD();
                    require($rep . $vues['admin']);
                    break;
                case 'delete':
                    self::delete();
                    require($rep . $vues['acceuil']);
                    break;
                default:
                    //$tabNews = self::listerNews();
                    break;
            }
        } catch (Exception $ex) {
            $dataVueErreur = 'Erreur survenue durant ' . $action;
            require($rep . $vues['erreur']);
        }
    }

    public static function disconnect() {
        ModelAdmin::Deconnection($adm);
    }

    public static function update() {
        global $rep, $vues, $dataVueErreur;
        $urlRSS = isset($_POST['fluxRSS']) ? $_POST['fluxRSS'] : NULL;
        $urlRSS = Sanitize::sanitizeItem($urlRSS, 'url');
        if (validation::validateItem($urlRSS, 'url')) {
            try {
                $arrayOfNews = Reader::parseurXML($urlRSS);
                ModelNews::insertAllNews($arrayOfNews);
            } catch (Exception $ex) {
                require($rep . $vues['erreur']);
                echo 'Probleme lors de la mise a jour du flux RSS';
            }
        } else {
            $dataVueErreur = 'Le flux RSS est vide';
            require($rep . $vues['erreur']);
        }
    }

    public static function deleteBDD() {
        ModelAdmin::eraseBDD();
    }

    public static function delete() {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : NULL;      
        $id = Sanitize::sanitizeItem($id, 'string');
        ModelAdmin::erase($id);
    }

}

?>