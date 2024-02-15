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
                    VALUES (?,?,?)");
            $stmt->execute([$uname, $email, $pw]);

            if ($stmt)
            {
                $stmt = $this->connect()->prepare("SELECT id FROM users WHERE username = ?");
                $stmt->execute([$uname]);
                $r = $stmt->fetch();
                $uid = $r->id;

                $stmt = $this->connect()->prepare("INSERT INTO lendmovies (userid) VALUES (?)");
                $stmt->execute([$uid]);
                echo "Sie sind erfolgreich registriert!",
                header("Refresh: 3; url=login.php");
            }
        }
        else
        {
            echo "Benutzername oder Email existiert bereits!";
        }
    }

    public function loginUser($uname, $pw)
    {
        
        $stmt = $this->connect()->prepare("SELECT * FROM users WHERE email = ? AND password = ? ");
        $stmt->execute([$uname, $pw]);
        $result = $stmt->fetch();
        $userImage = $result->userImage;
        $userid = $result->id;
        
        $stmt1 = $this->connect()->prepare("SELECT * FROM lendmovies WHERE userid =?");
        $stmt1->execute([$userid]);
        $result1 = $stmt1->fetch();

        echo "<br>";
    
        if ($stmt->rowCount() == 1)
        {
            echo "Sie wurden erfolgreich eingeloggt!";
            $_SESSION['loggedin'] = 1;
            $_SESSION['userid'] = $result->id;
            $_SESSION['movieid'] = $result1->id;
            $_SESSION['userImage'] = $userImage;
            header("Refresh: 3; url=dashboard.php");
        } 
        else
        {
            echo "Benutzername oder Passwort falsch!";
        }
    }

    public function updateProfileImage($data)
    {
        $stmt = $this->connect()->prepare("UPDATE users SET userImage = ? WHERE id = ?");
        $stmt->execute([$data['optradio'], $_SESSION['userid']]);
        $_SESSION['userImage'] = $data['optradio'];

        header("Location: profilePicture.php");
    }
}
?>