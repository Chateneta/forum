<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset=utf-8>
        <link rel="stylesheet" href="./file.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <?php
            session_start();
            if(isset($_SESSION['MESS'])){
                echo $_SESSION['MESS'];
                echo $_SESSION['IDU'];
            }
            else{
                echo 'Connectez/Inscrivez Vous';
            }
            
        ?>
        <h1>Log In</h1>
        <form action="/back/log.php" method="POST" class="">
            <div class="">
                <label for="login">Enter your login: </label>
                <input type="text" name="login" id="login" required>
            </div>
            <div class="">
                <label for="pass">Enter your password </label>
                <input type="password" name="pass" id="pass" required>
            </div>
            <div class="">
                <input type="submit" value="LogIn!">
            </div>
        </form>
        <br/>
        <h1>signinIn</h1>
        <form action="/back/sign.php" method="POST" class="">
            <div class="">
                <label for="login">Enter your login: </label>
                <input type="text" name="login"  required>
            </div>
            <div class="">
                <label for="email">Enter your Email: </label>
                <input type="text" name="email" id="email" required>
            </div>
            <div class="">
                <label for="pass">Enter your password </label>
                <input type="password" name="pass"  required>
            </div>
            <div class="">
                <input type="submit" value="Subscribe!">
            </div>
        </form>
    </body>
</html>
<?php
?>