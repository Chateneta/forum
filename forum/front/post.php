<?php
require_once('../class/post.class.php'); 
require_once('../class/comm.class.php'); 
require_once('../class/user.class.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href=".\file.css">
    </head>
    <body>
        <header class="bg-dark container-fluid">
            <div class="row align-items-center">
                <div class="col-6 d-flex justify-content-start text-light"><a href='main.php'>FORUM</a></div>
                <div class="col-6 d-flex justify-content-end text-light">ICON</div>
            </div>
        </header>
        <?php
            $post= new post();
            $id=$_GET['id'];
            $u=new user();
            
            $res=$post->getPost($id);
                $post->nom=$res[0]['nom'];
                $post->content=$res[0]['content'];
                $post->author=$u->getLogin($res[0]['createdBy']);
 
                $post->vote=$res[0]['vote'];
                
        ?>
        <div class="container">
            <div class="row justify-content-center align-items-center ">
                <div class="post">     
                        <?php 
                        echo  $post->afficheSolo($post->nom,$post->content,$post->author,$id,$post->vote);
                        $comm= new comm();
                        $rep=$comm->getAllComm($id);
                        foreach ($rep as $row) {
                            echo $comm->affiche($row['cont'], $row['author']);
                         
                        }
                        ?>

                        </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $('.button').click(function(){
                    var clickBtnValue = $(this).val();
                    var url = '../back/vote.php';
                    var idu=<?php echo $_SESSION['IDU'] ?>;
                    var idp=<?php echo $id ?>;
                    data =  {'idu':idu, 'idp':idp };
                    console.log(data);
                    $.post(url, data, function (response) {
                        $('.span').text("Liked:"+response);
                        $('.button').toggleClass("liked");
                    });
                });
            });
        </script>
    </body>
</html>
