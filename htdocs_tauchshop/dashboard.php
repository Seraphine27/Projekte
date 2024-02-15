<?php
session_start();

include 'classes/productClass.php';
if (!isset($_SESSION['loggedin'])) 
{
    die("Bitte einloggen!");
}
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

    <div class="productlist">

        <?php

            $product = new Product();
            $product->loadAllProducts();
        ?>
    </div>

</body>

</html>