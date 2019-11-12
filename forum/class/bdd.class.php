<?php

class bdd{

    private $serveur = "localhost";
    private $base = "forum";
    private $user = " root";
    private $pass = "";
    public $link= "";

    public function __construct($serveur, $base, $user, $pass){
        $db = new mysqli($serveur, $user, $pass ,$base);
        $this->link=$db;
    }
    

    

   


   

    

}
?>