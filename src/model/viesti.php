<?php

require_once HELPERS_DIR . 'DB.php';

function haeviesti($idviesti,$idhenkilo) {
  return DB::run('SELECT * FROM viesti WHERE idviesti = ? AND idhenkilo = ?',
                 [$idviesti,$idhenkilo])->fetchAll();
}

function lisaaviesti($idviesti,$idhenkilo) {
  DB::run('INSERT INTO viesti ($idviesti,idhenkilo) VALUE (?,?)',
          [$idviesti,$idhenkilo]);
  return DB::lastInsertId();
}

?>