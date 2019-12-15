<?php
require_once('../class/user.class.php'); 
require_once('../class/post.class.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href=".\file.css">
</head>
<body>
    <header class="bg-dark container-fluid">
        <div class="row align-items-center">
            <div class="col-6 d-flex justify-content-start text-light"><a href='main.php'>FORUM</a></div>
            <div class="col-6 d-flex justify-content-end text-light">ICON</div>
        </div>
    </header>
    <div class="container">
        <div class="row justify-content-center align-items-center ">
            <div class="post">
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
                            <?php
                                session_start();
                                echo $_SESSION['MESS'];
                            ?>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
            <?php
        
            $post= new post();
            $rep=$post->getAllPost();
            $i=0;
            $u=new user();
            foreach ($rep as $row) {
                $temp=$u->getLogin($row['createdBy']);
                
                if($i==0){
                    echo "<div class='row justify-content-center align-items-center mb-3'>";
                    echo $post->affiche($row['nom'], $row['content'], $temp, $row['id']);
                }
                elseif($i%2){
                    echo $post->affiche($row['nom'], $row['content'], $temp, $row['id']);
                    echo "</div>";
                }
                else{
                    echo "<div class='row justify-content-center align-items-center mb-3'>";
                    echo $post->affiche($row['nom'], $row['content'], $temp, $row['id']);
                }
                $i++;
                
            }  
           
           
            ?>

        
    </div>
    
</body>
</html>