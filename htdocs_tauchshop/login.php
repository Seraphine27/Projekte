<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet">
    <title>Coders Shop</title>
</head>

<body>
    <?php
    include 'inc/nav.php';
    ?>

    <div class="contentarea">
        <form action="" method="POST">
            <input type="text" class="input" name="username" placeholder="Benutzername" required />
            <input type="password" class="input" name="pw" placeholder="Passwort" required />
            <button type="submit" class="loginbtn" name="loginbtn">Login</button>
        </form>

        <?php

            if(isset($_POST['loginbtn']))
            {
                include 'classes/userClass.php';
                $user = new User();
                $user->loginUser($_POST['username'], sha1($_POST['pw']));
                
            }

        ?>
    </div>

</body>
</html>