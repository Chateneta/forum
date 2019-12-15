<?php
require_once('bdd.class.php');

class user{
    public $id;
    public $login;
    public $pass;

    public function __construct(){

    }

    public function getLogin($id){
        $db= new bdd("localhost","forum","root","");
        $sql = $db->link->prepare("SELECT login FROM user WHERE id=?");
        $sql->bind_param("i",$id);
        $sql->execute();
        $res = $sql->get_result();
        $temp= $res->fetch_assoc();
        return $temp['login'];

    }

    public function login($login,$pass){
        $db= new bdd("localhost","forum","root","");
        $sql = $db->link->prepare("SELECT id FROM user WHERE login=? and pass=?");
        $sql->bind_param("ss",$login,$pass);
        $sql->execute();
        $res = $sql->get_result();
        $temp= $res->fetch_assoc();
        return $temp;
    }


    public function signin($login,$pass,$email){
        $db= new bdd("localhost","forum","root","");
        $sql = $db->link->prepare("SELECT count(id) AS A FROM user WHERE email=? OR login=? ");
        $sql->bind_param("ss",$email,$login);
        $sql->execute();
        $res = $sql->get_result();
        $temp= $res->fetch_assoc();
       

        if($temp['A']==0){
            $sql = $db->link->prepare("INSERT INTO user(login, pass, email) VALUES (?,?,?) ");
            $sql->bind_param("sss", $login,$pass,$email);
            $sql->execute();
           
            
            $sql = $db->link->prepare("SELECT id FROM user WHERE email=? ");
            $sql->bind_param("s",$email);
            $sql->execute();
            $res = $sql->get_result();
            $temp= $res->fetch_assoc();
            return $temp['id'];
            
        }
        else{
            return 0;//User existant
        }  
    }

}

?>
