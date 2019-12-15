<?php
include('../class/comm.class.php'); 
echo $_POST['id'];
$x='Location: /front/post.php?id='.$_POST['id'];
session_start();
$comm = new comm();
$temp = $comm->add($_POST['comm'],$_SESSION['IDU'],$_POST['id']);//passer l'id du post dans le form
    switch ($temp) {
        case 0:
            $_SESSION['MESS']='Nom du Post déja utilisé';
            echo $_SESSION['MESS'];
            
            header($x);
        break;

        case 1:
            $_SESSION['MESS']='Erreur lors de la création';
            echo $_SESSION['MESS'];
            
            header($x);
        break;


        default:
            $_SESSION['MESS']='Post créer convenablement';
            echo $_SESSION['MESS'];

            header($x);
        break;
    }
?>