<?php

include 'dbClass.php';

class Product extends Database
{
    public function loadAllProducts()
    {
        $stmt = $this->connect()->prepare("SELECT * FROM products");
        $stmt->execute();

        while ($prod = $stmt->fetch()) {
            echo '
                <div class="product">
                    <a href="product.php?pid=' . $prod->id . '">
                        <h2 class="name">' . $prod->name . '</h2>
                        <img src="/img/' . $prod->img . '</img>
                        <p class="des">' . $prod->description . '</p>
                        <h3 class="price">' . $prod->price . '</h3>
                    </a>
                </div>
            ';
        }
    }

    public function loadProductById($pid)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$pid]);
        $pdata = $stmt->fetch();

        echo '
        <div class="productdetail">
                <h2 class="name">' . $pdata->name . '</h2>
                <img src="/img/' . $pdata->img . '">
                <p class="des">' . $pdata->description . '</p>
                <h3 class="price">' . $pdata->price . '</h3>
                <form action="" method="POST">
                    <input type="number" class="addq" name="quantityToAdd" step="1" value="1" max="99">
                    <button type="submit" class="cartbtn" name="cartbtn">Add to cart</button>
                </form>
        </div>
        </div>
    ';
    }

    public function addToCart($pid, $qta)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM carts WHERE userid = ?");
        $stmt->execute([$_SESSION['userid']]);
        $r = $stmt->fetch(); //fetch liefert false zurück 
        $cartid = $r["id"];


        $stmt = $this->connect()->prepare("SELECT * FROM cartitems WHERE cid = ? AND pid = ?");
        $stmt->execute([$cartid, $pid]);

        if ($stmt->rowCount() > 0) {
            while ($cartitem = $stmt->fetch()) {
                if ($cartitem->pid == $pid) {
                    $quantityNew = $cartitem->quantity + $qta;
                    $stmt = $this->connect()->prepare("UPDATE cartitems SET quantity = ? WHERE pid = ? AND cid = ?");
                    $stmt->execute([$quantityNew, $pid, $cartid]);

                    if ($stmt) {
                        echo 'Artikel erfolgreich zum Warenkorb hinzugefügt!';
                    }
                }
            }
        } else {
            $stmt = $this->connect()->prepare("INSERT INTO cartitems (cid, pid, quantity)
                    VALUES (?,?,?)");
            $stmt->execute([$cartid, $pid, $qta]);
            if ($stmt) {
                echo 'Artikel erfolgreich zum Warenkorb hinzugefügt!';
            }
        }
    }

    public function updateCartitem($newQuantity, $pid)
    {

        $stmt = $this->connect()->prepare("SELECT * FROM carts WHERE userid = ?");
        $stmt->execute([$_SESSION['userid']]);
        $r = $stmt->fetch();
        $cid = $r->id;

        $stmt = $this->connect()->prepare("UPDATE cartitems SET quantity = ? WHERE cid = ? AND pid = ?");
        $stmt->execute([$newQuantity, $cid, $pid]);

        header("Refresh: 0; url=cart.php");
        exit();
    }

    public function loadCart()
    {

        $stmt = $this->connect()->prepare("SELECT * FROM carts WHERE userid = ?");
        $stmt->execute([$_SESSION['userid']]);
        $r = $stmt->fetch();
        $cartid = $r->id;
        $stmt = $this->connect()->prepare("SELECT * FROM cartitems As c LEFT JOIN products AS p on c.pid = p.id WHERE cid = ?");
        $stmt->execute([$cartid]);

        while ($prod = $stmt->fetch()) {
            if ($prod->quantity == 0) {
                $stmt = $this->connect()->prepare("DELETE FROM cartitems WHERE pid = ?");
                $stmt->execute([$prod->id]);
            } else {
                echo '
                    <div class="cartlist">

                        <h2 class="name">' . $prod->name . '</h2>
                        <img src="/img/' . $prod->img . '">
                        <P class="des">' . $prod->description . '</p>
                        <h3 class="price">' . $prod->price . '</h3>
                        <form action="" method="POST">
                        <input type="number" class="updateq" name="updateQuantity" step="1" value="' . $prod->quantity . '" min="0" max="99">
                        <button type="submit" class="delbtn" value="' . $prod->id . '" name="delbtn">Update</button>
                    </form>

                    </div>
                ';
            }
        }
        if ($stmt->rowCount() > 0) {
            echo '
                
                <form action="" method="POST">
                <button type="submit" class="buybtn "name="buybtn">Buy now</button>
                </form>
                ';
        } else {
?>
            <h3> Warenkorb ist leer! </h3>
<?php
        }
    }

    public function ordered()
    {
        $endbetrag = 0;

        $stmt = $this->connect()->prepare("SELECT * FROM carts WHERE userid = ?");
        $stmt->execute([$_SESSION['userid']]);
        $r = $stmt->fetch();
        $cartid = $r->id;

        $stmt = $this->connect()->prepare("SELECT * FROM cartitems As c LEFT JOIN products AS p on c.pid = p.id WHERE cid = ?");
        $stmt->execute([$cartid]);

        while ($prod = $stmt->fetch()) {
            if ($prod->quantity > 0) {
                $pendpreis = $prod->quantity * $prod->price;
                echo '
                    <div class="orderlist">
                        <h2 class="name">' . $prod->name . '</h2>
                        <img src="/img/' . $prod->img . '">
                        <P class="des">' . $prod->description . '</p>
                        <p class="quantity">' . $prod->quantity . '</p>
                        <p class="price">' . $prod->price . '/STK</p>
                        <h3 class="summe"">' . $pendpreis . '/STK</h3>

                    </form>

                    </div>
                    ';
                $endbetrag += $pendpreis;
            }

           
        }

            echo '
            <div class="endbetrag">
            <p> Gesamtpreis: </p> 
            <h3>' . $endbetrag . '</h3>
            </div>
            ';

            echo '
            <form action="" method="POST">
            <button type="submit" class="orderbtn" name="orderbtn">Order now</button>
            </form>
            ';
    }
}
