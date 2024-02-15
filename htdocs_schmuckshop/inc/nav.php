<div class="navbar">

    <div class="logotext">
    <a href="index.php"><h2>Schmuckboutique</h2></a>
    </div>

    <div class="menulinks">

        <?php if(isset($_SESSION['loggedin']))
        { ?>
            <a href="/dashboard.php">Boutique</a>
            <a href="/cart.php">Cart</a>

            <?php if(isset($_POST['logoutbtn']))
            {
                $_SESSION['loggedin'] = 0;
                session_unset();
                session_destroy();
                header("Location: index.php");
                exit();
            } ?>

        <?php } else
        { ?>
            <a href="/signup.php">Sign Up</a>
            <a href="/login.php">Login</a>
        <?php } ?>
    
    </div>

    <form class="logout" action="" method="POST">
        <button type="submit" class="logoutbtn" name="logoutbtn">Logout</button>
    </form>

</div>

