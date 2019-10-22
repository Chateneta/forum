<?php
include('../class/bdd.class.php');
include('../class/user.class.php');

session_start();
$db= new bdd("localhost","forum","root","");
$temp = $db->add($_SESSION['IDU'],$_POST['nom'], $_POST['content']);

echo $_SESSION['IDU'];
    switch ($temp) {
        case 0:
            $_SESSION['MESS']='Nom du Post déja utilisé';
            header("Location: ../front/main.php");;
        break;

        case 1:
            $_SESSION['MESS']='Erreur lors de la création';
            header("Location: ../front/main.php");;
        break;


        default:
            $_SESSION['MESS']='Post créer convenablement';
            header("Location: ../front/main.php");;
        break;
    }

    
    

    


?>