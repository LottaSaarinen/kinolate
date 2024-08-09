

<?php $this->layout('template', ['title' => 'Näytökset']) ?>

<h1>Näytökset</h1>

<div class='tapahtumat'>
<?php

foreach ($elokuvat as $elokuva) {

  $start = new DateTime($elokuva['nay_alkaa']);
  $end = new DateTime($elokuva['nay_loppuu']);

  echo "<div>";
 
    echo "<p><div>$elokuva[nimi]</div></p>";
    echo "<p><div><img src= $elokuva[kuva]></div></p>";
    echo "<p><div>" . $start->format('j.n.Y G:i') . "-" . $end->format('G:i') . "</div></p>";
    
    echo "<p><div><a href='elokuva?id=" . $elokuva['idelokuva'] . "'>Lue lisää elokuvasta täätä</a></div></p>";
  echo "</div>";

}
?>
</div>

