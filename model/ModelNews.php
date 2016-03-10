<?php

class ModelNews {

    public static function getALLNews() {
        $newsGateway = new NewsGateway(new Connection());
        return $newsGateway->getNews();
    }

    public static function getNews($nbArticle, $perPage) {
        $newsGateway = new NewsGateway(new Connection());
        return $newsGateway->getNewsPage($nbArticle, $perPage);
    }

    public static function searchInNews($text) {
        $newsGateway = new NewsGateway(new Connection());
        return $newsGateway->findNews($text);
    }

    public static function getNbNews() {
        $newsGateway = new NewsGateway(new Connection());
        return $newsGateway->getNbNews();
    }

    public static function insertAllNews($rssArray) {
        $nwGt = new NewsGateway(new Connection());
        $nwGt->insertRSSArray($rssArray);
    }

}

?>