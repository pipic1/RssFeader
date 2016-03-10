<?php

class News {
    private $Id;
    private $Title;
    private $Description;
    private $Link;
    private $Guid;
    private $PubDate;
    private $Category;

    function __construct($id= 0 ,$title, $description, $link, $guid, $pubDate, $category) {
        $this->Id=$id;
        $this->Title = $title;
        $this->Description = $description;
        $this->Link = $link;
        $this->Guid = $guid;
        $this->PubDate = $pubDate;
        $this->Category = $category;
    }

    /*
     * GETTER
     */
    public function getID(){
        return $this->Id;
    }

    public function getTitle() {
        return $this->Title;
    }

    public function getDescription() {
        return $this->Description;
    }

    public function getLink() {
        return $this->Link;
    }

    public function getGuid() {
        return $this->Guid;
    }

    public function getPubDate() {
        return $this->PubDate;
    }

    public function getCategory() {
        return $this->Category;
    }
    

    /*
     * SETTER
     */

    private function setTitle($Title) {
        $this->Title = $Title;
    }

    private function setDescription($Description) {
        $this->Description = $Description;
    }

    private function setLink($Link) {
        $this->Link = $Link;
    }

    private function setGuid($Guid) {
        $this->Guid = $Guid;
    }

    private function setPubDate($PubDate) {
        $this->PubDate = $PubDate;
    }

    private function setCategory($Category) {
        $this->Category = $Category;
    }

    public function setID($id){
        $this->Id=$id;
    }
}
?>
    
