<?php
include 'inc/nav.php';
?>  
<div class="pb_change_content">
    <div class="headline">
        <h3>Profilbild ändern</h3>
    </div>

    <div class="descripton">
        <p>Hier kannst du dein Profilbild aus unserer Galerie verwenden oder ein eigenes Hochladen.</p>
    </div>

 <div class="profilePicture">
  <p>Choose a Profilepicture:</p>
      <form method="POST" action="">
        <label class="radio-inline">
          <input type="radio" name="optradio" value="keksmonster.jpg" checked>
          <img class="img" src="img/user/keksmonster.jpg">
        </label>

        <label class="radio-inline">
          <input type="radio" name="optradio"value="demonslayer.jpg">
          <img class="img" src="img/user/demonslayer.jpg">
        </label>
    
        <label class="radio-inline">
          <input type="radio" name="optradio"value="animeboy.jpg">
          <img class="img" src="img/user/animeboy.jpg">
        </label>
    
        <label class="radio-inline">
          <input type="radio" name="optradio"value="genshin.jpg">
          <img class="img" src="img/user/genshin.jpg">
        </label>
  
          <button type="submit" name="ppbtn" class="ppbtn">Profilbild ändern</button>
      </form>
      
  <?php

    if (isset($_POST['ppbtn']))
    {
   
      include 'classes/userClass.php';
      $user = new User();
      $user->updateProfileImage($_POST);
    }
  ?>
    

</div>