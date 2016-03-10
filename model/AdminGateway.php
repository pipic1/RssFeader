<?php

class AdminGateway {

    private $con;

    public function __construct(Connection $con) {
        $this->con = $con;
    }

    public function isAdmin($login, $mdp) {
        try {
            $stmt = $this->con;
            $query = 'SELECT * FROM users WHERE pseudo=:login AND password=:mdp;';
            $stmt->executeQuery($query, array(':login' => array($login, PDO::PARAM_STR), ':mdp' => array($mdp, PDO::PARAM_STR)));
            $res = $stmt->getResults();
            if ($res != NULL) {
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $pdoexcpt) {
            $dataVueErreur = $pdoexcpt->getTraceAsString() . ': Probleme avec la fonction findNews() ';
            require($rep . $vues['erreur']);
        }
    }

}

?>