<?php


include('../class/user.class.php');

$user = new user();
$temp = $user->signin($_POST['login'], $_POST['pass'], $_POST['email']);


    if($temp=0){
        session_start();
        $_SESSION['MESS']='Le Login OU Email fournie est déja utilisé';
       header("Location: ../front/index.php");;
        
    }
    else{
        $user->login= $_POST['login'];
        $user->pass= $_POST['pass'];
        $user->id=$temp['id'];
        session_start();
        $_SESSION['IDU']=$temp['id'];
        $_SESSION['MESS']='Félicitation votre compte est créé et connecté !';
        header("Location: ../front/main.php");;
        
    }

    
    

    


?>