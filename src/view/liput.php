<?php
include 'yla.php';

?>

<html><body>
    
       
    <h2>Varaa liput</h2>

<form action="varaa.php" method="POST">
  <div>
    <label for="nimi">Nimi:</label>
    <input id="nimi" type="text" name="nimi">
    
  </div>
  <div>
    <label>Sähköposti:</label>
    <input type="text" name="email" >
  </div>
  <div>
    <label>Salasana:</label>
    <input type="password" name="salasana">
  </div>
  </div>
  <div>
    <label>Elokuva:</label>
    <input type="text" name="email" >
  </div>

  </div>
  <div>
    <label>Näytös:</label>
    <input type="text" name="naytos" >
  </div>
    
  <label>Paikka:</label>
    <input type="text" name="paikka" >
  </div>




    Varauskalenteri? Kirjaudu sisään?Valmiiksi hinnoitellut elämyspaketit?<br>
    
        <input type=submit value="Lähetä">
</form>

    </body></html>



<?php
include 'ala.php'; 