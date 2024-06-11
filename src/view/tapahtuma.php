
<?php $this->layout('template', ['title' => $tapahtuma['nimi']]) ;
  $start = new DateTime($tapahtuma['tap_alkaa']);
  $end = new DateTime($tapahtuma['tap_loppuu']);
?>
<h1> Luomalla tilin pääset ilmottautumaan mukaan tapahtumaan</h1>
<h1><?=$tapahtuma['nimi']?></h1>
<div><?=$tapahtuma['kuvaus']?></div>
<div>Alkaa: <?=$start->format('j.n.Y G:i')?></div>
<div>Loppuu: <?=$end->format('j.n.Y G:i')?></div>

<?php
if ($loggeduser) {
    if (!$ilmoittautuminen) {
      echo"<br><br>";
      echo "<div class='flexarea'><a href='ilmoittaudu?id=$tapahtuma[idtapahtuma]' class='button'>ILMOITTAUDU</a></div>";    
    } else {
      echo "<div class='flexarea'>";
      echo"<br><br>";
      echo "<p><div>Olet ilmoittautunut tapahtumaan!</div></p>";
      echo"<br><br>";
      echo "<a href='peru?id=$tapahtuma[idtapahtuma]' class='button'>PERU ILMOITTAUTUMINEN</a>";
      echo "</div>";
    }
  }

?>
