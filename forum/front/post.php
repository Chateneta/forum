<?php
include('../class/post.class.php'); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href=".\file.css">
    </head>
    <body>
        <header class="bg-dark">
            <div class="row d-flex align-items-center">
                <div class="col-6 d-flex justify-content-start text-light">FORUM</div>
                <div class="col-6 d-flex justify-content-end text-light">ICON</div>
            </div>
        </header>
        <div class="container">
            <div class="row justify-content-center align-items-center ">
                    <div class='col-6 oui'>
                    <a href='post.php'>
                        <div class='card'>
                            <h5 class='card-header'><?php this->$nom ?></h5>
                            <div class='card-body'>
                                <p class='card-text'>".$content."</p>
                                <p class=''>".$author."</p>
                            </div>
                        </div>
                    </a>
            </div>
        </div>    
    </body>
</html>