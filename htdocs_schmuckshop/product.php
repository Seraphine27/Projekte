<?php
    session_start();
    include 'classes/productClass.php';

if(!isset($_SESSION['loggedin']))
{
    die("Sie müssen sich bitte einloggen!");
}
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
    ?>
    
    <div class="productview">

        <?php
            $pid = $_GET['pid'];
            $product = new Product();
            $product->loadProductById($pid);

            if(isset($_POST['cartbtn']))
            {
                $product->addToCart($pid, $_POST['quantityToAdd']);
            }
        ?>
    </div>
    
</body>
</html>