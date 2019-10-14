<?php
class user{
    private $id;
    private $login;
    private $pass;

    public function __construct($oui,$non){
        $this->login = $oui;
        $this->pass = $non;
    }

    public function getloginPass(){
        return $this->login;
        return $this->pass;
    }

}

?>
