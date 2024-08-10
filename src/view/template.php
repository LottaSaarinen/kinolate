<!DOCTYPE html>
<html lang="fi">
  <head>
    <title>📹KinoLate - <?=$this->e($title)?></title>
    <meta charset="UTF-8">  
    <link href="styles/styles.css" rel="stylesheet">
  
  </head>
  <body>
    <header>
       <h2><a href="etusivu">📹KinoLate</a></h2>
        <nav>
        <ul>
        <p> <a href="teatterit">Teatterimme</a></p>
  
        <p><a href="elokuvat">Elokuvat ja näytökset</a></p>
   
        <p><a href="tapahtumat">Elokuvateemapäivät </a></p>

</li>
</ul>
<?php
          if (isset($_SESSION['user'])) {
            
            echo "<div class='profile'><h1><div>$_SESSION[user]</div></h1>";
            echo "<h1><div><a href='logout'>Kirjaudu ulos</a></div></h1>";
            if (isset($_SESSION['admin']) && $_SESSION['admin']) {
              echo "<h1><div><a href='admin'>Ylläpitosivut</a></div></h1>";  
            }
          } else {
            echo "<h1><div><a href='kirjaudu'>Kirjaudu</a></div></h1>";
          }
        ?>
      </div>
   
    </header>
    <section>
  
</p>
<br>

      <?=$this->section('content')?>
    </section>
    <footer>
      <hr>
      <div>© Kurpitsa Solutions</div>
    </footer>
  </body>
</html>
