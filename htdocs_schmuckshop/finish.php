<?php
    session_start();
    include 'classes/productClass.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet">
    <title>Schmuck Boutique</title>
</head>

<body>

    <?php

        include 'inc/nav.php';

        echo '
        
        <div class="finished">
        <h3> Bestellung abgeschlossen </h3>
        </div>
        
        ';
    ?>
    
</body>
</html>