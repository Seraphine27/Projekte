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
    
<div class="order">

    <?php

        include 'inc/nav.php';

        echo '
        
        <div class="ordered">
        <h3> Zahlungspflichtig bestellen </h3>
        </div>
        ';

        $product = new Product();
        $product->ordered();

        if(isset($_POST['orderbtn']))
        {
            header("Location: finish.php");
        }
    ?>
</div>

</body>
</html>