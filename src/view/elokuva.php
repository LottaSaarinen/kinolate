<?php $this->layout('template', ['title' => $elokuva['nimi']]) ;
  $start = new DateTime($elokuva['nay_alkaa']);
  $end = new DateTime($elokuva['nay_loppuu']);
?>


<?php
if (!$loggeduser) {
   
echo"<h2> Luomalla tilin pääset varaamaan paikkasi elokuvasta</h2>";
echo "<a href='kirjaudu'>Voit kirjautua tästä</a></b>";
echo "<br><a href='lisaa_tili'>tai luoda tilin tästä</a></b><br><br>";
}



?>
<br><hr><hr><br>
<h1> <?=$elokuva['nimi']?></h1>
<h><?=$elokuva['genre']?></h>
<br><br>

<h1><div> <?=$start->format('j.n.Y G:i') ."-" . $end->format('G:i')?></div></h1>

<br>
<h>Elokuvan kesto on <?=$elokuva['kesto']?><h>minuuttia. Näytös sisältää mainontaa.</h></di><br>
<br>
<h>Elokuvan ohjaaja <?=$elokuva['ohjaaja']?></di>

<br><br>
<h>Julkaistu vuonna <?=$elokuva['vuosi']?></di>
<br><br>
<h>Miespääossa <?=$elokuva['miespääosa']?></h>
<br><br>
<h>Naispääossa <?=$elokuva['naispääosa']?></di>
<br><br>
<h>Ikäraja suositus <?=$elokuva['ikäraja']?></h>
<br><br><br>
<p><div><img src=<?=$elokuva['kuva']?>></div></p>


<?php

if ($loggeduser) {
    if (!$lippu) {
      echo"<br><br>";
      echo "<div class='flexarea'><a href='varaa?id=$elokuva[idelokuva]' class='button'>Varaa paikkasi elokuvassa</a></div>";  
    } else {
      echo "<div class='flexarea'>";
      echo"<br><br>";
      echo "<p><div>Olet varannut paikan elokuvasta!</div></p>";
      echo"<br><br>";
      echo "<a href='perulippu?id=$elokuva[idelokuva]' class='button'>Peru paikkasi elokuvassa</a>";
      echo "</div>";
    }
  }




