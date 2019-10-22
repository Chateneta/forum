<?php
include('./class/bdd.class.php');
session_start();

class post{
    private $id;
    private $nom;
    private $content;


    public function __construct($nom,$content){
        $this->nom = $nom;
        $this->content = $content;
    }

    public function getNom(){
        return $this->nom;
    }
    public function getContent(){
        return $this->nom;
    }
    public function affiche($nom,$content,$author){
        return
        "<div class='card'>
            <h5 class='card-header'>"$nom"</h5>
            <div class='card-body'>
                <p class='card-text'>"$content"</p>
                <p class=''>"$author"</p>
            </div>
        </div>";
              
    }

}

?>
