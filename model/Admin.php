<?php

class Admin {

    private $pseudo;
    private $password;

    public function __construct($login, $pass) {
        $this->pseudo = $login;
        $this->password = $pass;
    }

    public function getPseudo() {
        return $this->pseudo;
    }

}

?>