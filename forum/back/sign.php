<?php

include('../class/bdd.class.php');
include('../class/user.class.php');

$db= new bdd("localhost","forum","root","");
$temp = $db->signin($_POST['login'], $_POST['pass'], $_POST['email']);


    if($temp=0){
        session_start();
        $_SESSION['MESS']='Le Login OU Email fournie est déja utilisé';
       header("Location: ../front/index.php");;
        
    }
    else{
        $Utilisateur= new user($_POST['login'], $_POST['pass']); //Connecté
        session_start();
        $_SESSION['IDU']=$temp;
        $_SESSION['MESS']='Félicitation votre compte est créé et connecté !';
        header("Location: ../front/index.php");;
        
    }

    
    

    


?>