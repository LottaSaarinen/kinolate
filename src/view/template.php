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
        <li class="dropdown">
         <p2> <a href="teatterit">Teatterit</a></p2>
         <div class="dropdown-content">
         <li class="dropdown">
         <p2><a href="javascript:void(0)" class="dropbtn">Näytökset, elokuvat liput ja elämyspaketit</a></p2>
         <div class="dropdown-content">
         <p2><a href="liput">Näytökset ja Liput</a></p2>
         <p2><a href="elokuvat">Selaa elokuvia</a></p2>
         <p2><a href="elamyslomake">Elämyspaketit ja tarjouspyyntölomake</a></p2>
         <p2><a href="tapahtumat">Elokuvateematapahtumat </a></p2>
</div>
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
