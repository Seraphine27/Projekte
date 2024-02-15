<?php

include 'dbClass.php';

class Movie extends Database
{
    public function loadAllMovies()
    {
        $stmt = $this->connect()->prepare("SELECT * FROM movies");
        $stmt->execute();

        while ($mov = $stmt->fetch())
        {
            echo '
                <div class="movie">
                    <a href="movie.php?id='. $mov->id . '">
                        <h2 class="name">' . $mov->name .'</h2>
                        <img src="img/' . $mov->img .'">
                        <p class="des">' . $mov->description.'</p>
                        <p class="cat">' . $mov->category. '</p>
                        <h3 class="price">'. $mov->price .'</h3>
                    </a>
                </div>
                ';
        }
    }

    public function loadMovieById($mid)
    {
        $stmt = $this->connect()->prepare("SELECT * FROM movies WHERE id = ?");
        $stmt->execute([$mid]);
        $mdata = $stmt->fetch();

        echo '
            <div class="moviedetails">
                <h2 class="name">' . $mdata->name. '</h2>
                <img src="img/' . $mdata->img. '">
                <p class="des">' . $mdata->description. '</p>
                <h3 class="price">$' . $mdata->price. '</h3>
                <form action="" method="POST">
                    input type="addD" name="daysOfLend" step="5" value="0" max="30">
                    <button type="submit" class="lendbtn "name="lendbtn">Lend</button>
                </form>
            </div>
        ';
    }

    public function lendMovie($mid, $userid)
    {
         $stmt = $this->connect()->prepare("SELECT * FROM lendmovies WHERE movieid = ? AND userid = ?");
         $stmt->execute([$mid, $userid]);
         $stmt->fetch();

         if($stmt->rowCount() == 0)
         {
            $stmt = $this->connect()->prepare("INSERT INTO lendmovies (userid, movieid, lendat, backat)
                    VALUES (?,?,?,?)");
            $stmt->execute([$userid, $mid]);

                echo 'Titel wurde erfolgreich ausgeliehen!';
         }
         else{
            echo 'Titel ist bereits ausgeliehen!';
         } 
    }

    public function loadMovieLibrary()
    {
        $stmt = $this->connect()->prepare("SELECT * FROM lendmovies WHERE userid = ?");
        $stmt->execute([$_SESSION['userid']]);
        $r = $stmt->fetch();
        $libraryid = $r->id;

        $stmt = $this->connect()->prepare("SELECT * FROM movies AS m LEFT JOIN lendmovies AS lm ON m.id = lm.movieid WHERE lm.id");
        $stmt->execute([$libraryid]);

        if($stmt->rowCount() > 0)
        {
            while ($mov = $stmt->fetch())
            {
                echo '
                    <div class="movielibrary">

                        <h2 class="name">' . $mov->name . '</h2> 
                        <img src="img/'. $mov->img. '">
                        <p class="des">'. $mov->description. '</p>
                        <h3 class="price">$'. $mov->price. '</h3>
                    
                    </div>
                    ';
            }

            echo '
                <form action="" method="POST">
                    <button type="submit" class="viewbtn" name="viewbtn">View now</button>
                </form>
                ';
        }
        else
        {
            echo '<h3> Ihre Bibliothek ist leer </h3>';
        }
    }
}
?>