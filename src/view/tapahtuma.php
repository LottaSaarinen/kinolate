
<?php $this->layout('template', ['title' => $tapahtuma['nimi']]) ;
  $start = new DateTime($tapahtuma['tap_alkaa']);
  $end = new DateTime($tapahtuma['tap_loppuu']);
?>
<hr><br><hr><br><br>
<?php


if (!$loggeduser) {
   
echo"<h2> Luomalla tilin pääset varaamaan paikkasi tapahtumasta</h2>";
echo "<a href='kirjaudu'>Voit kirjautua tästä</a></b>";
echo "<br><a href='lisaa_tili'>tai luoda tilin tästä</a></b><br><br>";
}
if ($loggeduser) {
    if (!$ilmoittautuminen) {
      echo"<br><br><br><br>";
      echo "<div class='flexarea'><a href='ilmoittaudu?id=$tapahtuma[idtapahtuma]' class='button'>ILMOITTAUDU</a></div>";    
    } else {
      echo "<div class='flexarea'>";
      echo"<br>";
      echo "<p><div>Olet ilmoittautunut tapahtumaan!</div></p>";
      echo"<br>";
      echo "<a href='peru?id=$tapahtuma[idtapahtuma]' class='button'>PERU ILMOITTAUTUMINEN</a>";
      echo "<br><br><br>";
      echo "</div>";
    }
  }

?>


 <br><br>
<h1><?=$tapahtuma['nimi']?></h1>
<br><br>
<div><?=$tapahtuma['kuvaus']?></div>
<div>Alkaa: <?=$start->format('j.n.Y G:i')?></div>
<div>Loppuu klo <?=$end->format(' G:i')?></div>


