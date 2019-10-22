<?php

include('../class/bdd.class.php');
include('../class/user.class.php');

$db= new bdd("localhost","forum","root","");
$temp = $db->login($_POST['login'], $_POST['pass']);


    if(empty($temp[id])){
        session_start();
        $_SESSION['MESS']='Le Login OU Mdp fournie est inconnue, retenter ou cliquez sur Sign In pour vous inscire';
        header("Location: ../front/index.php");;
    }
    else{
        $Utilisateur= new user($_POST['login'], $_POST['pass']); //Connecté
        session_start();
        $_SESSION['IDU']=$temp[id];
        $_SESSION['MESS']='Vous êtes connecté';
        header("Location: ../front/main.php");;
    }

    
    

    


?>