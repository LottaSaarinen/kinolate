<!DOCTYPE html>
<html lang="fi">
  <head>
    <title>KinoLate - <?=$this->e($title)?></title>
    <meta charset="UTF-8">    
  </head>
  <body>
    <header>
       <h1><a href="<?=BASEURL?>">📹KinoLate</a></h1>
    </header>
    <section>
      <?=$this->section('content')?>
    </section>
    <footer>
      <hr>
      <div> Kurpitsa Solutions</div>
    </footer>
  </body>
</html>
