<?php

include('../class/user.class.php');

$user = new user();
$temp = $user->login($_POST['login'], $_POST['pass']);

    if(empty($temp['id'])){
        session_start();
        $_SESSION['MESS']='Le Login OU Mdp fournie est inconnue, retenter ou cliquez sur Sign In pour vous inscire';
        header("Location: ../front/index.php");;
    }
    else{
        $user->login= $_POST['login'];
        $user->pass= $_POST['pass'];
        $user->id=$temp['id'];
        session_start();
        $_SESSION['IDU']=$temp['id'];
        $_SESSION['MESS']='Vous êtes connecté';
        header("Location: ../front/main.php");;
    }

    
    

    


?>