<?php

class NewsGateway {

    private $con;

    public function __construct(Connection $con) {
        $this->con = $con;
    }

    /*
     * Fonction: insertRSSArray($rssArray)
     * Utilité: Permet l'insertion d'un tableau d'objet RSS dans la BDD associé (NEWS1)
     * Argument: rssArray, tableau contenant des objets RSS
     * Retour: null, eventuellement booleen
     */

    public function insertRSSArray($rssArray) {
        global $rep, $vues;
        try {
            foreach ($rssArray as $rssItem) {
                $this->insert($rssItem);
            }
        } catch (PDOException $exc) {
            $dataVueErreur = $exc->getTraceAsString().': Probleme avec la fonction insertRSSArray() ';
            require($rep . $vues['erreur']);
        }
    }

    /*
     * Fonction: insert($RSSitem)
     * Utilité: Permet l'insertion d'un objet RSS dans la BDD associ (NEWS1)
     * Argument: RSSitem, objet RSS
     * Retour: null, eventuellement booleen
     */

    public function insert($RSSitem) {
        global $rep, $vues;
        try {
            $query = "INSERT INTO news1(`title`, `description`, `link`, `guid`, `pubdate`, `category`) VALUES(:title,:description,:link,:guid,STR_TO_DATE(:pubDate, '%a, %d %b %Y %H:%i:%s GMT'),:category);";
            $this->con->executeQuery($query, array(':title' => array($RSSitem->getTitle(), PDO::PARAM_STR),
                ':description' => array($RSSitem->getDescription(), PDO::PARAM_STR),
                ':link' => array($RSSitem->getLink(), PDO::PARAM_STR),
                ':guid' => array($RSSitem->getGuid(), PDO::PARAM_STR),
                ':pubDate' => array($RSSitem->getPubDate(), PDO::PARAM_STR),
                ':category' => array($RSSitem->getCategory(), PDO::PARAM_STR)));
            return $this->con->lastInsertId();
        } catch (PDOException $pdoexcpt) {
            $dataVueErreur = $exc->getTraceAsString().': Probleme avec la fonction insert() ';
            require($rep . $vues['erreur']);
        }
    }

    /*
     * Fonction: Test connexion 
     * Utilité: Fonction permettant de tester la connection avec la BDD
     * Argument: null
     * Retour: null
     */

    public function getNews() {
        global $rep, $vues;
        try {
            $stmt = $this->con;
            $query = 'SELECT * FROM news1;';
            $req = $stmt->executeQuery($query);
            $result = $stmt->getResults();
            foreach ($result as $news) {
                $tab_news[] = new News($news['id'],$news['title'], $news['description'], $news['link'], $news['guid'], $news['pubdate'], $news['category']);
            }
            return $tab_news;
        } catch (PDOException $exc) {
            $dataVueErreur = $exc->getTraceAsString().': Probleme avec la fonction getNews() ';
            require($rep . $vues['erreur']);
        }
    }

    public function getNewsPage($nbArticle, $perPage) {
        global $rep, $vues;
        try {
            $stmt = $this->con;
            $query = 'SELECT * FROM news1 LIMIT :nbArticle , :perPage;';
            $req = $stmt->executeQuery($query, array(':nbArticle' => array($nbArticle, PDO::PARAM_INT), ':perPage' => array($perPage, PDO::PARAM_INT)));
            $result = $stmt->getResults();
            foreach ($result as $news) {
                $tab_news[] = new News($news['id'],$news['title'], $news['description'], $news['link'], $news['guid'], $news['pubdate'], $news['category']);
            }
            return $tab_news;
        } catch (PDOException $exc) {
            $dataVueErreur = $exc->getTraceAsString().': Probleme avec la fonction getNewsPage() ';
            require($rep . $vues['erreur']);
        }
    }

    public function eraseAllNews() {
        global $rep, $vues;
        try {
            $stmt = $this->con;
            $query = 'DELETE FROM news1 WHERE 1;';
            $stmt->executeQuery($query);
        } catch (PDOException $exc) {
            $dataVueErreur = $exc->getTraceAsString().': Probleme avec la fonction eraseAllNews() ';
            require($rep . $vues['erreur']);
        }
    }

    public function erase($id) {
        global $rep, $vues;
        try {
            $stmt = $this->con;
            $query = 'DELETE FROM news1 WHERE id=:id;';
            $stmt->executeQuery($query, array(':id' => array($id, PDO::PARAM_STR)));
        } catch (PDOException $exc) {
            $dataVueErreur = $exc->getTraceAsString().': Probleme avec la fonction erase() ';
            require($rep . $vues['erreur']);
        }
    }

    public function getNbNews() {
        global $rep, $vues;
        try {
            $stmt = $this->con;
            $query = 'SELECT COUNT(*) FROM news1';
            $stmt->executeQuery($query);
            $nbnews = $stmt->getResults();
            return $nbnews[0] ? $nbnews[0] : '0';
        } catch (PDOException $exc) {
            $dataVueErreur = $exc->getTraceAsString().': Probleme avec la fonction getNbNews() ';
            require($rep . $vues['erreur']);
        }
    }

    public function findNews($textToSearch) {
        global $rep, $vues;
        try {
            $stmt = $this->con;
            $query = 'SELECT * FROM news1 WHERE title LIKE :textToSearch;';
            $stmt->executeQuery($query, array(':textToSearch' => array('%' . $textToSearch . '%', PDO::PARAM_STR)));
            $findedNews = $stmt->getResults();
            foreach ($findedNews as $news) {
                $tab_news[] = new News($news['id'],$news['title'], $news['description'], $news['link'], $news['guid'], $news['pubdate'], $news['category']);
            }
            return $tab_news ? $tab_news : '0';
        } catch (PDOException $exc) {
            $dataVueErreur = $exc->getTraceAsString().': Probleme avec la fonction findNews() ';
            require($rep . $vues['erreur']);
        }
    }

}

?>