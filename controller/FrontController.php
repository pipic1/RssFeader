<?php

class FrontController {

    public function __construct() {
        global $rep, $vues, $listActionAdmin, $dataVueErreur;
        session_start();

        try {
            if (isset($_REQUEST['action'])) {
                $action = Sanitize::sanitizeItem($_REQUEST['action'],'string');
                if (in_array($action, $listActionAdmin)) {
                    if (ModelAdmin::isAdmin()) {
                        new AdminController($action);
                    } else {
                        new UserController('connect');
                    }
                } else {
                    new UserController($action);
                }
            } else {
                $dataVueErreur = 'action est null';
                require($rep . $vues['erreur']);
            }
        } catch (Exception $exception) {
            echo $exception->getTraceAsString();
        }
    }

}
?>

