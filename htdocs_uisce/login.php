<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheets/stylelogin.css" type="text/css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="jsfunctions/login.js"></script>
    <title>UISCE</title>
</head>
<body>

<!-- Login erstellen mit dem icon eye für JavaScript für Show and Hide -->
    <div class="logotext">
        <a href="index.php">UISCE</a>
    </div>

    <div class="login">
        <form action="" method="POST">
            <input type="text" name="email" placeholder="E-Mail" required />
            <div class="pwcont">
                <input type="password" id="pw"  class="input" name="pw" placeholder="Password" required />
                <box-icon class="eye" name='show-alt'></box-icon>
            </div>
            <button type="submit" class="loginbtn" name="loginbtn">Login</button>
            <p class="textarea">Neu bei Uisce? <a class="link" href="signup.php">Jetzt registrieren</a></p>
        </form>

        <?php

            if(isset($_POST['loginbtn']))
            {
                include 'classes/userClass.php';
                $user = new User();
                $user->loginUser($_POST['email'], sha1($_POST['pw']));
            }
        ?>

    </div>

</body>
</html>