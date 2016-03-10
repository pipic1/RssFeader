<?php

class Connection extends PDO {

    //CREATE USER 'pipic1'@'%' IDENTIFIED BY '***';GRANT ALL PRIVILEGES ON *.* TO 'pipic1'@'%' IDENTIFIED BY '***' WITH GRANT OPTION MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;GRANT ALL PRIVILEGES ON `mysql`.* TO 'pipic1'@'%';
    private $DSN = '';
    private $Server = '';
    private $DBname = '';
    private $User = '';
    private $Password = '';
    public $db = '';
    private $stmt = '';

    public function __construct($server = 'localhost', $dbname = 'phpbdd', $user = 'root', $password = 'toor') {
        //Assignation des attributs
        $this->DBname = $dbname;
        $this->User = $user;
        $this->Password = $password;
        $this->Server = $server;
        $this->DSN = 'mysql:host=' . $this->Server . ';dbname=' . $this->DBname . '';

        parent::__construct($this->DSN, $this->User, $this->Password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->db;
    }

    public function executeQuery($query, array $parameter = []) {
        $this->stmt = parent::prepare($query);
        foreach ($parameter as $name => $value) {
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }
        return $this->stmt->execute();
    }

    public function getResults() {
        return $this->stmt->fetchall();
    }

}

?>