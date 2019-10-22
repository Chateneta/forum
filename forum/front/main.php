<?php
include('../class/bdd.class.php'); 
include('../class/post.class.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./file.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <header class="bg-dark">
        <div class="row d-flex align-items-center">
            <div class="col-6 d-flex justify-content-start text-light">FORUM</div>
            <div class="col-6 d-flex justify-content-end text-light">ICON</div>
        </div>
    </header>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-6 post">
                <?php
                    session_start();
                    echo $_SESSION['MESS'];
                ?>
            </div>
            <div class="col-6 post">
                <form action="../back/add.php" method="post">
                    <div class="card">
                        <h5 class="card-header">
                            <input class="form-control form-control-lg" name="nom" type="text" placeholder="Nom du Post"/>
                        </h5>
                        <div class="card-body">
                            <p class="card-text">
                                <textarea class="form-control" rows="5" type="textarea" name="content" placeholder="Contenu du text"></textarea>
                            </p>
                            <input type="submit" class="btn btn-warning" value="Nouveaux"/>
                        </div>
                    </div>
                </form>
            </div>
            <?php
            $db= new bdd("localhost","forum","root","");
            $AllPost= $db->getAllPost();
            $temp= new post('temp','temp')
                for($i=0;$i<=count($AllPost)-1;$i++){
                    $temp.affiche();
                }
            echo 
           /* $db= new bdd("localhost","forum","root","");
            $AllPost= $db->getAllPost();
            for($i=0;$i<=count($AllPost)-1;$i++){
                echo $AllPost[$i]['nom'];
                echo $AllPost[$i]['content'];
                echo $AllPost[$i]['createdBy'];
            }*/
           
            ?>

        </div>
    </div>
    
</body>
</html>