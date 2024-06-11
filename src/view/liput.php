<?php

 $this->layout('template', ['title' => 'Liput']) ?>
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
 
  <div>
    <label>Näytös:</label>
    <input type="text" name="naytos" >
  </div>

  
  <div>
    <label>Istumapaikka:</label>
    <input type="text" name="paikka" >
  </div>





    Varauskalenteri? Kirjaudu sisään?Valmiiksi hinnoitellut elämyspaketit?<br>
    
        <input type=submit value="Lähetä">
</form>

    </body></html>



<?php
