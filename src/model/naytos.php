<?php
require_once HELPERS_DIR . 'DB.php';

function haenaytos($idnaytos) {
  return DB::run('SELECT * FROM viesti WHERE idnaytos = ?',
                 [$idnaytos])->fetchAll();
}

?>