<?php

 $this->layout('template', ['title' => 'Liput']) ?>


<html><body>
    
       
    <h2>Varaa liput</h2><br>

    <h2>Voit varata liput näytökseen kun olet luonut tilin</h2><br><br>
    <form action="" method="POST">
  <div>
    <label for="salasana1">Näytöksen ID-numero:</label>
    <input id="idnaytos" type="int" name="idnaytos">
  </div>
  <div>
    <label for="salasana2">Paikan ID_numero:</label>
    <input id="idpaikka" type="int" name="idpaikka">
  </div>
 
    

    
        <input type=submit value="Lähetä">
</form>
<p>miten jos haluaa varata montapaikkaa?</p>
    </body></html>



<?php
