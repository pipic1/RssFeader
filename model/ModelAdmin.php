<?php

class ModelAdmin {

    public static function Connection($login, $mdp) {
        //session_start();
        $admGT = new AdminGateway(new Connection());
        $admin = $admGT->isAdmin($login, $mdp);
        if ($admin) {
            $_SESSION['role'] = 'admin';
            $_SESSION['login'] = $login;
        }
        return $admin;
    }

    public static function Deconnection() {
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    public static function isAdmin() {

        if (isset($_SESSION['role']) == 'admin') {
            $_SESSION['role']= Sanitize::sanitizeItem($_SESSION['role'], 'string');
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public static function eraseBDD() {
        $ng = new NewsGateway(new Connection());
        $ng->eraseAllNews();
    }

    public static function erase($id) {
        $ng = new NewsGateway(new Connection());
        $ng->erase($id);
    }

}

?>