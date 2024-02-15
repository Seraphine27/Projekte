<?php

include 'dbClass.php';

class User extends Database
{
    public function signUpUser($uname, $email, $pw)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$uname, $email]);
        $stmt->fetch();

        if ($stmt->rowCount() == 0)
        {
            $stmt = $this->connect()->prepare("INSERT INTO users (username, email, password)
                    VALUES(?,?,?)");
            $stmt->execute([$uname, $email, $pw]);

            if ($stmt)
            {
                $stmt = $this->connect()->prepare("SELECT id FROM users WHERE username = ?");
                $stmt->execute([$uname]);
                $r = $stmt->fetch();
                $uid = $r->id;

                $stmt = $this->connect()->prepare("INSERT INTO carts (userid) VALUES (?)");
                $stmt->execute([$uid]);
                echo "Sie sind erfolgreich registriert!",
                header("Refresh: 3; url=login.php");
            }
        }
        else
        {
                echo "Tut uns leid, Username oder E-mail ist bereits registriert!";
        }
    }

    public function loginUser($uname, $pw)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->execute([$uname, $pw]);
        $result = $stmt->fetch();
        $userid = $result->id;

        $stmt1 = $this->connect()->prepare("SELECT * FROM carts WHERE userid = ?");
        $stmt1->execute([$userid]);
        $result1 = $stmt1->fetch();

            echo "<br>";
        
        if ($stmt->rowCount() == 1)
        {
            echo "Sie wurden eingeloggt!";
            $_SESSION['loggedin'] = 1;
            $_SESSION['userid'] = $result->id;
            $_SESSION['cartid'] = $result1->id;
            header("Refresh: 1.5, url=dashboard.php");
        }
        else
        {
            echo "Tut uns leid, Benutzername oder Passwort wurden falsch eingegeben";
        }
    }
}
?>