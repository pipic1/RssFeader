<?php

class Reader {

    public static function parseurXML($fichier) {
        global $rep, $vues;
        $balises = ["title", "description", "link", "guid", "pubDate", "category"];
        $chaine = file_get_contents($fichier, true);
        if($chaine!=NULL){
            $fluxrss1 = preg_split("/<\/?" . "item" . ">/", $chaine); //suppression de la balise ITEM.
            $tabRSS = self::readXMLitem($fluxrss1, $balises);
            $newsArray = self::addItemNews($tabRSS);
            return $newsArray;
        } else {
            require($rep . $vues['erreur']);
            echo 'Probleme survenue lors du parsage XML';
        }
    }

    public static function readXMLitem($fluxrss, $balises) {
        for ($i = 1; $i < sizeof($fluxrss) - 1; $i+=2) {
            foreach ($balises as $balise) {
                $rssObject = preg_split("/<\/?" . $balise . ">/", $fluxrss[$i]);
                $tabRSS[$i - 1][] = @$rssObject[1];
            }
        }
        return $tabRSS;
    }

    public static function addItemNews($rssArray) {
        foreach ($rssArray as $rssItem) {
            $arrayOfNews[] = new News(0,$rssItem[0], $rssItem[1], $rssItem[2], $rssItem[3], $rssItem[4], $rssItem[5]);
        }
        return $arrayOfNews;
    }

}
