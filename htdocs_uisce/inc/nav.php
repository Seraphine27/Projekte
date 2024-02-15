<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="stylesheets/navstyle.css" type="text/css" rel="stylesheet">
    <link href="stylesheets/changestyle.css" type="text/css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- <script language="javascript" type="text/javascript" src="jsfunctions/nav.js"></script> -->
    <title>UISCE</title>
</head>

<body>
    <!-- Navigationsbar erstellen mit den Icons in Profile, Home und Search -->
    <div class="navbar">

        <div class="logotext">
            <a class="logo_headline" href="dashboard.php">UISCE</a>
        </div>

        <div class="search">
            <a href="/search.php"><i class='bx bx-search searchglass'></i></a>
        </div>

        <div class="kategory">
            <button class="drop">Category</button>
            <div class="dropdown_con">
                <a href="genre.php" class="drop_item">Action</a>
                <a href="genre.php" class="drop_item">Horror</a>
                <a href="genre.php" class="drop_item">Anime</a>
                <a href="genre.php" class="drop_item">Komödie</a>
                <a href="genre.php" class="drop_item">K-Drama</a>
                <a href="genre.php" class="drop_item">Romanze</a>
            </div>
        </div>

        <div class="home">
            <a href="/home.php"><i class='bx bxs-home house'></i></a>
        </div>

        <div class="library">
            <a href="/library.php">Library</a>
        </div>

        <div class="profile">
            <button class="dropbtn"><img id="user" src="/img/user/<?php echo $_SESSION['userImage']; ?>" alt=""></button>
            <div class="dropdown_content">
                <a href="profilePicture.php" class="dropdown_item">Profilepicture change</a>
                <form method="POST" action="">
                    <button type="submit" name="logoutbtn" class="logoutbtn"><i id="logout" class='bx bx-log-out'></i></button>
                </form>
            </div>

            <?php if (isset($_SESSION['loggedin'])) { ?>


                <?php if (isset($_POST['logoutbtn'])) {
                    $_SESSION['loggedin'] = 0;
                    session_destroy();
                    header("Location: index.php");
                    exit();
                } ?>

            <?php } ?>

        </div>
    </div>