 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheets/signupstyle.css" type="text/css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script language="javascript" type="text/javascript" src="jsfunctions/signup.js"></script>
    <title>UISCE</title>
</head>
<body>
  
<!-- Sign up mit Passwort Indicator und zwei Show and Hide Button als Eye  -->
    <div class="logotext">
        <a href="index.php">UISCE</a>
    </div>

    <div class="signup">
        <form action="" method="POST">

<!-- div data für username und email -->

        <div class="data">
            <input type="text" class="input" name="username" placeholder="Username" required />
            <input type="text" class="input" name="email" placeholder="E-Mail" required />
        </div>

<!-- div pxbox für password und eye icon für show and hide in Javascript -->
            <div class="pwbox">
                <input id="pw" class="input" name="pw" type="password" placeholder="Password">
                    <box-icon class="eye" name='show-alt'></box-icon>
            </div>

<!-- div indicator für Passwort überprüfung mit Javascript und Css in verschiedenen Farben -->
            <div class="indicator">
                <span class="weak"></span>
                <span class="medium"></span>
                <span class="strong"></span>
            </div>

<!-- div message für Indicator Nachrichten in Css und Javascript -->
            <div class="message"></div>

<!-- div pwc für password confirm mit eye icon für show and hide in Javascript -->
            <div class="pwc">
                <input id="pwco" class="input" name="pwconfirm" type="password" placeholder="Password Confirm">
                    <box-icon class="eye1" name='show-alt'></box-icon>
            </div>          
            <button type="submit" class="signbtn" name="signbtn">Sign Up</button>
    </div>
    
        </form> 

          <?php
            
            if(isset($_POST['signbtn'])) 
            {
                if(sha1($_POST['pw']) == sha1($_POST['pwconfirm']))
                {
                    include 'classes/userClass.php';
                    $user = new User();
                    $user->signUpUser($_POST['username'], $_POST['email'], sha1($_POST['pw']));
                }
            }
        ?>  


