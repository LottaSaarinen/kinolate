<!DOCTYPE html>
<html lang="fi">
  <head>
    <title>KinoLate - <?=$this->e($title)?></title>
    <meta charset="UTF-8">  
    <link href="styles/styles.css" rel="stylesheet">
  
  </head>
  <body>
    <header>
       <h><a href="<?=BASEURL?>">📹KinoLate</a></h>
       <div class="profile">
        <?php
          if (isset($_SESSION['user'])) {
            echo "<div>$_SESSION[user]</div>";
            echo "<div><a href='logout'>Kirjaudu ulos</a></div>";
          } else {
            echo "<div><a href='kirjaudu'>Kirjaudu</a></div>";
          }
        ?>
      </div>
   
    </header>
    <section>
      <?=$this->section('content')?>
    </section>
    <footer>
      <hr>
      <div>© Kurpitsa Solutions</div>
    </footer>
  </body>
</html>
